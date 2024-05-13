<?php
include("dbconn.php");
include("session.php");

if (isset($_POST['post'])) {
    $post_content = $_POST['post_content'];
    $target_file = null;

    // Check if post content is not empty
    if (!empty($post_content)) {
        // Check if an image file was uploaded
        if (isset($_FILES['post_image']) && $_FILES['post_image']['error'] === 0) {
            $file_name = $_FILES['post_image']['name'];
            $file_tmp = $_FILES['post_image']['tmp_name'];
            
            // Move the uploaded image to a specific folder
            $upload_dir = 'uploads/'; // Create this folder if it doesn't exist
            $target_file = $upload_dir . $file_name;

            if (move_uploaded_file($file_tmp, $target_file)) {
                // Image uploaded successfully
            } else {
                echo "Error uploading image.";
            }
        }

        // Insert the post into the database, including the optional image and 'approved' column
        $stmt = $conn->prepare("INSERT INTO foods_post (content, image, date_created, user_id, approved) VALUES (?, ?, NOW(), ?, 0)");
        $stmt->bind_param("ssi", $post_content, $target_file, $user_id);

        if ($stmt->execute()) {
            // Display a JavaScript alert after successful post
            echo '<script>';
            echo 'alert("Wait for the Admin to approve your post.");';
            echo 'window.location.href = "foods_announcement.php";';
            echo '</script>';
            exit;
        } else {
            echo "Error inserting post.";
        }

        // Close the prepared statement
        $stmt->close();
    } else {
        echo "Post content cannot be empty.";
    }
}

// Close the database connection in post.php
mysqli_close($conn);
?>