<?php
include('dbconn.php'); // Include your database connection code here
session_start();

$username = $_POST['username'];
$password = $_POST['password'];
$unique_code = $_POST['unique_code'];

// Adjust the SQL query to match your 'user' table and fields
$query = mysqli_prepare($conn, "SELECT user_id, password, is_admin FROM user WHERE username = ? AND unique_code = ?");
mysqli_stmt_bind_param($query, "ss", $username, $unique_code);
mysqli_stmt_execute($query);

$result = mysqli_stmt_get_result($query);

if ($row = mysqli_fetch_assoc($result)) {
    // Verify the password
    if (password_verify($password, $row['password'])) {
        // Check if the retrieved user is an admin
        if ($row['is_admin'] == 1) {
            $_SESSION['admin_id'] = $row['user_id']; // Store admin session data as needed
            echo 'admin_success';
        } else {
            echo 'admin_denied'; // Not an admin, deny access
        }
    } else {
        echo 'false'; // Password is incorrect
    }
} else { 
    echo 'false'; // Admin login failed
}

mysqli_close($conn);
?>
