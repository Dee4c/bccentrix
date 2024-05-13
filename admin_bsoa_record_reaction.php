<?php
// Include your database connection code (e.g., dbconn.php)
include("dbconn.php");
include("adminsession.php");

// Check if the request is a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the post ID and reaction type from the POST data
    $post_id = $_POST["post_id"];
    $reaction_type = $_POST["reaction_type"];

    // Check if the user is logged in (you should implement this logic)
    // For example, you can use your existing session.php code
    // Make sure to replace 'user_id' with the actual session variable name
    if (isset($_SESSION['admin_id'])) {
        // User is logged in, proceed

        $user_id = $_SESSION['admin_id'];

        // Check if the user has already reacted to this post
        $check_sql = "SELECT COUNT(*) FROM bsoa_reaction_logs WHERE bsoa_post_id = ? AND user_id = ?";
        $check_stmt = $conn->prepare($check_sql);
        $check_stmt->bind_param("ii", $post_id, $user_id);
        $check_stmt->execute();
        $check_stmt->bind_result($existing_reactions);
        $check_stmt->fetch();
        $check_stmt->close();

        if ($existing_reactions > 0) {
            // User has already reacted, so delete their previous reaction
            $delete_sql = "DELETE FROM bsoa_reaction_logs WHERE bsoa_post_id = ? AND user_id = ?";
            $delete_stmt = $conn->prepare($delete_sql);
            $delete_stmt->bind_param("ii", $post_id, $user_id);

            if ($delete_stmt->execute()) {
                // Reaction removed successfully (unreacted)
                echo "Unreacted successfully.";
            } else {
                // Error removing the reaction
                echo "Error unreacting: " . $delete_stmt->error;
            }

            $delete_stmt->close();
        } else {
            // User hasn't reacted yet, insert their new reaction
            $insert_sql = "INSERT INTO bsoa_reaction_logs (bsoa_post_id, user_id, reaction_type) VALUES (?, ?, ?)";
            $insert_stmt = $conn->prepare($insert_sql);
            $insert_stmt->bind_param("iis", $post_id, $user_id, $reaction_type);

            if ($insert_stmt->execute()) {
                // Reaction recorded successfully
                echo "Reaction recorded successfully.";
            } else {
                // Error recording the reaction
                echo "Error recording reaction: " . $insert_stmt->error;
            }

            $insert_stmt->close();
        }
    } else {
        // User is not logged in, handle this case as needed
        echo "User is not logged in.";
    }
} else {
    // Invalid request method
    echo "Invalid request method.";
}

// Close the database connection (if needed)
$conn->close();
?>
