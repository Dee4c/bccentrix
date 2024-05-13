<?php
require("dbconn.php");
include("sidebar.php");


$searchQuery = isset($_GET['query']) ? $_GET['query'] : '';
$awardeesPerPage = 20; // Number of awardees to display per page

// Get the current page number from the URL, default to page 1
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? intval($_GET['page']) : 1;

try {
    // Calculate the offset based on the current page
    $offset = ($page - 1) * $awardeesPerPage;

    // Query to get academic awardees with pagination
    $queryGetAwardeesWithPagination = "SELECT * FROM `academic_awardees` 
        WHERE lastname LIKE '%$searchQuery%' OR firstname LIKE '%$searchQuery%' OR department LIKE '%$searchQuery%' OR year LIKE '%$searchQuery%'
        ORDER BY award DESC LIMIT $offset, $awardeesPerPage";

    $result = mysqli_query($conn, $queryGetAwardeesWithPagination);

    if ($result) {
        $awardees = mysqli_fetch_all($result, MYSQLI_ASSOC);
        
        // Reassign IDs starting from 1
        $newAwardees = [];
        $counter = $offset + 1;
        foreach ($awardees as $awardee) {
            $awardee['id'] = $counter;
            $newAwardees[] = $awardee;
            $counter++;
        }
        $awardees = $newAwardees;

        // Query to count total number of academic awardees
        $queryCountAwardees = "SELECT COUNT(*) as total FROM `academic_awardees`
            WHERE lastname LIKE '%$searchQuery%' OR firstname LIKE '%$searchQuery%' OR department LIKE '%$searchQuery%' OR year LIKE '%$searchQuery%'";
        $countResult = mysqli_query($conn, $queryCountAwardees);
        $rowCount = mysqli_fetch_assoc($countResult)['total'];

        // Calculate the total number of pages based on the total records and records per page
        $totalPages = ceil($rowCount / $awardeesPerPage);

        // Define the number of pages to display in the pagination
        $paginationRange = 5; // You can adjust this number as needed

        // Calculate the start and end pages of the pagination range
        $paginationStart = max(1, $page - floor($paginationRange / 2));
        $paginationEnd = min($totalPages, $page + floor($paginationRange / 2));

    } else {
        // Handle the query error here, e.g., echo mysqli_error($conn);
        $awardees = []; // Initialize an empty array to avoid errors if the query fails
    }
} catch (Exception $e) {
    // Handle exceptions if necessary
    echo $e->getMessage();
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Academic Awardee</title>
    <!-- <script src="vendors/jquery-1.7.2.min.js"></script>
    <script src="vendors/bootstrap.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">  -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="postmainlink/design.css">

    <style>
         body {
            position: fixed;
            background:linear-gradient( #D1DFB7, #B9D9CF, #85CDFF);
            font-family: Arial, sans-serif;
            text-align: center;
            }
            
        table {
            width: 70%;
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
            margin-top: 70px;
            right: 190px;   
        }
        .container table {
            margin: 0 auto; /* Center horizontally */
        }

         /* Add space below h2 */
         h2 {
            margin-bottom: 20px; /* Adjust the value as needed */
        }

        /* Style the search container */
        .search-container {
            margin-bottom: 10px; /* Adjust the value as needed */
            top: 10%;
        }

       /* Style the back button container */
       .back-button-container {
        margin-right: -110px;
           
        }

        tr:nth-child(odd) {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #fefefe;
        }
        

        /* Create a flex container for alignment */
        .flex-container {
            display: flex;
            flex-direction: row;
            justify-content: space-between; /* Distribute items horizontally */
            align-items: center; /* Align items vertically */
            margin-top: 50px;
            margin-left: 300px;
        }

        /* Add hover effect to the search button */

        .search-container button{
            color: black;
            font-size: 15px;
            padding: 2px;
        }

        .search-container button:hover {
            background-color: #4CAF50; /* Change the background color on hover */
            color: white; /* Change the text color on hover */
        }

        /* Add hover effect to the back button */
        .back-button:hover {
            background-color: #f44336; /* Change the background color on hover */
            color: white; /* Change the text color on hover */
        }


        /* Create a flex container for alignment */
        .flex-container {
            display: flex;
            flex-direction: row;
            justify-content: space-between; /* Distribute items horizontally */
            align-items: center; /* Align items vertically */
        }

        /* Move the back button to the right edge, above the table */
        .table-container {
            display: flex;
            flex-direction: column; /* Stack items vertically */
            align-items: flex-end; /* Align items to the right */
        }
        
        .pagination {
            margin-top: 15px;
            margin-left: 1000px;
           
        }

        /* Style the pagination links */
        .pagination-link {
            padding: 5px 10px; /* Add padding to the left and right sides */
            text-decoration: none;
            border: 1px solid #ccc;
            background-color: #f2f2f2;
            color: #333;
            border-radius: 4px;
            margin-left: 300px;
        }

        /* Style the active pagination link */
        .pagination-link.active {
            background-color: #4CAF50;
            color: white;
        }

        .bagologo{
            position: relative;
            width: 110px;
            height: 80px;
            right: 0px;
            bottom: -30px;
        }


        @media (max-width: 750px){
            .table-container th {
            font-size: 9px;
            padding: 5px;
        }
        .table-container tr {
            font-size: 10px;
            padding: 5px;
        }
        .search-container {
            position: absolute;
            top: 225px;
            left: 60px;
            border-radius: 10px;
        }

        .pagination-link {
            padding: 5px 10px; /* Add padding to the left and right sides */
            text-decoration: none;
            border: 1px solid #ccc;
            background-color: #f2f2f2;
            color: #333;
            font-size: 10px;
            border-radius: 4px;
            margin-left: 300px;
        }

        .container {
            text-align: center;
            margin: 0 auto;
            margin-top: 40px;
            margin-left: 100px;   
        }

        .filter-container label{
            font-size: 11px;
        }

        .filter-container {
            margin-right: 70px;
            font-size: 11px;
        }
        .filteryear-container{
            position: relative;
            font-size: 11px;
            bottom: 22px;
            margin-left:130px;

        }
        
        }
       

             /* Add spacing between the back button and the table */
    </style>

</head>
    <link rel="stylesheet" href="postmainlink/design.css">    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"> 
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" /> -->
<body>
<div class="main">
<div class="container">
<img class="bagologo" src="includes/Bago-removebg-preview.png">
    <h2>Academic Awardees</h2>
    <!-- Wrap search container and back button in separate divs -->
    <div class="flex-container">
        <div class="search-container">
            <form method="GET">
                <input type="text" name="query" placeholder="Search" value="<?php echo $searchQuery; ?>">
                <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            <div >
        </div>
    </div>

    <!-- Add a dropdown filter for departments -->
    <div class="filter-container">
        <label for="departmentFilter">Filter by:</label>
        <select id="departmentFilter" onchange="filterByDepartment(this.value)">
            <option value="">Department</option>
            <option value="ARTS">ARTS</option>
            <option value="CRIM">CRIM</option>
            <option value="BSEDUC">BSEDUC</option>
            <option value="BSIS">BSIS</option>
            <option value="BSOA">BSOA</option>
            <!-- Add other department options here -->
        </select>
    </div>

    <!-- Add a dropdown filter for years -->
    <div class="filteryear-container">
        <label for="yearFilter"></label>
        <select id="yearFilter" onchange="filterByYear(this.value)">
            <option value="">Year</option>
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
                    <th>ID</th>
                    <th>LASTNAME</th>
                    <th>FIRSTNAME</th>
                    <th>MI</th>
                    <th>DEPARTMENT</th>
                    <th>YEAR</th>
                    <th>LG</th>
                    <th>GWA</th>
                    <th>AWARD</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($awardees as $awardee): ?>
                    <tr>
                        <td><?php echo $awardee['id']; ?></td>
                        <td><?php echo $awardee['lastname']; ?></td>
                        <td><?php echo $awardee['firstname']; ?></td>
                        <td><?php echo $awardee['minitial']; ?></td>
                        <td><?php echo $awardee['department']; ?></td>
                        <td><?php echo $awardee['year']; ?></td>
                        <td><?php echo $awardee['lg']; ?></td>
                        <td><?php echo $awardee['gwa']; ?></td>
                        <td><?php echo $awardee['award']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    </div>

     <!-- Add pagination controls -->
     <div class="pagination">
        <?php
        // Display the "First" and "Previous" links
        if ($page > 1) {
            echo '<a href="?query=' . $searchQuery . '&page=1" class="pagination-link">First</a>';
            echo '<a href="?query=' . $searchQuery . '&page=' . ($page - 1) . '" class="pagination-link">Previous</a>';
        }

        // Display the page links within the pagination range
        for ($i = $paginationStart; $i <= $paginationEnd; $i++) {
            $isActive = ($i === $page) ? 'active' : '';
            echo '<a href="?query=' . $searchQuery . '&page=' . $i . '" class="pagination-link ' . $isActive . '">' . $i . '</a>';
        }

        // Display the "Next" and "Last" links
        if ($page < $totalPages) {
            echo '<a href="?query=' . $searchQuery . '&page=' . ($page + 1) . '" class="pagination-link">Next</a>';
            echo '<a href="?query=' . $searchQuery . '&page=' . $totalPages . '" class="pagination-link">Last</a>';
        }
        ?>
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