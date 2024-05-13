<?php
session_start();
include("dbconn.php");

if (isset($_SESSION['id'])) {
    $user_id = $_SESSION['id'];

    // Set last activity to a past date to mark the user as offline
    $query = "UPDATE user SET is_active= 'Offline now' WHERE user_id = $user_id";
    mysqli_query($conn, $query);

    // Remove the session
    // session_destroy();
}
?>
