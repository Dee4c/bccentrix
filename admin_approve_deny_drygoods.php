<?php
include("dbconn.php");
include("dashboard.php");

// Number of records per page
$recordsPerPage = 5;

// Determine the current page
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;

// Calculate the offset for the SQL query
$offset = ($page - 1) * $recordsPerPage;

// Fetch only posts with 'approved' value of 0 with pagination
$query = "SELECT * FROM `drygoods_post` WHERE `approved` = 0 LIMIT $offset, $recordsPerPage";
$result = mysqli_query($conn, $query);

// Check if the form is submitted for post approval/denial
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['approve'])) {
        // Handle post approval logic
        $postId = $_POST['post_id'];

        // Update the 'approved' column in the database
        $updateQuery = "UPDATE `drygoods_post` SET `approved` = 1 WHERE `drygoods_post_id` = $postId";
        $resultUpdate = mysqli_query($conn, $updateQuery);

        // Redirect to avoid form resubmission
        // header("Location: ".$_SERVER['PHP_SELF']."?page=".$page);
        // exit();
    } elseif (isset($_POST['deny'])) {
        // Handle post denial logic
        $postId = $_POST['post_id'];

        // Delete the post from the database
        $deleteQuery = "DELETE FROM `drygoods_post` WHERE `drygoods_post_id` = $postId";
        $resultDelete = mysqli_query($conn, $deleteQuery);

        // Redirect to avoid form resubmission
        // header("Location: ".$_SERVER['PHP_SELF']."?page=".$page);
        // exit();
    }
}
?>

<!-- <!DOCTYPE html> -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drygoods Posts</title>

    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
         .container {
            margin-top: 120px;
            background-color: #f7f7f7;
            padding: 20px;
            margin-left: 350px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .btn-container {
            margin-top: 10px;
        }

        .btn-group {
            display: flex;
        }

        .btn {
            margin-right: 5px;
        }

        .no-posts {
            margin-top: 20px;
        }

        .modal-body img {
            max-width: 100%;
            height: auto;
        }

        /* Add style for the button in the top-left corner */
        .top-left-btn {
            position: absolute;
            top: 0;
            left: 0;
            margin: 10px;
        }

        .pagination {
            margin-top: 20px;
        }

        .pagination a {
            display: inline-block;
            padding: 8px 16px;
            text-decoration: none;
            color: #007bff;
            border: 1px solid #ddd;
            margin-right: 8px;
        }
    </style>
</head>

<body>

<div class="container">
    
    <h2>Drygoods Posts</h2>

    <?php
    // Fetch only posts with 'approved' value of 0 with pagination
    $query = "SELECT * FROM `drygoods_post` WHERE `approved` = 0 LIMIT $offset, $recordsPerPage";
    $result = mysqli_query($conn, $query);

    // Check if there are any posts
    if (mysqli_num_rows($result) > 0) {
        echo '<table class="table">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Drygoods Post ID</th>';
        echo '<th>User ID</th>';
        echo '<th>Content</th>';
        echo '<th>Date Created</th>';
        echo '<th>Image</th>';
        echo '<th>Action</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['drygoods_post_id'] . '</td>';
            echo '<td>' . $row['user_id'] . '</td>';
            echo '<td>' . $row['content'] . '</td>';
            echo '<td>' . $row['date_created'] . '</td>';
            echo '<td>' . $row['image'] . '</td>';
            echo '<td class="btn-container">';
            echo '<div class="btn-group">';
            echo '<form method="post" action="">';
            echo '<input type="hidden" name="post_id" value="' . $row['drygoods_post_id'] . '">';
            echo '<button type="submit" name="approve" class="btn btn-success">Approve</button>';
            echo '<button type="submit" name="deny" class="btn btn-danger">Deny</button>';
            echo '</form>';
            echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#imageModal' . $row['drygoods_post_id'] . '">View Image</button>';
            echo '</div>';
            echo '</td>';
            echo '</tr>';

            // Modal for each post
            echo '<div class="modal fade" id="imageModal' . $row['drygoods_post_id'] . '" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">';
            echo '<div class="modal-dialog" role="document">';
            echo '<div class="modal-content">';
            echo '<div class="modal-header">';
            echo '<h5 class="modal-title" id="imageModalLabel">View Image</h5>';
            echo '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
            echo '<span aria-hidden="true">&times;</span>';
            echo '</button>';
            echo '</div>';
            echo '<div class="modal-body">';
            echo '<img src="' . $row['image'] . '" alt="Post Image">';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }

        echo '</tbody>';
        echo '</table>';

        // Pagination links
        $totalRecordsQuery = "SELECT COUNT(*) as total FROM `drygoods_post` WHERE `approved` = 0";
        $totalRecordsResult = mysqli_query($conn, $totalRecordsQuery);
        $totalRecords = mysqli_fetch_assoc($totalRecordsResult)['total'];
        $totalPages = ceil($totalRecords / $recordsPerPage);

        echo '<div class="pagination">';
        for ($i = 1; $i <= $totalPages; $i++) {
            echo '<a href="?page=' . $i . '">' . $i . '</a>';
        }
        echo '</div>';
    } else {
        echo '<p class="no-posts">No posts found.</p>';
    }
    // Close the database connection
    mysqli_close($conn);
    ?>
</div>

<!-- Include Bootstrap JS and jQuery for Bootstrap components -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
