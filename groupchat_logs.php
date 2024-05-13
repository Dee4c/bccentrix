<?php
include("sidebar.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="postmainlink/design.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>GroupChat Logs</title>
    <style>
        body {
            background:linear-gradient(to left, #B9D9CF, #85CDFF);
        }

        .container {
            background:linear-gradient( #38AECC, #B9D9CF, #022F40);
            text-align: center;
            width: 60%;
            height: 75%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-top: 100px;
            margin-left: 380px;
        }

        .log-box {
            width: 70%;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-top: 20px;
            height: 300px; /* Set a fixed height */
            overflow-y: scroll;
            background:#c5c6d0;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column-reverse; /* Reverse message order */
            align-items: center; /* Center items horizontally */
            margin-left: 120px;
        }

        /* .owner-message,
        .user-message {
            margin: 5px;
            padding: 10px;
            border-radius: 8px;
            max-width: 70%;
            word-wrap: break-word;
        } */

        .owner-message {
            position: absolute;
            background-color: #e74c3c;
            color: #fff;
            align-self: flex-end;
            left: 730px;
            bottom: 500px;
            margin: 5px;
            padding: 10px;
            border-radius: 8px;
            width: 200px;
          
        }

        .user-message {
            background-color: #3498db;
            color: #fff;
            align-self: flex-start;
            margin-left: 90px;
            margin: 5px;
            padding: 10px;
            border-radius: 8px;
            max-width: 100%;
            word-wrap: break-word;
            
        }

        .user-list {
            margin-top: 10px;
        }

        /* h1, h2 {
            color: #333;
        } */

        .button-container {
            margin-top: 10px;
            width: 35%;
            margin-left: 280px;
        }

        .group-chat-link {
            display: block;
            padding: 10px;
            background-color: #0e4c92;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .group-chat-link:hover {
            background-color: #2980b9;
        }
        @media(max-width: 750px){
            .container {
            background:linear-gradient( #38AECC, #B9D9CF, #022F40);
            width: 100%;
            height: 75%;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-top: 100px;
            margin-left: 0;
        }
        .log-box {
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-top: 50px;
            height: 300px; /* Set a fixed height */
            overflow-y: scroll;
            background:#c5c6d0;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column-reverse; /* Reverse message order */
            align-items: center; /* Center items horizontally */
            margin-left: 0px;
        }

        .owner-message {
            position: absolute;
            background-color: #e74c3c;
            color: #fff;
            align-self: flex-end;
            left: 90px;
            bottom: 445px;
            margin: 5px;
            padding: 10px;
            border-radius: 8px;
            width: 200px;
          
        }

        .button-container {
            margin-top: 30px;
            width: 35%;
            margin-left: 120px;
        }

        }

    
    </style>
</head>
<body>
    <div class="container">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id']) && isset($_GET['user'])) {
            $groupId = $_GET['id'];
            $joinedUser = $_GET['user'];

            // Connect to your MySQL database
            $connection = mysqli_connect("localhost", "root", "", "prac");

            if ($connection === false) {
                die("Error: Could not connect to the database. " . mysqli_connect_error());
            }

            // Retrieve the group name and owner name
            $query = "SELECT group_name, name as owner_name FROM groups WHERE id = ?";
            
            if ($stmt = mysqli_prepare($connection, $query)) {
                mysqli_stmt_bind_param($stmt, "i", $groupId);
                if (mysqli_stmt_execute($stmt)) {
                    mysqli_stmt_bind_result($stmt, $groupName, $ownerName);
                    mysqli_stmt_fetch($stmt);
                    mysqli_stmt_close($stmt);
                    echo "<span style=\"font-size:30px;\">$groupName Group!</span>";
                } else {
                    echo "Error executing the query: " . mysqli_error($connection);
                }
            } else {
                echo "Error preparing the statement: " . mysqli_error($connection);
            }

            // echo "<h2>Owner of the Group Chat:</h2>";
            echo "<div class='owner-message'>$ownerName (Owner)</div>";

            mysqli_close($connection);
            }
        ?>
        <div class="users-joined">
            <p style="font-size: 20px; margin-top: 45px;">Users who joined: </p>
        </div>
        <div class="log-box">
        <?php
        if (isset($_GET['id'])) {
            $groupId = $_GET['id'];
            
            // Connect to your MySQL database
            $connection = mysqli_connect("localhost", "root", "", "prac");

            if ($connection === false) {
                die("Error: Could not connect to the database. " . mysqli_connect_error());
            }

            // Retrieve and display all users who joined the group chat
            $joinLogQuery = "SELECT name, join_timestamp FROM group_members WHERE group_id = ? ORDER BY join_timestamp ASC";
            if ($stmt = mysqli_prepare($connection, $joinLogQuery)) {
                mysqli_stmt_bind_param($stmt, "i", $groupId);
                if (mysqli_stmt_execute($stmt)) {
                    mysqli_stmt_bind_result($stmt, $userName, $joinTimestamp);

                    echo "<div class='user-list'>";
                    while (mysqli_stmt_fetch($stmt)) {
                        echo "<div class='user-message'>$userName (Joined on $joinTimestamp)</div>";
                    }
                    echo "</div>";
                } else {
                    echo "Error retrieving join log: " . mysqli_error($connection);
                }
                mysqli_stmt_close($stmt);
            } else {
                echo "Error preparing the join log statement: " . mysqli_error($connection);
            }

            mysqli_close($connection);
        }
        ?>
    </div>
    <div class="button-container">
        <a href="joined_group.php?id=<?php echo $groupId; ?>&user=<?php echo urlencode($joinedUser); ?>" class="group-chat-link">Go to Group Chat</a>
    </div>
</div>
</body>
</html>
