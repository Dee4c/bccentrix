<?php
include("dbconn.php");
include("adminsession.php");

if (isset($_POST['edit_comment'])) {
    $comment_id = $_POST['comment_id'];
    $edited_comment_content = $_POST['edited_comment_content'];

    // Check if the user trying to edit the comment is the owner
    $stmt = $conn->prepare("SELECT user_id FROM gen_comment WHERE gen_comment_id = ?");
    $stmt->bind_param("i", $comment_id);
    $stmt->execute();
    $stmt->bind_result($comment_user_id);
    $stmt->fetch();
    $stmt->close();

    if ($comment_user_id != $_SESSION['admin_id']) {
        echo "You do not have permission to edit this comment.";
        exit;
    }

    // Use prepared statement to update the comment
    $stmt = $conn->prepare("UPDATE gen_comment SET content = ? WHERE gen_comment_id = ?");
    $stmt->bind_param("si", $edited_comment_content, $comment_id);

    if ($stmt->execute()) {
        // Redirect back to the announcement page after editing the comment
        header('location: admin_gen_announcement.php');
        exit;
    } else {
        echo "Error updating comment: " . $stmt->error;
    }
} elseif (isset($_GET['comment_id'])) {
    $comment_id = $_GET['comment_id'];

    // Retrieve the comment content
    $sql = "SELECT content FROM gen_comment WHERE gen_comment_id = $comment_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $comment_content = $row['content'];
    } else {
        echo "Comment not found.";
        exit;
    }
} else {
    echo "Invalid request.";
    exit;
}
?>
