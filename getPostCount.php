<?php
// Create a database connection (replace with your actual database credentials)
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'prac';

$connection = mysqli_connect($host, $username, $password, $database);

// Check if the connection was successful
if (!$connection) {
    die('Database connection failed: ' . mysqli_connect_error());
}

// Retrieve all posts and organize them by month
$result = $connection->query("SELECT DATE_FORMAT(date_created, '%Y-%m') as month, COUNT(*) as count FROM post GROUP BY month");

$data = array();

while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

$connection->close();

echo json_encode($data);
?>
