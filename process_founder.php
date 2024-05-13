<?php
include "dbconn.php"; // Include the file with database credentials
session_start();

function getCurrentUserId() {
    // Check if the user is logged in, and retrieve the user's ID from the session.
    if (isset($_SESSION['id'])) {
        return $_SESSION['id'];
    }
    return 0;  // Customize this for handling unauthenticated users.
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = getCurrentUserId();

    // Check if the user has exceeded the submission limit for the day (founder forms)
    $today = date("Y-m-d");
    $founder_sql = "SELECT submission_count FROM founder_submissions WHERE user_id = ? AND submission_date = ?";
    
    $conn = mysqli_connect($host, $username, $password, $database);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $stmt = mysqli_prepare($conn, $founder_sql);
    mysqli_stmt_bind_param($stmt, "ss", $user_id, $today);
    mysqli_stmt_execute($stmt);
    $result_founder = mysqli_stmt_get_result($stmt);

    if ($result_founder) {
        $row_founder = mysqli_fetch_assoc($result_founder);
        $submission_count_founder = $row_founder ? $row_founder['submission_count'] : 0;
        $max_founder_submissions_per_day = 2; // Set your desired limit for founder forms here

        if ($submission_count_founder >= $max_founder_submissions_per_day) {
            echo '<script>alert("You have reached the maximum submission limit for founder forms today. Please try again tomorrow.");window.history.back();</script>';
            exit;
        }
    } else {
        echo "Error: " . $founder_sql . "<br>" . mysqli_error($conn);
    }

    $id_number = $_POST["id_number"];
    $name = $_POST["name"];
    $department = $_POST["department"];
    $year = $_POST["year"];
    $mobile = $_POST["mobile"];
    $found_date = $_POST["found_date"];
    $found_item = $_POST["found_item"];

    if (strlen($mobile) !== 11) {
        echo '<script>alert("Mobile number must be exactly 11 digits.");window.history.back();</script>';
        exit;
    }

    $founder_form_sql = "INSERT INTO founder_information (Id_Number, name, department, year, mobile, found_date, found_item, approval_status)
        VALUES (?, ?, ?, ?, ?, ?, ?, 'Pending')";

    $stmt = mysqli_prepare($conn, $founder_form_sql);
    mysqli_stmt_bind_param($stmt, "sssssss", $id_number, $name, $department, $year, $mobile, $found_date, $found_item);
    
    if (mysqli_stmt_execute($stmt)) {
        if ($submission_count_founder == 0) {
            $insert_founder_sql = "INSERT INTO founder_submissions (user_id, submission_date, submission_count) VALUES (?, ?, 1)";
        } else {
            $update_founder_sql = "UPDATE founder_submissions SET submission_count = submission_count + 1 WHERE user_id = ? AND submission_date = ?";
        }

        if ($submission_count_founder == 0) {
            $stmt = mysqli_prepare($conn, $insert_founder_sql);
        } else {
            $stmt = mysqli_prepare($conn, $update_founder_sql);
        }
        mysqli_stmt_bind_param($stmt, "ss", $user_id, $today);
        mysqli_stmt_execute($stmt);

        mysqli_close($conn);

        echo '<script>alert("Founder Form submitted. Please wait for a response.");window.history.back();</script>';
    } else {
        echo "Error: " . $founder_form_sql . "<br>" . mysqli_error($conn);
    }
}
?>
