<?php
include "topbar.php";
include "dbconn.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar</title>

    
<style>
   @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@500&display=swap');
                :root{
                    --color-sidebar:rgb(255,255,255);

                    --color-text:rgb(0,0,0);
                    --color-text-menu:rgb(134,136,144);

                    --color-menu-hover:rgb(238,238,238);
                    --color-menu-hover-text:rgb(0,0,0);

                    --color-button:rgb(0,0,0);
                    --color-button-text:rgb(255,255,255);

                    --color-line:rgb(180,180,180);

                    --color-switch-base :rgb(201,202,206);
                    --color-switch-circle:rgb(241,241,241);

                    --color-scroll:rgb(192,192,192);
                    --color-scroll-hover:rgb(134,134,134);
                }

                .dark-mode{
                    --color-sidebar:rgb(44,45,49);

                    --color-text:rgb(255,255,255);
                    --color-text-menu:rgb(110,110,117);

                    --color-menu-hover:rgb(0,0,0);
                    --color-menu-hover-text:rgb(238,238,238);

                    --color-button:rgb(255,255,255);
                    --color-button-text:rgb(0,0,0);

                    --color-line:rgb(90,90,90);

                    --color-switch-base :rgb(39,205,64);
                    --color-switch-circle:rgb(255,255,255);

                    --color-scroll:rgb(68,69,74);
                    --color-scroll-hover:rgb(85,85,85);
                }


                *{
                    margin: 0;
                    padding: 0;
                    /* box-sizing: border-box; */
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
                    color: var(--color-button-text);
                    right: 330px;
                    top: 10px;
                    z-index: 100;
                }

                .menu:hover .close{
                    opacity: 0;

                }


                /*----------------Barra Lateral*/
                .sidebar{
                    position: fixed;
                    display: flex;
                    flex-direction: column;
                    justify-content: space-between;
                    width: 250px;
                    height: 100%;
                    overflow: hidden;
                    padding: 20px 15px;
                    background-color: var(--color-sidebar);
                    transition: width 0.5s ease,background-color 0.3s ease,left 0.5s ease;
                    z-index: 50;
                }

                .mini-sidebar{
                    width: 80px;
                }
                .sidebar .sidetext{
                    width: 100px;
                    white-space: nowrap;
                    font-size: 18px;
                    text-align: left;
                    opacity: 1;
                    transition: opacity 0.5s ease,width 0.5s ease;
                }
                .sidebar .sidetext .hidden{
                    opacity: 0;
                    width: 0;
                }

                /*------------> name de la página */
                .sidebar .page-name{
                    width: 100%;
                    height: 45px;
                    color: var(--color-text);
                    margin-bottom: 40px;
                    display: flex;
                    align-items: center;
                }
                .sidebar .page-name .logo{
                    position: fixed;
                    width:60px;
                    height:60px;
                    margin:0%;
                    cursor: pointer;

                }
                .sidebar .page-name span{
                    margin-left: 5px;
                    font-size: 25px;
                }


                /*------------> Botón*/
                .sidebar .button{
                    width: 100%;
                    height: 45px;
                    margin-bottom: 20px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    border: none;
                    border-radius: 10px;
                    background-color: #001f2a;
                    color: var(--color-button-text);
                    margin-top: 50px;
                    
                }
                .sidebar .button ion-icon{
                    min-width: 50px;
                    font-size: 25px;
                }


                /*--------------> Menu Navegación*/
                .sidebar .navigation{
                    height: 100%;
                    overflow-y: auto;
                    overflow-x: hidden;
                }
                .sidebar .navigation::-webkit-scrollbar{
                    width: 5px;
                }
                .sidebar .navigation::-webkit-scrollbar-thumb{
                    background-color: var(--color-scroll);
                    border-radius: 5px;
                }
                .sidebar .navigation::-webkit-scrollbar-thumb:hover{
                    background-color: var(--color-scroll-hover);
                }
                .sidebar .navigation li{  
                    list-style: none;
                    display: flex;
                    margin-bottom: 5px;
                }
                .sidebar .navigation .dropbtn{
                    /* min-width: 100px; */
                    width: 145%;
                    height: 45px;
                    display: flex;
                    align-items: center;
                    text-decoration: none;
                    border-radius: 10px;
                    color: var(--color-text-menu);
                }
                .sidebar .navigation .dropbtn:hover{
                    background-color: var(--color-menu-hover);
                    color: var(--color-menu-hover-text);
                }
                .sidebar .navigation ion-icon{
                    min-width:50px;
                    font-size:25px;    
                }

                /*-----------------> line*/
                .sidebar .line{
                    width: 100%;
                    height: 1px;
                    margin-top: 15px;
                    background-color: var(--color-line);
                }

                /*----------------> Modo Oscuro*/
                .sidebar .darkmode{
                    width: 100%;
                    margin-bottom: 80px;
                    border-radius: 10px;
                    display: flex;
                    justify-content: space-between;
                }
                .sidebar .darkmode .info{
                    width: 150px;
                    height: 45px;
                    overflow: hidden;
                    display: flex;
                    align-items: center;
                    color: var(--color-text-menu);
                }
                .sidebar .darkmode ion-icon{
                    width: 50px;
                    font-size: 20px;
                }

                /*--->switch*/
                .sidebar .darkmode .switch{
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    min-width: 50px;
                    height: 45px;
                    cursor: pointer;
                }
                .sidebar .darkmode .base{
                    position: relative;
                    display: flex;
                    align-items: center;
                    width: 35px;
                    height: 20px;
                    background-color: var(--color-switch-base);
                    border-radius: 50px;
                }
                .sidebar .darkmode .circle{
                    position: absolute;
                    width: 18px;
                    height: 90%;
                    background-color: var(--color-switch-circle);
                    border-radius: 50%;
                    left: 2px;
                    transition: left 0.5s ease;
                }
                .sidebar .darkmode .circle.on{
                    left: 15px;
                }

                /*---------------> user*/
                .sidebar .user{
                    width: 100%;
                    display: flex;
                }
                .sidebar .user .pp_container .profile-pic{
                    width: 50px;
                    height: 50px;
                    object-fit: cover;
                    /* background-image: url('includes/user icon for ui.png'); */
                    background-size: cover;
                    border-radius: 50%;
                }
                
                .sidebar .user .info-user{
                    width: 100%;
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                    color: var(--color-text);
                    overflow: hidden;
                }
                .sidebar .user .name-email{
                    width: 100%;
                    display: flex;
                    flex-direction: column;
                    margin-left: 5px;
                }
                .sidebar .user .name{
                    font-size: 15px;
                    font-weight: 600;
                }
                .sidebar .user .email{
                    font-size: 13px;
                }
                .sidebar .user ion-icon{
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
                    .sidebar .page-name{
                        margin-bottom: 5px;
                    }
                    .sidebar .darkmode{
                        margin-bottom: 3px;
                    }
                }
                @media (max-width: 600px){
                    .sidebar{
                        position: fixed;
                        left: -250px;
                    }
                    .max-sidebar{
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
                    background-color: #004b57;
                    color: #fff;
                }

                .dropdown:hover .dropdown-content {
                    display: block;
                }
                .sidebarcontainer{
                    display: flex;
                }

                .group-dropdown {
                    position: relative;
                    display: inline-block;
                }

                .group-header {
                    font-size: 14px; /* You can adjust the font size */
                    padding: 12px 16px;
                    margin: 0; /* Remove default margin */
                    cursor: pointer;
                    text-decoration: none;
                }

                .group-dropdown-content {
                    display: none;
                    position: absolute;
                    background-color: #f9f9f9;
                    min-width: 160px;
                    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                    z-index: 1;
                }

                .group-dropdown:hover .group-dropdown-content {
                    display: block;
                }

                .group-dropdown-content a {
                    color: black;
                    padding: 12px 16px;
                    text-decoration: none;
                    display: block;
                }

                .group-dropdown-content a:hover {
                    background-color: #f1f1f1;
                }

    .home_icon_badge{
            font-size: 18px; 
            margin-left: 210px; 
            margin-top: -25px; 
            position: absolute; 
            background: red; 
            border-radius: 50%; 
            min-width: 25px; 
            height: 25px; 
            color: white; 
            text-align: center;
          }
                
          .depts_icon_badge{
            font-size: 15px; 
            margin-left: 200px; 
            margin-top: -22px; 
            position: absolute; 
            background: red; 
            border-radius: 50%; 
            min-width: 20px; 
            height: 20px; 
            color: white; 
            text-align: center;
           
          }
</style>
</head>

<body>
<div class="sidebarcontainer">
    <div class="menu">
        <ion-icon name="menu-outline"></ion-icon>
        <ion-icon class="close" name="close-outline"></ion-icon>
    </div>

    <div class="sidebar">
        <div>
            <div class="page-name">
                <img class="logo" id="cloud" src="includes/newlogo.png"></img>
                <span style="margin-left:70px;">BCCentrix</span>
            </div>

            <div>
            <a href="announcement.php" >
            <button class="button" id="homeupdateButton" >
                <ion-icon name="home-outline"></ion-icon>
                <span class="sidetext">Home</span>
                <span class="home_icon_badge" id="home_post_count">0</span>
               </button>
               </a>
            </div>
        </div>

        <nav class="navigation">
            <ul>
               <li>
               <div class="dropdown">
                    <div class="dropbtn" id="notify-btn"><ion-icon name="chatbubbles-outline"></ion-icon>
                          <span  class="sidetext">Virtual Socialization</span>
                    </div>
                        <div class="dropdown-content" >
                           <!-- <a href="groupchat.php">Join Groupchats</a> -->
                           <a href="chatpage.php">Chats</a>
                           <a href="joined_group.php">GroupChats</a>
                    <?php
                    $userName = $_SESSION['user_name'];

                    // Fetch groups created by the user
                    $groupsCreatedByUserQuery = "SELECT DISTINCT id, group_name FROM groups WHERE name = '$userName'";
                    $groupsCreatedByUserResult = mysqli_query($conn, $groupsCreatedByUserQuery);

                    if ($groupsCreatedByUserResult && mysqli_num_rows($groupsCreatedByUserResult) > 0) {
                        echo '<div class="group-dropdown">';
                        echo '<h1 class="group-header">Go to GroupChat Logs</h1>';
                        echo '<div class="group-dropdown-content">';

                        while ($groupRow = mysqli_fetch_assoc($groupsCreatedByUserResult)) {
                            $groupId = $groupRow['id'];
                            $groupName = $groupRow['group_name'];
                            echo '<a href="groupchat_logs.php?id=' . $groupId . '&user=' . urlencode($userName) . '">';
                            echo $groupName;
                            echo '</a>';
                        }

                        echo '</div>';
                        echo '</div>';
                    } else {
                        // If the user has not created any groups or an error occurred, you can handle it as needed
                        echo '<a href="groupchat.php">';
                        echo '<span style="font-size: 14px;">Create Group Chat</span>';
                        echo '</a>';
                    }
                    ?>
 
                </div>
            </div>
        </li>

                <li>
                <div class="dropdown">
                    <div class="dropbtn">
                        <ion-icon name="megaphone-outline"></ion-icon>
                        <span  class="sidetext" style="font-size:14px;">Information Dissemination</span> 
                        <span class="depts_icon_badge" id="depts_post_count" >0</span>
                    </div>
                       <div class="dropdown-content" id="deptsupdateButton">
                         <a href="box.php">Announcement</a>
                         <a href="academic_awardees.php">Academic Awardees</a>
                       </div>
                </div>
                </li>

                <li>
                <div class="dropdown">
                    <div class="dropbtn" href="#">
                        <ion-icon name="briefcase-outline"></ion-icon>
                        <span  class="sidetext">Lost and Found</span></div>
                    <div class="dropdown-content">
                      <a href="laf_announcement.php">Post</a>
                      <a href="owner.php">Owner Form</a>
                      <a href="founder.php">Founder Form</a>
                    </div>
                </div>
                </li>

                <a class="dropbtn" href="marketplace_category.php">
                        <ion-icon name="cart-outline"></ion-icon>
                        <span class="sidetext">Marketplace</span></a>
             </ul>
        </nav>

    <div>
        <div class="line" style="margin-bottom: 10px;"></div>

            <!-- <div class="darkmode">
                <div class="info">
                    <ion-icon name="moon-outline"></ion-icon>
                    <span class="sidetext" >Dark Mode</span>
                </div>
                <div class="switch">
                    <div class="base">
                        <div class="circle">
                        </div>
                    </div>
                </div>
            </div> -->

            <a href="profile.php" >
            <div class="user">
                <div class="pp_container" style="width:60px; height:55px;">
                <img class="profile-pic" src="<?php echo $_SESSION['profile_picture'] ?>" alt=""> 
                        </div>
                <div class="info-user">
                    <div class="name-email">
                        <span class="name" style= "margin-left:5px;" ><?php echo $_SESSION['fname']; ?> <?php echo $_SESSION['lname'];?></span>
                        
                        <!-- <span class="email">jhampier@gmail.com</span> -->
                    </div>
                      <ion-icon name="ellipsis-vertical-outline"></ion-icon>
                </div>
            </div>
        </a>
        </div>
   </div>
</div>

    

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script>

    const cloud = document.getElementById("cloud");
    const sidebar = document.querySelector(".sidebar");
    const spans = document.querySelectorAll("span");
    const lever = document.querySelector(".switch");
    const circle = document.querySelector(".circle");
    const menu = document.querySelector(".menu")
    const main = document.querySelector("main");

    menu.addEventListener("click",()=>{
        sidebar.classList.toggle("max-sidebar");
        if(sidebar.classList.contains("max-sidebar")){
            menu.children[0].style.display = "none";
            menu.children[1].style.display = "block";
        }
        else{
            menu.children[0].style.display = "block";
            menu.children[1].style.display = "none";
        }
        if(window.innerWidth<=320){
            sidebar.classList.add("mini-sidebar");
            main.classList.add("min-main");
            spans.forEach((span)=>{
                span.classList.add("hidden");
        })
    }
});

    lever.addEventListener("click",()=>{
        let body = document.body;
        body.classList.toggle("dark-mode");
        body.classList.toggle("");
        circle.classList.toggle("on");
    });

    cloud.addEventListener("click",()=>{
        sidebar.classList.toggle("mini-sidebar");
        main.classList.toggle("min-main");
        spans.forEach((span)=>{
            span.classList.toggle("hidden");
        });
    });
</script>

<!-- HOME NOTIFICATION BADGE -->
<script>
    function updateCount() {
        // Make an asynchronous request to fetch the count from the server
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Update the content with the new count
                document.getElementById("home_post_count").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "home_seen_check.php", true);
        xhttp.send();
    }

    // Update the count initially
    updateCount();

    // Set up the interval to update the count every 5 seconds (5000 milliseconds)
    setInterval(updateCount, 1000);
