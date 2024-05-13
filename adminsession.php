<?php
session_start();
// Check if a user is logged in
if (!isset($_SESSION['admin_id'])) {
    header('location: admin.php'); 
}

// Include your database connection
include('dbconn.php');

// Get the user's ID from the session
$user_id = $_SESSION['admin_id'];

include('get_dept.php');

include('get_name.php');

include('get_yr_section.php');

include ('get_id_number.php');

include ('get_year.php');

// if (isset($_SESSION['admin_id'])) {
//     $user_id = $_SESSION['admin_id'];
//    $query = "UPDATE user SET last_activity = NOW() WHERE user_id = $user_id";
//    mysqli_query($conn, $query);
// }

$query = "UPDATE user SET is_active = 'Active now' WHERE user_id = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, 'i', $user_id);
mysqli_stmt_execute($stmt);

if (mysqli_stmt_fetch($stmt)) {
    echo 'true';
}

// Close the prepared statement
mysqli_stmt_close($stmt);


$admin_username = '';

$query = "SELECT username FROM user WHERE user_id = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, 'i', $user_id);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $admin_username);

if (mysqli_stmt_fetch($stmt)) {
    // Set the retrieved profile picture URL in the session
    $_SESSION['admin_username'] = $admin_username;
}

// Close the prepared statement
mysqli_stmt_close($stmt);


$profile_picture = '';


$query = "SELECT image_path FROM user WHERE user_id = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, 'i', $user_id);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $profile_picture);

if (mysqli_stmt_fetch($stmt)) {
    // Set the retrieved profile picture URL in the session
    $_SESSION['profile_picture'] = $profile_picture;
}

// Close the prepared statement
mysqli_stmt_close($stmt);


$query = "SELECT cover_photo FROM user  WHERE user_id = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, 'i', $user_id);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $cover_photo);

if (mysqli_stmt_fetch($stmt)) {
    // Set the retrieved profile picture URL in the session
    $_SESSION['cover_photo'] = $cover_photo;
}

// Close the prepared statement
mysqli_stmt_close($stmt);

$fname = '';

$query = "SELECT fname FROM user WHERE user_id = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, 'i', $user_id);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $fname);

if (mysqli_stmt_fetch($stmt)) {
    // Set the retrieved profile picture URL in the session
    $_SESSION['fname'] = $fname;
}

// Close the prepared statement
mysqli_stmt_close($stmt);

$lname = '';

$query = "SELECT lname FROM user WHERE user_id = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, 'i', $user_id);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $lname);

if (mysqli_stmt_fetch($stmt)) {
    // Set the retrieved profile picture URL in the session
    $_SESSION['lname'] = $lname;
}

// Close the prepared statement
mysqli_stmt_close($stmt);

$dob = '';

$query = "SELECT dob FROM user WHERE user_id = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, 'i', $user_id);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $dob);

if (mysqli_stmt_fetch($stmt)) {
    // Set the retrieved profile picture URL in the session
    $_SESSION['dob'] = $dob;
}

// Close the prepared statement
mysqli_stmt_close($stmt);

$gender = '';

$query = "SELECT gender FROM user WHERE user_id = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, 'i', $user_id);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $gender);

if (mysqli_stmt_fetch($stmt)) {
    // Set the retrieved profile picture URL in the session
    $_SESSION['gender'] = $gender;
}

// Close the prepared statement
mysqli_stmt_close($stmt);

$bio = '';

$query = "SELECT bio FROM user WHERE user_id = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, 'i', $user_id);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $bio);

if (mysqli_stmt_fetch($stmt)) {
    // Set the retrieved profile picture URL in the session
    $_SESSION['bio'] = $bio;
}

// Close the prepared statement
mysqli_stmt_close($stmt);

$location = '';

$query = "SELECT location FROM user WHERE user_id = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, 'i', $user_id);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $location);

if (mysqli_stmt_fetch($stmt)) {
    // Set the retrieved profile picture URL in the session
    $_SESSION['location'] = $location;
}

// Close the prepared statement
mysqli_stmt_close($stmt);

$contact_number = '';

$query = "SELECT contact_number FROM user WHERE user_id = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, 'i', $user_id);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $contact_number);

if (mysqli_stmt_fetch($stmt)) {
    // Set the retrieved profile picture URL in the session
    $_SESSION['contact_number'] = $contact_number;
}

// Close the prepared statement
mysqli_stmt_close($stmt);

?>
