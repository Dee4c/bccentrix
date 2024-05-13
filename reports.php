<?php
include("dbconn.php"); // Include the database connection file
include("dashboard.php");
// include 'adminsession.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- Latest compiled and minified Bootstrap JavaScript -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />

    <style>
        /* Adjust the position of the container */
        body{
            background:linear-gradient(to right, #D1DFB7, #B9D9CF, #85CDFF);
            overflow-x: hidden;
           
        }
        .container {
            margin-top: 70px;
            margin-left: 220px;
            padding: 20px;
            transition: transform 0.2s; /* Add a smooth transition effect */
            display: flex; /* Use flexbox to control layout */
            flex-direction: column; /* Stack child elements vertically */
            margin-bottom: 20px; /* Reduce the margin at the bottom */
        }

        .card-counter {
            box-shadow: 2px 2px 10px #DADADA;
            margin-left: 20px;
            margin-right: 10px;
            padding: 20px 10px 10px 30px;
            background-color: #fff;
            height: 100px;
            border-radius: 5px;
            transition: .3s linear all;
        }

        .card-counter.user {
            background-color: #007bff;
            color: #FFF;
            margin-bottom: 10px;
        }

        .card-counter.post {
            background-color: #CD5C5C;
            color: #FFF;
        }

        .card-counter.info {
            background-color: #CCCCFF;
            color: #FFF;
        }

        .card-counter.owner {
            background-color: #4CAF50; /* Green background */
            color: #FFF; /* White text */
            margin-bottom: 10px;
        }

        .card-counter.founder {
            background-color: #87CEEB; /* Light blue background */
            color: #000; /* Black text */
        }

        .card-counter i {
            font-size: 5em;
            opacity: 0.2;
            color: black;
        }

        .card-counter .count-numbers {
            position: absolute;
            right: 35px;
            top: 20px;
            font-size: 32px;
            display: block;
            color: black;
        }

        .card-counter .count-name {
            position: absolute;
            right: 35px;
            top: 65px;
            font-style: italic;
            text-transform: capitalize;
            opacity: 0.5;
            display: block;
            font-size: 17px;
            color: black;
        }

        .chart-container-pie {
            max-width: 300px; /* Adjust the maximum width as per your requirement */
            margin-left: 800px;
            margin-top: 20px;
        }

        .chart-container-bar {
            position: absolute;
            width: 700px; /* Adjust the maximum width as per your requirement */
            height: 320px;
            margin-top: 20px;
            margin-left: 50px;
            top: 300px;
        }


    </style>

</head>

<body>

<div class="container card-container" id="user-list-container">
    <div class="row">
        <div class="col-md-3">
            <div class="card-counter user">
                <i class="fa fa-user"></i>
                <span class="count-numbers" id="userCount">Loading...</span>
                <span class="count-name">No. of Users</span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card-counter post">
                <i class="fa fa-newspaper-o"></i>
                <span class="count-numbers" id="postCount">Loading...</span>
                <span class="count-name">No. of Posts</span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card-counter info">
                <i class="fa fa-graduation-cap"></i>
                <span class="count-numbers" id="academicAwardeesCount">Loading...</span>
                <span class="count-name">No. of Academic Awardees</span>
            </div>
        </div>
        <!-- Container for "No. of Owner Form" -->
        <div class="col-md-3">
            <div class="card-counter owner">
                <i class="fas fa-user-circle"></i>
                <span class="count-numbers" id="ownerCount">Loading...</span>
                <span class="count-name">No. of Owner</span>
            </div>
        </div>
        <!-- Container for "No. of Founder Form" -->
        <div class="col-md-3">
            <div class="card-counter founder">
                <i class="fas fa-users"></i>
                <span class="count-numbers" id="founderCount">Loading...</span>
                <span class="count-name">No. of Founder</span>
            </div>
        </div>
    </div>
    <!-- Chart container -->
    <div class="chart-container-pie">
        <canvas id="pieChart"></canvas>
    </div>

    <div id="pieChartLegend"></div>

    <div class="chart-container-bar">
        <canvas id="userChart"></canvas>
        <canvas id="myBarChart"></canvas>
    </div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Function to fetch data from getData.php and update the charts and user count cards
    function fetchDataAndUpdate() {
        fetch('getData.php')
            .then(response => response.json())
            .then(data => {
                const numberOfUsers = data.numberOfUsers;
                const numberOfPosts = data.numberOfPosts;
                const numberOfActiveUsers = data.numberOfActiveUsers;
                const numberOfNonActiveUsers = data.numberOfNonActiveUsers;
                const numberOfNewUsers = data.numberOfNewUsers;
                const numberOfAcceptedOwnerForms = data.numberOfAcceptedOwnerForms;
                const numberOfAcceptedFounderForms = data.numberOfAcceptedFounderForms;

                // Update user count cards
                document.getElementById('userCount').textContent = numberOfUsers;
                document.getElementById('postCount').textContent = numberOfPosts;
                document.getElementById('academicAwardeesCount').textContent = data.numberOfAcademicAwardees;
                document.getElementById('ownerCount').textContent = numberOfAcceptedOwnerForms;
                document.getElementById('founderCount').textContent = numberOfAcceptedFounderForms;

                // Define custom colors for bars
                var activeUsersColor = 'rgba(75, 192, 192, 0.80)';
                var nonActiveUsersColor = 'rgba(255, 99, 132, 0.80)';
                var newUsersColor = 'rgba(54, 162, 235, 0.80)';

                // Create the bar chart
                var ctx = document.getElementById('userChart').getContext('2d');
                var userChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Active Users', 'Non-Active Users', 'New Users'],
                        datasets: [
                            {
                                label: 'Active Users',
                                data: [numberOfActiveUsers, 0, 0], // Set 0 for the other categories
                                backgroundColor: activeUsersColor,
                                borderColor: activeUsersColor,
                                borderWidth: 1,
                            },
                            {
                                label: 'Non-Active Users',
                                data: [0, numberOfNonActiveUsers, 0], // Set 0 for the other categories
                                backgroundColor: nonActiveUsersColor,
                                borderColor: nonActiveUsersColor,
                                borderWidth: 1,
                            },
                            {
                                label: 'New Users',
                                data: [0, 0, numberOfNewUsers], // Set 0 for the other categories
                                backgroundColor: newUsersColor,
                                borderColor: newUsersColor,
                                borderWidth: 1,
                            },
                          
                        ],
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true,
                            },
                        },
                        plugins: {
                            legend: {
                                display: true,
                                position: 'top',
                                labels: {
                                    generateLabels: function (chart) {
                                        var dataset = chart.data.datasets;
                                        var labels = [];
                                        for (var i = 0; i < dataset.length; i++) {
                                            var labelColor = dataset[i].backgroundColor;
                                            labels.push({
                                                text: dataset[i].label,
                                                fillStyle: labelColor,
                                                strokeStyle: labelColor,
                                                lineWidth: 2,
                                            });
                                        }
                                        return labels;
                                    },
                                },
                            },
                        },
                    },
                });

                 


                // Define colors for the pie chart
                var departmentColors = {
                    'BSIS': 'green',
                    'CRIM': 'red',
                    'BSEDUC': '#0A2472',
                    'ARTS': 'yellow',
                    'BSOA': '#A96E44'
                    // Add other departments and their colors as needed
                };

                // Filter and prepare data for department-wise user counts
                var allowedDepartments = ['BSIS', 'CRIM', 'BSEDUC', 'ARTS', 'BSOA'];
                var departmentData = data.departmentCounts;

                // Filter only the allowed departments
                var filteredDepartmentData = Object.keys(departmentData)
                    .filter(department => allowedDepartments.includes(department))
                    .reduce((obj, key) => {
                        obj[key] = departmentData[key];
                        return obj;
                    }, {});

                var departmentLabels = Object.keys(filteredDepartmentData);
                var departmentCountValues = Object.values(filteredDepartmentData);
                // Create the department pie chart
                var departmentCtx = document.getElementById('pieChart').getContext('2d');
                var departmentPieChart = new Chart(departmentCtx, {
                    type: 'pie',
                    data: {
                        labels: departmentLabels,
                        datasets: [
                            {
                                data: departmentCountValues,
                                backgroundColor: departmentLabels.map(department => departmentColors[department]),
                                borderWidth: 1,
                            },
                        ],
                    },
                    options: {
                        responsive: true, // Make the chart responsive
                        maintainAspectRatio: false, // Allow aspect ratio adjustments
                        plugins: {
                            legend: {
                                display: true,
                                position: 'top',
                            },
                        },
                    },
                });

    // Create the department pie chart legend
    var pieChartLegend = createPieChartLegend(departmentPieChart, departmentColors, departmentLabels);
    document.getElementById('pieChartLegend').innerHTML = pieChartLegend;
            })
        .catch((error) => {
            console.error('Error fetching data:', error);
        });
}

