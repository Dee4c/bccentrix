<?php
include("dbconn.php");
include("adminsession.php");

if (isset($_POST['edited_post_id'])) {
    $post_id = $_POST['edited_post_id'];
    $new_content = $_POST['edited_post_content']; // Updated here

    // Update the post content in the database
    $update_post_sql = "UPDATE gen_post SET content = '$new_content' WHERE gen_post_id = $post_id";

    if ($conn->query($update_post_sql)) {
        // Redirect back to the announcement page or any desired location
        header('location: admin_gen_announcement.php');
        exit;
    } else {
        echo "Error updating post: " . $conn->error;
    }
} else {
    echo "Post ID not provided.";
}
?>