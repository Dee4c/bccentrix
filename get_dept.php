<?php
// Include the database connection file to ensure $conn is defined
include('dbconn.php');

// Prepare and execute the SQL query
$query = "SELECT `department` FROM `user` WHERE `user_id` = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $user_id); // Use the user ID received from 'session.php'
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $department);
mysqli_stmt_fetch($stmt);

// Check if a department was found
if (!empty($department)) {
    // Set the department value in the session
    $_SESSION['department'] = $department;
} else {
    echo "User not found or department is empty.";
}

// Close the prepared statement
mysqli_stmt_close($stmt);
// No need to close the $conn connection here, as it's a shared connection.

?>
