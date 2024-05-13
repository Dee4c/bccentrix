<?php
include "dbconn.php"; // Include the database connection file

$searchQuery = isset($_GET['query']) ? $_GET['query'] : '';

// SQL query to search for users based on the search query
$sql = "SELECT * FROM user WHERE fname LIKE '%$searchQuery%' OR yr_section LIKE '%$searchQuery%' OR username LIKE '%$searchQuery%'";

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Database query failed: " . mysqli_error($conn));
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>USER MANAGEMENT</title>
    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <!-- custom css -->
    <style>
        .m-r-1em { margin-right: 1em; }
        .m-b-1em { margin-bottom: 1em; }
        .m-l-1em { margin-left: 1em; }
        .mt0 { margin-top: 0; }
        .mb { margin-bottom: 100; }

        /* Add a container for the user management content */
        .user-management-container {
            padding-left: 100px;
        }

        /* Adjust the table width and add spacing */
        .user-table {
            max-width: 100%;
            margin-bottom: 20px; /* Add margin to create spacing around the table */
        }

        .search-container {
            margin-left: -10px;
            margin-bottom: 20px; /* Add margin to create spacing between search and content */
        }

        /* Style the search button */
        .search-container button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }

        /* Hover effect for the search button */
        .search-container button:hover {
            background-color: #0056b3;
        }

    </style>
</head>
<body>
    <!-- Wrap your user management content in a container ABOVE the existing content -->
    <div class="user-management-container">
        <div class="page-header">
        </div>
        <?php include 'get_all_user.php'; ?>
    </div>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <!-- Latest compiled and minified Bootstrap JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!-- confirm delete record will be here -->
    </div>

</body>
</html>
<script type='text/javascript'>
    // confirm record deletion
    function delete_user( id ){
        var answer = confirm('Are you sure?');
        if (answer){
            // if the user clicked OK,
            // pass the id to delete_user.php and execute the delete query
            window.location = 'delete_user.php?id=' + id;
        }
    }
    function update_user( id ){
        window.location = 'delete_user.php?id=' + id;
    }
</script>
