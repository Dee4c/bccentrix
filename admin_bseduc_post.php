<?php
include("dbconn.php");
include("adminsession.php");

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

        // Insert the post into the database, including the optional image
        $stmt = $conn->prepare("INSERT INTO bseduc_post (content, image, date_created, user_id) VALUES (?, ?, NOW(), ?)");
        $stmt->bind_param("ssi", $post_content, $target_file, $user_id);

        if ($stmt->execute()) {
            // Redirect to the announcement page
            header('location: admin_bseduc_announcement.php');
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
