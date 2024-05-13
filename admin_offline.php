<?php
session_start();
include("dbconn.php");

if (isset($_SESSION['admin_id'])) {
    $user_id = $_SESSION['admin_id'];

    // Set last activity to a past date to mark the user as offline
    // $query = "UPDATE user SET last_activity = '2000-01-01 00:00:00' WHERE user_id = $user_id";
    // mysqli_query($conn, $query);
    $query = "UPDATE user SET is_active= 'Offline now' WHERE user_id = $user_id";
    mysqli_query($conn, $query);

    // Remove the session
    // session_destroy();
}
?>
