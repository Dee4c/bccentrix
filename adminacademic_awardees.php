<?php
require("dbconn.php");
include("dashboard.php");

$searchQuery = isset($_GET['query']) ? $_GET['query'] : '';
$awardeesPerPage = 10; // Number of awardees to display per page

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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form arrays
    $lastNames = $_POST["lastname"];
    $firstNames = $_POST["firstname"];
    $middleInitials = $_POST["minitial"];
    $departments = $_POST["department"];
    $years = $_POST["year"];
    $lowestGrades = $_POST["lg"];
    $gwas = $_POST["gwa"];
    $awards = $_POST["award"];

    // Prepare and execute the SQL INSERT query for each awardee
    $query = "INSERT INTO academic_awardees (lastname, firstname, minitial, department, year, lg, gwa, award )
              VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);

    for ($i = 0; $i < count($lastNames); $i++) {
        mysqli_stmt_bind_param($stmt, "ssssssss", $lastNames[$i], $firstNames[$i], $middleInitials[$i], $departments[$i], $years[$i], $lowestGrades[$i], $gwas[$i], $awards[$i]);

        if (mysqli_stmt_execute($stmt)) {
            // Awardee added successfully
            // You can redirect or show a success message here
        } else {
            // Error occurred while adding awardee
            $error = "Error: " . mysqli_error($conn);
            // Handle the error as needed
        }
    }

    // Close the prepared statement
    mysqli_stmt_close($stmt);
}
?>


