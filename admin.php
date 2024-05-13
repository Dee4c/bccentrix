<!DOCTYPE html>
<html>
<head>
  <link href="jGrowl/jquery.jgrowl.css" rel="stylesheet" media="screen"/>
	<script src="js/jquery-1.9.1.min.js"></script>
	<?php include('dbconn.php'); ?>
  <title>Bccentrix Registration</title>
  <style>

body {
      background: linear-gradient(to bottom, #0f0c29, #302b63, #24243e);
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      font-family: 'Jost', sans-serif;
    }

    .container {
      width: 300px;
      padding: 20px;
      text-align: center;
      color: white;
      background-color: #C5B951;
      position: absolute;
      top: 5;
      width: 350px;
      height: 500px;
      background: red;
      overflow: hidden;
      background: url("https://doc-08-2c-docs.googleusercontent.com/docs/securesc/68c90smiglihng9534mvqmq1946dmis5/fo0picsp1nhiucmc0l25s29respgpr4j/1631524275000/03522360960922298374/03522360960922298374/1Sx0jhdpEpnNIydS4rnN4kHSJtU1EyWka?e=view&authuser=0&nonce=gcrocepgbb17m&user=03522360960922298374&hash=tfhgbs86ka6divo3llbvp93mg4csvb38") no-repeat center/ cover;
      border-radius: 10px;
      box-shadow: 5px 20px 50px #000;
    } 

    .background-container {
      position: absolute;
      top: 0;
      left: -340px; 
      width: 100%;
      height: 100%;
    }
    
    .background {
      width: 100%;
      height: 100%;
      object-fit: cover;
      background-color: #3F698F;
    }
    
    input[type="text"],
    input[type="password"] {
      width: 80%;
      padding: 10px;
      margin-bottom: 10px;
      box-sizing: border-box;
    }

    .btn {
      width: 180px;
      padding: 10px;
      margin-bottom: 10px;
      background-color: #4CAF50;
      color: white;
      border: none;
      cursor: pointer;
    }

    .btn:hover {
      background-color: #388e3c;
    }

    .logo-container {
      display: flex;
      justify-content: space-between;
      margin-bottom: 20px;
    }

    .logo {
      width: 70px; 
      padding: 10px;
      height: auto; 
    }

    .back-button {
    width: 50px;
    height: 50px;
    cursor: pointer;
    }

    </style>
</head>
<body>
  <div class="container">
    <div class="logo-container">
      <img src="includes/newlogo.png" alt="Logo 1" class="logo" />
      <img src="includes/Bago-removebg-preview.png" alt="Logo 2" class="logo" />
    </div>
    <h2>Admin Login</h2>
    <form id="admin_login_form" action="admin_login.php" method="POST">
    <input type="text" id="username" name="username" placeholder="Username" required><br>
    <input type="password" id="password" name="password" placeholder="Password" required><br>
    <input type="checkbox" onclick="myFunction()">Show Password
    <input type="password" id="unique_code" name="unique_code" placeholder="Unique Code" required><br>
    <input type="checkbox" onclick="myCode()">Show Unique Code<br>
    <input type="submit" name="submit" value="Log in as admin" class="btn">
    </form>

      <br>
      <a href="index.php">
    <img src="includes/backicon.png" alt="Back" class="back-button">
        </a>
    </form>
    
  </div>
  <script src="script.js"></script>
  <script>
    jQuery(document).ready(function() {
        jQuery("#admin_login_form").submit(function(e) {
            e.preventDefault();
            var formData = jQuery(this).serialize();

            $.ajax({
                type: "POST",
                url: "admin_login.php", // Update the URL to your admin login processing script
                data: formData,
                success: function(response) {
                    if (response === 'admin_success') { // Check for 'admin_success'
                        $.jGrowl("Welcome Admin!", {
                            header: 'Admin Access Granted',
                            theme: 'access-granted'
                        });

                        var delay = 2000;
                        setTimeout(function() {
                          window.location = 'reports.php'; // Update to your admin dashboard page
                        }, delay);
                    } else if (response === 'admin_denied') { // Check for 'admin_denied'
                        $.jGrowl("Access Denied only for Admin User!", {
                            header: 'Admin Login Failed'
                        });
                    } else {
                        $.jGrowl("Please Check your Admin username and Password", {
                            header: 'Admin Login Failed'
                        });
                    }
                }
            });
            return false;
        });
    });
</script>


<?php include('scripts.php');?>

</body>
</html>
