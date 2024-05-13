<?php
include("dbconn.php");
include("session.php");

if (isset($_GET['post_id'])) {
    $post_id = $_GET['post_id'];
    
    // Check if the logged-in user is the author of the post
    $check_author_sql = "SELECT user_id FROM bsa_post WHERE bsa_post_id = $post_id";
    $check_author_result = $conn->query($check_author_sql);

    if ($check_author_result->num_rows > 0) {
        $post = $check_author_result->fetch_assoc();

        if ($post['user_id'] == $_SESSION['id']) {
            // User is the author, so delete the post
            // $delete_reaction_logs_sql = "DELETE FROM reaction_logs WHERE post_id = $post_id";
            // if ($conn->query($delete_reaction_logs_sql)) {
            // // Now that related rows are deleted, delete the post
            $delete_post_sql = "DELETE FROM bsa_post WHERE bsa_post_id = $post_id";
            if ($conn->query($delete_post_sql)) {
                // Redirect back to the announcement page or any desired location
                header('location: bsa_announcement.php');
                exit;
            } else {
                echo "Error deleting post: " . $conn->error;
            }
        } else {
            echo "You do not have permission to delete this post.";
        }
    } else {
        echo "Post not found.";
    }
} else {
    echo "Post ID not provided.";
}
?>
