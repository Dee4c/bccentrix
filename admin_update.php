<?php
include ("dbconn.php");
include("adminsession.php"); 

$user_id = $_SESSION['admin_id'];

// Retrieve data from the form
$newFname = $_POST['new_fname'];
$newLname = $_POST['new_lname'];
$newUsername = $_POST['new_username'];
// $newPassword = $_POST['new_password'];
$dob = $_POST['dob'];
$contact_number = $_POST['contact_number'];
$bio = $_POST['bio'];
$location = $_POST['location'];
$gender= $_POST['gender'];




// Update the database  
$sql = "UPDATE user SET fname = '$newFname', lname ='$newLname', username ='$newUsername', dob ='$dob', contact_number ='$contact_number',
        bio ='$bio',location ='$location',gender ='$gender'
        WHERE user_id = $user_id";
        

if ($conn->query($sql) === TRUE) {
    echo '<script> window.location.href = "admin_profile.php"; </script>';
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();

 ?>

 


