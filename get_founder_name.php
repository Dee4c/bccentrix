<?php
include "dbconn.php"; // Include the file with database credentials

function getFounderName($lostItem) {
    // Create a connection using the credentials from dbconn.php
    $conn = mysqli_connect($host, $username, $password, $database);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Sanitize the input to prevent SQL injection
    $sanitizedLostItem = mysqli_real_escape_string($conn, $lostItem);

    // Break the lost item description into words
    $words = explode(' ', $sanitizedLostItem);
    
    // Build a pattern to match any word in the lost item description
    $pattern = implode('|', $words);

    // Query to retrieve the founder's name for similar items
    $query = "SELECT name FROM founder_information WHERE found_item REGEXP '$pattern'";
    $result = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        return $row['name'];
    } else {
        return "Not Found"; // Display a message when no match is found
    }

    // Close the database connection
    mysqli_close($conn);
}

?>
