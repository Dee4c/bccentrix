<?php
session_start();
include('dbconn.php'); // Include your database connection

if (!isset($_SESSION['admin_id'])) {
    header('location:admin.php');
    exit();
}

$user_id = $_SESSION['admin_id'];

$success_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['profile_picture'])) {
    // Handle profile picture upload here
    $target_dir = "profile_pictures/"; // Directory where profile pictures will be stored
    $target_file = $target_dir . basename($_FILES["profile_picture"]["name"]);
    $uploadOk = 1;
    
    // Allow only specific file formats (PNG, JPG, JPEG)
    $allowed_formats = array("png", "jpg", "jpeg");
    $file_extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    if (!in_array($file_extension, $allowed_formats)) {
        $success_message = "Sorry, only PNG, JPG, and JPEG files are allowed.";
        $uploadOk = 0;
    }
    
    if ($uploadOk == 0) {
        $success_message = "Sorry, your file was not uploaded.";
    } else {
        // Upload the file if the format is allowed
        if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file)) {
            // Save the URL to the user's profile picture in the 'user_profile_pictures' table
            $image_path = $target_file;
            $insert_query = mysqli_prepare($conn, "UPDATE user SET image_path = '$image_path' WHERE user_id = $user_id");

            if (mysqli_stmt_execute($insert_query)) {
                $success_message = "Profile picture set successfully. Redirecting to home in <span id='countdown'>5</span> seconds.";

                // Update the profile picture URL in the session as well
                $_SESSION['profile_picture'] = $image_path;

                
                // JavaScript code for countdown and redirection
                echo '<script>
                    // var countdown = 5;
                    // var timer = setInterval(function() {
                    //     countdown--;
                    //     document.getElementById("countdown").textContent = countdown;
                    //     if (countdown <= 0) {
                    //         clearInterval(timer);
                            window.location.href = "admin_profile.php";
                    //     }
                    // }, 1000);
                </script>';
            } else {
                $success_message = "Error updating the profile picture in the database.";
            }
        } else {
            $success_message = "Sorry, there was an error uploading your file.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Profile Picture</title>
    <!-- Add your CSS stylesheets and other dependencies here -->
</head>
<body>
    <h1>Upload Profile Picture</h1>
    
    <?php
    if (!empty($success_message)) {
        echo '<p>' . $success_message . '</p>';
    }
    ?>
    
    <!-- Create a form for uploading profile pictures -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <input type="file" name="profile_picture" id="profile_picture" accept=".png, .jpg, .jpeg" required>
        <input type="submit" name="submit" value="Upload">
    </form>
    
    <!-- Add any additional content or styling you need for this page -->
</body>
</html>