// Call the function to fetch and update data on page load
fetchDataAndUpdate();

</script>

<script>
  document.addEventListener('DOMContentLoaded', function () {
  // Fetch data from the PHP script
  fetch('getPostCount.php')
    .then(response => response.json())
    .then(data => {
      // Extract labels and data from the fetched data
      var labels = [];
      var counts = [];

      // Get the current month and year
      var currentDate = new Date();
      var currentMonth = currentDate.getMonth(); // returns 0 for January, 1 for February, etc.
      var currentYear = currentDate.getFullYear();

      // Create labels for all months
      var months = [
        'January', 'February', 'March', 'April',
        'May', 'June', 'July', 'August',
        'September', 'October', 'November', 'December'
      ];

      for (var i = 0; i < 12; i++) {
        labels.push(months[i]);
        var monthData = data.find(entry => entry.month === `${currentYear}-${(i + 1).toString().padStart(2, '0')}`); // Adjusted to match the 'month' field in PHP

        if (monthData) {
          counts.push(monthData.count);
        } else {
          counts.push(0);
        }
      }

      // Create a bar chart
      var ctx = document.getElementById('myBarChart').getContext('2d');
      var myBarChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: labels,
          datasets: [{
            label: `Number Of Posts in ${currentYear}`,
            data: counts,
            backgroundColor: '#A96E44',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });
    })
    .catch(error => console.error('Error fetching data:', error));
});
</script>






</body>

</html>