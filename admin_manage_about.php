
<?php include 'dbconn.php';
     include 'adminsession.php'; 
?> 

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
</head>

<style>
	
        /* #alert {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #4CAF50;
            color: #fff;
            text-align: center;
            padding: 10px;
            z-index: 1000;
        }
     */
        .container-fluid {
            width: 100%; /* Make the textarea full-width */
            height: 100%; /* Adjust the height as needed */
            resize: vertical; /* Allow vertical resizing */
            /* border: 2px solid #ccc; Add a border style and color */
            border-radius: 10px; /* Adjust border radius for rounded corners */
            padding: 10px; /* Add padding inside the textarea */
            font-family: 'Arial', sans-serif;
            font-size: 15px;
		}


    .update{
           margin-top:10px;
           margin-left:77%;
            width: 50px;
            height: 30px;
            background-color: #13737b;
            font-size: 11px;
            /* font-weight: bold; */
            text-align: center:
            cursor: pointer;
            border: 2px solid #13737b;
            color: white;
            margin-right: 5px;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s
        }

        .cancel1{
            width: 50px;
            height: 30px;
            background-color: grey;
            font-size: 11px;
            /* font-weight: bold; */
            text-align: center:
            cursor: pointer;
            border: 2px solid grey;
            color: white;
            
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s
        }

        .submit:hover {
        background-color: #536d6e;
        color: #fff;
        border: 2px solid #536d6e;
        }

        .cancel:hover {
        background-color: #536d6e;
        color: #fff;
        border: 2px solid #536d6e;
        }

        .form-control{
           height:40px;
           font-size: 15px;
        }

        .custom-select{
           height:40px;
           font-size: 15px;
        }

        .text-muted {
            font-size: 17px;
        }

    </style>

<body>
<div class="container-fluid">
    <div style=" font-size: 24px;"> Manage Profile </div>
    <hr>
	<form action="admin_update.php" method="post">
		<div class="col-lg-12" >
					<div id="msg"></div>
					<div class="row" >
						<div class="form-group col-md-6" >
							<input type="text" class="form-control" placeholder="First name" name='new_fname' value="<?php echo $_SESSION['fname'] ?>">
						</div>
						<div class="form-group col-md-6">
							<input type="text" class="form-control" placeholder="Last name" name='new_lname' value="<?php echo $_SESSION['lname'] ?>">
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-12">
							<input type="text" class="form-control" placeholder="Username" name='new_username' value="<?php echo $_SESSION['admin_username'] ?>">
						</div>
					</div>
					<!-- <div class="row">
						<div class="form-group col-md-12">
							<input type="password" class="form-control" placeholder="Password" name='new_password' value="<?php echo $_SESSION['password'] ?>">
							<small><i style="font-size: 15px;">Leave this blank if you dont want change your password</i></small>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-12">
							<input type="password" class="form-control" placeholder="Confirm Password" name='cpass' value="<?php echo $_SESSION['password'] ?>">
							<small id="pass_match" data-status=''></small>
						</div>
					</div> -->
        
                    <div class="row">
						<div class="form-group col-md-12">
							<input type="text" class="form-control" placeholder="Mobile Number" name='contact_number' value="<?php echo $_SESSION['contact_number'] ?>">
						</div>
					</div>
                    <div class="row">
						<div class="form-group col-md-12">
							<input type="text" class="form-control" placeholder="Address" name='location' value="<?php echo $_SESSION['location'] ?>">
						</div>
					</div>
                    <div class="row">
						<div class="form-group col-md-12">
							<input type="text" class="form-control" placeholder="Describe Yourself" name='bio' value="<?php echo $_SESSION['bio'] ?>">
						</div>
					</div>
                    
					<b><small class="text-muted" ><b style="color: black;">Birthdate</b></small></b>
					<div class="row">
						<div class="form-group col-md-4">
<!-- <select  name="dob" class="custom-select">
								<?php
									$month = array("","Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sept","Oct","Nov","Dec");
									for($dob = 1 ; $dob <= 12;$dob++):
								?>
								<option value="<?php echo $dob ?>" <?php echo $dob == abs(date("m",strtotime($_SESSION['dob']))) ? "selected" : '' ?>><?php echo ucwords($month[$dob]) ?></option>
							<?php endfor; ?>
							</select>
						</div>
						<div class="form-group col-md-4">
							<select  name="dob"  class="custom-select">
								<?php
									for($dob = 1 ; $dob <= 31;$dob++):
								?>
								<option value="<?php echo $dob ?>" <?php echo $dob == abs(date("d",strtotime($_SESSION['dob']))) ? "selected" : '' ?>><?php echo $dob ?></option>
							<?php endfor; ?>
							</select>
						</div>
						<div class="form-group col-md-4">
							<select  name="dob" class="custom-select">
								<?php
									for($dob = abs(date('Y')) ; $dob >= abs(date('Y',strtotime($_SESSION['dob']))) - 100;$dob--):
								?>
								<option value="<?php echo $dob ?>" <?php echo $dob == abs(date("Y")) ? "selected" : '' ?>><?php echo $dob ?></option>
							<?php endfor; ?>
</select>  -->
                      <input class="form-control"  type="date" id="selectedDate" name="dob" value="<?php echo $_SESSION['dob'] ?>">  
					</div>
					</div>
					<b><small class="text-muted"><b style="color: black;">Gender</b></small></b>
					<div class="row">
						<div class="form-group col-md-4">
							<div class="d-flex w-100 justify-content-between p-1 border rounded align-items center">
								<label for="gfemale">Female</label>
								<div class="form-check d-flex w-100 justify-content-end">
					             	<input class="form-check-input" type="radio" checked="" id="gfemale" name="gender" value="Female" <?php echo $_SESSION['gender'] == "Female" ? "checked" : '' ?>>
					            </div>
							</div>
			            </div>
			            <div class="form-group col-md-4">
							<div class="d-flex w-100 justify-content-between p-1 border rounded align-items center">
								<label for="gmale">Male</label>
								<div class="form-check d-flex w-100 justify-content-end">
					             	<input class="form-check-input" type="radio" id="gmale" name="gender" value="Male"  <?php echo $_SESSION['gender'] == "Male" ? "checked" : '' ?>>
					            </div>
							</div>
			            </div>
					</div>
		</div>	
        <div class="footer">
        <input class="update" type="submit" name="submit" onclick="updateForm()" value="Save" >
        <input class="cancel1" type="button" value="Cancel" data-dismiss="modal">
      </div>					
	</form>
</div>

<script>
        function saveDate() {
            // Get the selected date from the input element
            var selectedDate = document.getElementById("selectedDate").value;

            // Do something with the selected date (e.g., save it to a variable, send it to a server, etc.)
            console.log("Selected Date:", selectedDate);
        }
    </script>

<!-- <div id="alert"></div>

<script>
    function updateForm() {
        // Your form update logic goes here

        // Display the alert
        document.getElementById("alert").innerText = "Form updated successfully!";
        document.getElementById("alert").style.backgroundColor = "#4CAF50";
        document.getElementById("alert").style.display = "block";

        // Hide the alert after 3 seconds
        setTimeout(function () {
            document.getElementById("alert").style.display = "none";
        }, 3000);
    }
</script> -->

</body>
</html>






  


