<?php
include("dbconn.php");
include("session.php");

// Check if the user is logged in
if (!isset($_SESSION['id'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit;
}

$user_id = $_SESSION['id'];

// Make sure $db_host, $db_user, $db_pass, and $db_name are defined in dbconn.php
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the user is the owner of any group
$query = "SELECT id, group_name FROM groups WHERE owner_id = ?";
if ($stmt = mysqli_prepare($conn, $query)) {
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) > 0) {
            // User is the owner of a group, fetch group information
            mysqli_stmt_bind_result($stmt, $groupId, $groupName);
            mysqli_stmt_fetch($stmt);
            mysqli_stmt_close($stmt);

            // Redirect to groupchat_logs.php with group information
            header("Location: groupchat_logs.php?id=$groupId&user=" . urlencode($user_name));
            exit;
        } else {
            echo '<script>';
            echo 'alert("You cant access GroupChat logs because you dont have a group!");';
            echo 'window.location.replace("groupchat.php");';
            echo '</script>';
            exit();
            exit;
        }
    } else {
        echo "Error executing the query: " . mysqli_error($conn);
    }
} else {
    echo "Error preparing the statement: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
