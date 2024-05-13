<?php
include("dbconn.php");
include("adminsession.php");

if (isset($_POST['comment'])) {
    $comment_content = $_POST['comment_content'];
    $post_id = isset($_POST['post_id']) ? $_POST['post_id'] : null; // Correctly check if 'post_id' is set

    if ($post_id === null) {
        echo "Error: 'post_id' is not set or is empty.";
    } else {
        // Use prepared statement to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO bscrim_comment (content, date_posted, user_id, bscrim_post_id) VALUES (?, NOW(), ?, ?)");
        $stmt->bind_param("sii", $comment_content, $_SESSION['admin_id'], $post_id);

        if ($stmt->execute()) {
            // Redirect to the announcement page
            header('location: admin_bscrim_announcement.php');
            exit;
        } else {
            echo "Error inserting comment: " . $stmt->error;
        }
    }
}
?>
