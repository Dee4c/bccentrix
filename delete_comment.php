<?php
include("dbconn.php");
include("session.php");

if (isset($_GET['comment_id'])) {
    $comment_id = $_GET['comment_id'];

    // Check if the user has permission to delete this comment
    $stmt = $conn->prepare("SELECT user_id FROM comment WHERE comment_id = ?");
    $stmt->bind_param("i", $comment_id);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($comment_user_id);
        $stmt->fetch();

        // Debugging: Check the session ID and comment owner's ID
        echo "Session ID: " . $_SESSION['id'] . "<br>";
        echo "Comment Owner's ID: " . $comment_user_id . "<br>";

        if ($_SESSION['id'] == $comment_user_id) { // Use == for loose comparison
            // User has permission to delete the comment
            echo "User has permission to delete this comment."; // Debugging output
            $delete_stmt = $conn->prepare("DELETE FROM comment WHERE comment_id = ?");
            $delete_stmt->bind_param("i", $comment_id);

            if ($delete_stmt->execute()) {
                // Comment deleted successfully, redirect back to the announcement page
                header('location: announcement.php');
                exit;
            } else {
                echo "Error deleting comment: " . $delete_stmt->error;
            }
        } else {
            echo "You do not have permission to delete this comment.";
        }
    } else {
        echo "Comment not found.";
    }

    $stmt->close();
} else {
    echo "Invalid request.";
}

?>
