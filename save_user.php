<?php
session_start();
require("dbconn.php");

if (
    isset($_POST['fname']) &&
    isset($_POST['lname']) &&
    isset($_POST['yr_section']) &&
    isset($_POST['username']) &&
    isset($_POST['password']) &&
    isset($_POST['unique_code'])
) {
    // Sanitize and validate input data
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $yr_section = mysqli_real_escape_string($conn, $_POST['yr_section']);
    // $department = mysqli_real_escape_string($conn, $_POST['department']); // remove this line
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $unique_code = mysqli_real_escape_string($conn, $_POST['unique_code']);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hash the password

    try {
        // Insert the new user into the database
        $query = "INSERT INTO `user` (`fname`,`lname`, `yr_section`, `username`, `password`, `unique_code`) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $query);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ssssss", $fname, $lname, $yr_section, $username, $hashed_password, $unique_code);
            if (mysqli_stmt_execute($stmt)) {
                // User successfully added to the database
                header('Location: get_all_user.php');
                exit();
            } else {
                // Error handling if the insertion fails
                echo "Error: " . mysqli_error($conn);
            }
            mysqli_stmt_close($stmt);
        } else {
            // Error handling if the prepared statement fails
            echo "Error: " . mysqli_error($conn);
        }
    } catch (\Throwable $th) {
        echo $th;
    }
}

// Handle the case when form data is not properly set or validation fails
header('Location: create.php');
exit();

?>