</script>

<script>
    // Function to handle the button click and perform the update
    function handleUpdate() {
        var isupdatedContent = "";

        // Update the content of the div
        document.getElementById("homeupdateButton").innerHTML;

        fetch('home_post_seen.php', {
            method: 'POST',
            body: JSON.stringify({ isupdatedContent: isupdatedContent }),
        });
    }

    document.getElementById("homeupdateButton").addEventListener("click", handleUpdate);
</script>

<!-- DEPTS NOTIFICATION BADGE -->
<script>
    function updateCount() {
        // Make an asynchronous request to fetch the count from the server
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Update the content with the new count
                document.getElementById("depts_post_count").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "depts_seen_check.php", true);
        xhttp.send();
    }

    // Update the count initially
    updateCount();

    // Set up the interval to update the count every 5 seconds (5000 milliseconds)
    setInterval(updateCount, 1000);
</script>

<script>
    // Function to handle the button click and perform the update
    function handleUpdate() {
        var isupdatedContent = "";

        // Update the content of the div
        document.getElementById("deptsupdateButton").innerHTML;

        fetch('depts_post_seen.php', {
            method: 'POST',
            body: JSON.stringify({ isupdatedContent: isupdatedContent }),
        });
    }

    document.getElementById("deptsupdateButton").addEventListener("click", handleUpdate);
</script>



  

</body>
</html>