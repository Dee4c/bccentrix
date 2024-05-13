<?php
include ("dbconn.php"); // Include the database connection 
include "session.php";
// include "right_navbar.php";
// include 'user_online_list';
// Check if the logout button is pressed

if (isset($_POST['logout'])) {

    // Clear all session variables
    session_unset();
  
    // Destroy the session
    session_destroy();
  
    // Redirect to the login page or any other page you want after logout
    header("Location: index.php"); // Replace "login.php" with your login page URL
    exit();
  }
?>

<!-- <!DOCTYPE html> -->
<html >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BCCentrix</title>

<style> 
   /* Top Bar Styles */

        .top-bar {
            /* display: flex; */
            position: fixed;
            background: #004b57;
            width: 100%;
            height: 70px;
            z-index: 1;
           
            }
  
            .titlename {
            margin-left: 20px;
            font-size: 25px;
            margin-top: 0px;
            align-items: center;
            font-family: 'Poppins', sans-serif;
            }

            .user-info {
              /* position: fixed; */
            display: flex;
            align-items: center;
            padding: 8px;
            font-size: 16px;
            font-weight: BOLD;
            margin-left: 1100px;
            justify-content: center;
            color: #fff;
            }

         

            @media (max-width: 600px){

                    .top-bar{
                      width: 100%
                    }
                    .user-info{
                      margin-left: 305px;
                      margin-right: 0;
                    }
                    .welcome-text{
                      display: none;
                    }

                }

        .user-info .welcome-text {
            margin-right: 10px; /* Adjust the margin as needed */
            padding: 5px;
            }

        .logout-button {
            background-color: #4CAF50;
            color: black;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 85px;
            height: 40px;
            font-size: 15px;
            font-weight: BOLD;
            }

        /* Hover effect */
        .logout-button:hover {
        background-color: #B80F0A;
        }

        /* Adjust the position of the picontainer */
        .picontainer {
            position: relative;
            overflow: hidden;
            cursor: pointer;
            margin-top: 100px;
            margin-left: 250px;
            padding: 20px;
            transition: transform 0.2s; /* Add a smooth transition effect */
            display: flex; /* Use flexbox to control layout */
            flex-direction: column; /* Stack child elements vertically */
            margin-bottom: 20px; /* Reduce the margin at the bottom */
            
        }

        .profile-picture-picontainer {
            width: 55px;
            height: 55px;
            border-radius: 50%;
            /* border: 5px solid grey; */
            overflow: hidden;
            cursor: pointer;
           
        }

        .profile-picture {
            width: 100%;
            height: 100%;
            object-fit: cover;
            background-image: url('includes/user icon for ui.png');
            background-size: cover;
            border-radius: 50%;
            }

        /* Add a hover effect for the profile picture */
        /* .profile-picture-picontainer:hover {
            transform: scale(1.1); Scale up the picture on hover
            transition: transform 0.2s ease; Add a smooth transition
        } */

          .form-container {
            display: flex;
            position: absolute;
            max-height: 0;
            right: 0;
            margin-right: 10px;
            margin-top: 5px;
            overflow: hidden;
            transition: max-height 0.5s ease-in-out;
            border-radius: 8px;
            box-shadow: 0 5px 8px rgba(0, 0, 0, 0.3);
            }

          .form-container.open {
            max-height: 170px;
          }

          .card_toggle {
          padding: 10px;
          background: #fff;
          width: 250px; 
          height:170px; 
          border-radius: 8px; 
          }

          .card_toggle .setting_icon {
              width: 38px;
              margin-right: 10px;
            
          }

          .menu_profile{
              width: 45px;
              height: 45px;
              margin-right: 10px;
              border-radius: 50%;
          }

          .card_toggle .menu_toggle a {
              display: flex;
              align-items: center;
              justify-content: center;
              text-decoration: none;
              color: #000000;
              font-size: 15px;
          }
          .menu_toggle{
          display: flex;
          align-items: center;
          cursor: pointer;
          width: 100%;
          height: 50px;   
        }

          .menu_toggle:hover{
          width: 100%;
          height: 50px;
          background-color: rgb(0, 0, 0, 0.1); 
          border-radius: 10px;
          }

          hr {
          color: black; /* Change the color code to your desired color */
          margin: 20px 0;
          }

          .search_box {
          background: #efefef;
          width: 300px;
          border-radius: 20px;
          display: flex;
          align-items: center;
          padding: 0 15px;
          position: absolute;
          margin-top: 15px;
          margin-left: 750px;
      }


      .search_box .searchtext {
          width: 100%;
          background-color: transparent;
          padding: 10px;
          outline: none;
          border: none;
          border-radius: 20px;
      }

      .searchbtn{
          position: absolute;
          bottom: 10px;
          font-size: 20px;
          margin-left: 245px;
          display: flex;
          align-items: center;
          outline: none;
          border: none;
      }

      @media (max-width: 600px){
                    .search_box {
                      position: fixed;
                      display: flex;
                      align-items: center;
                      margin-left: 40px;
                      width: 200px;
                    }

                    .searchbtn{
                      margin-left: 150px;
                    }


                }

      #result-list {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: none;
            background: lightgrey;
            margin-top: 10px;
            width: 250px;
            border-radius: 10px;
            position: absolute; /* Initially hide the entire list */
          }

          #result-list li {
            height: 50px;
            padding: 10px;
            cursor: pointer;
            display: flex;
            align-items: center;
          }

          #result-list li img {
            border-radius: 50%;
            margin-right: 10px;
            width: 35px;
            height: 35px;
          }

          #result-list li:hover {
            background-color: #f5f5f5;
            width: 250px;
            height: 65px;
            border-radius: 10px;
          }

          .chat_icon{
            position: absolute;
            margin-left: 1070px;
            bottom: 20px;
            justify-content: center;
            margin-top: 200px;
            font-size: 35px;
            color: lightgrey;
            /* background: black; */
            border-radius: 10px;
            
          }

          .icon_badge{
            font-size: 15px;
            position: absolute;
            background: red;
            border-radius: 50%;
            min-width: 20px;
            height: 20px;
            color: white;
            bottom: 20px;
            left: 25px;
            text-align: center;
          }

          @media(max-width: 750px){
   .chat_icon{
            position: absolute;
            display: flex;
            margin-left: 250px;
            bottom: 20px;
            justify-content: center;
            margin-top: 200px;
            font-size: 35px;
            color: lightgrey;
            /* background: black; */
            border-radius: 10px;
            
          }

  .icon_badge{
            font-size: 15px;
            position: absolute;
            background: red;
            border-radius: 50%;
            min-width: 20px;
            height: 20px;
            color: white;
            bottom: 20px;
            left: 25px;
            text-align: center;
          }

          .profile-picture-picontainer {
            position: absolute;
            top: 10px;
            width: 45px;
            height: 45px;
            border-radius: 50%;
            /* border: 5px solid grey; */
            overflow: hidden;
            cursor: pointer;
           
        }

        .profile-picture {
            width: 100%;
            height: 100%;
            object-fit: cover;
            background-image: url('includes/user icon for ui.png');
            background-size: cover;
            border-radius: 50%;
            }
          }

