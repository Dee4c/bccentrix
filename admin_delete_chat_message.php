<?php
// Connect to your MySQL database
include("adminsession.php");
$userId = $_SESSION['admin_id'];
$connection = mysqli_connect("localhost", "root", "", "prac");

if ($connection === false) {
    die("Error: Could not connect to the database. " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['messageId'])) {
    $messageId = $_POST['messageId'];

    // Check if the user is allowed to delete the message (optional)
    $checkOwnershipQuery = "SELECT user_id FROM group_chat_messages WHERE message_id = ?";
    if ($stmt = mysqli_prepare($connection, $checkOwnershipQuery)) {
        mysqli_stmt_bind_param($stmt, "i", $messageId);
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_bind_result($stmt, $messageUserId);
            mysqli_stmt_fetch($stmt);
            mysqli_stmt_close($stmt);

            if ($messageUserId == $userId) {
                // User is allowed to delete the message
                $deleteQuery = "DELETE FROM group_chat_messages WHERE message_id = ?";
                if ($stmt = mysqli_prepare($connection, $deleteQuery)) {
                    mysqli_stmt_bind_param($stmt, "i", $messageId);
                    if (mysqli_stmt_execute($stmt)) {
                        // Message deleted successfully
                        echo "Message deleted.";
                    } else {
                        echo "Error executing the delete query: " . mysqli_error($connection);
                    }
                    mysqli_stmt_close($stmt);
                } else {
                    echo "Error preparing the delete statement: " . mysqli_error($connection);
                }
            } else {
                echo "You are not allowed to delete this message.";
            }
        } else {
            echo "Error executing the check ownership query: " . mysqli_error($connection);
        }
    } else {
        echo "Error preparing the check ownership statement: " . mysqli_error($connection);
    }
} else {
    echo "Invalid request.";
}

mysqli_close($connection);
?>
