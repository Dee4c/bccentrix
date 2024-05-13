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

// Calculate the offset for the SQL queries
$offset = ($currentPage - 1) * $recordsPerPage;

// Query the database for pending owner signups with pagination
$queryOwner = "SELECT * FROM `owner_information` WHERE `approval_status` = 'pending' LIMIT $offset, $recordsPerPage";
$resultOwner = mysqli_query($conn, $queryOwner);

// Query to count the total number of pending owner signups
$countQueryOwner = "SELECT COUNT(*) as total FROM `owner_information` WHERE `approval_status` = 'pending'";
$countResultOwner = mysqli_query($conn, $countQueryOwner);
$rowOwner = mysqli_fetch_assoc($countResultOwner);
$totalRecordsOwner = $rowOwner['total'];

// Calculate the total number of pages for owner
$totalPagesOwner = ceil($totalRecordsOwner / $recordsPerPage);
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
            background-color: #f7f7f7; /* Add your desired background color here */
        }
        
        .container-owner {
            margin-top: 30px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-left: 250px;
        }

        .text {
            text-align: center;
            margin-left: 300px; 
            font-size: 40px;
        }

        /* Adjust the width of table columns */
        th {
            width: 10%;
            text-align: center;
        }

        td {
            max-width: 20%; /* Adjust as needed */
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .pagination {
            margin-right: 1225px;
        }

    </style>
    
</head>
<body>

<div class="container">
    <div class="text">Admin Approval</div>
    
    <div class="container-owner">
        <!-- Add a table to display pending owner signups using Bootstrap -->
        <h3>Owner Information</h3>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Form ID</th>
                    <th>ID Number</th>
                    <th>Name</th>
                    <th>Course</th>
                    <th>Year & Section</th>
                    <th>Mobile Number</th>
                    <th>Date Item Lost</th>
                    <th>Item Lost</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($resultOwner)): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['Id_Number']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['department']; ?></td>
                        <td><?php echo $row['year']; ?></td>
                        <td><?php echo $row['mobile']; ?></td>
                        <td><?php echo $row['lost_date']; ?></td>
                        <td><?php echo $row['lost_item']; ?></td>
                        <td><?php echo $row['approval_status']; ?></td>
                        <td><?php echo $row['created_at']; ?></td>
                        <td>
                        <a href="approval_status.php?id=<?php echo $row['id']; ?>&section=owner" class="btn btn-success btn-action">Approve</a>
                        <a href="rejected_status.php?id=<?php echo $row['id']; ?>&section=owner" class="btn btn-danger btn-action">Reject</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <!-- Pagination links for owner -->
        <ul class="pagination">
            <?php for ($page = 1; $page <= $totalPagesOwner; $page++): ?>
                <li class="page-item <?php echo $page == $currentPage ? 'active' : ''; ?>">
                    <a class="page-link" href="?page=<?php echo $page; ?>&section=owner"><?php echo $page; ?></a>
                </li>
            <?php endfor; ?>
        </ul>

        <?php
        // Display a message if no pending forms for owner are found
        if (mysqli_num_rows($resultOwner) === 0) {
            echo "No pending owner forms found.";
        }
        ?>
    </div>

<!-- Include Bootstrap JS and jQuery for Bootstrap components -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
