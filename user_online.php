<?php
include("dbconn.php"); // Replace with your database connection code

// $window = 10000000; // 115days window in seconds

$query = "SELECT * FROM user WHERE is_active = 'Active now'";
$result = mysqli_query($conn, $query);


echo  "<ul class=\"user_online\"> <div class=\"userTitle\">Online Users:</div>";
while ($row = mysqli_fetch_assoc($result)) {
    $fullName = $row["fname"] . " " . $row["lname"];
    $profilePicture = $row["image_path"];
    echo "<li><div class=\"online_list\">
                     <div class=\"online_icon\">
                         <img src=\"" . $profilePicture . "\" alt=\"\">
                      </div>
                 <p class=\"online_name\">". $fullName. "</p>
          </div>
        </li>";
}
echo "</ul>";
?>
 <!-- <div class="online_list">
                    <div class="online_icon">
                        <img src="images/member-2.png" alt="">
                    </div>
                    <p>Izhan Farhan</p>
                </div> -->

<style>

        .user_online {
            list-style: none; 
            margin: 0;
            cursor: pointer;
              
        }

        .userTitle {
            margin-left: 20px;
            margin-top: 20px;
            margin-bottom:20px;
            font-size: 18px;
            font-weight: bold;
        }

            .online_list {
            display: flex;
            align-items: center;
            margin-top: 2px;
            margin-left: 13px;
            padding: 5px;
            
        }
        .online_list:hover {
            background: lightgrey;
            border-radius: 10px;
            width: 240px;
            height: 45px;
        }


            .online_name {
            font-size: 15px;
            font-weight: bold;
            margin: 0;
        }

        .online_list .online_icon img {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            margin: 0;
        }

        .online_list .online_icon {
            width: 40px;
            border-radius: 50%;
            margin-right: 10px;
            margin: 0;
               
        }

        .online_list .online_icon::after {
            top: unset;
            bottom: 0;
        }

        .online_icon {
            position: relative;
           
        }

        .online_icon::after {
            content: ' ';
            width: 13px;
            height: 13px;
            background-color: #41db51;
            border-radius: 50%;
            border: 2px solid #fff;
            position: absolute;
            top: 0;
            right: 0;
        }

       
   
    </style>




