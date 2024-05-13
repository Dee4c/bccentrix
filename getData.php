<?php
// Include your database connection configuration here (e.g., db_config.php)
// Example:
// include('db_config.php');

// Create a database connection (replace with your actual database credentials)
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'prac';

$connection = mysqli_connect($host, $username, $password, $database);

// Check if the connection was successful
if (!$connection) {
    die('Database connection failed: ' . mysqli_connect_error());
}

// Get the number of active users (assuming an 'is_active' column in the 'user' table)
$activeUserQuery = "SELECT COUNT(*) as activeUserCount FROM user WHERE approval_status = 'accepted'";
$activeUserResult = mysqli_query($connection, $activeUserQuery);

if (!$activeUserResult) {
    // Handle the query error here
    die('Error in the database query: ' . mysqli_error($connection));
}

if (mysqli_num_rows($activeUserResult) > 0) {
    $activeUserRow = mysqli_fetch_assoc($activeUserResult);
    $numberOfActiveUsers = $activeUserRow['activeUserCount'];
} else {
    $numberOfActiveUsers = 0;
}

// Get the number of non-active users
$nonActiveUserQuery = "SELECT COUNT(*) as nonActiveUserCount FROM user WHERE approval_status = 'deactivated'";
$nonActiveUserResult = mysqli_query($connection, $nonActiveUserQuery);

if (!$nonActiveUserResult) {
    // Handle the query error here
    die('Error in the database query: ' . mysqli_error($connection));
}

if (mysqli_num_rows($nonActiveUserResult) > 0) {
    $nonActiveUserRow = mysqli_fetch_assoc($nonActiveUserResult);
    $numberOfNonActiveUsers = $nonActiveUserRow['nonActiveUserCount'];
} else {
    $numberOfNonActiveUsers = 0;
}

// Get the number of accounts created in the current month
$currentMonth = date('Y-m'); // Get the current year and month in 'YYYY-MM' format
$newUserQuery = "SELECT COUNT(*) as newUserCount FROM user WHERE DATE_FORMAT(date_created, '%Y-%m') = '$currentMonth'";
$newUserResult = mysqli_query($connection, $newUserQuery);

if (!$newUserResult) {
    // Handle the query error here
    die('Error in the database query: ' . mysqli_error($connection));
}

if (mysqli_num_rows($newUserResult) > 0) {
    $newUserRow = mysqli_fetch_assoc($newUserResult);
    $numberOfNewUsers = $newUserRow['newUserCount'];
} else {
    $numberOfNewUsers = 0;
}


// Get the number of users
$userCountQuery = "SELECT COUNT(*) as userCount FROM user";
$userCountResult = mysqli_query($connection, $userCountQuery);

if (!$userCountResult) {
    // Handle the query error here
    die('Error in the user count query: ' . mysqli_error($connection));
}

if (mysqli_num_rows($userCountResult) > 0) {
    $userCountRow = mysqli_fetch_assoc($userCountResult);
    $numberOfUsers = $userCountRow['userCount'];
} else {
    $numberOfUsers = 0;
}

// Get the number of posts
$postCountQuery = "SELECT COUNT(*) as postCount FROM  post";
$postCountResult = mysqli_query($connection, $postCountQuery);

if (!$postCountResult) {
    // Handle the query error here
    die('Error in the post count query: ' . mysqli_error($connection));
}

if (mysqli_num_rows($postCountResult) > 0) {
    $postCountRow = mysqli_fetch_assoc($postCountResult);
    $numberOfPosts = $postCountRow['postCount'];
} else {
    $numberOfPosts = 0;
}

// Get the number of academic awardees
$academicAwardeesQuery = "SELECT COUNT(*) as academicAwardeesCount FROM academic_awardees";
$academicAwardeesResult = mysqli_query($connection, $academicAwardeesQuery);

if (!$academicAwardeesResult) {
    // Handle the query error here
    die('Error in the academic awardees count query: ' . mysqli_error($connection));
}

if (mysqli_num_rows($academicAwardeesResult) > 0) {
    $academicAwardeesRow = mysqli_fetch_assoc($academicAwardeesResult);
    $numberOfAcademicAwardees = $academicAwardeesRow['academicAwardeesCount'];
} else {
    $numberOfAcademicAwardees = 0;
}

// Get the number of accepted owner forms
$acceptedOwnerQuery = "SELECT COUNT(*) as acceptedOwnerCount FROM owner_information WHERE approval_status = 'Accepted'";
$acceptedOwnerResult = mysqli_query($connection, $acceptedOwnerQuery);

if (!$acceptedOwnerResult) {
    // Handle the query error here
    die('Error in the owner form query: ' . mysqli_error($connection));
}

if (mysqli_num_rows($acceptedOwnerResult) > 0) {
    $acceptedOwnerRow = mysqli_fetch_assoc($acceptedOwnerResult);
    $numberOfAcceptedOwnerForms = $acceptedOwnerRow['acceptedOwnerCount'];
} else {
    $numberOfAcceptedOwnerForms = 0;
}

// Get the number of accepted founder forms
$acceptedFounderQuery = "SELECT COUNT(*) as acceptedFounderCount FROM founder_information WHERE approval_status = 'Accepted'";
$acceptedFounderResult = mysqli_query($connection, $acceptedFounderQuery);

if (!$acceptedFounderResult) {
    // Handle the query error here
    die('Error in the founder form query: ' . mysqli_error($connection));
}

if (mysqli_num_rows($acceptedFounderResult) > 0) {
    $acceptedFounderRow = mysqli_fetch_assoc($acceptedFounderResult);
    $numberOfAcceptedFounderForms = $acceptedFounderRow['acceptedFounderCount'];
} else {
    $numberOfAcceptedFounderForms = 0;
}

// Retrieve department data
$departmentQuery = "SELECT department, COUNT(*) as departmentCount FROM user GROUP BY department";
$departmentResult = mysqli_query($connection, $departmentQuery);

$departmentCounts = [];
while ($row = mysqli_fetch_assoc($departmentResult)) {
    $departmentCounts[$row['department']] = $row['departmentCount'];
}


// Return all counts and department data as JSON
echo json_encode([
    'numberOfActiveUsers' => $numberOfActiveUsers,
    'numberOfNonActiveUsers' => $numberOfNonActiveUsers,
    'numberOfNewUsers' => $numberOfNewUsers,
    'numberOfUsers' => $numberOfUsers,
    'numberOfPosts' => $numberOfPosts,
    'numberOfAcademicAwardees' => $numberOfAcademicAwardees,
    'numberOfAcceptedOwnerForms' => $numberOfAcceptedOwnerForms,
    'numberOfAcceptedFounderForms' => $numberOfAcceptedFounderForms,
    'departmentCounts' => $departmentCounts, // Include department data
]);

// Close the database connection when done
mysqli_close($connection);
?>
