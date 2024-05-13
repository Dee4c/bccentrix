<?php
// Include the database connection file to ensure $conn is defined
include('dbconn.php');

// Prepare and execute the SQL query to retrieve the year section
$query = "SELECT `year` FROM `user` WHERE `user_id` = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $year);
mysqli_stmt_fetch($stmt);

// Check if a year section was found
if (!empty($year)) {
    // Set the year section value in the session
    $_SESSION['year'] = $year;
} else {
    echo "User not found or year is empty.";
}

// Close the prepared statement
mysqli_stmt_close($stmt);
// No need to close the $conn connection here, as it's a shared connection.
?>