<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="jGrowl/jquery.jgrowl.css" rel="stylesheet" media="screen"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
	<script src="js/jquery-1.9.1.min.js"></script>
	<?php include('dbconn.php'); ?>

    <style>

body {
    background: linear-gradient(to bottom, #0f0c29, #302b63, #24243e);
    margin: 0;
	padding: 0;
	display: flex;
	justify-content: right;
	align-items: center;
	min-height: 100vh;
	font-family: 'Jost', sans-serif;
    }

    .container {
      padding: 20px;
      margin-right: 100px;
      text-align: center;
      color: white;
      position: absolute;
      top: 5;
      width: 350px;
	  height: 450px;
	  overflow: hidden;
	  /* background: url("https://doc-08-2c-docs.googleusercontent.com/docs/securesc/68c90smiglihng9534mvqmq1946dmis5/fo0picsp1nhiucmc0l25s29respgpr4j/1631524275000/03522360960922298374/03522360960922298374/1Sx0jhdpEpnNIydS4rnN4kHSJtU1EyWka?e=view&authuser=0&nonce=gcrocepgbb17m&user=03522360960922298374&hash=tfhgbs86ka6divo3llbvp93mg4csvb38") no-repeat center/ cover; */
	  border-radius: 10px;
	  box-shadow: 5px 20px 50px #000;
} 
.first-bannertext{
    width: 60%;
    justify-content: left;
    height: 400px;
    margin: 150px 30px 35px 80px;
    margin-right: 500px;
    Color: white;
    font-size: 40px;
    font-weight: bold;
}
.first-bannertext p{
    font-size: 40px;
    color: white;
    margin: -10px 0px 0px 50px;
}
.first-bannertext h1{
    font-size: 80px;
    color: #1877F2;
    padding: 60px 70px 0px 50px;
    margin-top: -20px;
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
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      box-sizing: border-box;
    }

    .btn {
      width: 100%;
      padding: 10px;
      background-color: #2941c9;
      color: white;
      border: none;
      cursor: pointer;
    }

    .btn:hover {
      background-color: #def703e0;
    }

    .logo-container {
      display: flex;
      justify-content: space-between;
      margin-bottom: 20px;
    }

    .logo {
      width: 70px; 
      padding: 10px;
      height: 70px; 
    }

    .admin-button {
    margin-top: 0px;
    width: 60px;
    height: 60px;
    cursor: pointer;
    }

    /* Define custom styles for the access-granted theme */
    .jGrowl.access-granted .jGrowl-header {
    font-size: 20px;
    font-weight: bold;
    background-color: #4CAF50; /* Green background color */
    color: white; /* Text color */
    padding: 10px;
    border-radius: 5px;
    margin-bottom: 10px;
    }

    .jGrowl.access-granted .jGrowl-message {
    font-size: 50px;
    padding: 10px;
    background-color: #def703e0; /* Custom background color */
    color: #000; /* Text color */
    border-radius: 5px;
    }

    /* Style for the Sign in button */
    button[name="login"] {
    background-color: #4CAF50; /* Default background color */
    color: white; /* Default text color */
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px; /* Adjust the font size here */
    font-weight: bold; /* Make the font bold */
    transition: background-color 0.3s ease; /* Add transition for smooth hover effect */
    }

    /* Hover effect */
    button[name="login"]:hover {
    background-color: #388e3c ; /* Change background color to red on hover */
    }

    @media (max-width: 600px){
                    .first-bannertext{
                        display: none;
                    }
                    .container{

                        width: 290px;
                        left: 28px;
                        height: 470px;
                        top: 80px;
                    }

                    .admin-name{
                        position: absolute;
                        bottom: 10px;
                        font-size: 11px;
                        left: 127px;
                    }
                }

  </style>
</head>
<div class="first-bannertext">
                <h1>BCCentrix</h1>
                <p>A new social media experience for BCCians </p>
            </div>
<body>
<div class="container">
    <div class="logo-container">
    
    <img src="includes/newlogo.png" alt="Logo 1" class="logo" />
      <img src="includes/Bago-removebg-preview.png" alt="Logo 2" class="logo" />
    </div>
<form id="login_form"  method="post">
        <input type="text"  id="username" name="username" placeholder="Username" required><br>
        <input type="password" id="password" name="password" placeholder="Password" required><br>
        <input style=" margin-bottom: 40px;"type="checkbox" onclick="myFunction()">Show Password<br>
        <!-- <input type="password" id="unique_code" name="unique_code" placeholder="Unique Code" required><br>
        <input type="checkbox" onclick="myCode()">Show Unique Code<br> -->
        <button name="login" type="submit">Log in</button>
        <p>Don't have an account? <a href="register_user.php">Create Account</a></p>
        </form>
    <a href="admin.php">
    <img src="includes/iconforadmin.png" alt="Admin" class="admin-button"></a><br>
    <label class="admin-name" for="">Log in as Admin</label><br/>

        <script src="script.js"></script>
		
		      </form>
          <script>
         jQuery(document).ready(function() {
        jQuery("#login_form").submit(function(e) {
            e.preventDefault();
            var formData = jQuery(this).serialize();

            $.ajax({
                type: "POST",
                url: "login.php",
                data: formData,
                success: function(response) {
                    if (response === 'admin_denied') {
                        $.jGrowl("Access Denied for Admin User!", {
                            header: 'Login Failed'
                        });
                    } else if (response === 'true') {
                        $.jGrowl("Welcome BCCian!", {
                            header: 'Access Granted',
                            theme: 'access-granted'
                        });

                        var delay = 2000;
                        setTimeout(function() {
                            window.location = 'announcement.php';
                        }, delay);
                        
                    }  else if (response === 'pending_approval') {
                        $.jGrowl("The admin has not approve or reject your request yet.Please wait for the approval.", {
                            header: 'Account Status',
                            theme: 'pending-approval'
                        });
                    } else if (response === 'rejected') {
                        $.jGrowl("Sorry,your request for creating an account has been declined by the admin.", {
                            header: 'Account Declined',
                            theme: 'account-declined'
                        });
                    } else if (response === 'deactivated') {
                        $.jGrowl("SORRY, YOU HAVE BEEN DEACTIVATED BY THE ADMIN DUE TO THE VIOLATIONS OF BCCentrix's GUIDELINES AND POLICIES.", {
                            header: 'Account Status',
                            theme: 'account-deactivated'
                        });
                    } else {
                        $.jGrowl("Please Check your username and Password", {
                            header: 'Login Failed'
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