<?php

include("dbconn.php");
include("session.php");

$user_id = $_SESSION['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $group_name = $_POST["group_name"];
    $group_code = $_POST["group_code"];
    $id_number = $_POST["id_number"];
    $name = $_POST["name"];
    $department = $_POST["department"];
    $year = $_POST["year"];
    $year_section = $_POST["year_section"];

    // Make sure $db_host, $db_user, $db_pass, and $db_name are defined in dbconn.php
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Insert the group data
    $sql = "INSERT INTO groups (group_name, group_code, id_number, name, department, year, year_section, owner_id) VALUES ('$group_name', '$group_code', '$id_number', '$name', '$department', '$year', '$year_section', '$user_id')";

    if (mysqli_query($conn, $sql)) {
        // Retrieve the group ID
        $groupId = mysqli_insert_id($conn);

        // Insert the creator as a member of the group
        $insertMemberSql = "INSERT INTO group_members (group_id, name) VALUES ('$groupId', '$name')";
        mysqli_query($conn, $insertMemberSql);

        // Redirect to joined_group.php with a success message
        echo '<script>';
        echo 'alert("You have successfully created a group.");';
        echo 'window.location.replace("joined_group.php?id=' . $groupId . '&user=' . urlencode($name) . '");';
        echo '</script>';
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
