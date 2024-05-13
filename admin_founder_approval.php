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

// Query the database for pending founder signups with pagination
$queryFounder = "SELECT * FROM `founder_information` WHERE `approval_status` = 'pending' LIMIT $offset, $recordsPerPage";
$resultFounder = mysqli_query($conn, $queryFounder);

// Query to count the total number of pending founder signups
$countQueryFounder = "SELECT COUNT(*) as total FROM `founder_information` WHERE `approval_status` = 'pending'";
$countResultFounder = mysqli_query($conn, $countQueryFounder);
$rowFounder = mysqli_fetch_assoc($countResultFounder);
$totalRecordsFounder = $rowFounder['total'];

// Calculate the total number of pages for founder
$totalPagesFounder = ceil($totalRecordsFounder / $recordsPerPage);
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
        
        .container-founder {
            margin-top: 30px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-left: 230px;
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
    <div class="container-founder">
        <!-- Add a table to display pending founder signups using Bootstrap -->
        <h3>Founder Information</h3>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Form ID</th>
                    <th>ID Number</th>
                    <th>Name</th>
                    <th>Course</th>
                    <th>Year & Section</th>
                    <th>Mobile Number</th>
                    <th>Date Item Found</th>
                    <th>Item Found</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($resultFounder)): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['Id_Number']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['department']; ?></td>
                        <td><?php echo $row['year']; ?></td>
                        <td><?php echo $row['mobile']; ?></td>
                        <td><?php echo isset($row['found_date']) ? $row['found_date'] : ''; ?></td>
                        <td><?php echo isset($row['found_item']) ? $row['found_item'] : ''; ?></td>
                        <td><?php echo $row['approval_status']; ?></td>
                        <td><?php echo $row['created_at']; ?></td>
                        <td>
                        <a href="approval_status.php?id=<?php echo $row['id']; ?>&section=founder" class="btn btn-success btn-action">Approve</a>
                        <a href="rejected_status.php?id=<?php echo $row['id']; ?>&section=founder" class="btn btn-danger btn-action">Reject</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

         <!-- Pagination links for founder -->
         <ul class="pagination">
            <?php for ($page = 1; $page <= $totalPagesFounder; $page++): ?>
                <li class="page-item <?php echo $page == $currentPage ? 'active' : ''; ?>">
                    <a class="page-link" href="?page=<?php echo $page; ?>&section=founder"><?php echo $page; ?></a>
                </li>
            <?php endfor; ?>
        </ul>

        <?php
        // Display a message if no pending forms for founder are found
        if (mysqli_num_rows($resultFounder) === 0) {
            echo "No pending founder forms found.";
        }
        ?>
    </div>
</div>

<!-- Include Bootstrap JS and jQuery for Bootstrap components -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
