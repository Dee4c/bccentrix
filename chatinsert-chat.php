<?php 
   include ('session.php');

   if (isset($_SESSION['id'])) {
       include_once "dbconn.php";
   
       $outgoing_id = $_SESSION['id'];
       $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
       $message = mysqli_real_escape_string($conn, $_POST['message']);
   
       // Check if a file is uploaded
       if (isset($_FILES['file_path']) && $_FILES['file_path']['error'] == UPLOAD_ERR_OK) {
           // Handle file upload
           $target_dir = "uploads/"; // Specify the directory for file uploads
           $target_file = $target_dir . basename($_FILES['file_path']['name']);
           move_uploaded_file($_FILES['file_path']['tmp_name'], $target_file);
   
           // You might want to store $target_file in the database or associate it with the message
           $file_path = mysqli_real_escape_string($conn, $target_file);
       } else {
           $file_path = ''; // If no file_path, set to an empty string
       }
   
       if (!empty($message)) {
           // Insert message with file_path path into the database
           $sql = "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg, file_path)
                   VALUES ({$incoming_id}, {$outgoing_id}, '{$message}', '{$file_path}')";
   
           $result = mysqli_query($conn, $sql);
   
           if ($result) {
               // Message inserted successfully
               echo "Message sent successfully.";
           } else {
               // Handle the error more gracefully
               echo "Error: " . mysqli_error($conn);
           }
       }
   } else {
       header("location: ../index.php");
   }
   

    
?>