<?php
// Include your database connection code (e.g., dbconn.php)
include("dbconn.php");

if (isset($_GET['post_id'])) {
    $post_id = $_GET['post_id'];

    // Query to fetch the reaction count for the specified post
    $sql = "SELECT COUNT(*) AS reaction_count FROM drygoods_reaction_logs WHERE drygoods_post_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $post_id);
    
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            $reaction_count = $row['reaction_count'];
            echo $reaction_count;
        } else {
            echo "0"; // If no reactions found, return 0
        }
    } else {
        echo "0"; // Handle database error
    }
} else {
    echo "0"; // Invalid request
}

// Close the database connection (if needed)
$conn->close();
?>
