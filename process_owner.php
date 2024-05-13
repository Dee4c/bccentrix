<?php
include "dbconn.php"; // Include the file with database credentials
session_start();
// Function to get the current user identifier (you may use session, IP, or other means)
function getCurrentUserId() {
    // Use the user ID stored in the session after the user logs in.
    // For example, if you set the user ID in a session variable like $_SESSION['user_id'] during login, retrieve it here.
    if (isset($_SESSION['id'])) {
        return $_SESSION['id'];
    }
    // If the user is not logged in, return a default or guest user ID.
    return 0;  // You can change this to a default value.
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the user identifier
    $user_id = getCurrentUserId();

    // Check if the user has exceeded the submission limit for the day (owner forms)
    $today = date("Y-m-d");
    $owner_sql = "SELECT submission_count FROM owner_submissions WHERE user_id = ? AND submission_date = ?";
    $conn = mysqli_connect($host, $username, $password, $database);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Use prepared statements to prevent SQL injection
    $stmt = mysqli_prepare($conn, $owner_sql);
    mysqli_stmt_bind_param($stmt, "ss", $user_id, $today);
    mysqli_stmt_execute($stmt);
    $result_owner = mysqli_stmt_get_result($stmt);

    if ($result_owner) {
        $row_owner = mysqli_fetch_assoc($result_owner);
        $submission_count_owner = $row_owner ? $row_owner['submission_count'] : 0;
        $max_owner_submissions_per_day = 2; // Set your desired limit for owner forms here

        if ($submission_count_owner >= $max_owner_submissions_per_day) {
            echo '<script>alert("You have reached the maximum submission limit for owner forms today. Please try again tomorrow.");window.history.back();</script>';
            exit;
        }

        // If the user hasn't reached the limit for owner forms, proceed to submit the form
    } else {
        echo "Error: " . $owner_sql . "<br>" . mysqli_error($conn);
    }

   // Insert data into the database with 'Pending' status for owner forms
$id_number = $_POST["id_number"];
$name = $_POST["name"];
$department = $_POST["department"];
$year = $_POST["year"];
$mobile = $_POST["mobile"];
$lost_date = $_POST["lost_date"];
$lost_item = $_POST["lost_item"];

// Ensure mobile number is limited to a specific length (e.g., 10 digits)
if (strlen($mobile) !== 11) {
    echo '<script>alert("Mobile number must be exactly 11 digits.");window.history.back();</script>';
    exit;
}

$owner_form_sql = "INSERT INTO owner_information (Id_Number, name, department, year, mobile, lost_date, lost_item, approval_status)
    VALUES (?, ?, ?, ?, ?, ?, ?, 'Pending')";

// Use prepared statements to prevent SQL injection
$stmt = mysqli_prepare($conn, $owner_form_sql);
mysqli_stmt_bind_param($stmt, "sssssss", $id_number, $name, $department, $year, $mobile, $lost_date, $lost_item);

if (mysqli_stmt_execute($stmt)) {
    // Update or insert user's submission count for owner forms for the day
    $today = date("Y-m-d");

    // Check if the user already has a record for the current date
    $existing_record_sql = "SELECT user_id FROM owner_submissions WHERE user_id = ? AND submission_date = ?";
    $stmt = mysqli_prepare($conn, $existing_record_sql);
    mysqli_stmt_bind_param($stmt, "ss", $user_id, $today);
    mysqli_stmt_execute($stmt);
    $result_existing = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result_existing) > 0) {
        // User already has a record for the current date, so update it
        $update_owner_sql = "UPDATE owner_submissions SET submission_count = submission_count + 1 WHERE user_id = ? AND submission_date = ?";
        $stmt = mysqli_prepare($conn, $update_owner_sql);
        mysqli_stmt_bind_param($stmt, "ss", $user_id, $today);
        mysqli_stmt_execute($stmt);
    } else {
        // User doesn't have a record for the current date, so insert a new record
        $insert_owner_sql = "INSERT INTO owner_submissions (user_id, submission_date, submission_count) VALUES (?, ?, 1)";
        $stmt = mysqli_prepare($conn, $insert_owner_sql);
        mysqli_stmt_bind_param($stmt, "ss", $user_id, $today);
        mysqli_stmt_execute($stmt);
    }

    mysqli_close($conn);

    // Display a JavaScript alert message
    echo '<script>alert("Owner Form submitted. Please wait for a response.");window.history.back();</script>';
} else {
    echo "Error: " . $owner_form_sql . "<br>" . mysqli_error($conn);
}
}
?>