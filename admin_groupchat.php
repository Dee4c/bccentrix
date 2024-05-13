<?php
include ("dashboard.php");
// include ("session.php");
$user_department = $_SESSION['department'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="postmainlink/design.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Join Group</title>
    <style>

        body {
            background:linear-gradient(to left, #D1DFB7, #B9D9CF, #85CDFF);
        }

        .container {
            width: 400px;
            background:linear-gradient( #38AECC, #B9D9CF,  #022F40);
            padding: 20px;
            border-radius: 7px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-top: 120px;
            margin-left: 570px;
        }

        .chatTitle {
            text-align: center;
            color: #333;
        }

        label {
            font-weight: bold;
        }

        .chatInput[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        .chatInput[
            type="text"]:focus {
            outline: none;
            border: 1px solid #3498db;
        }

        .chatInput[type="submit"] {
            width: 100%;
            background-color: #3498db;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .chatInput[type="submit"]:hover {
            background-color: #2980b9;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            overflow: scroll;

        }
        
        .modal-content {
            background:linear-gradient( #38AECC, #B9D9CF,  #022F40);
            width: 400px;
            margin: 0 auto;
            margin-top: 10px;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .close {
            position: absolute;
            right: 10px;
            top: 10px;
            font-size: 20px;
            cursor: pointer;
        }

        #createGroupButton {
            background-color: #3498db; /* Button background color */
            color: #fff; /* Button text color */
            padding: 10px; /* Button padding */
            border: none; /* Remove button border */
            border-radius: 3px; /* Button border radius */
            cursor: pointer; /* Show pointer on hover */
            margin-top: 20px; /* Add space between button and form */
            margin-left: 884px;
        }

        #createGroupButton:hover {
            background-color: #2980b9; /* Button background color on hover */
        }
        @media(max-width: 600px){
            .container {
            width: 90%;
            margin: 0;
            background:linear-gradient( #38AECC, #B9D9CF,  #022F40);
            padding: 20px;
            border-radius: 7px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-top: 100;
            margin-left: 20px;
        }

        #createGroupButton {
            background-color: #3498db; /* Button background color */
            color: #fff; /* Button text color */
            padding: 10px; /* Button padding */
            border: none; /* Remove button border */
            border-radius: 3px; /* Button border radius */
            cursor: pointer; /* Show pointer on hover */
            margin-top: 20px; /* Add space between button and form */
            margin-left: 135px;
        }

        .modal-content {
            background:linear-gradient( #38AECC, #B9D9CF,  #022F40);
            width: 350px;
            margin: 0 auto;
            margin-top: 10px;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            position: relative;
        }
        }

        .bagologo{
            position: relative;
            width: 110px;
            height: 80px;
            left: 140px;
            top: 100px;
        }
            
    </style>
</head>
<body>
<img class="bagologo" src="includes/Bago-removebg-preview.png">
    <div class="container">
        <h2 class="chatTitle">Join a Group</h2>
        <form action="gc_function.php" method="post">
            <label for="group_name">Group Name:</label>
            <input class="chatInput" type="text" name="group_name" required>

            <label for="group_code">Group Code:</label>
            <input class="chatInput" type="text" name="group_code" required>

            <label for="name">Name:</label>
            <input class="chatInput" type="text" name="name" value="<?php echo $full_name; ?>" readonly required>

            <input class="chatInput" type="submit" value="Join Group">
        </form>
    </div>

        <div id="createGroupModal" class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Create a Group</h3>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> -->
                        <!-- <span aria-hidden="true">&times;</span> -->
                    </button>
                </div>
                <div class="modal-body">
                    <form action="create_gc.php" method="post">
                        <div class="form-group">
                            <label for="group_name">Group Name:</label>
                            <input class="chatInput" type="text" class="form-control" name="group_name" required>
                        </div>
                        <div class="form-group">
                            <label for="group_code">Group Code:</label>
                                <input class="chatInput" type="text" class="form-control" name="group_code" id="groupCode" required readonly>
                            <label for="id_number">ID Number:</label>
                                <input class="chatInput" type="text" name="id_number" value="<?php echo $Id_Number ?>" readonly>

                            <label for="name">Name:</label>
                                <input class="chatInput" type="text" name="name" value="<?php echo $full_name; ?>" readonly required>

                            <label for="department">Department:</label>
                                <input class="chatInput" type="text" name="department" value="<?php echo $user_department; ?>" readonly>

                            <label for="year">Year:</label>
                                <input class="chatInput" type="text" name="year" value="<?php echo $_SESSION['year']; ?>" readonly>

                            <label for="year_section">Section:</label>
                                <input class="chatInput" type="text" name="yr_section" value="<?php echo $_SESSION['yr_section']; ?>" readonly>
                        </div>
                        <button style="margin-left: 40px" type="submit" class="btn btn-primary">Create Group</button>
                        <a href="admin_groupchat.php" class="btn btn-primary">Go back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <button id="createGroupButton" class="btn btn-success">Create Group</button>


    <!-- Add this JavaScript code just before the closing </body> tag -->
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
