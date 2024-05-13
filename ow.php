<?php
require("dbconn.php");
include("dashboard.php");

$searchQuery = isset($_GET['query']) ? $_GET['query'] : '';
$ownersPerPage = 20; // Number of owners to display per page

// Get the current page number from the URL, default to page 1
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? intval($_GET['page']) : 1;

try {
    // Calculate the offset based on the current page
    $offset = ($page - 1) * $ownersPerPage;

   // Query to get owner's name and founder's name with pagination
   $queryGetOwnersWithPagination = "SELECT oi.Id_Number, oi.name AS owner_name, oi.department, oi.year, oi.mobile, oi.lost_date, oi.lost_item, fi.name AS founder_name
   FROM `owner_information` oi
   LEFT JOIN `founder_information` fi ON oi.lost_item = fi.found_item
   WHERE (oi.name LIKE '%$searchQuery%' OR oi.department LIKE '%$searchQuery%' OR oi.year LIKE '%$searchQuery%')
   AND oi.approval_status = 'Accepted'  -- Filter by 'Accepted' status
   ORDER BY oi.lost_item DESC LIMIT $offset, $ownersPerPage";
   
    $result = mysqli_query($conn, $queryGetOwnersWithPagination);

    if ($result) {
        $owners = mysqli_fetch_all($result, MYSQLI_ASSOC);
        
        // Reassign IDs starting from 1
        $newOwners = [];
        $counter = $offset + 1;
        foreach ($owners as $owner) {
            $owner['id'] = $counter;
            $newOwners[] = $owner;
            $counter++;
        }
        $owners = $newOwners;

        // Query to count total number of owners
        $queryCountOwners = "SELECT COUNT(*) as total FROM `owner_information`
            WHERE name LIKE '%$searchQuery%' OR department LIKE '%$searchQuery%' OR year LIKE '%$searchQuery%'";
        $countResult = mysqli_query($conn, $queryCountOwners);
        $rowCount = mysqli_fetch_assoc($countResult)['total'];

        // Calculate the total number of pages based on the total records and records per page
        $totalPages = ceil($rowCount / $ownersPerPage);

        // Define the number of pages to display in the pagination
        $paginationRange = 5; // You can adjust this number as needed

        // Calculate the start and end pages of the pagination range
        $paginationStart = max(1, $page - floor($paginationRange / 2));
        $paginationEnd = min($totalPages, $page + floor($paginationRange / 2));

    } else {
        // Handle the query error here, e.g., echo mysqli_error($conn);
        $owners = []; // Initialize an empty array to avoid errors if the query fails
    }
} catch (Exception $e) {
    // Handle exceptions if necessary
    echo $e->getMessage();
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>owner</title>
    <script src="vendors/jquery-1.7.2.min.js"></script>
    <script src="vendors/bootstrap.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
         body {
            position: fixed;
            text-align: center;
            background:linear-gradient(to right, #D1DFB7, #B9D9CF, #85CDFF);
            }
            
        table {
            width: 60%;
            border-collapse: collapse;
            align-content: center;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            font-weight: BOLD;
        }

        th {
            background-color: #333;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        /* Center the table horizontally within its container */
        .container {
            text-align: center;
            margin: 0 auto;
            margin-top: 90px;
            margin-left: 250px;   
        }

        .container table {
            margin: 0 auto; 
           
        }

         /* Add space below h2 */
         h2 {
            margin-bottom: 20px; /* Adjust the value as needed */
        }

        /* Style the search container */
        .search-container {
            margin-bottom: 10px; /* Adjust the value as needed */
            margin-left: 350px;
            top: 10%;
        }

       /* Style the back button container */
       .back-button-container {
        margin-right: -110px;
           
        }

        /* Create a flex container for alignment */
        .flex-container {
            display: flex;
            flex-direction: row;
            justify-content: space-between; /* Distribute items horizontally */
            align-items: center; /* Align items vertically */
            margin-top: 50px;
        }

        /* Add hover effect to the search button */
        .search-container button:hover {
            background-color: #4CAF50; /* Change the background color on hover */
            color: white; /* Change the text color on hover */
        }

        /* Add hover effect to the back button */
        .back-button:hover {
            background-color: #f44336; /* Change the background color on hover */
            color: white; /* Change the text color on hover */
        }

        /* Move the back button to the right edge, above the table */
        .table-container {
            display: flex;
            flex-direction: column; /* Stack items vertically */
            align-items: flex-end; /* Align items to the right */
        }
        
        .profile-picture {
            margin-right: 60px; /* Add margin to separate it from the text */
            margin-bottom: 44px;
            transition: opacity 0.3s, cursor 0.3s; /* Add transitions for opacity and cursor */
            outline: none; /* Remove the outline */
            max-width: 50px; /* Limit the maximum width */
            max-height: 50px; /* Limit the maximum height */
        }

        .pagination {
            margin-top: 15px;
            margin-left: 1000px;
           
        }

        /* Style the pagination links */
        .pagination-link {
            padding: 5px 10px; /* Add padding to the left and right sides */
            margin: 0 5px; /* Add margin around each link for spacing */
            text-decoration: none;
            border: 1px solid #ccc;
            background-color: #f2f2f2;
            color: #333;
            border-radius: 4px;
        }

        /* Style the active pagination link */
        .pagination-link.active {
            background-color: #4CAF50;
            color: white;
        }
        
        tr:nth-child(odd) {
            background-color: lightgrey;
        }

        /* Add spacing between the back button and the table */
    </style>

</head>
<body>
<div class="container">
    <h2>Owner Information</h2>
    <!-- Wrap search container and back button in separate divs -->
    <div class="flex-container">
        <div class="search-container">
            <form method="GET">
                <input type="text" name="query" placeholder="Search" value="<?php echo $searchQuery; ?>">
                <button type="submit">Search</button>
                    </form>
                </div>
            <div >
        </div>
    </div>

    <!-- Add a dropdown filter for departments -->
    <div class="filter-container">
        <label for="departmentFilter">Filter by Department:</label>
        <select id="departmentFilter" onchange="filterByDepartment(this.value)">
            <option value="">All</option>
            <option value="CRIM">CRIM</option>
            <option value="BSIS">BSIS</option>
            <option value="BSOA">BSOA</option>
            <option value="EDUC">EDUC</option>

            <!-- Add other department options here -->
        </select>
    </div>

    <!-- Add a dropdown filter for years -->
    <div class="filter-container">
        <label for="yearFilter">Filter by Year:</label>
        <select id="yearFilter" onchange="filterByYear(this.value)">
            <option value="">All</option>
            <option value="1st">1st Year</option>
            <option value="2nd">2nd Year</option>
            <option value="3rd">3rd Year</option>
            <option value="4th">4th Year</option>
            <!-- Add other year options here -->
        </select>
    </div>

        <!-- Display academic awardees in a table -->
        <div class="table-container">
        <table>
        <thead>
            <tr>
                <th>ID Number</th>
                <th>Owner Name</th>
                <th>Department</th>
                <th>Year</th>
                <th>Mobile Number</th>
                <th>Lost Date</th>
                <th>Lost Item</th>
                <th>Founder Name</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($owners as $owner): ?>
                <tr>
                    <td><?php echo $owner['Id_Number']; ?></td>
                    <td><?php echo $owner['owner_name']; ?></td>
                    <td><?php echo $owner['department']; ?></td>
                    <td><?php echo $owner['year']; ?></td>
                    <td><?php echo $owner['mobile']; ?></td>
                    <td><?php echo $owner['lost_date']; ?></td>
                    <td><?php echo $owner['lost_item']; ?></td>
                    <td><?php echo $owner['founder_name']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

    

    <script>
        function filterByDepartment(department) {
            const rows = document.querySelectorAll('tbody tr');
            rows.forEach(row => {
                const rowDepartment = row.querySelector('td:nth-child(5)').textContent;
                if (department === '' || rowDepartment === department) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        function filterByYear(year) {
        const rows = document.querySelectorAll('tbody tr');
        rows.forEach(row => {
            const rowYear = row.querySelector('td:nth-child(6)').textContent;
            if (year === '' || rowYear === year) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }
    </script>
</body>
</html>