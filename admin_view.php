<?php
require('dbconn.php');
include('dashboard.php');

// Create a connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the "owner_information" table with status 'open'
$sql = "SELECT * FROM owner_information WHERE approval_status = 'open'";
$result = $conn->query($sql);

echo "<h3>Owner Tickets</h3>";
echo "<table>";
echo "<tr><th>Ticket ID</th><th>Approval Status</th><th>Actions</th></tr>";

$ownerTicketCounter = 1; // Counter for creating unique Owner ticket IDs

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $ticketID = "ownerTicket" . $ownerTicketCounter;
        $ticketIDDisplay = $ownerTicketCounter; // Display only the ticket number
        echo "<tr>";
        echo "<td>$ticketIDDisplay</td>";
        echo "<td>{$row['approval_status']}</td>";
        echo "<td><button onclick='openModal(\"$ticketID\")'>View Ticket</button>";
        echo "<button onclick='closeTicket(\"$ticketID\")'>Close Ticket</button></td>";
        echo "</tr>";
        echo "<div id='$ticketID' class='hidden'>";
        // Display ticket details here
        foreach ($row as $key => $value) {
            echo "<p>$key: $value</p>";
        }
        echo "</div>";
        $ownerTicketCounter++;
    }
} else {
    echo "<tr><td colspan='3'>No Owner records found</td></tr>";
}
echo "</table>";

// Retrieve data from the "founder_information" table with status 'open'
$sql = "SELECT * FROM founder_information WHERE approval_status = 'open'";
$result = $conn->query($sql);

echo "<h3>Founder Tickets</h3>";
echo "<table>";
echo "<tr><th>Ticket ID</th><th>Approval Status</th><th>Actions</th></tr>";

$founderTicketCounter = 1; // Counter for creating unique Founder ticket IDs

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $ticketID = "founderTicket" . $founderTicketCounter;
        $ticketIDDisplay = $founderTicketCounter; // Display only the ticket number
        echo "<tr>";
        echo "<td>$ticketIDDisplay</td>";
        echo "<td>{$row['approval_status']}</td>";
        echo "<td><button onclick='openModal(\"$ticketID\")'>View Ticket</button>";
        echo "<button onclick='closeTicket(\"$ticketID\")'>Close Ticket</button></td>";
        echo "</tr>";
        echo "<div id='$ticketID' class='hidden'>";
        // Display ticket details here
        foreach ($row as $key => $value) {
            echo "<p>$key: $value</p>";
        }
        echo "</div>";
        $founderTicketCounter++;
    }
} else {
    echo "<tr><td colspan='3'>No Founder records found</td></tr>";
}
echo "</table>";

$conn->close();
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin View</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            /* margin: 10px auto; */
            margin-top:90px;
            margin-left: 400px;
            padding: 10px;
        }

        table, th, td {
            border: 1px solid #ccc;
            padding: 20px;
            text-align: left;
        }

        .hidden {
            display: none;
        }

        /* Modal styles */
        .modal {
            display: none;
            position: absolute;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            float: top;
            background-color: rgba(0, 0, 0, 0.7);
        }

        .modal-content {
            position: absolute; 
            background-color: #fff;
            /* margin: 15% auto; */
            margin-top: 110px;
            text-align:left;
            padding: 20px;
            border: 3px solid #888;
            width: 30%;
            margin-left: 500px;
            font-size: 15px;
            font-weight: bold;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        /* .container {
            position: fixed;
            justify-content: center;
            align-items: center;
            height: 100%;
            margin-top: 160px;
            width: 65%;
            margin-left:160px;
        } */
        /* .text{
            text-align:center;
            margin-left: 300px; 
            font-size: 40px;
        } */
    </style>
</head>
<body>
<h2>Admin View</h2>


<!-- Modal -->
<!-- <div class="container"> -->
<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <div id="modalContent"></div>
    </div>
</div>
<!-- </div> -->

<script>
    function openModal(ticketId) {
        var modal = document.getElementById("myModal");
        var modalContent = document.getElementById("modalContent");
        var ticketDetails = document.getElementById(ticketId);

        // Copy the ticket details to the modal
        modalContent.innerHTML = ticketDetails.innerHTML;

        modal.style.display = "block";
    }

    function closeModal() {
        var modal = document.getElementById("myModal");
        modal.style.display = "none";
    }

    function closeTicket(ticketId) {
    if (confirm("Do you want to close the ticket with ID: " + ticketId)) {
        // Perform the ticket closing action using AJAX
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4) {
                if (this.status == 200) {
                    // Handle the response if needed
                    alert(this.responseText); // Display the response message
                    closeModal();
                    
                    // Reload the page to see the updated results
                    location.reload();
                } else {
                    alert("Failed to close the ticket.");
                }
            }
        };
        xhttp.open("POST", "close_ticket.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("ticketId=" + ticketId);
    }
}


    // Close modal when clicking outside of it
    window.onclick = function (event) {
        var modal = document.getElementById("myModal");
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

</body>
</html>
