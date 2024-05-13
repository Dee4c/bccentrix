<?php
include("sidebar.php");

// Include the session.php file that sets the department in the session
// include("session.php");
// Get the user's department from the session
$user_department = $_SESSION['department'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Founder Information Form</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="postmainlink/design.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
    
    <style>
         body {
            background:linear-gradient(#b3dcd6, #5cb6bd);
            position: fixed;
            font-family: 'Outfit', sans-serif;
            text-align: center;
        }

        .foundercontainer{
            margin: 0 auto;
            margin-top: 90px;
        }

        h2 {
            margin-bottom: 20px;
        }

        .founder {
            max-width: 380px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            /* background-color: #f4f4f4; */
            background:linear-gradient(#05A3B5, #DAEBC7);
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        select, .founderinput[type="text"], .founderinput[type="date"] {
            width: 80%;
            padding: 5px;
            margin-bottom: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .founderinput[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            padding: 10px 20px;
            cursor: pointer;
        }

        .founderinput[type="submit"]:hover,[type="reset"]:hover {
            background-color: #0056b3;
        }

        .founderinput[type="reset"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            padding: 10px 20px;
            cursor: pointer;
        }

        
        .bagologo{
            position: absolute;
            width: 90px;
            height: 70px;
            left: 500px;
            margin-top: -10px;
        }

        .sasologo{
            position: absolute;
            width: 60px;
            height: 60px;
            right: 520px;
            margin-top: -10px;
        }

        @me

        @media(max-width:600px){
            .foundercontainer{
                margin: 0 auto;
                margin-top: 20px;
                width:290px;
                font-size: 10px;
            }

            .foundercontainer h2 {
                margin-top: 90px;
                font-size: 22px;
                display: inline-block;
                text-align: center;
                margin-right: 50px;
                margin-left: 50px;
                
            }
            
        }
    </style>
</head>
<body>

<div class="foundercontainer">
<img class="bagologo" src="includes/Bago-removebg-preview.png">
<img class="sasologo" src="includes/sasologo-removebg-preview.png">
    <h2>Founder Information Form</h2>
<div class="formcontainer" >
    <form class="founder" method="post" action="process_founder.php">

        <label for="id_number">ID Number:</label>
        <input class="founderinput" type="text" name="id_number" value="<?php echo $Id_Number ?>" readonly>

        <label for="name">Name:</label>
        <input class="founderinput" type="text" name="name" value="<?php echo $full_name; ?>" readonly required>

        <!-- Automatically set the department from the session -->
        <label for="department">Department:</label>
        <input class="founderinput" type="text" name="department" value="<?php echo $user_department; ?>" readonly>

        <label for="year">Year & Section:</label>
        <input class="founderinput" type="text" name="year" value="<?php echo $_SESSION['year']; ?><?php echo' - '?><?php echo $_SESSION['yr_section']; ?>" readonly>
        
        <label for="mobile">Mobile Number:</label>
        <input class="founderinput" type="text" name="mobile" required maxlength="11" pattern="[0-9]{11}">

        <label for="found_date">Date:</label>
        <input class="founderinput" type="date" name="found_date" required>

        <label for="found_item">Item Found:</label>
        <input class="founderinput" type="text" name="found_item" required>

        <input class="founderinput" type="submit" value="Submit">
        <input class="founderinput" type="reset" value="Reset">
    </form>
    </div>
</div>
</body>
</html>
