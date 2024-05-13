<?php
// Include session.php to start or resume the session and access user data
include 'session.php';

// Connect to your MySQL database
$connection = mysqli_connect("localhost", "root", "", "prac");

if ($connection === false) {
    die("Error: Could not connect to the database. " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['groupId']) && isset($_POST['userId']) && isset($_POST['message'])) {
    $groupId = $_POST['groupId'];
    $userId = $_POST['userId'];
    $message = $_POST['message'];
    $timestamp = date('Y-m-d H:i:s');

    // Retrieve the user's name from the session
    $userName = $_SESSION['user_name'];

    // Insert the message into the database
    $insertQuery = "INSERT INTO group_chat_messages (group_id, user_id, user_name, message, timestamp) VALUES (?, ?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($connection, $insertQuery)) {
        mysqli_stmt_bind_param($stmt, "iisss", $groupId, $userId, $userName, $message, $timestamp);
        if (mysqli_stmt_execute($stmt)) {
            // Message inserted successfully
            echo "Message sent.";
        } else {
            echo "Error executing the insert query: " . mysqli_error($connection);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing the insert statement: " . mysqli_error($connection);
    }
} else {
    echo "Invalid request.";
}

mysqli_close($connection);
?>
