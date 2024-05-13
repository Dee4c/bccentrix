<?php
include("dbconn.php");
include("session.php");

if (isset($_POST['comment'])) {
    $comment_content = $_POST['comment_content'];
    $post_id = isset($_POST['post_id']) ? $_POST['post_id'] : null; // Correctly check if 'post_id' is set

    if ($post_id === null) {
        echo "Error: 'post_id' is not set or is empty.";
    } else {
        // Use prepared statement to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO laf_comment (content, date_posted, user_id, laf_post_id) VALUES (?, NOW(), ?, ?)");
        $stmt->bind_param("sii", $comment_content, $_SESSION['id'], $post_id);

        if ($stmt->execute()) {
            // Redirect to the announcement page
            header('location: laf_announcement.php');
            exit;
        } else {
            echo "Error inserting comment: " . $stmt->error;
        }
    }
}
?>
