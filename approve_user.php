<?php
require("dbconn.php");

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
    $query = "UPDATE `user` SET `approval_status` = 'accepted' WHERE `user_id` = $user_id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Approval successful, redirect back to admin_approval.php
        header("Location: admin_approval.php");
        exit();
    } else {
        // Approval failed, display an error message
        echo "Approval failed. Please try again.";
    }
}
?>
