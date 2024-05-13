<?php
include ("dbconn.php");
include "adminsession.php"; // Include the database connection file
// session_start();

// // Check if the logout button is pressed
if (isset($_POST['logout'])) {
    // Clear all session variables
    session_unset();

    // Destroy the session
    session_destroy();

    // Redirect to the login page or any other page you want after logout
    header("Location: index.php"); // Replace "index.php" with your login page URL
    exit();
}

?>

<!-- <!DOCTYPE html> -->
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admindashboard</title>
 <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@500&display=swap');
        :root{
            --color-barra-lateral:rgb(255,255,255);

            --color-texto:rgb(0,0,0);
            --color-texto-menu:rgb(134,136,144);

            --color-menu-hover:rgb(238,238,238);
            --color-menu-hover-texto:rgb(0,0,0);

            --color-boton:rgb(0,0,0);
            --color-boton-texto:rgb(255,255,255);

            --color-linea:rgb(180,180,180);

            --color-switch-base :rgb(201,202,206);
            --color-switch-circulo:rgb(241,241,241);

            --color-scroll:rgb(192,192,192);
            --color-scroll-hover:rgb(134,134,134);
        }

        .dark-mode{
            --color-barra-lateral:rgb(44,45,49);

            --color-texto:rgb(255,255,255);
            --color-texto-menu:rgb(110,110,117);

            --color-menu-hover:rgb(0,0,0);
            --color-menu-hover-texto:rgb(238,238,238);

            --color-boton:rgb(255,255,255);
            --color-boton-texto:rgb(0,0,0);

            --color-linea:rgb(90,90,90);

            --color-switch-base :rgb(39,205,64);
            --color-switch-circulo:rgb(255,255,255);

            --color-scroll:rgb(68,69,74);
            --color-scroll-hover:rgb(85,85,85);
        }


        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Outfit', sans-serif;
        }
            body{
                height: 100vh;
                width: 100%;
                background-color: #DADEDF;
            }

        /*-----------------Menu*/
        .menu{
            position: fixed;
            width: 50px;
            height: 50px;
            font-size: 30px;
            display: none;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            cursor: pointer;
            background-color: var(--color-boton);
            color: var(--color-boton-texto);
            right: 15px;
            top: 15px;
            z-index: 100;
        }


        /*----------------Barra Lateral*/
        .barra-lateral{
            position: fixed;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            width: 250px;
            height: 100%;
            overflow: hidden;
            padding: 20px 15px;
            background-color: var(--color-barra-lateral);
            transition: width 0.5s ease,background-color 0.3s ease,left 0.5s ease;
            z-index: 50;
        }

        .mini-barra-lateral{
            width: 80px;
        }
        .barra-lateral span{
            width: 100px;
            white-space: nowrap;
            font-size: 18px;
            text-align: left;
            opacity: 1;
            transition: opacity 0.5s ease,width 0.5s ease;
        }
        .barra-lateral span.oculto{
            opacity: 0;
            width: 0;
        }

        /*------------> Nombre de la página */
        .barra-lateral .nombre-pagina{
            width: 100%;
            height: 45px;
            color: var(--color-texto);
            margin-bottom: 40px;
            display: flex;
            align-items: center;
        }
        .barra-lateral .nombre-pagina .logo{
            position: fixed;
            width:60px;
            height:60px;
            margin:0%;
            cursor: pointer;

        }
        .barra-lateral .nombre-pagina span{
            margin-left: 5px;
            font-size: 25px;
        }


        /*------------> Botón*/
        .barra-lateral .boton{
            width: 100%;
            height: 45px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: none;
            border-radius: 10px;
            background-color: var(--color-boton);
            color: var(--color-boton-texto);
            margin-top: 50px;
            
        }
        .barra-lateral .boton ion-icon{
            min-width: 50px;
            font-size: 25px;
        }


        /*--------------> Menu Navegación*/
        .barra-lateral .navegacion{
            height: 100%;
            overflow-y: auto;
            overflow-x: hidden;
        }
        .barra-lateral .navegacion::-webkit-scrollbar{
            width: 5px;
        }
        .barra-lateral .navegacion::-webkit-scrollbar-thumb{
            background-color: var(--color-scroll);
            border-radius: 5px;
        }
        .barra-lateral .navegacion::-webkit-scrollbar-thumb:hover{
            background-color: var(--color-scroll-hover);
        }
        .barra-lateral .navegacion li{  
            list-style: none;
            display: flex;
            margin-bottom: 5px;
        }
        .barra-lateral .navegacion .dropbtn{
            /* min-width: 100px; */
            width: 145%;
            height: 45px;
            display: flex;
            align-items: center;
            text-decoration: none;
            border-radius: 10px;
            color: var(--color-texto-menu);
            cursor: pointer;
        }
        .barra-lateral .navegacion .dropbtn:hover{
            background-color: var(--color-menu-hover);
            color: var(--color-menu-hover-texto);
        }
        .barra-lateral .navegacion ion-icon{
            min-width:50px;
            font-size:25px;    
        }

        /*-----------------> Linea*/
        .barra-lateral .linea{
            width: 100%;
            height: 1px;
            margin-top: 15px;
            background-color: var(--color-linea);
        }

        /*----------------> Modo Oscuro*/
        .barra-lateral .modo-oscuro{
            width: 100%;
            margin-bottom: 80px;
            border-radius: 10px;
            display: flex;
            justify-content: space-between;
        }
        .barra-lateral .modo-oscuro .info{
            width: 150px;
            height: 45px;
            overflow: hidden;
            display: flex;
            align-items: center;
            color: var(--color-texto-menu);
        }
        .barra-lateral .modo-oscuro ion-icon{
            width: 50px;
            font-size: 20px;
        }

        /*--->switch*/
        .barra-lateral .modo-oscuro .switch{
            display: flex;
            align-items: center;
            justify-content: center;
            min-width: 50px;
            height: 45px;
            cursor: pointer;
        }
        .barra-lateral .modo-oscuro .base{
            position: relative;
            display: flex;
            align-items: center;
            width: 35px;
            height: 20px;
            background-color: var(--color-switch-base);
            border-radius: 50px;
        }
        .barra-lateral .modo-oscuro .circulo{
            position: absolute;
            width: 18px;
            height: 90%;
            background-color: var(--color-switch-circulo);
            border-radius: 50%;
            left: 2px;
            transition: left 0.5s ease;
        }
        .barra-lateral .modo-oscuro .circulo.prendido{
            left: 15px;
        }

        /*---------------> Usuario*/
        .barra-lateral .usuario{
            width: 100%;
            display: flex;
        }
        .barra-lateral .usuario img{
            width: 50px;
            min-width: 50px;
            border-radius: 10px;
        }
        .barra-lateral .usuario .info-usuario{
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: var(--color-texto);
            overflow: hidden;
        }
        .barra-lateral .usuario .nombre-email{
            width: 100%;
            display: flex;
            flex-direction: column;
            margin-left: 5px;
        }
        .barra-lateral .usuario .nombre{
            font-size: 15px;
            font-weight: 600;
        }
        .barra-lateral .usuario .email{
            font-size: 13px;
        }
        .barra-lateral .usuario ion-icon{
            font-size: 20px;
        }


        /*-------------main*/

        main{
            margin-left: 250px;
            padding: 20px;
            transition: margin-left 0.5s ease;
        }
        main.min-main{
            margin-left: 80px;
        }



        /*------------------> Responsive*/
        @media (max-height: 660px){
            .barra-lateral .nombre-pagina{
                margin-bottom: 5px;
            }
            .barra-lateral .modo-oscuro{
                margin-bottom: 3px;
            }
        }
        @media (max-width: 600px){
            .barra-lateral{
                position: fixed;
                left: -250px;
            }
            .max-barra-lateral{
                left: 0;
            }
            .menu{
                display: flex;
            }
            .menu ion-icon:nth-child(2){
                display: none;
            }
            main{
                margin-left: 0;
            }
            main.min-main{
                margin-left: 0;
            }
        }

        .search-container {
            margin-left: 0; /* Remove the negative margin */
            margin-top: -40px; /* Adjust the top margin as needed */
            margin-bottom: 10px; /* Reduce the margin at the bottom */
        }

        /* Logo Styles */
        .logo {
            margin-left: 28px;
            width: 100px;
            height: 100px;  
        }
        
        /* Dropdown Styles */
        .dropdown {
            position: relative;
            display: inline-block;
        }


        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            color: #333;
            font-size: 14px;
        } 

        .dropdown-content a:hover {
            background-color: #000116;
            color: #fff;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }
        .sidebarcontainer{
            display: flex;
        }

        /* Sidebar Styles */
                /* Top Bar Styles */
            .top-bar {
            display: flex;
            position: fixed; /* Keep the top bar fixed at the top */
            top: 0;
            width: 100%; /* Adjust the width to account for the sidebar width */
            height: 70px;
            background-color: #000116;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
            z-index: 1; /* Ensure it's above the sidebar */
            }
        
            .title {
            margin-left: 20px;
            font-size: 30px;
            }

        .user-info {
            display: flex;
            align-items: center;
            padding: 5px;
            font-size: 16px;
            font-weight: BOLD;
            margin-left: 800px;
            margin-top: 13px;
            justify-content: space-between;
            margin-bottom: 15px;
            }

        .user-info .welcome-text {
            margin-right: 10px;
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
            /* margin-right:300px;  */
            }

        /* Hover effect */
        .logout-button:hover {
            background-color: #B80F0A;
        }

        .adminicon{
            width:60px;
            height:60px:
        }

            .picontainer {
                position: relative;
                overflow: hidden;
                cursor: pointer;
                margin-top: 100px;
                margin-left: 250px;
                padding: 20px;
                transition: transform 0.2s; 
                display: flex;
                flex-direction: column; 
                margin-bottom: 20px;
            }

            .profile-picture-picontainer {
                margin-right: 30px;
                width: 60px;
                height: 60px;
                border-radius: 50%;
                border: 3px solid grey;
                overflow: hidden;
            }

            .profile-picture {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }

            
            /* .profile-picture-picontainer:hover {
                transform: scale(1.1); 
                transition: transform 0.2s ease; 
            } */

            .center{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate( -50%, -50%);
        }

        .popup{
            border: 1px solid grey;
            position: absolute;
            margin-top: 250px;
            right: 500px;
            width: 350px;
            height: 280px;
            padding: 30px 20px;
            background: #f5f5f5;
            border-radius: 10px;
            box-sizing: border-box;
            z-index: 9999;
            text-align: center;
            opacity: 0;
            top:-200%;
            transform: translate( -50%, -50%) scale(0.5); 
            transition: opacity 300ms ease-in-out,
                        top 1000ms ease-in-out,
                        transform 1000ms ease-in-out;
        }
        .popup.active{
            opacity:1;
            top: 50%;
            transform:translate( -50%, -50%) scale(1); 
            transition: transform 300ms cubic-bezier(0.18,0.89,0.43,1.19);
        }
        .popup .icon{
            margin:5px 0px;
            width: 50px;
            height: 50px;
            border: 2px solid #34f234;
            text-align: center;
            display: inline-block;
            border-radius: 50%;
            line-height: 60px;
        }

        .popup .icon i.fa {
            font-size: 25px;
            color: #34f234;
            margin-top: 10px;
        }

        .popup .title{
            margin: 5px 0px;
            font-size: 25px;
            font-weight: 600;
        }
        .popup .description{
            color: #222;
            font-size: 15px;
            padding: 5px;
        }

        .popup .dismiss-btn{
            margin-top: 15px;
        }
        .popup .dismiss-btn button{
        padding: 10px 20px;
        background: #111;
        color: #f5f5f5;
        border: 2px solid #111;
        font-size: 16px;
        font-weight: 600;
        border-radius: 10px;
        transition: all 300ms ease-in-out;
        }
        .popup .dismiss-btn button:hover{
            color: #111;
            background: #f5f5f5;
        }
        @media only screen and (max-width: 600px){
                    .user-info{
                      margin-left: 0;
                      margin-right: 90px;
                    }
                }
                .search_box {
          background: #efefef;
          width: 300px;
          border-radius: 20px;
          display: flex;
          align-items: center;
          padding: 0 15px;
          position: absolute;
          margin-top: 0px;
          margin-left: 800px;
          color: black;
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


</style>
</head>

<body>
<div class="sidebarcontainer">
    <div class="menu">
        <ion-icon name="menu-outline"></ion-icon>
        <ion-icon name="close-outline"></ion-icon>
    </div>


    <div class="barra-lateral">
        <div>
            <div class="nombre-pagina">
                <img class="logo" id="cloud" src="includes/newlogo.png"></img>
                <span style="margin-left:70px;">BCCentrix</span>
            </div>

        <div>
            <a href="adminannouncement.php" >
            <button class="boton" id="hoverable-logo" >
                <ion-icon name="home-outline"></ion-icon>
                <span>Home</span>
               </button>
               </a>
            </div>
        </div>

        <nav class="navegacion">
            <ul>
               <li> 
                <a href="reports.php">
                    <div class="dropbtn" ><ion-icon name="albums-outline"></ion-icon>
                          <span >Dashboard</span>
                    </div>   
                </a> 
                </li>

                <li>
                <div class="dropdown">
                    <div class="dropbtn">
                    <ion-icon name="file-tray-full-outline"></ion-icon>
                        <span style="font-size:17px;">User Management</span> 
                    </div>
                       <div class="dropdown-content">
                       <a href="admin_approval.php">Admin Approval</a>
                       <a href="get_all_user.php">All User</a>
                      </div>
                </div>
                </li>

                <li>
                <div class="dropdown">
                    <div class="dropbtn">
                    <ion-icon name="megaphone-outline"></ion-icon>
                        <span style="font-size:14px;">Information Dissemination</span> 
                    </div>
                       <div class="dropdown-content">
                       <a href="admin_depts.php">Announcement</a>
                       <a href="adminacademic_awardees.php">Academic Awardees</a>
                       </div>
                </div>
                </li>

                <li>
                <div class="dropdown">
                    <div class="dropbtn" href="#" style="z-index:2">
                        <ion-icon name="briefcase-outline"></ion-icon>
                        <span>Lost and Found</span></div>
                    <div class="dropdown-content">
                      <a href="admin_laf_announcement.php">Post</a>
                      <a href="admin_owner_approval.php">Owner Form Approval</a>
                      <a href="admin_founder_approval.php">Founder Form Approval</a>
                      <a href="ow.php">Owner Table</a>
                      <a href="of.php">Founder Table</a>
                      <a href="rejected_forms.php">Rejected Forms</a>
                    </div>
                </div>
                </li>

                <li>
                <div class="dropdown">
                    <div class="dropbtn" href="#">
                        <ion-icon name="chatbubbles-outline"></ion-icon>
                        <span>Virtual Socialization</span></div>
                    <div class="dropdown-content">
                    <a href="admin_chatpage.php">Chats</a>
                      <a href="admin_joined_group.php">GroupChats</a>
                    </div>
                </div>
                </li>

                <li>
            <div class="dropdown">
                <div class="dropbtn" href="#">
                        <ion-icon name="cart-outline"></ion-icon>
                        <span>Market Place</span>
                </div>
                    <div class="dropdown-content">
                      <a href="admin_marketplace_categories.php">Post</a>
                      <a href="admin_approve_deny_drygoods.php">Drygoods Approve and Deny Request</a>
                      <a href="admin_approve_deny_foods.php">Foods Approve and Deny Request</a>
                    </div>
            </div>
                </li>
                <button type="button" class="boton" style=" background-color: #f3f4f5; color: grey;" id="backup-button" data-toggle="modal" data-target="#backupModal">
                <ion-icon name="cloud-upload-outline"></ion-icon>
                <span>Backup</span>
                </button>
                <!-- <div class="popup center">
                    <div class="icon"> <i class="fa fa-check"></i> </div>
                    <div class="title"> SUCCESS!! </div>
                    <div class="description">
                      YOU HAVE SUCCESSFULLY EXPORTED THE DATABASE FILE
                    </div>
                      <div class="dismiss-btn">
                         <button id="dismiss-popup-btn"> Dismiss </button>
                     </div>
              </div> -->
             </ul>
        </nav>

    <!-- <div> -->
        <div class="linea" style="margin-bottom: 15px;"></div>

            <!-- <div class="modo-oscuro">
                <div class="info"> -->
                    <!-- <ion-icon name="moon-outline"></ion-icon>
                    <span>Dark Mode</span> -->
                <!-- </div>
                <div class="switch"> -->
                    <!-- <div class="base">
                        <div class="circulo">
                        </div>
                    </div> -->
                <!-- </div>
            </div> -->
    
     <a href="admin_profile.php" >
            <div class="usuario">
            <img class="profile-pic" src="<?php echo $_SESSION['profile_picture'] ?>" alt=""> 
                <div class="info-usuario">
                    <div class="nombre-email">
                        <span class="nombre">Admin</span>
                        <!-- <span class="email">jhampier@gmail.com</span> -->
                    </div>
                      <ion-icon name="ellipsis-vertical-outline"></ion-icon>
                </div>
            </div>
        </a>
        </div>
   </div>
</div>

<!-- Backup Modal -->
<div class="modal" id="backupModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Admin Verification</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <!-- Admin Verification Form -->
                <form id="verificationForm">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" required>
                    </div>
                    <div class="form-group">
                        <label for="uniqueCode">Unique Code:</label>
                        <input type="text" class="form-control" id="uniqueCode" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Verify</button>
                </form>
            </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="top-bar">
  <div class="title">
    <!-- <p>BCCentrix Bago City College Social Media </p> -->
  </div>

  <div class="search_box" style="">
<form action="admin_search_function.php" method="get" >
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
    <div class="welcome-text">Welcome Admin!</div>
  
                <div class="profile-picture-picontainer">
                <img class="profile-picture" src="<?php echo $_SESSION['profile_picture'] ?>" alt=""> 
                    </div>
                
             <button class="logout-button" id="logoutButton" name="logout">Log Out</button>
  </div>
<div class="popup center">
                    <div class="icon"> <i class="fa fa-check"></i> </div>
                    <div class="title" style="color: black;"> SUCCESS!! </div>
                    <div class="description">
                      YOU HAVE SUCCESSFULLY EXPORTED THE DATABASE FILE
                    </div>
                      <div class="dismiss-btn">
                         <button id="dismiss-popup-btn"> Dismiss </button>
                     </div>
 </div>                  
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>

    // Logout button
    const logoutButton =  document.getElementById('logoutButton');
    logoutButton.addEventListener('click', () => {
        const confirmed = confirm('Are you sure you want to log out?');
        if (confirmed) {
            // Redirect to the login_user.php page
            window.location.href = 'index.php';
        }
    });

    const backupButton =  document.getElementById('open-popup-btn');
    backupButton.addEventListener('click', () => {
        const confirmed = confirm('Are you sure you want to export the system database?');
        if (confirmed) {
            window.location.href = 'backup.php';  
        } else{
            // open-popup-btn.style.display = "";
        }
    });
   
</script>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script >
const cloud = document.getElementById("cloud");
const barraLateral = document.querySelector(".barra-lateral");
const spans = document.querySelectorAll("span");
const palanca = document.querySelector(".switch");
const circulo = document.querySelector(".circulo");
const menu = document.querySelector(".menu");
const main = document.querySelector("main");

menu.addEventListener("click",()=>{
    barraLateral.classList.toggle("max-barra-lateral");
    if(barraLateral.classList.contains("max-barra-lateral")){
        menu.children[0].style.display = "none";
        menu.children[1].style.display = "block";
    }
    else{
        menu.children[0].style.display = "block";
        menu.children[1].style.display = "none";
    }
    if(window.innerWidth<=320){
        barraLateral.classList.add("mini-barra-lateral");
        main.classList.add("min-main");
        spans.forEach((span)=>{
            span.classList.add("oculto");
        })
    }
});

palanca.addEventListener("click",()=>{
    let body = document.body;
    body.classList.toggle("dark-mode");
    body.classList.toggle("");
    circulo.classList.toggle("prendido");
});

cloud.addEventListener("click",()=>{
    barraLateral.classList.toggle("mini-barra-lateral");
    main.classList.toggle("min-main");
    spans.forEach((span)=>{
        span.classList.toggle("oculto");
    });
});
</script>

<script>
   document.getElementById("open-popup-btn").addEventListener("click",function(){
   document.getElementsByClassName("popup")
   [0].classList.add("active");
   });

   document.getElementById("dismiss-popup-btn").addEventListener("click",function(){
   document.getElementsByClassName("popup")
   [0].classList.remove("active");
   });
  </script>

  <script>
   // Handle form submission for admin verification
document.getElementById('verificationForm').addEventListener('submit', function (e) {
    e.preventDefault();

    // Get form values
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;
    var uniqueCode = document.getElementById('uniqueCode').value;

            // AJAX request to your server-side verification logic
            $.ajax({
                type: 'POST',
                url: 'verify_admin.php',
                data: { username: username, password: password, unique_code: uniqueCode },
                success: function (response) {
            if (response === 'admin_success') {
                // Proceed with backup logic here
                alert('Admin verification successful! Initiating database backup and download.');

                // Trigger the backup.php file to initiate the backup and download
                window.location.href = 'backup.php';
                
                // Close the modal (if needed)
                $('#backupModal').modal('hide');
                
                // Remove the modal backdrop (if needed)
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();
            } else if (response === 'admin_denied') {
                alert('Access denied. Not an admin.');
            } else {
                alert('Admin verification failed. Please check your credentials.');
            }
        },
        error: function () {
            alert('Error during admin verification.');
        }
    });
});
</script>

</body>
</html>





    

    
