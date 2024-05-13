<?php
session_start();
include('dbconn.php'); // Include your database connection

if (!isset($_SESSION['id'])) {
    header('location:index.php');
    exit();
}

$user_id = $_SESSION['id'];

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
            $coverPhoto = $target_file;
            $insert_query = mysqli_prepare($conn, "UPDATE user SET cover_photo = '$coverPhoto' WHERE user_id = $user_id");

            if (mysqli_stmt_execute($insert_query)) {
                $_SESSION['cover_photo'] = $coverPhoto;
                echo '<script>  window.location.href = "profile.php"; </script>';
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
    <style>
        .pp_container{
            width: 100%; /* Make the textarea full-width */
            height: 100%; /* Adjust the height as needed */
            resize: vertical; /* Allow vertical resizing */
            /* border: 2px solid #ccc; Add a border style and color */
            border-radius: 10px; /* Adjust border radius for rounded corners */
            padding: 10px; /* Add padding inside the textarea */
            font-family: 'Arial', sans-serif
            
        }

        .submit{
            margin-left:77%;
            width: 50px;
            height: 30px;
            background-color: #13737b;
            font-size: 11px;
            font-weight: bold;
            text-align: center:
            cursor: pointer;
            border: 2px solid #13737b;
            color: white;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s
        }
        .submit:hover {
        background-color: #536d6e;
        color: #fff;
        border: 2px solid #536d6e;
        }

        .cancel{
            width: 50px;
            height: 30px;
            background-color: grey;
            font-size: 11px;
            margin-left: 5px;
            text-align: center:
            cursor: pointer;
            border: 2px solid grey;
            color: white;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s
        }

        .cancel:hover {
        background-color: #536d6e;
        color: #fff;
        border: 2px solid #536d6e;
        }

        @media(max-width:600px){
             .submit{
                margin-left:65%;
             }
             .pp_container h1{
                font-size: 25px;
            }
        }
    </style>
</head>
<body>
<div class="pp_container">
    <div>
    <h1>Upload Cover Photo</h1>
    
    <?php
    if (!empty($success_message)) {
        echo '<p>' . $success_message . '</p>';
    }
    ?>
    </div>
    <hr>
    
    <!-- Create a form for uploading profile pictures -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <input type="file" name="profile_picture" id="profile_picture" accept=".png, .jpg, .jpeg" required>
        <input class="submit" type="submit" name="submit" value="Upload">
        <input class="cancel" type="button" value="Cancel" data-dismiss="modal">
    </form>
    </div>
          
    
    <!-- Add any additional content or styling you need for this page -->
</body>
</html>
</div>
       