</style>
  </head>

<body>


<div class="top-bar">
  <div class="titlename">
    <!-- <p>BCCentrix Bago City College Social Media </p> -->
  </div>

  <div class="chat_icon" id="updateButton">
    <a href="chatpage.php" style=" color: lightgrey;">
        <span><ion-icon name="chatbubbles"></ion-icon></span>
    </a>
        <span class="icon_badge" id="show_notif">0</span>
      </div>
  <div class="search_box" style="">
  <!-- <span><ion-icon name="chatbubbles-outline"></ion-icon></span> -->
<form action="search_function.php" method="get" >
                <input class="searchtext" type="text" name="search"  id="searchInput" onkeyup="searchFunction()" placeholder="Search" autocomplete="off" required="">
                <button class="searchbtn" type="submit">
                  <i class="fas fa-search"></i>
                </button> 
                <ul id="result-list">
                        <?php
                        include 'dbconn.php';
                        $sql = "SELECT fname, lname, image_path FROM user";
                        // $conn->close();

                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            // Output data of each row
                            while($row = $result->fetch_assoc()) {
                                $fullName = $row["fname"] . " " . $row["lname"];
                                $profilePicture = $row["image_path"];
                                echo "<li onclick='selectName(\"" . $fullName . "\")'><img src=\"" . $profilePicture . "\" alt=\"Profile Picture\">" . $fullName . "</li>";
                            }
                        } else {
                            echo "0 results";
                        }
                        ?>
                    </ul>
                   
                </form>
