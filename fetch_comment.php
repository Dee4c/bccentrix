<?php
// Include your database connection code (e.g., dbconn.php)
include("dbconn.php");

// Function to fetch comment count for a specific post
function fetchCommentCount($conn, $post_id) {
    // Check if the database connection is open
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT COUNT(*) AS comment_count FROM comment WHERE post_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $post_id);

    // Check if the statement was prepared successfully
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            return $row['comment_count'];
        } else {
            return 0; // If no comments found, return 0
        }
    } else {
        return 0; // Handle database error
    }
}

// Close the statement
$stmt->close();

// Close the database connection (if needed)
$conn->close();
?>
