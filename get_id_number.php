<?php
// get_id_number.php

// Include the database connection file to ensure $conn is defined
include('dbconn.php');

$queryIdNumber = "SELECT `Id_Number` FROM `user` WHERE `user_id` = ?";
$stmtIdNumber = mysqli_prepare($conn, $queryIdNumber);
mysqli_stmt_bind_param($stmtIdNumber, 'i', $user_id);
mysqli_stmt_execute($stmtIdNumber);
mysqli_stmt_bind_result($stmtIdNumber, $Id_Number);

if (mysqli_stmt_fetch($stmtIdNumber)) {
    // Set the retrieved Id_Number in the session
    $_SESSION['Id_Number'] = $Id_Number;
}

// Close the prepared statement
mysqli_stmt_close($stmtIdNumber);
?>