</div>
 
  
 
  <script>
    function searchFunction() {
      var input, filter, ul, li, a, i;
      input = document.getElementById('searchInput');
      filter = input.value.toUpperCase();
      ul = document.getElementById('result-list');
      li = ul.getElementsByTagName('li');

      // Display the entire list if the search input is empty
      if (filter === '') {
        ul.style.display = 'none';
        for (i = 0; i < li.length; i++) {
          li[i].style.display = 'none';
        }
        return;
      }

      // Show the entire list
      ul.style.display = 'block';

      // Loop through all list items, and hide those that don't match the search query
      for (i = 0; i < li.length; i++) {
        a = li[i];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
          li[i].style.display = '';
        } else {
          li[i].style.display = 'none';
        }
      }
    }

    function selectName(name) {
      document.getElementById('searchInput').value = name;
      document.getElementById('result-list').style.display = 'none'; // Hide the list after selecting a name
    }
  </script>
 
 <div class="user-info">
        <div class="welcome-text">Welcome <?php echo isset($_SESSION['fname']) ? $_SESSION['fname'] : 'User'; ?>!</div>
           <div class="profile-picture-picontainer">
                    <img class="profile-picture"  onclick="toggleForm()" src="<?php echo $_SESSION['profile_picture'] ?>" alt="">
            </div>
            <!-- <button id="logoutButton">Logout</button> -->
         </div>

         <div id="myForm" class="form-container" >
           <div  class="card_toggle">
             <div  class="menu_toggle" >
                <a href="profile.php">
                    <img src="<?php echo $_SESSION['profile_picture'] ?>"  class="menu_profile" alt="">
                    <span href="profile.php" ><?php echo $_SESSION['fname']; ?><?php echo ' ' ?><?php echo $_SESSION['lname'];?> <img src="images/arrow.png" alt="" width="10px"></span>
                 </a>                    
            </div>
                <hr>
            <div class="menu_toggle" id="logoutButton" style="margin-top: 15px;"  >
                    <img src="uploads/logout.png"  class="setting_icon" alt="">
                    <span>Logout <img src="uploads/arrow.png" alt="" style="margin-left:100px" width="10px"></span> 
            </div>
            <!-- <div class="menu_toggle" style="margin-top: 5px;" >
                    <img src="uploads/logout.png" class="setting_icon" alt="">
                    <span>Logout <img src="uploads/arrow.png" alt="" style="margin-left:100px" width="10px"></span> 
            </div> -->
          </div>
        </div>

      
</div>


        
<script>

// Logout button
const logoutButton =  document.getElementById('logoutButton');
logoutButton.addEventListener('click', () => {
    const confirmed = confirm('Are you sure you want to log out?');
    if (confirmed) {
        window.location.href = 'index.php';
    }
});

function toggleForm() {
    var formContainer = document.getElementById('myForm');
    formContainer.classList.toggle('open');
  }

</script>

<script>
    // Function to handle the button click and perform the update
    function handleUpdate() {
        // You can perform any necessary updates here
        var updatedContent = "This content has been updated.";

        // Update the content of the div
        document.getElementById("updateButton").innerHTML;

        // Additionally, you can send an AJAX request to the server to update data there
        // Example using fetch API
        fetch('notifdata.php', {
            method: 'POST',
            body: JSON.stringify({ updatedContent: updatedContent }),
            headers: {
                'Content-Type': 'application/json'
            }
        });
    }

    // Attach the handleUpdate function to the button click event
    document.getElementById("updateButton").addEventListener("click", handleUpdate);
</script>

<script> 

  //  const notify_label = document.getElementById('show_notif');

      
  //      let xhr = new XMLHttpRequest();

  //      function notify_me() {
  //         xhr.open('GET', 'select.php', true);

  //         xhr.send();
          
  //         xhr.onload = ()=>{
  //             if (xhr.status == 200) {
  //                  let get_data = JSON.parse(xhr.responseText);

  //                  if (get_data == get_data){
  //                     notify_label.innerHTML = get_data;
  //                  }
  //                  else{
  //                     notify_btn.innnerHTML +=get_data;
  //                  }
  //             }
  //         }
  //      }

  //      window.onload = () => {
  //         notify_me();

  //         setInterval(()=>{
  //             notify_me();
  //         }, 1000);
          
  //      }

</script>


<script>
function updateCount() {
    // Make an asynchronous request to fetch the count from the server
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Update the content with the new count
            document.getElementById("show_notif").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "select.php", true);
    xhttp.send();
}

// Update the count initially
updateCount();

// Set up the interval to update the count every 5 seconds (5000 milliseconds)
setInterval(updateCount, 1000);
</script>


     


</body>
</html>
