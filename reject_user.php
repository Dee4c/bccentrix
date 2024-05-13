<?php
require("dbconn.php");

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
    $query = "UPDATE `user` SET `approval_status` = 'rejected' WHERE `user_id` = $user_id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Rejection successful, redirect back to admin_approval.php
        header("Location: admin_approval.php");
        exit();
    } else {
        // Rejection failed, display an error message
        echo "Rejection failed. Please try again.";
    }
}
?>
