<?php
require("dbconn.php");

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
    $query = "UPDATE `user` SET `approval_status` = 'deactivated' WHERE `user_id` = $user_id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Rejection successful, redirect back to admin_approval.php
        header("Location: get_all_user.php");
        exit();
    } else {
        // Rejection failed, display an error message
        echo "Deactivation failed. Please try again.";
    }
}
?>
  