<?php
include('dbconn.php'); // Include the database connection file

if (isset($_GET['id']) && is_numeric($_GET['id']) && isset($_GET['section'])) {
    $id = $_GET['id'];
    $section = $_GET['section'];

    if ($section === 'owner') {
        // Query to update the approval status for the owner section
        $query = "UPDATE `owner_information` SET `approval_status` = 'Accepted' WHERE `id` = $id";
        $redirectPage = "admin_owner_approval.php";
    } elseif ($section === 'founder') {
        // Query to update the approval status for the founder section
        $query = "UPDATE `founder_information` SET `approval_status` = 'Accepted' WHERE `id` = $id";
        $redirectPage = "admin_founder_approval.php";
    } else {
        echo "Invalid section parameter.";
        exit();
    }

    if (mysqli_query($conn, $query)) {
        // Display a success message with an alert and redirect to the appropriate page
        echo '<script>
                alert("Approval status updated successfully.");
                window.location.href = "'.$redirectPage.'";
              </script>';
        exit();
    } else {
        echo "Error updating approval status: " . mysqli_error($conn);
    }
} else {
    echo "Invalid submission ID or section.";
}
?>
