<?php
include('dbconn.php');
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
// $unique_code = $_POST['unique_code'];

// Check if the username is "Admin" (case-insensitive) and deny access
if (strcasecmp($username, 'admin') === 0) {
    echo 'admin_denied'; // You can define this message to handle it appropriately in your JavaScript
} else {
    $query = mysqli_query($conn, "SELECT * FROM user WHERE username='$username'") or die(mysqli_error());
    $row = mysqli_fetch_array($query);

    if ($row && password_verify($password, $row['password'])) {
        if ($row['approval_status'] === 'accepted') {
            $_SESSION['id'] = $row['user_id'];
            $_SESSION['login_session'] = $username; // Set the username in the session
            echo 'true';
            
        } elseif ($row['approval_status'] === 'pending') {
            echo 'pending_approval'; // User's account is pending approval
        } elseif ($row['approval_status'] === 'rejected') {
            echo 'rejected'; // User's account has been rejected
        }elseif ($row['approval_status'] === 'deactivated') {
            echo 'deactivated'; // User's account has been rejected
        }else {

            echo 'false'; // Invalid credentials or unique code
        } 
    } else {
        echo 'false'; // Invalid credentials
    }
}
?>
