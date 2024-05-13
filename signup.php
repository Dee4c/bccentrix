<?php 
include('dbconn.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Id_Number = isset($_POST['Id_Number']) ? $_POST['Id_Number'] : '';
    $fname = isset($_POST['fname']) ? $_POST['fname'] : '';
    $lname = isset($_POST['lname']) ? $_POST['lname'] : '';
    $year = isset($_POST['year']) ? $_POST['year'] : '';
    $yr_section = isset($_POST['yr_section']) ? $_POST['yr_section'] : '';
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $unique_code = isset($_POST['unique_code']) ? $_POST['unique_code'] : '';
    $department = isset($_POST['department']) ? $_POST['department'] : '';

    // Sanitize input data to prevent SQL injection
    $Id_Number = mysqli_real_escape_string($conn, $Id_Number);
    $fname = mysqli_real_escape_string($conn, $fname);
    $lname = mysqli_real_escape_string($conn, $lname);
    $year = mysqli_real_escape_string($conn, $year);
    $yr_section = mysqli_real_escape_string($conn, $yr_section);
    $username = mysqli_real_escape_string($conn, $username);
    $department = mysqli_real_escape_string($conn, $department);

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if username is already taken
    $checkUsernameQuery = "SELECT * FROM user WHERE username = '$username'";
    $resultUsername = mysqli_query($conn, $checkUsernameQuery);

    // Check if Id_Number is already taken
    $checkIdQuery = "SELECT * FROM user WHERE Id_Number = '$Id_Number'";
    $resultId = mysqli_query($conn, $checkIdQuery);

    if (mysqli_num_rows($resultUsername) > 0) {
        // Username is already registered
        echo "<script>alert('Sign up failed! The username is already taken. Please try a different one.');</script>";
        echo "<script>window.location.href = 'register_user.php';</script>";
    } elseif (mysqli_num_rows($resultId) > 0) {
        // Id_Number is already registered
        echo "<script>alert('Sign up failed! The ID Number is already registered.');</script>";
        echo "<script>window.location.href = 'register_user.php';</script>";
    } else {
        // Insert new record into the database with the hashed password
        $insertQuery = "INSERT INTO user (Id_Number, fname, lname, year, yr_section, department, username, password, unique_code) VALUES ('$Id_Number', '$fname', '$lname', '$year', '$yr_section', '$department', '$username', '$hashed_password', '$unique_code')";
        mysqli_query($conn, $insertQuery);

        echo "<script>alert('Successfully Signed Up! Wait for the Admins approval of your account');</script>";
        echo "<script>window.location.href = 'index.php';</script>";
    }
}
?>
