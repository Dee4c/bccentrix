<?php
// Connect to your MySQL database
include("session.php");
$userId = $_SESSION['id'];
$userName = $_SESSION['user_name'];
$connection = mysqli_connect("localhost", "root", "", "prac");

if ($connection === false) {
    die("Error: Could not connect to the database. " . mysqli_connect_error());
}

if (isset($_GET['group_id'])) {
    $groupId = $_GET['group_id'];

    // Update the SQL query to retrieve user_name along with other data
    $selectQuery = "SELECT message_id, user_name, message, user_id FROM group_chat_messages WHERE group_id = ?";

    if ($stmt = mysqli_prepare($connection, $selectQuery)) {
        mysqli_stmt_bind_param($stmt, "i", $groupId);

        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            $messages = [];

            while ($row = mysqli_fetch_assoc($result)) {
                // Check if user_name is set, provide a default value if not
                $userName = isset($row['user_name']) ? $row['user_name'] : 'Unknown';

                $messages[] = [
                    "message_id" => $row['message_id'], // Include message_id
                    "user_name" => $userName,
                    "message" => $row['message'],
                    "sentByMe" => ($row['user_id'] == $userId),
                ];
            }

            // Log the messages before sending them as JSON (for debugging)
            error_log(print_r($messages, true));

            echo json_encode($messages);
        } else {
            echo "Error executing the select query: " . mysqli_error($connection);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing the select statement: " . mysqli_error($connection);
    }
} else {
    echo "Group ID not provided.";
}

mysqli_close($connection);
?>
