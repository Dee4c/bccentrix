<?php
// Include the database connection file to ensure $conn is defined
include('dbconn.php');

// Additional code to retrieve and display first name and last name
$queryName = "SELECT `fname`, `lname` FROM `user` WHERE `user_id` = ?";
$stmtName = mysqli_prepare($conn, $queryName);
mysqli_stmt_bind_param($stmtName, "i", $user_id);
mysqli_stmt_execute($stmtName);
mysqli_stmt_bind_result($stmtName, $fname, $lname);
mysqli_stmt_fetch($stmtName);

// Initialize a variable to store the full name
$full_name = '';

// Check if user was found and display the full name
if (!empty($fname) && !empty($lname)) {
    $full_name = $fname . ' ' . $lname;
} else {
    echo "User not found or first name and last name are empty.";
}

// Close the prepared statement for name retrieval
mysqli_stmt_close($stmtName);
?>
