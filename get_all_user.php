<?php
require("dbconn.php");
include("dashboard.php");

$searchQuery = isset($_GET['query']) ? $_GET['query'] : '';

try {
    $queryGetAllAccountsUsers = "SELECT * FROM `user` WHERE `approval_status` = 'accepted'"; 

    if (!empty($searchQuery)) {
        // Use "AND" to concatenate conditions when there is an existing WHERE clause
        $queryGetAllAccountsUsers .= " AND (fname LIKE '%$searchQuery%' OR lname LIKE '%$searchQuery%' OR year LIKE '%$searchQuery%' OR yr_section LIKE '%$searchQuery%' OR username LIKE '%$searchQuery%')";
    }

    $users = mysqli_query($conn, $queryGetAllAccountsUsers);
    ?>

<!DOCTYPE HTML>
<html>
<head>
    <title>USER MANAGEMENT</title>
    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <!-- custom css -->
    
    <style>

        body{
            background:linear-gradient(to left, #D1DFB7, #B9D9CF, #85CDFF);
        }
        .manage-container{
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .user-table {
            text-align: center;
            margin-left: 265;
            margin-top: 170px;
        }

        .user-table th{
            padding: 10px;
            background-color: #333333;
            color: white;
        }

        .user-table td{
            padding: 10px;
        }

        .search-container{
            position: absolute;
            bottom:78%;
            margin-left: 300px;
        }
        
        .button-search{
           position: absolute;
           bottom: 10%;
           margin-left: 120px;
           cursor: pointer;
        }
        
        .add-button-container{
            position: absolute;
           top: 16.3%;
           margin-left: 830px;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        
    </style>

    <body>
        
    <?php if(mysqli_num_rows($users) == 0) { ?>
        <p>No users found</p>
    <?php } else { ?>
    <div class="manage-container">
             <div class="add-button-container">
                 <button class="btn btn-primary " onclick="location.href='create.php'">Add</button>
                 <button class="btn btn-primary" onclick="location.href='deactivated_users.php'" style="background: #F63C41; border-color:#F63C41;" >Deactivated Accounts</button>
             </div>
              <form action="get_all_user.php" method="GET">
                    <div class="search-container">
                        <input type="text" class="form-control" placeholder="Search..." name="query" value="<?php echo htmlspecialchars($searchQuery); ?>">
                        <span class="button-search">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                </form>
        <!-- <div class="table-responsive"> -->
            <table class="user-table table-bordered table-striped ">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Year</th>
                        <th>Section</th>
                        <th>Username</th>
                        <!-- <th >Password</th> -->
                        <th>Unique Code</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $i = 0;
                while ($row = mysqli_fetch_assoc($users)) {
                    $i++;
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row['fname']; ?></td>
                        <td><?php echo $row['lname']; ?></td>
                        <td><?php echo $row['year']; ?></td>
                        <td><?php echo $row['yr_section']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <!-- <td><?php echo $row['password']; ?></td> -->
                        <td><?php echo $row['unique_code']; ?></td>
                        <td>
                            <a href="edit_user.php?user_id=<?php echo $row['user_id']; ?>" class='btn btn-success btn-sm edit-button' style="margin-right: 5px;">Edit</a>
                            <a href="view_user.php?user_id=<?php echo $row['user_id']; ?>" class="btn btn-info btn-sm view-button">View</a>
                        </td>
                        <td>
                        <a href="userdeactivation.php?user_id=<?php echo $row['user_id']; ?>"  onclick="changeColor(this)" style="background-color: red; color: white"class="btn btn-sm ">Deactivate</a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    

    <?php }

    } catch (\Throwable $th) {
        echo $th->getMessage(); // Display the error message
    }
    ?>

    <script>
    function goBack() {
        window.history.back();
    }

  
    function changeColor(a) {
        // Get the closest row to the clicked button
        var row = a.closest('tr');

        // Toggle the background color
        if (row.style.backgroundColor === '' || row.style.backgroundColor === 'white') {
            row.style.backgroundColor = '#FF4F4B' ;
        } else {
            row.style.backgroundColor = 'white';
        }
    }
    

    </script>


</body>

</html>