<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Academic Awardee</title>

    <style>
         body {
            background:linear-gradient(to right, #D1DFB7, #B9D9CF, #85CDFF);
            position: fixed;
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
            margin-top: 90px;
            margin-left: 100px;   
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
            margin-left: 230px;
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
            margin-top: 30px;
            margin-right: 660px;
           
        }

        /* Style the pagination links */
        .pagination-link {
            padding: 5px 10px; /* Add padding to the left and righat sides */
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

        .back-button-container{
            margin-right: 375px;
        }

        .table-container {
        overflow-y: auto;
        max-height: 500px; /* Set the maximum height as needed */
        margin-top: 5px; /* Adjust margin as needed */
        }

        .table-scroll {
            width: 100%;
        }

            /* Style for the modal container */
        .modal {
            display: none; /* Hidden by default */
            position: fixed;
            z-index: 1;
            left: 0;
            width: 100%;
            height: 100%;
            /* overflow: scroll; */
        }

                /* Style for the modal content */
        .modal-content {
            background-color: rgba(0, 0, 0, 0.61);
            border: 1px solid #888;
            width: 100%;
            height: auto; 
            overflow: scroll;/* Adjusted to "auto" to adapt to the content height */
        }
        .modal-content .form-container {
            float: top;
            margin-left: 100px;
            padding: 20px; /* Add padding to the form container */
        }

        /* Style for the close button */
        .close {
            color: #888;
            float: right;
            font-size: 30px;
            cursor: pointer;
        }

        .box-container .box{
    position: absolute;
    box-shadow: 0 5px 10px rgba(0,0,0,.2);
    border-radius: 5px;
    background: #fff;
    text-align: center;
    right: 0;
    margin-right: 90px;
    padding:30px 20px;
    width: 200px;
    height: 220px;
}

 .box-container .box img{
    position: relative;
    height: 90px;
    width: 110px;
    top: 25px;
}

 .box-container .box h3{
    color:#444;
    font-weight: 600;
    font-size: 18px;
    
    /* padding:10px 0; */
}

 .box-container .box p{
    color:#777;
    font-size: 15px;
    line-height: 1.8;
}

 .box-container .box .btn{
    margin-top: 10px;
    display: inline-block;
    background:#333;
    color:#fff;
    font-size: 17px;
    border-radius: 5px;
    padding: 8px 25px;
}

 .box-container .box .btn:hover{
    letter-spacing: 1px;
}

 .box-container .box:hover{
    box-shadow: 0 10px 15px rgba(0,0,0,.3);
    transform: scale(1.05);
}
/* modal css */

    .formcontainer {
            display: flex;
            position: relative;
            justify-content: center;
            align-items: center;
            height: 100%;
            margin-left: 100px;          
        }

        .form-container {
            width: 400px;
            padding: 20px;
            border: 3px solid #ccc;
            border-radius: 5px;
            margin-top: 100px; 
            background:linear-gradient(#DAEBC7, #05A3B5);    
        }

        .form-container h1{
            font-size: 22px;
            text-align: center;
            font-weight: bold;
            margin-right: 90px; 
            font-family: 'Poppins', sans-serif;
        }

        .form-container .bagologo{
            width: 110px;
            height: 80px;
            float: left;
            margin-top: 10px;
        }
        
        .form-container .sasologo{
            float: right;
            margin-top: 10px;
            width: 80px;
            height: 70px;
        }

        h3{
            margin-top:60px;
            text-align: center;
            font-family: 'Poppins', sans-serif;
            font-size: 20px;
        }

        tr:nth-child(odd) {
            background-color: lightgrey;
        }


</style>


</head>
<!-- <link rel="stylesheet" href="postmainlink/design.css"> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Include jQuery -->
    <script src="postmainlink/bootstrap.min.js"></script> <!-- Include Bootstrap JavaScript -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<body>
<div class="container">
    <h2>Academic Awardees</h2>
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

    <button class="box-container" id="openModalBtn">
                <div class="box" style="background:linear-gradient( #05A3B5,#DAEBC7);">
                   <img src="includes/Bago-removebg-preview.png" alt="">
                   <h3>ADD AWARDEES</h3>
                </div>
                </button>



    <!-- The Modal -->
    <div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close" id="closeModalBtn">&times;</span>
    <div class="formcontainer">
      <div class="form-container">
        <img class="bagologo" src="includes/Bago-removebg-preview.png">
        <img class="sasologo" src="includes/sasologo-removebg-preview.png">
        <h1 class="text-center">Add Academic Awardees</h1>

        <?php if (isset($error)) { ?>
          <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php } ?>

        <?php if (isset($_GET["success"]) && $_GET["success"] === "true") { ?>
          <div class="alert alert-success">Awardee added successfully!</div>
        <?php } ?>

        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
          <?php
          // Determine the number of awardees to add (e.g., 4)
          $numAwardees = 1;

          for ($i = 0; $i < $numAwardees; $i++) {
          ?>
            <h3>Awardee <?php echo $i + 1; ?></h3>
            <div class="form-group">
              <label for="last_name[]">Last Name:</label>
              <input type="text" class="form-control" name="lastname[]" required placeholder="Last Name">
            </div>

            <div class="form-group">
              <label for="first_name[]">First Name:</label>
              <input type="text" class="form-control" name="firstname[]" required placeholder="First Name">
            </div>

            <div class="form-group">
              <label for="mi[]">MI:</label>
              <input type="text" class="form-control" name="minitial[]" required placeholder="Middle Initial">
            </div>

            <div class="form-group">
              <label for="department[]">Department:</label>
              <select class="form-control" name="department[]" required>
              <option value="">-- Select Department --</option>
                <option value="BSIS">BSIS</option>
                <option value="CRIM">CRIM</option>
                <option value="BSOA">BSOA</option>
                <option value="BSEDUC">BSEDUC</option>
                <option value="ARTS">ARTS</option>
                <!-- Add other department options here -->
              </select>
            </div>

            <div class="form-group">
              <label for="year[]">Year:</label>
              <select class="form-control" name="year[]" required>
              <option value="">-- Select Year --</option>
                <option value="1st">1st Year</option>
                <option value="2nd">2nd Year</option>
                <option value="3rd">3rd Year</option>
                <option value="4th">4th Year</option>
                <!-- Add other year options here -->
              </select>
            </div>

            <div class="form-group">
              <label for="lg[]">LG:</label>
              <input type="text" class="form-control" name="lg[]" required placeholder="Lowest Grade">
            </div>

            <div class="form-group">
                <label for="gwa[]">GWA:</label>
                <input type="text" class="form-control" name="gwa[]" id="gwa" oninput="updateResponse()" required placeholder="General Weighted Average">
                <span id="gwaError" class="error"></span>
            </div>

            <!-- Keep the "Award" input field, but add an ID for reference -->
            <div class="form-group">
                <label for="award[]">Award:</label>
                <input type="text" class="form-control" name="award[]" id="awardInput" required placeholder="Award">
            </div>

          <?php
          }
          ?>
          <button type="submit" class="btn btn-primary">Add Awardees</button>
          <div id="awardeeFormsContainer"></div>
          <a href="adminacademic_awardees.php" class="btn btn-primary">Go back</a>
        </form>
      </div>
    </div>
  </div>
</div>

    <?php if (!empty($searchQuery)): ?>
    <div class="back-button-container">
        <a href="javascript:history.back()" class="back-button">Back</a>
    </div>
    <?php endif; ?>
    

    <!-- Add a dropdown filter for departments -->
    <div class="filter-container">
        <label for="departmentFilter">Filter by Department:</label>
        <select id="departmentFilter" onchange="filterByDepartment(this.value)">
            <option value="">All</option>
            <option value="CRIM">CRIM</option>
            <option value="BSIS">BSIS</option>
            <option value="ARTS">ARTS</option>
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
    <div class="table-scroll">
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

<!-- Add this script in your HTML body or head section -->
<script>
  // Get references to the modal and buttons
  const modal = document.getElementById("myModal");
  const openModalBtn = document.getElementById("openModalBtn");
  const closeModalBtn = document.getElementById("closeModalBtn");

  // Function to open the modal
  function openModal() {
    console.log("Open Modal button clicked");
    modal.style.display = "block";
  }

  // Function to close the modal
  function closeModal() {
    console.log("Close Modal button clicked");
    modal.style.display = "none";
  }

  // Attach the openModal function to the "Open Modal" button click event
  openModalBtn.addEventListener("click", openModal);

  // Attach the closeModal function to the "Close Modal" button click event
  closeModalBtn.addEventListener("click", closeModal);

  // Close the modal when the user clicks outside of it
  window.addEventListener("click", (event) => {
    if (event.target == modal) {
      closeModal();
    }
  });

  // Prevent the form from submitting (this code prevents the page from reloading)
  const form = document.querySelector('form');
  form.addEventListener("submit", function(event) {
    event.preventDefault();
  });
</script>


<script>
function updateResponse() {
    // Get the value entered in the input field
    const gwa = document.getElementById("gwa");
    const gwaValue = parseFloat(gwa.value); // Convert to a floating-point number

    // Perform your logic to generate a response based on the GWA
    let awardText = "";

    if (gwaValue >= 98 && gwaValue <= 100) {
        awardText = "With Highest";
    } else if (gwaValue >= 94 && gwaValue <= 97) {
        awardText = "With High";
    } else if (gwaValue >= 90 && gwaValue <= 93) {
        awardText = "With Distinction";
    } else {
        awardText = "";
    }

    // Update the "Award" input field with the generated response
    const awardInput = document.getElementById("awardInput");
    awardInput.value = awardText;
}
</script>


</body>
</html>