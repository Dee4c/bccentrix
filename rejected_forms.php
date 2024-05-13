<?php
include('dbconn.php'); // Include the database connection file
include('dashboard.php');

// Define the number of records to display per page
$recordsPerPage = 5; // You can change this to your desired number

// Get the current page number from the URL
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $currentPage = $_GET['page'];
} else {
    $currentPage = 1; // Default to the first page
}

// Get the filter type from the URL (default to 'all')
$filterType = isset($_GET['filter']) ? $_GET['filter'] : 'all';

// Calculate the offset for the SQL queries
$offset = ($currentPage - 1) * $recordsPerPage;

// Build the SQL query based on the selected filter
if ($filterType === 'owner') {
    $query = "SELECT * FROM `owner_information` WHERE `approval_status` = 'Rejected' LIMIT $offset, $recordsPerPage";
} elseif ($filterType === 'founder') {
    $query = "SELECT * FROM `founder_information` WHERE `approval_status` = 'Rejected' LIMIT $offset, $recordsPerPage";
} else {
    // Default to showing all rejected forms
    $query = "(SELECT * FROM `owner_information` WHERE `approval_status` = 'Rejected') 
              UNION 
              (SELECT * FROM `founder_information` WHERE `approval_status` = 'Rejected') 
              LIMIT $offset, $recordsPerPage";
}

$result = mysqli_query($conn, $query);

// Query to count the total number of rejected forms
if ($filterType === 'owner') {
    $countQuery = "SELECT COUNT(*) as total FROM `owner_information` WHERE `approval_status` = 'Rejected'";
} elseif ($filterType === 'founder') {
    $countQuery = "SELECT COUNT(*) as total FROM `founder_information` WHERE `approval_status` = 'Rejected'";
} else {
    // Count all rejected forms
    $countQuery = "(SELECT COUNT(*) as total FROM `owner_information` WHERE `approval_status` = 'Rejected') 
                   UNION 
                   (SELECT COUNT(*) as total FROM `founder_information` WHERE `approval_status` = 'Rejected')";
}

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
    <title>Rejected Forms</title>

    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        body {
            background-color: #f7f7f7; /* Add your desired background color here */
        }

        .container-rejected {
            margin-top: 100px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-left: 180px;
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
    </style>
</head>
<body>
<div class="container">

    <div class="container-rejected">
        <!-- Add filter buttons for owner and founder forms -->
        <div class="mb-3">
            <a href="?filter=all" class="btn btn-primary <?php echo $filterType === 'all' ? 'active' : ''; ?>">Show All</a>
            <a href="?filter=owner" class="btn btn-info <?php echo $filterType === 'owner' ? 'active' : ''; ?>">Show Owner Forms</a>
            <a href="?filter=founder" class="btn btn-warning <?php echo $filterType === 'founder' ? 'active' : ''; ?>">Show Founder Forms</a>
        </div>

        <!-- Add a table to display rejected forms with pagination using Bootstrap -->
        <h3>Rejected Forms</h3>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID Number</th>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Year</th>
                    <th>Mobile Number</th>
                    <th>Date Item Lost/Found</th>
                    <th>Item Lost/Found</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['department']; ?></td>
                        <td><?php echo $row['year']; ?></td>
                        <td><?php echo $row['mobile']; ?></td>
                        <td>
                            <?php
                            if ($filterType === 'owner') {
                                echo isset($row['lost_date']) ? $row['lost_date'] : '';
                            } elseif ($filterType === 'founder') {
                                echo isset($row['found_date']) ? $row['found_date'] : '';
                            } else {
                                // Display "lost_date" or "found_date" based on the table
                                if (isset($row['lost_date'])) {
                                    echo $row['lost_date'];
                                } elseif (isset($row['found_date'])) {
                                    echo $row['found_date'];
                                } else {
                                    echo ''; // Handle the case where neither column exists
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            if ($filterType === 'owner') {
                                echo isset($row['lost_item']) ? $row['lost_item'] : '';
                            } elseif ($filterType === 'founder') {
                                echo isset($row['found_item']) ? $row['found_item'] : '';
                            } else {
                                // Display "lost_item" or "found_item" based on the table
                                if (isset($row['lost_item'])) {
                                    echo $row['lost_item'];
                                } elseif (isset($row['found_item'])) {
                                    echo $row['found_item'];
                                } else {
                                    echo ''; // Handle the case where neither column exists
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <a href="approval_status.php?id=<?php echo $row['id']; ?>&section=owner" class="btn btn-success btn-action">Approve</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <!-- Pagination links -->
        <ul class="pagination">
            <?php for ($page = 1; $page <= $totalPages; $page++): ?>
                <li class="page-item <?php echo $page == $currentPage ? 'active' : ''; ?>">
                    <a class="page-link" href="?page=<?php echo $page; ?>&filter=<?php echo $filterType; ?>"><?php echo $page; ?></a>
                </li>
            <?php endfor; ?>
        </ul>

        <?php
        // Display a message if no rejected forms are found
        if (mysqli_num_rows($result) === 0) {
            echo "No rejected forms found.";
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
