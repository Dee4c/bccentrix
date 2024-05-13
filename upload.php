<?php
include("dbconn.php");
include("session.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["mp4File"])) {
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["mp4File"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if the file is an MP4 file
    if ($fileType != "mp4") {
        echo "Sorry, only MP4 files are allowed.";
        $uploadOk = 0;
    }

    // Check if the file already exists
    if (file_exists($targetFile)) {
        echo "Sorry, the file already exists.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        // Move the file to the target directory
        if (move_uploaded_file($_FILES["mp4File"]["tmp_name"], $targetFile)) {
            echo "The file " . htmlspecialchars(basename($_FILES["mp4File"]["name"])) . " has been uploaded.";
            $profile_picture_url = $target_file;
            $insert_query = mysqli_prepare($conn, "INSERT INTO user_cover_photo (user_id, cover_photo) VALUES (?, ?)");
            mysqli_stmt_bind_param($insert_query, "is", $user_id, $profile_picture_url);
        
            if (mysqli_stmt_execute($insert_query)) {
                $success_message = "Profile picture set successfully. Redirecting to home in <span id='countdown'>5</span> seconds.";
        
                // Update the profile picture URL in the session as well
                $_SESSION['cover_photo'] = $profile_picture_url;
                
                // JavaScript code for countdown and redirection
                echo '<script>
                    // var countdown = 5;
                    // var timer = setInterval(function() {
                    //     countdown--;
                    //     document.getElementById("countdown").textContent = countdown;
                    //     if (countdown <= 0) {
                    //         clearInterval(timer);
                            window.location.href = "profile.php";
                    //     }
                    // }, 1000);
                </script>';
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    // // Check if the form is submitted
    // if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    //     // Check if a file is selected
    //     if (isset($_FILES["file"])) {
    //         $file = $_FILES["file"];
    
    //         // Check for errors during file upload
    //         if ($file["error"] > 0) {
    //             echo "Error: " . $file["error"];
    //         } else {
    //             // Move the uploaded file to a destination directory
    //             $uploadDir = "uploads/";
    //             $uploadPath = $uploadDir . basename($file["name"]);
    
    //             if (move_uploaded_file($file["tmp_name"], $uploadPath)) {
    //                 echo "File uploaded successfully!";
    //             } else {
    //                 echo "Error uploading file.";
    //             }
    //         }
    //     } else {
    //         echo "Please select a file.";
    //     }
    // }
   

}
?>



