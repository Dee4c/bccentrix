<?php

session_start();

// Check if a user is logged in
if (!isset($_SESSION['id'])) {
    header('location: index.php');
}

// Include your database connection
include('dbconn.php');

// Get the user's ID from the session
$user_id = $_SESSION['id'];

// Include the 'get_dept.php' script and pass the user ID
include('get_dept.php');

include('get_name.php');

include('get_yr_section.php');

include ('get_id_number.php');

include ('get_year.php');


// if (isset($_SESSION['id'])) {
//     $user_id = $_SESSION['id'];
//     $query = "UPDATE user SET last_activity = NOW() WHERE user_id = $user_id";
//     mysqli_query($conn, $query);
// }

$query = "UPDATE user SET is_active = 'Active now' WHERE user_id = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, 'i', $user_id);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt); // Close and reset

if ($stmt = mysqli_prepare($conn, "SELECT image_path FROM user WHERE user_id = ?")) {
    mysqli_stmt_bind_param($stmt, 'i', $user_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $profile_picture);
    if (mysqli_stmt_fetch($stmt)) {
        $_SESSION['profile_picture'] = $profile_picture;
    }
    mysqli_stmt_close($stmt); // Close and reset
}

// Set the user's full name in the session
$_SESSION['user_name'] = $full_name;

if ($stmt = mysqli_prepare($conn, "SELECT cover_photo FROM user WHERE user_id = ?")) {
    mysqli_stmt_bind_param($stmt, 'i', $user_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $cover_photo);
    if (mysqli_stmt_fetch($stmt)) {
        $_SESSION['cover_photo'] = $cover_photo;
    }
    mysqli_stmt_close($stmt); // Close and reset
}

if ($stmt = mysqli_prepare($conn, "SELECT fname FROM user WHERE user_id = ?")) {
    mysqli_stmt_bind_param($stmt, 'i', $user_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $fname);
    if (mysqli_stmt_fetch($stmt)) {
        $_SESSION['fname'] = $fname;
    }
    mysqli_stmt_close($stmt); // Close and reset
}

if ($stmt = mysqli_prepare($conn, "SELECT lname FROM user WHERE user_id = ?")) {
    mysqli_stmt_bind_param($stmt, 'i', $user_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $lname);
    if (mysqli_stmt_fetch($stmt)) {
        $_SESSION['lname'] = $lname;
    }
    mysqli_stmt_close($stmt); // Close and reset
}

if ($stmt = mysqli_prepare($conn, "SELECT dob FROM user WHERE user_id = ?")) {
    mysqli_stmt_bind_param($stmt, 'i', $user_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $dob);
    if (mysqli_stmt_fetch($stmt)) {
        $_SESSION['dob'] = $dob;
    }
    mysqli_stmt_close($stmt); // Close and reset
}

if ($stmt = mysqli_prepare($conn, "SELECT gender FROM user WHERE user_id = ?")) {
    mysqli_stmt_bind_param($stmt, 'i', $user_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $gender);
    if (mysqli_stmt_fetch($stmt)) {
        $_SESSION['gender'] = $gender;
    }
    mysqli_stmt_close($stmt); // Close and reset
}

if ($stmt = mysqli_prepare($conn, "SELECT bio FROM user WHERE user_id = ?")) {
    mysqli_stmt_bind_param($stmt, 'i', $user_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $bio);
    if (mysqli_stmt_fetch($stmt)) {
        $_SESSION['bio'] = $bio;
    }
    mysqli_stmt_close($stmt); // Close and reset
}

if ($stmt = mysqli_prepare($conn, "SELECT location FROM user WHERE user_id = ?")) {
    mysqli_stmt_bind_param($stmt, 'i', $user_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $location);
    if (mysqli_stmt_fetch($stmt)) {
        $_SESSION['location'] = $location;
    }
    mysqli_stmt_close($stmt); // Close and reset
}

if ($stmt = mysqli_prepare($conn, "SELECT contact_number FROM user WHERE user_id = ?")) {
    mysqli_stmt_bind_param($stmt, 'i', $user_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $contact_number);
    if (mysqli_stmt_fetch($stmt)) {
        $_SESSION['contact_number'] = $contact_number;
    }
    mysqli_stmt_close($stmt); // Close and reset
}

// Do not close the database connection here
?>
