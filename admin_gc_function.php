<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputGroupName = $_POST["group_name"];
    $inputGroupCode = $_POST["group_code"];
    $inputName = $_POST["name"];

    // Connect to your MySQL database
    $connection = mysqli_connect("localhost", "root", "", "prac");

    if ($connection === false) {
        die("Error: Could not connect to the database. " . mysqli_connect_error());
    }

    // Prepare a query to check if the group exists and get its ID and owner ID
    $query = "SELECT id, group_name, owner_id FROM groups WHERE group_name = ? AND group_code = ?";

    if ($stmt = mysqli_prepare($connection, $query)) {
        mysqli_stmt_bind_param($stmt, "ss", $inputGroupName, $inputGroupCode);

        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_store_result($stmt);

            if (mysqli_stmt_num_rows($stmt) == 1) {
                // Group name and code are correct
                // Get the group ID, group name, and owner ID
                mysqli_stmt_bind_result($stmt, $groupId, $groupName, $ownerId);
                mysqli_stmt_fetch($stmt);
                mysqli_stmt_close($stmt);

                // Check if the user is already a member of the group to avoid duplicates
                $checkMemberQuery = "SELECT id FROM group_members WHERE group_id = ? AND name = ?";
                if ($stmt = mysqli_prepare($connection, $checkMemberQuery)) {
                    mysqli_stmt_bind_param($stmt, "is", $groupId, $inputName);
                    if ($stmt->execute()) {
                        mysqli_stmt_store_result($stmt);
                        if (mysqli_stmt_num_rows($stmt) > 0) {
                            // User is already a member, show an alert
                            echo '<script>';
                            echo 'alert("You are already a member of this group. Redirecting you to the GroupChat.");';
                            echo 'window.location.replace("admin_joined_group.php?id=' . $groupId . '&user=' . urlencode($inputName) . '");';
                            echo '</script>';
                            exit();
                        } else {
                            // User is not a member, insert them into the group_members table
                            $insertMemberQuery = "INSERT INTO group_members (group_id, name) VALUES (?, ?)";
                            if ($stmt = mysqli_prepare($connection, $insertMemberQuery)) {
                                mysqli_stmt_bind_param($stmt, "is", $groupId, $inputName);
                                if ($stmt->execute()) {
                                    // User has been successfully added to the group_members table
                                    // Store relevant information in the session
                                    $_SESSION['group_id'] = $groupId;
                                    $_SESSION['user_name'] = $inputName;

                                    // Redirect to joined_group.php with user and group information
                                    echo '<script>';
                                    echo 'alert("You are now a member of the GroupChat");';
                                    echo 'window.location.replace("admin_joined_group.php?id=' . $groupId . '&user=' . urlencode($inputName) . '");';
                                    echo '</script>';
                                    exit();
                                } else {
                                    echo '<script>';
                                    echo 'alert("Error inserting the user into group_members: ' . mysqli_error($connection) . '");';
                                    echo 'window.location.replace("admin_groupchat.php");';
                                    echo '</script>';
                                    exit();
                                }
                            } else {
                                echo '<script>';
                                echo 'alert("Error preparing the insert statement: ' . mysqli_error($connection) . '");';
                                echo 'window.location.replace("admin_groupchat.php");';
                                echo '</script>';
                                exit();
                            }
                        }
                    } else {
                        echo '<script>';
                        echo 'alert("Error checking for an existing member: ' . mysqli_error($connection) . '");';
                        echo 'window.location.replace("admin_groupchat.php");';
                        echo '</script>';
                        exit();
                    }

                    mysqli_stmt_close($stmt);
                } else {
                    echo '<script>';
                    echo 'alert("Error preparing the check member statement: ' . mysqli_error($connection) . '");';
                    echo 'window.location.replace("admin_groupchat.php");';
                    echo '</script>';
                    exit();
                }
            } else {
                // Group name and code are incorrect
                echo '<script>';
                echo 'if (confirm("Group name and code are incorrect. Please try again.")) {';
                echo '    window.location.replace("admin_groupchat.php");';
                echo '} else {';
                echo '    window.location.replace("admin_groupchat.php");'; // Redirect on cancel
                echo '}';
                echo '</script>';
            }
        } else {
            echo '<script>';
            echo 'alert("Error executing the query: ' . mysqli_error($connection) . '");';
            echo 'window.location.replace("admin_groupchat.php");';
            echo '</script>';
            exit();
        }
    } else {
        echo '<script>';
        echo 'alert("Error preparing the statement: ' . mysqli_error($connection) . '");';
        echo 'window.location.replace("admin_groupchat.php");';
        echo '</script>';
        exit();
    }

    mysqli_close($connection);
}
?>
