<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if a file is selected
    if (isset($_FILES["attachment"])) {
        $file_name = $_FILES["attachment"]["name"];
        $file_temp = $_FILES["attachment"]["tmp_name"];

        // Move the file to a desired location
        $upload_dir = "uploads/"; // You need to create this directory
        $target_path = $upload_dir . $file_name;

        if (move_uploaded_file($file_temp, $target_path)) {
            // File uploaded successfully, now you can save information in the database
            // Example: Insert into a hypothetical 'messages' table
            $message = "INSERT INTO messages (file_path) VALUES ('Message text', '$target_path')";
            // Execute the query (you should use prepared statements to prevent SQL injection)
            // $db->query($message);
            
            echo "File uploaded successfully.";
        } else {
            echo "Error uploading file.";
        }
    }
}
?>
    