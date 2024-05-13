<?php
require("dbconn.php"); // Make sure to include your database connection script here

if (isset($_POST['confirm_delete'])) {
    try {
        // Define the DELETE query to delete all academic awardees
        $deleteQuery = "DELETE FROM `academic_awardees`";

        // Execute the DELETE query
        $result = mysqli_query($conn, $deleteQuery);

        if ($result) {
            echo "All academic awardees have been deleted successfully.";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    // Display a confirmation message and form
    echo "Are you sure you want to delete all academic awardees?<br>";
    echo "<form method='POST'><button type='submit' name='confirm_delete'>Confirm Delete</button></form>";
}
?>
