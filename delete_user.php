<?php
session_start();
require("dbconn.php");

if (isset($_GET['user_id'])) {
    $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
    
    try {
        // Perform the deletion here
        $queryDeleteUser = "DELETE FROM `user` WHERE `user_id` = ?";
        $stmt = mysqli_prepare($conn, $queryDeleteUser);
        mysqli_stmt_bind_param($stmt, "i", $user_id);
        
        if (mysqli_stmt_execute($stmt)) {
            // Deletion successful, redirect to user management page
            header('Location: usermanagement.php');
            exit();
        } else {
            // Handle deletion error
            echo "Error: " . mysqli_error($conn);
        }
    } catch (\Throwable $th) {
        echo $th;
    }
} else {
    // Handle case where 'user_id' parameter is missing
    echo "User ID is missing.";
}
?>
