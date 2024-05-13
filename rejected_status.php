<?php
include('dbconn.php'); // Include the database connection file

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    if (isset($_GET['section']) && $_GET['section'] === 'owner') {
        // Query to update the approval status for the owner section
        $query = "UPDATE `owner_information` SET `approval_status` = 'Rejected' WHERE `id` = $id";
    } elseif (isset($_GET['section']) && $_GET['section'] === 'founder') {
        // Query to update the approval status for the founder section
        $query = "UPDATE `founder_information` SET `approval_status` = 'Rejected' WHERE `id` = $id";
    } else {
        echo "Invalid section parameter.";
        exit();
    }

    if (mysqli_query($conn, $query)) {
        // Display a success message with an alert
        echo '<script>
                alert("Rejection status updated successfully.");
                window.location.href = "rejected_forms.php";
              </script>';
        exit();
    } else {
        echo "Error updating rejection status: " . mysqli_error($conn);
    }
} else {
    echo "Invalid submission ID.";
}
?>
