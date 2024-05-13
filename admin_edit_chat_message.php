<?php
// Include session.php to start or resume the session and access user data
include 'adminsession.php';

// Connect to your MySQL database
$connection = mysqli_connect("localhost", "root", "", "prac");

if ($connection === false) {
    die("Error: Could not connect to the database. " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['messageId']) && isset($_POST['newMessage'])) {
    $messageId = $_POST['messageId'];
    $newMessage = $_POST['newMessage'];

    // Update the message in the database
    $updateQuery = "UPDATE group_chat_messages SET message = ? WHERE message_id = ?";

    if ($stmt = mysqli_prepare($connection, $updateQuery)) {
        mysqli_stmt_bind_param($stmt, "si", $newMessage, $messageId);
        if (mysqli_stmt_execute($stmt)) {
            // Message updated successfully
            echo "Message edited.";
        } else {
            echo "Error executing the update query: " . mysqli_error($connection);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing the update statement: " . mysqli_error($connection);
    }
} else {
    echo "Invalid request.";
}

mysqli_close($connection);
?>
