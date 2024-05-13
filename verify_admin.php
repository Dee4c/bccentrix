<?php
include('dbconn.php');
session_start();

$username = $_POST['username'];
$password = $_POST['password'];
$unique_code = $_POST['unique_code'];

$query = mysqli_prepare($conn, "SELECT user_id, password, is_admin FROM user WHERE username = ? AND unique_code = ?");
mysqli_stmt_bind_param($query, "ss", $username, $unique_code);
mysqli_stmt_execute($query);

$result = mysqli_stmt_get_result($query);

if ($row = mysqli_fetch_assoc($result)) {
    if (password_verify($password, $row['password'])) {
        if ($row['is_admin'] == 1) {
            $_SESSION['admin_id'] = $row['user_id'];
            echo 'admin_success';
        } else {
            echo 'admin_denied';
        }
    } else {
        echo 'false';
    }
} else { 
    echo 'false';
}

mysqli_close($conn);
?>
