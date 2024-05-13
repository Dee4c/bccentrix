<?php
include("dbconn.php");
include("session.php");

$user_department = $_SESSION['department'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Joined Group</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="postmainlink/design.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: light; /* Set body background color to grey */
            text-align: center;
            margin: 0; /* Remove default margin */
        }

        h3 {
            margin-right: 30px;
        }

        /* Sidebar styles */
        .sidebar {
            height: 100%;
            width: 280px;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #B9D9CF; /* Set sidebar background color to white */
            overflow-x: hidden;
        }

        .sidebar a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 18px;
            color: #818181;
            display: block;
        }

        .sidebar a:hover {
            color: #f1f1f1;
        }

        .sidebar .group-info {
            margin-left: 260px; /* Adjust the margin to avoid overlapping with the sidebar */
            padding: 20px;
        }

        .group-title {
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .home-icon {
            text-decoration: none;
            font-size: 25px;
            color: black;
            float: left; /* Align the icon to the left */
            margin-top: 10px;
        }

        .home-icon:hover {
            color: #fff; /* Change text color on hover */
        }

        .no-group-container {
            margin-top: 200px;
        }

        /* Media query for responsive layout */
        @media(max-width: 750px) {
            .sidebar {
                width: 100%;
                margin-bottom: 10px;
            }

            .sidebar .group-info {
                margin-left: 0;
            }
        }

        /* Add styling for modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
            padding-top: 60px;
        }

        .gp-modal {
            background:linear-gradient( #38AECC, #B9D9CF);
            /* margin: 5% auto; */
            padding: 20px;
            border: 1px solid #888;
            width: 50%;
            bottom: 440px;
            margin-left: 420px;
            border-radius: 10px;
            
        }

        /* Style for form elements */
        .form-group {
            text-align: left;
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        .form-group button {
            margin-top: 15px;
        }

        /* Style for Modal Buttons */
        .join-btn {
            position: absolute;
            text-decoration: none;
            padding: 10px;
            font-size: px;
            cursor: pointer;
            background-color: light;
            color: black;
            border: none;
            border-radius: 5px;
            left: 10px;/* Adjust as needed */
            /* margin-left: -360px; */
            margin-top: 70px;
            z-index: 8;
        }

        .create-btn {
            position: absolute;
            text-decoration: none;
            padding: 12px;
            font-size: px;
            cursor: pointer;
            background-color: light;
            color: black;
            border: none;
            border-radius: 5px;
            left: 10px;/* Adjust as needed */
            /* margin-left: -360px; */
            margin-top: 115px;
            z-index: 8;
        }
        .join-btn:hover {
            background-color: lightgrey;
        }

        .create-btn:hover {
            background-color: lightgrey;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <span class="group-chats">
            <a class="home-icon" href="announcement.php"><i class="fas fa-home"></i></a>
            <button class="join-btn" onclick="openJoinGroupModal()"><i class="fa fa-users"></i></button>
            <button class="create-btn " id="createGroupButton" onclick="openCreateGroupModal()"><i class="fa fa-plus"></i></button>
            <h3>GroupChats</h3>
            <?php
            $userName = $_SESSION['user_name'];

            // Fetch groups that the user has joined
            $userGroupsQuery = "SELECT DISTINCT gm.group_id, g.group_name FROM group_members gm
                                INNER JOIN groups g ON gm.group_id = g.id
                                WHERE gm.name = '$userName'";
            $userGroupsResult = mysqli_query($conn, $userGroupsQuery);

            if ($userGroupsResult && mysqli_num_rows($userGroupsResult) > 0) {
                echo '<div class="group-dropdown">';
                echo '<div class="group-dropdown-content">';

                while ($groupRow = mysqli_fetch_assoc($userGroupsResult)) {
                    $groupId = $groupRow['group_id'];
                    $groupName = $groupRow['group_name'];
                    echo '<a href="joined_group.php?id=' . $groupId . '&user=' . urlencode($userName) . '">';
                    echo $groupName;
                    echo '</a>';
                }

                echo '</div>';
                echo '</div>';
            }
            ?>
        </span>
    </div>

    <!-- Join Group Modal -->
    <div id="joinGroupModal" class="modal">
        <div class="gp-modal">
            <form action="gc_function.php" method="post">
                <!-- Your existing form elements for joining a group -->
                <div class="form-group">
                    <label for="group_name">Group Name:</label>
                    <input class="chatInput" type="text" name="group_name" required>
                </div>
                <div class="form-group">
                    <label for="group_code">Group Code:</label>
                    <input class="chatInput" type="text" name="group_code" required>
                </div>
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input class="chatInput" type="text" name="name" value="<?php echo $full_name; ?>" readonly required>
                </div>
                <input class="btn btn-primary" type="submit" value="Join Group">
            </form>
        </div>
    </div>

    <!-- Create Group Modal -->
    <div id="createGroupModal" class="modal">
        <div class="gp-modal">
            <form action="create_gc.php" method="post">
                <!-- Your existing form elements for creating a group -->
                <div class="form-group">
                    <label for="group_name">Group Name:</label>
                    <input class="chatInput" type="text" class="form-control" name="group_name" required>
                </div>
                <div class="form-group">
                    <label for="group_code">Group Code:</label>
                    <input class="chatInput" type="text" class="form-control" name="group_code" id="groupCode" required readonly>
                </div>
                <div class="form-group">
                    <label for="id_number">ID Number:</label>
                    <input class="chatInput" type="text" name="id_number" value="<?php echo $Id_Number ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input class="chatInput" type="text" name="name" value="<?php echo $full_name; ?>" readonly required>
                </div>
                <div class="form-group">
                    <label for="department">Department:</label>
                    <input class="chatInput" type="text" name="department" value="<?php echo $user_department; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="year">Year:</label>
                    <input class="chatInput" type="text" name="year" value="<?php echo $_SESSION['year']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="year_section">Section:</label>
                    <input class="chatInput" type="text" name="yr_section" value="<?php echo $user_department; ?>" readonly>
                </div>
                <button type="submit" class="btn btn-primary">Create Group</button>
                <a href="grouppage.php" class="btn btn-primary">Go back</a>
            </form>
        </div>
    </div>


<!-- Create Group Button -->


    <!-- Script to handle modal display -->

    <!-- Container for the icon and text outside of the sidebar -->
    <div class="no-group-container" id="noGroupContainer">
        <div class="no-group-icon" style="margin-top: 150px; font-size: 50px" >&#128172;</div>
        <div class="no-group-text" style="font-size: 20px" >Select Group and View Conversation</div>
    </div>

    
    <script>
        function openJoinGroupModal() {
            document.getElementById('joinGroupModal').style.display = 'block';
        }

        function openCreateGroupModal() {
            document.getElementById('createGroupModal').style.display = 'block';
        }

        window.onclick = function (event) {
            if (event.target == document.getElementById('joinGroupModal')) {
                document.getElementById('joinGroupModal').style.display = 'none';
            }
            if (event.target == document.getElementById('createGroupModal')) {
                document.getElementById('createGroupModal').style.display = 'none';
            }
        }
    </script>

    <!-- Your existing script for hiding/showing no-group-container -->
    <script>
        // Function to hide or show the no-group-container based on the URL
        function updateNoGroupContainerVisibility() {
            var noGroupContainer = document.getElementById("noGroupContainer");

            // Check if the URL path contains "joined_group.php"
            if (window.location.pathname.indexOf("joined_group.php") > -1) {
                noGroupContainer.style.display = "none";
            } else {
                noGroupContainer.style.display = "block";
            }
        }

        // Hide or show the no-group-container when the page loads
        document.addEventListener("DOMContentLoaded", function () {
            updateNoGroupContainerVisibility();
        });

        // Update visibility when the URL changes (e.g., when navigating between pages)
        window.addEventListener("popstate", function () {
            updateNoGroupContainerVisibility();
        });
    </script>

<script>
        // Function to generate a random group code
        function generateRandomCode() {
            const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            let code = '';
            for (let i = 0; i < 6; i++) {
                code += characters.charAt(Math.floor(Math.random() * characters.length));
            }
            return code;
        }

        // Show the modal when the "Create Group" button is clicked
        document.getElementById('createGroupButton').addEventListener('click', function () {
            const modal = document.getElementById('createGroupModal');
            modal.style.display = 'block';

            // Generate a random group code and set it in the input field
            const groupCodeInput = document.getElementById('groupCode');
            groupCodeInput.value = generateRandomCode();
        });

            // Close the modal when the "X" or outside the modal is clicked
        document.querySelector('.close').addEventListener('click', function () {
            const modal = document.getElementById('createGroupModal');
            modal.style.display = 'none';
        });

        window.addEventListener('click', function (event) {
            const modal = document.getElementById('createGroupModal');
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        });

        // Handle form submission (you can add your own submission logic here)
        document.getElementById('groupCreationForm').addEventListener('submit', function (e) {
            e.preventDefault();
            // Handle form submission logic here
            // You can use JavaScript or submit the form to a PHP script
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
