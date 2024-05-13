<?php
include('dbconn.php'); // Include the database connection file
include("dashboard.php");

// Define the number of records to display per page
$recordsPerPage = 10; // You can change this to your desired number

// Get the current page number from the URL
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $currentPage = $_GET['page'];
} else {
    $currentPage = 1; // Default to the first page
}

// Calculate the offset for the SQL query
$offset = ($currentPage - 1) * $recordsPerPage;

// Query the database for pending signups with pagination
$query = "SELECT * FROM `user` WHERE `approval_status` = 'deactivated' LIMIT $offset, $recordsPerPage";
$result = mysqli_query($conn, $query);

// Query to count the total number of pending signups
$countQuery = "SELECT COUNT(*) as total FROM `user` WHERE `approval_status` = 'deactivated'";
$countResult = mysqli_query($conn, $countQuery);
$row = mysqli_fetch_assoc($countResult);
$totalRecords = $row['total'];

// Calculate the total number of pages
$totalPages = ceil($totalRecords / $recordsPerPage);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Approval</title>
    
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        body {
            background:linear-gradient(to left, #D1DFB7, #B9D9CF, #85CDFF);
        }
        
        .container {
            position: fixed;
            justify-content: center;
            align-items: center;
            height: 100%;
            margin-top: 100px;
            width: 65%;
            margin-left:160px;
        }
        .text{
            text-align:center;
            margin-left: 300px; 
            font-size: 40px;
        }

        .table{
            margin-top: 40px;
        }
        .table tr{
            padding: 10px;
            background-color: #fff;
            color: black;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>

    
</head>
<body>

<div class="container">
<div class="text">Deactivated Accounts</div>
<button class="btn btn-primary " onclick="location.href='get_all_user.php'" style="  position: absolute; width:170px; left: 880px;">Back to Active Users</button>
   
<div class="container mt-4">
    <!-- Add a table to display pending signups using Bootstrap -->
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th></th>
                <th>ID Number</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Year</th>
                <th>Section</th>
                <th>Department</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $row['user_id']; ?></td>
                    <td><?php echo $row['Id_Number']; ?></td>
                    <td><?php echo $row['fname']; ?></td>
                    <td><?php echo $row['lname']; ?></td>
                    <td><?php echo $row['year']; ?></td>
                    <td><?php echo $row['yr_section']; ?></td>
                    <td><?php echo $row['department']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td>
                    <a href="useractivation.php?user_id=<?php echo $row['user_id']; ?>" onclick="changeColor(this)" style="background-color: green; color: white"class="btn  btn-sm ">Activate</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    
    <!-- Pagination links -->
    <ul class="pagination">
        <?php for ($page = 1; $page <= $totalPages; $page++): ?>
            <li class="page-item <?php echo $page == $currentPage ? 'active' : ''; ?>">
                <a class="page-link" href="?page=<?php echo $page; ?>"><?php echo $page; ?></a>
            </li>
        <?php endfor; ?>
    </ul>
</div>

    <!-- Include Bootstrap JS and jQuery for Bootstrap components -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>

     function changeColor(a) {
        // Get the closest row to the clicked button
        var row = a.closest('tr');

        // Toggle the background color
        if (row.style.backgroundColor === '' || row.style.backgroundColor === 'white') {
            row.style.backgroundColor = '#1FD655';
        } else {
            row.style.backgroundColor = 'white';
        }
    }
        </script>
</body>
</html>
