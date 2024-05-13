<?php
include "dbconn.php";
include "dashboard.php";
?>
<!DOCTYPE html>
<html>
<head>
    
    <title>Profile Page</title>
    <link rel="stylesheet" href="postmainlink/design.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="postmainlink/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<style>
                body{
                    background:linear-gradient(to left, #D1DFB7, #B9D9CF, #85CDFF);
                    overflow-x: hidden;
                    }

                .container{
                    width:80%;
                    margin-left: 20%;
                    }

                .profile-page .profile-header {
                    box-shadow: 0 0 10px 0 rgba(183, 192, 206, 0.2);
                    border: 1px solid #f2f4f9;
                    width: 100%;
                }

                .profile-page .profile-header .cover {
                    position: relative;
                    border-radius: .25rem .25rem 0 0;
                    height:75vh;
                }


                .profile-page .profile-header .cover figure {
                    margin-bottom: 0;
                }

                .profile-page .profile-header .cover figure img {
                    border-radius: .25rem .25rem 0 0;
                    width: 100%;
                }


                .shade {
                    position: absolute;
                    width: 80%;
                    height: 75.2%;
                    background: linear-gradient(rgba(255, 255, 255, 0.1), lightgrey 115%);
                    
                }

                .profile-page .profile-header .cover .cover-body {
                    position: absolute;
                    top: 250px;
                    /* left: 0; */
                    width: 100%;
                    padding: 0 20px;
                }

                .cover-body .profile-image {
                    position: absolute;
                    border-radius: 50%;
                    height: 200px;
                    width: 200px;
                    margin-left: 30px;  
                    border: 5px solid lightgrey;
                    object-fit: cover;
                    /* background-image: url('includes/user icon for ui.png'); */
                    background-size: cover; 
                    margin-top: 80px;

                }

                .cover-body .profile-name {
                    font-weight: 600;
                    margin-left: 17px;
                    font-size:20px; 
                    color: black; 
                    position:absolute; 
                    left: 250px; 
                    top: 178px; 
                }

                .profile-page .profile-header .header-links {
                    padding: 15px;
                    display: flex;
                    justify-content: center;
                    background: #fff;
                    border-radius: 0 0 .25rem .25rem;
                    border-top: 1px solid lightgrey;
                }

                .profile-page .profile-header .header-links ul {
                    list-style-type: none;
                    margin: 0;
                    padding: 0;
                }

                .profile-page .profile-header .header-links ul li a {
                    color: #000;
                    -webkit-transition: all .2s ease;
                    transition: all .2s ease;
                }

                .profile-page .profile-header .header-links ul li:hover,
                .profile-page .profile-header .header-links ul li.active {
                    color: #727cf5;
                }

                .profile-page .profile-header .header-links ul li:hover a,
                .profile-page .profile-header .header-links ul li.active a {
                    color: #727cf5;
                }

                .profile-page .profile-body .left-wrapper .social-links a {
                    width: 30px;
                    height: 30px;
                }

                .profile-page .profile-body .right-wrapper .latest-photos > .row {
                    margin-right: 0;
                    margin-left: 0;
                }

                .profile-page .profile-body .right-wrapper .latest-photos > .row > div {
                    padding-left: 3px;
                    padding-right: 3px;
                }

                .profile-page .profile-body .right-wrapper .latest-photos > .row > div figure {
                    -webkit-transition: all .3s ease-in-out;
                    transition: all .3s ease-in-out;
                    margin-bottom: 6px;
                }

                .profile-page .profile-body .right-wrapper .latest-photos > .row > div figure:hover {
                    -webkit-transform: scale(1.06);
                    transform: scale(1.06);
                }

                .profile-page .profile-body .right-wrapper .latest-photos > .row > div figure img {
                    border-radius: .25rem;
                }

                .rtl .profile-page .profile-header .cover .cover-body .profile-name {
                    margin-left: 0;
                    margin-right: 17px;
                }
                .img-xs {
                    width: 37px;
                    height: 37px;
                }
                .rounded-circle {
                    border-radius: 50% !important;
                }
                img {
                    vertical-align: middle;
                    border-style: none;
                }

                .card-header:first-child {
                    border-radius: 0 0 0 0;
                }
                .card-header {
                    padding: 0.875rem 1.5rem;
                    margin-bottom: 0;
                    background-color: rgba(0, 0, 0, 0);
                    border-bottom: 1px solid #f2f4f9;
                }

                .card-footer:last-child {
                    border-radius: 0 0 0 0;
                }
                .card-footer {
                    padding: 0.875rem 1.5rem;
                    background-color: rgba(0, 0, 0, 0);
                    border-top: 1px solid #f2f4f9;
                }

                .grid-margin {
                    margin-bottom: 1rem;
                }

                .card {
                    box-shadow: 0 0 10px 0 rgba(183, 192, 206, 0.2);
                    -webkit-box-shadow: 0 0 10px 0 rgba(183, 192, 206, 0.2);
                    -moz-box-shadow: 0 0 10px 0 rgba(183, 192, 206, 0.2);
                    -ms-box-shadow: 0 0 10px 0 rgba(183, 192, 206, 0.2);
                }
                .rounded {
                    border-radius: 0.25rem !important;
                }
                .card {
                    position: relative;
                    display: flex;
                    flex-direction: column;
                    min-width: 0;
                    word-wrap: break-word;
                    background-color: #fff;
                    background-clip: border-box;
                    border: 1px solid #f2f4f9;
                    border-radius: 0.25rem;
                }

              /* Post css */
                .post-content {
                    word-wrap: break-word;
                }

                /* Fix the width and height of the textarea and adjust the border */
                .post-textarea-modal {
                    width: 350px; /* Fixed width */
                    height: 120px; /* Fixed height */
                    margin: 0 auto; /* Center horizontally */
                    border: 2px solid #ccc; /* Border width and color */
                    padding: 10px; /* Add padding inside the textarea */
                    border-radius: 30px; /* Adjust border radius for an oblong shape */
                }

                        /* CSS for the textarea inside the container */
                .post-textarea-container {
                    width: 350px; /* Fixed width */
                    height: 120px; /* Fixed height */
                    margin: 0 auto; /* Center horizontally */
                    margin-top: 80px;
                    border: 2px solid #ccc; /* Border width and color */
                    padding: 10px; /* Add padding inside the textarea */
                    border-radius: 30px; /* Adjust border radius for an oblong shape */
                }

                /* Adjust width of the comment textarea */
                .comment-textarea {
                    width: 35%; /* Adjust the width as needed */
                    margin: 0 auto; /* Center horizontally */
                    margin-top: 5px;
                    border-radius: 30px; /* Adjust border radius for an oblong shape */
                }

                /* Center the buttons within the container */
                .button-container {
                    text-align: right; /* Center the buttons horizontally */
                    width: 50px; height: 50px;
                }

                #sendButton{
                font-size: 15px;
                color: #FFFFFF ;
                transition: color 0.3s ease;
                background-color: lightgrey; /* Initial color of the button */
                padding: 7px;
                border-color: #FFFFFF;
                cursor: pointer;
                border-radius: 10%;
                }

                #sendButton:hover{
                font-size: 15px;
                color: #DFE667 ;
                border-color: lightgrey;
                border-radius: 10%; 
                }

                .panel-body.post-content {
                    border: 1px solid #ccc; /* Add a border style and color */
                    padding: 10px; /* Add some padding for spacing */
                }

                .comment {
                    border: 1px solid #ccc; /* Add a border style and color */
                    padding: 10px; /* Add some padding for spacing */
                    margin-top: 10px; /* Add margin to separate it from other comments */
                    margin-left: 50px;
                    margin-right: 50px;
                    background:linear-gradient(to right, #e5e5e5, #DADEDF);
                }

                /* Style images within the post content */
                .panel-body.post-content img {
                    max-width: 100%; /* Ensure images don't exceed the width of their container */
                    height: auto; /* Maintain the aspect ratio of images */
                    display: block; /* Remove any inline spacing */
                    margin: 10px auto; /* Center images horizontally with margin */
                }

                .custom-panel {
                    width: 40%; /* Adjust the width as needed */
                    margin: 0 auto; /* Center the panel horizontally */
                    border: 2px solid #ddd; /* Add a border style and color */
                    border-radius: 10px; /* Adjust border radius for rounded corners */
                    padding: 10px; /* Add padding for spacing */
                    margin-bottom: 20px; /* Add margin between panels */
                    background-color: #f9f9f9; /* Set a background color */
                    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Add a subtle shadow */
                }

                .custom-panel .panel-heading {
                    background-color: #ddd; /* Set a background color for the heading */
                    padding: 10px; /* Add padding for heading */
                    border-top-left-radius: 8px; /* Adjust border radius for rounded top corners */
                    border-top-right-radius: 8px;
                }

                .custom-panel .panel-body {
                    padding: 15px; /* Add padding for content */
                }

                .custom-panel .comment {
                    border: 1px solid #ccc; /* Add a border style and color for comments */
                    padding: 10px; /* Add padding for comments */
                    margin-top: 10px; /* Add margin to separate comments */
                    background-color: #f7f7f7; /* Set a background color for comments */
                    border-radius: 8px; /* Adjust border radius for rounded comment boxes */
                }

                /* Style for the dropdown button */
                .dropdown-menu {
                    min-width: 100px;
                }

                /* Style the Create Post button and dropdown menu */
                .panel-heading .btn-group {
                    left: 275px; /* Adjust the right distance as needed */
                    
                }

                .panel-heading .btn-group .dropdown-menu {
                    right: auto; /* Align the dropdown menu to the right */
                    margin-top: 32px;
                }

                        /* CSS to style the heart button in pink or red when the user has reacted */
                .btn-pink {
                    background-color: pink; /* You can adjust the color to your preference */
                    color: white; /* Text color for the button when it's pink */
                    border-color: pink; /* Border color for the button when it's pink */
                }

                /* CSS to style the heart icon's color */
                .btn-pink .fas.fa-heart {
                    color: red; /* Color for the heart icon when the button is pink */
                }

                .whats-the-update-conatiner {
                    color: red; /* Color for the heart icon when the button is pink */
                }

            /* Customize the modal body */
                .modal-body {
                    background-color: #f7f7f7; /* Set a background color */
                }

                /* Customize the textarea within the modal body */
                .modal-body textarea {
                    width: 60%; /* Make the textarea full-width */
                    height: 69px; /* Adjust the height as needed */
                    resize: vertical; /* Allow vertical resizing */
                    border: 2px solid #ccc; /* Add a border style and color */
                    border-radius: 10px; /* Adjust border radius for rounded corners */
                    padding: 10px; /* Add padding inside the textarea */
                }

                .icon{
                    width: 25px;
                    height: 25px;
                    margin-left: 20px;
                }

                .btn_coverphoto {
                    position: absolute;
                    margin-left: 820px;
                    margin-right: 20px;
                    top: 95px;  
                    background-color: rgb(0, 0, 0, 0.5); 
                    color: #fff; 
                    font-size: 17px; 
                    border-top: 0px; 
                    transition: background-color 0.3s ease; /* Add a smooth transition effect */
                    border-radius: 5px; /* Optional: Add rounded corners to the btn */
                    width: 180px;
                    height: 40px;
                    display:flex;
                    justify-content: center;
                    align-items: center;
                    
                }

                .btn_coverphoto:hover {
                    background-color: lightgrey; /* Set the background color on hover */
                    color: #000;
                }

                .about-container{
                    background-color: #fff;
                    flex-basis: 25%;
                    padding: 20px;
                    border-radius: 4px;
                    color: #626262;
                    position: sticky;
                    top: 70px;
                    align-self: flex-start;
                    width: 30%;
                }
                .options{
                    border-left: 1px solid #ccc;
                    border-right: 1px solid #ccc;
                    padding-left: 10px;
                    padding-right: 10px;
                    text-align: center;
                }

                .photo_icon{
                    width: 30px;
                    height: 30px;
                    margin-left: 35%;
                }

                .upload{
                    display: flex;
                    align-items: center;
                    text-decoration: none;
                    border-radius: 10px;
                    color: grey;
                    cursor: pointer;
        
                }
                 .upload:hover{
                    background: lightgrey;
                    color: black;
                }

                .image-container {
                    /* position: relative; */
                    max-height: 350px;
                    width: 100%;
                    object-fit: cover;
                    cursor: pointer;

                }

                .popup {
                    display: none;
                    position: fixed;
                    z-index: 1;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background-color: rgba(0, 0, 0, 0.7);
                    justify-content: left;

                }

                .popup .profile_container{
                    margin-left: 300px;
                    
                }

               .popup .profile_container img{
                    display: flex;
                    justify-content: center;
                    margin-top: 100px;
                    align-items: center;
                    height:80%;
                }

                .popup_cover{
                    display: none;
                    position: fixed;
                    z-index: 2;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background-color: rgba(0, 0, 0, 0.7);
                    justify-content: left;

                }

                .popup_cover .cover_photo{
                    margin-left: 300px;
                    width: 50%;
                    
                }

               .popup_cover .cover_photo img{
                    display: flex;
                    justify-content: center;
                    margin-top: 100px;
                    height:80%;
                }

                .close {
                    position: absolute;
                    top: 20px;
                    right: 30px;
                    font-size: 30px;
                    color: #fff;
                    cursor: pointer;
                }

                .img-fluid{
                    height: 350px;
                    width: 1030px;
                    margin-left: 23px;  
                    border: 3px solid lightgrey;
                    object-fit: cover;
                    background-image: url('uploads/default-image.png');
                    background-size: cover; 
                    margin-top: 80px;
                    border-radius: 20px;
                } 

                .under-text{
                    margin-left: 20px; 
                    letter-spacing: 2px; 
                    font-size:15px; 
                    color: black; 
                    position:absolute; 
                    left: 250px; 
                    top: 215px;
                }

                .under-text img{
                    position: absolute; 
                    left: 44px; 
                    width: 22px; 
                    height: 22x;
                }

                .aside-text{
                    margin-left: 85px; 
                    letter-spacing: 2px; 
                    font-size:15px; color:
                    black; position: 
                    absolute; 
                    left: 250px; 
                    top: 215px;
                }

                .user-panel{
                    height:130px; 
                    width:85%; 
                    margin-left: 50px; 
                    border: 2px solid lightgrey; 
                    border-radius:10px; 
                    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
                }

                .search-text{
                    height: 40%; width:80%; 
                    margin-left:70px; margin-right: 
                    30px; margin-top:15px;  border-radius:25px;
                }

                .custom-panel{
                    width: 85%;
                }

                .comment-button-container {
                    text-align: right; /* Center the button horizontally */
                    object-fit:cover; 
                    float:right; 
                    margin-top: 9px; 
                    margin-right:90px;
                }
                 
                 .comment-button{
                    position: absolute;
                    margin-left: 415px;
                 }
                 .post-image{
                    max-height: 500px; 
                    max-width: 500px;
                 }
                 .search-footer{
                    height:42px;
                 }                 
                 
               @media (max-width: 750px){
                .container{
                    width: 100%;
                    margin: 0;
                }

                .shade{
                   width: 100%;
                   height: 400px;
                   opacity: 0.4;
                }

                 .img-fluid{
                    height: 230px;
                    width: 1030px;
                    width: 100%;
                    margin-left: 0px;  
                }

                .profile-page .profile-header .cover .cover-body{
                    top: 115px;
                    right: 125px;
                    font-size: 10px;
                }

                .cover-body .profile-name {
                    font-weight: 600;
                    margin-left: 0;
                    font-size:20px; 
                    color: black; 
                    position:relative; 
                    left: 250px; 
                    top: 200px; 
                }

                .under-text{
                    margin-left: 5px;  
                    left: 265px; 
                    top: 225px;
                }

                .aside-text{
                    margin-left: 85px;
                    top: 225px;
                }

                .cover-body .profile-image {
                    position: absolute;
                    height: 135px;
                    width: 135px;
                    top: 30px;
                    left: 105px;
                }

                .profile-page .profile-header {
                    box-shadow: 0 0 10px 0 rgba(183, 192, 206, 0.2);
                    border: 1px solid #f2f4f9;
                    width: 100%;
                    height: 440px;
                }

                .profile-page .profile-header .header-links {
                    padding: 10px;
                    display: flex;
                    position: absolute;
                    top: 390px;
                    width: 100%;
                    height: 50px;
                    justify-content: center;
                    background: #fff;
                    border-radius: 0 0 .25rem .25rem;
                    border-top: 1px solid lightgrey;
                    opacity: 0.8;
                }

                .about-container{
                    background-color: rgba(183, 192, 206, 0.2);
                    flex-basis: 25%;
                    padding: 20px;
                    border-radius: 4px;
                    color: #626262;
                    position: none;
                    top: 0;
                    align-self: flex-start;
                    width: 100%;
                }

                .user-panel{
                    height:100px; 
                    width:100%; 
                    margin: 0; 
                    margin-left: 0; 
                    margin-bottom: 10px;
                    border: 2px solid lightgrey; 
                    border-radius:10px; 
                    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
                    background-color: rgba(183, 192, 206, 0.3);
                }

                .search-text{
                    height: 40%; width:68%; 
                    margin-left:70px; margin-right: 
                    30px; margin-top:15px;  border-radius:25px;
                }
                .search-footer{
                    position: relative;
                    width: 50px;
                    bottom: 55px;
                    margin-left: 85%;
                }
                  .search-footer span{
                    display: none;
                  }  
                  .custom-panel{
                    width: 100%;
                  }
                  .upload-photo{
                    display: none;
                  }
                  .date-text{
                    font-size: 10.5px;
                  }
                  .comment{
                    font-size: 11px;
                    height: 0 auto;
                    max-height: 100%;
                    width: 250px;
                    word-wrap: break-word;
                    padding: 0;
                 }  
                 .comment p{
                    bottom: 7px;
                    font-size: 13px;
                 }

                 .comment-button{
                    position: absolute;
                    margin-left: 240px;
                 }
                 .post-image{
                    max-height: 500px;
                    max-width: 200px;
                 }
                 .comment-button{
                    position:absolute; 
                    margin-left: 220px;
                    /* background-color: rgba(183, 192, 206, 0.3); */
                }

                .comment-button-container {
                    text-align: right; /* Center the button horizontally */
                    object-fit:cover; 
                    float:right; 
                    margin-top: 9px; 
                    margin-right:40px;
                }

                .comment-textarea {
                    width: 43%; /* Adjust the width as needed */
                    margin: 0 auto; /* Center horizontally */
                    margin-top: 5px;
                    border-radius: 25px; /* Adjust border radius for an oblong shape */
                }
               }
</style>
</head>

<body>
<?php

$searchTerm = $_GET['search'];
$contents_sql = "SELECT user.*, concat(fname,' ',lname) as name,image_path, cover_photo  FROM user WHERE concat( fname,' ',lname) LIKE '%$searchTerm%'";
$result = $conn->query($contents_sql);

if ($result->num_rows > 0) {
if ($row = $result->fetch_assoc()) {
$profileImage = $row['image_path'];
$profileName = $row['name'];
$coverPhoto = $row['cover_photo'];
$userBio = $row['bio'];
$userGender= $row['gender'];
$userLocation = $row['location'];
$userContact = $row['contact_number'];
$userBio = $row['bio'];
$userDob = $row['dob'];
$userDepart= $row['department'];
$userYear = $row['year'];
$userYearsec = $row['yr_section'];


echo '<div class="container">';
echo '<div class="profile-page">';
echo '<div class="row">';
echo '<div class="shade"></div>';
// echo  '<div class="profile-container"  style=" width: 100%; top: 30% background-size: cover;  background-image: url("'.$coverPhoto.'"); " >';
echo   '<div class="profile-header">
            <div class="cover" style="" >
                <figure >
                 <div class="image-container">
                       <img class="img-fluid"  onclick="showcoverImage()" style="border-radius: 20px;" src="'.$coverPhoto.'" alt="">
                        <div class="popup_cover" id="coverImage">
                                <span style="margin-top: 100px;" class="close" onclick="closecoverPopup()">&times;</span>
                        <div class="cover_photo">
                                <img src="'.$coverPhoto.'" alt="Enlarged Image">
                  </div>
                </figure>
                <div class="cover-body d-flex justify-content-between align-items-center">
                    <div>
                        <div class="image-container" >
                                <img class="profile-image" onclick="showImage()" src="'.$profileImage.'" alt="">
                            <div class="popup" id="profilePhoto">
                                <span style="margin-top: 100px;" class="close" onclick="closePopup()">&times;</span>
                            <div class="profile_container">
                                <img src="'.$profileImage.'" alt="Enlarged Image">
                        </div>
                    </div>
                </div> 
                
                    <span class="profile-name" style="">'.$profileName.'</span>
                    <span class="under-text" style=" ">'.$userYear.' '.$userYearsec.' <img style="" src="uploads/dot.png"> </span>
                    <span class="aside-text" style="">'.$userDepart.'</span>  
            
                    </div>
         </div>';
          
     echo '</div>';

     echo '<script >
     function showImage(imageId) {
           // Get the image container element
      var imageContainer = document.getElementById("profilePhoto");
           // Show the image container
           imageContainer.style.display = "block";
     }

     function closePopup() {
             document.getElementById("profilePhoto").style.display = "none";
         }
     
     function showcoverImage(imageId) {
      var coverContainer = document.getElementById("coverImage");
           coverContainer.style.display = "block";
     }

     function closecoverPopup() {
             document.getElementById("coverImage").style.display = "none";
         }           
</script> ';
     
                        echo '<div class="header-links" >
                            <ul class="" style="display: flex;">
                                <li class="options" >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-columns mr-1 icon-md">
                                        <path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18"></path>
                                    </svg>
                                    <a class="pt-1px d-none d-md-block" href="#">Timeline</a>
                                </li>
                            </ul>
                          </div>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';

echo '<div class="row profile-body" style="margin-top: 20px;">';
//left wrapper start 
echo '<div class="about-container d-none d-md-block col-md-4 col-xl-3 left-wrapper">';
echo '<div class="card" style="border: 1px solid lightgrey; border-radius: 8px;">
      <div class="card-body">
           <div class="">
                <h6 class="card-title" style=" font-size: 20px; font-weight: bold; margin-left: 20px; margin-top: 20px;" >About</h6>
            </div>
            <hr>
            <div class="mt-3">
            <img class="icon" src="uploads/bio.png" style="position: absolute">
                <label class="tx-11 font-weight-bold mb-0 text-uppercase" style="margin-left: 50px; font-size: 11px;">Bio:</label>
                <p class="text-muted" style="font-size: 15px; margin-left: 50px;">'. $row['bio'] .'</p>
            </div>
            <div class="mt-3">
            <img class="icon" src="uploads/gender.png" style="position: absolute">
                <label class="tx-11 font-weight-bold mb-0 text-uppercase" style="margin-left: 50px; font-size: 11px;">Gender:</label>
                <p class="text-muted" style="font-size: 15px; margin-left: 50px;">'. $row['gender'] .'</p>
            </div>
            <div class="mt-3">
            <img class="icon" src="uploads/address.png" style="position: absolute">
                <label class="tx-11 font-weight-bold mb-0 text-uppercase" style="margin-left: 50px; font-size: 11px;">Address:</label>
                <p class="text-muted" style="font-size: 15px; margin-left: 50px;">'. $row['location'] .'</p>
            </div>
            <div class="mt-3">
            <img class="icon" src="uploads/phone.png" style="position: absolute">
                <label class="tx-11 font-weight-bold mb-0 text-uppercase" style="margin-left: 50px; font-size: 11px;">Contact Number:</label>
                <p class="text-muted" style="font-size: 15px; margin-left: 50px;">'. $row['contact_number'] .'</p>
            </div>
            <div class="mt-3">
            <img class="icon" src="uploads/birthdate.png" style="position: absolute">
                <label class="tx-11 font-weight-bold mb-0 text-uppercase" style="margin-left: 50px; font-size: 11px;">Birthdate:</label>
                <p class="text-muted" style="font-size: 15px; margin-left: 50px;">'. date("M d,Y",strtotime($row['dob'])) .'</p>
            </div>
        </div>
    </div>';
    

echo '<div class="card upload-photo" style="margin-top: 20px; border: 1px solid lightgrey; border-radius: 8px;">
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-2">
                <h6 class="card-title mb-0" style=" font-size: 20px; font-weight: bold; margin-left: 20px; margin-top: 20px;" >Photos</h6>
               
            </div>
            <hr>
        </div>
    </div>';
echo '</div>';
// left wrapper end



            // middle wrapper start
            echo '<div class="col-md-8 col-xl-6 middle-wrapper" style=""  >';
            echo '<div class="row" >';
            echo '<div class="col-md-12 grid-margin" >';
                               
                   

                              echo '<div class="modal fade" id="postModal" tabindex="-1" role="dialog" aria-labelledby="postModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h5 class="modal-title" id="postModalLabel">Create Post</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                          </button>
                                      </div>
                                      <div class="modal-body">
                                          <form method="post" action="post.php" onsubmit="return validatePostContent()" enctype="multipart/form-data">
                                              <div class="form-group">
                                                  <textarea class="form-control post-textarea-modal" name="post_content" id="post_content_modal" placeholder="Whats the update?"></textarea>
                                              </div>
                                            
                                              <div class="form-group">
                                                  <label for="post_image">Upload Image (Optional):</label>
                                                  <input type="file" class="form-control-file" name="post_image" id="post_image">
                                              </div>
                                              <div class="button-container">
                                                  <button type="submit" class="btn btn-success" name="post">Post</button>
                                              </div>
                                          </form>
                                      </div>
                                  </div>
                              </div>
                          </div>';

                 echo '<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="postModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 class="modal-title" id="postModalLabel">Create Post</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <div class="modal-body">
                                      <form method="post" action="post.php" onsubmit="return validatePostContent()" enctype="multipart/form-data">
                                          <div class="form-group">
                                              <textarea class="form-control post-textarea-modal" name="post_content" id="post_content_modal" placeholder="Whats the update?"></textarea>
                                          </div>
                                       
                                          <div class="form-group">
                                              <label for="post_image">Upload Image (Optional):</label>
                                              <input type="file" class="form-control-file" name="post_image" id="post_image">
                                          </div>
                                          <div class="button-container">
                                              <button type="submit" class="btn btn-success" name="post">Post</button>
                                          </div>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>';

                      echo '<div class="panel user-panel" style="">
                         <div id="whats-on-your-mind-container">
                         <div class="form-group">
                          <img class="img-circle" style="position: absolute; width: 40px; height: 40px; object-fit:cover; margin-left:20px; margin-top: 5px; margin-right: 20px; float:left;" src="'.  $_SESSION['profile_picture'].'" alt="User Image">
                           <textarea class="form-control search-text" style="" name="post_content" id="post_content_whats_on_your_mind" placeholder="Write someting to '.$profileName.'..."></textarea>
                          </div>
                       </div>
                       <div class="search-footer" style="">
                           <div  data-toggle="modal" data-target="#uploadModal" class="upload" style=" display: flex; align-items: center; text-decoration: none; border-radius: 10px;">
                              <img  class="photo_icon" src="uploads/photos.png" > 
                               <span>photos</span>
                           </div>
                        </div> 
                   </div>';

                        // Query to search for a user by name
                        $sql = "SELECT post.*, concat(user.fname,' ',user.lname) as name,user.image_path  FROM post 
                        LEFT JOIN user ON post.user_id = user.user_id  WHERE concat(fname,' ',lname) LIKE '%$searchTerm%'
                        ORDER BY date_created DESC";
                        $result = $conn->query($sql);
                        
                        if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                        $post_id = $row['post_id'];
                        $post_content = $row['content'];
                        $name = $row['name'];
                        $date_created = $row['date_created'];
                        $imagePath = $row['image_path'];
                        
                        // Inside the while loop where you display posts
                        echo '<div class="panel panel-default custom-panel" style="">';
                        echo '<div class="panel-heading">';
                        echo '<div class="row">';
                        echo '<div class="col-xs-6">';
                        echo '<img class="img-circle" style="width: 40px; height: 40px; object-fit:cover; float:left;" src="'.$imagePath.'" alt="User Image">';
                        echo '<div style="font-weight: bold">' . $row['name'] . '</div>';
                        echo '<div class="date-text" style="margin-left: 40px">'; 
                        echo date("M d,Y h:i a",strtotime($row['date_created']));
                        echo '</div>';
                        echo '</div>';
                        echo '<div class="col-xs-6 text-right">';
                        
                        // Inside the while loop where you display posts
                        if ('%$searchTerm%' == $row['user_id']) {
                            // Only display the dropdown button if the current user is the post owner
                            echo '<div class="dropdown">';
                            echo '<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                            echo '<i class="fas fa-ellipsis-v"></i>';
                            echo '</button>';
                            echo '<ul class="dropdown-menu dropdown-menu-right">';
                                    
                            // Add options for actions like edit and delete here
                            echo '<li><a href="#" class="edit-post" data-postid="' . $post_id . '" data-postcontent="' . htmlspecialchars($post_content) . '"><i class="fas fa-edit"></i> Edit</a></li>';
                            echo '<li><a href="delete_post.php?post_id=' . $post_id . '" onclick="return confirm(\'Are you sure you want to delete this post?\')"><i class="fas fa-trash"></i> Delete</a></li>';
                        
                            // Add more options as needed
                            echo '</ul>';
                            echo '</div>';
                        }        
                        echo '</div>'; // Close the right-aligned column
                        echo '</div>'; // Close the row
                        echo '</div>'; // Close the panel-heading
                        
                        echo '<div class="panel-body post-content">' . $post_content;
                        
                        // Check if there is an image associated with the post
                        if (!empty($row['image'])) {
                            // Construct the full image path
                            $imagePath = $row['image'];
                            
                            // Display the image using an <img> tag with max-height and max-width
                            echo '<img class="post-image" src="' . $imagePath . '" alt="Image" style="">'; // Adjust max-height and max-width as needed
                        
                        }
                        
                        
                        $user_has_reacted = false; // Initialize as false
                        if (isset($_SESSION['id'])) {
                            $user_id = $_SESSION['id'];
                        
                            // Check if the user has reacted to this post
                            $check_sql = "SELECT COUNT(*) FROM reaction_logs WHERE post_id = ? AND user_id = ?";
                            $check_stmt = $conn->prepare($check_sql);
                            $check_stmt->bind_param("ii", $post_id, $user_id);
                            $check_stmt->execute();
                            $check_stmt->bind_result($existing_reactions);
                            $check_stmt->fetch();
                            $check_stmt->close();
                        
                            if ($existing_reactions > 0) {
                                $user_has_reacted = true; // User has reacted
                            }
                        }
                        
                        // Generate the heart button HTML with the appropriate CSS class
                        // Generate the heart button HTML with the appropriate CSS class
                        echo '<div class="panel-footer">';
                        echo '<div class="d-flex justify-content-between align-items-center">'; // Flexbox container
                        
                        if ($user_has_reacted) {
                            // User has reacted, so display the button in pink with a red heart icon
                            echo '<button class="btn btn-pink reaction-button" data-postid="' . $post_id . '"><i class="fas fa-heart" style="color: red;"></i> <span class="reaction-counter">0</span></button>';
                        } else {
                            // User has not reacted, display the button in the default style (white)
                            echo '<button class="btn btn-default reaction-button" data-postid="' . $post_id . '"><i class="fas fa-heart" style="color: pink;"></i> <span class="reaction-counter">0</span></button>';
                        }
                        
                        // Add the comment counter code here
                        $comment_count_sql = "SELECT COUNT(*) FROM comment WHERE post_id = ?";
                        $comment_count_stmt = $conn->prepare($comment_count_sql);
                        $comment_count_stmt->bind_param("i", $post_id);
                        $comment_count_stmt->execute();
                        $comment_count_stmt->bind_result($comment_count);
                        $comment_count_stmt->fetch();
                        $comment_count_stmt->close();
                        
                        echo '<div class="comment-counter" style="float:right; margin-top: 10px;">Comments: ' . $comment_count . '</div>'; // Use ml-auto for right alignment
                        
                        echo '</div>'; // Close the flexbox container
                        echo '</div>';
                        echo '</div>'; // Close the custom-panel

                       
                        
                        
                        // Fetch and display comments for this post
                        $comments_sql = "SELECT comment.*, concat(user.fname,' ',user.lname) as name,user.image_path FROM comment
                        LEFT JOIN user ON comment.user_id = user.user_id
                        WHERE comment.post_id = $post_id
                        ORDER BY date_posted ASC";
                        $comments_result = $conn->query($comments_sql);
                        
                        // Add a form for adding comments to this post

                        echo '<form method="post" action="comment.php">';
                        echo '<input type="hidden" name="post_id" value="' . $post_id . '">'; // Add the hidden field here
                        echo '<div class="comment-button-container" style="">';
                        echo '<button type="submit" class="fas fa-paper-plane" name="comment"  style=" height: 35px;" id="sendButton" ></button>';
                        echo '</div>';
                        echo '<img class="img-circle" style="width: 40px; height: 40px; object-fit:cover; margin-left:45px; margin-top: 5px; float:left;" src= "'. $_SESSION['profile_picture'] .'" alt="User Image">';
                        echo '<div class="form-group">';
                        echo '<textarea class="form-control comment-textarea" name="comment_content" placeholder="Add a comment" id="textInput" oninput="checkInput()" ></textarea>';
                        echo '</div>';
                        echo '</form>';

                     
                        echo '<script>
                        function checkInput() {
                        var inputText = document.getElementById("textInput").value;
                        var sendButton = document.getElementById("sendButton");
        
                        if (inputText.trim() !== "") {
                            sendButton.style.backgroundColor = "#86dc3d";
                            sendButton.disabled = false;    
                        } else {
                            sendButton.style.backgroundColor = "lightgrey";
                            sendButton.disabled = true;
                        }
                        }
                    </script>';
                    
                        if ($comments_result->num_rows > 0) {
                            echo '<div class="comments-container">'; // Container for comments
                            while ($comment_row = $comments_result->fetch_assoc()) {
                                // Display each comment here
                                $comment_id = $comment_row['comment_id']; // Assuming you have a unique comment_id
                                $comment_user_id = $comment_row['user_id']; // Get the user_id of the comment owner
                                $image_Path = $comment_row['image_path'];// Get the profile of the user
                        
                                echo '<img class="img-circle" style="width: 40px; height: 40px; object-fit:cover; float:left; margin-top:10px;" src="'.$image_Path.'" alt="User Image">';
                                echo '<div class="comment">';
                                echo '<div style=" display: flex; align-items: center;">';
                                echo '<div class"" style="font-weight: bold; ">' . $comment_row['name'] .'</div>';
                                echo '<div style="" >' . " - ".  date("M d,Y h:i a",strtotime($comment_row['date_posted']))  . '</div>';
                            
                                // Check if the current user is the owner of the comment
                                if ($user_id == $comment_user_id) {
                                    // Add a unique identifier to the modal (e.g., comment-edit-modal-commentID)
                                    $modalId = "comment-edit-modal-" . $comment_id;

                                    ?>

                                    <div class="dropdown comment-button" style="">
                                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <!-- Add data-target attribute to target the correct modal -->
                                            <li><a href="#" class="edit-comment" data-toggle="modal" data-target="#<?php echo $modalId; ?>"><i class="fas fa-edit"></i> Edit</a></li>
                                            <li><a href="delete_comment.php?comment_id=<?php echo $comment_id; ?>" onclick="return confirm('Are you sure you want to delete this comment?')"><i class="fas fa-trash"></i> Delete</a></li>
                                        </ul>
                                    </div>
                                    
                                    
                                
                                    <!-- Edit Comment Modal for this comment -->
                                    <div class="modal fade" id="<?php echo $modalId; ?>" tabindex="-1" role="dialog" aria-labelledby="editCommentModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editCommentModalLabel">Edit Comment</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                <!-- Add this HTML form to your page -->
                                                    <form method="post" action="edit_comment.php">
                                                        <input type="hidden" name="comment_id" value="<?php echo $comment_id; ?>">
                                                        <div class="form-group">
                                                            <textarea class="form-control" name="edited_comment_content" id="edited_comment_content"><?php echo $comment_row['content']; ?></textarea>
                                                        </div>
                                                        <div class="text-center"> <!-- Center-align the button -->
                                                            <button type="submit" class="btn btn-primary" name="edit_comment">Save Changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    
                                <?php } // End if user is comment owner
                            
                                echo '</div>';
                        
                                echo '<p style="margin-top: 10px; margin-left: 5px; padding: 0;">' . $comment_row['content'] .'</p>';
                                echo '</div>';
                                
                            
                            }
                            
                            echo '</div>'; // Close the comments container
                        }
                        
                        echo '</div>'; // Close the custom-panel 
                        }
                        }

                        echo '<div class="modal fade" id="editPostModal" tabindex="-1" role="dialog" aria-labelledby="editPostModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editPostModalLabel">Edit Post</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="edit_post.php" id="editPostForm">
                                        <div class="form-group">
                                            <textarea class="form-control" name="edited_post_content" id="edited_post_content" placeholder="Edit your post"></textarea>
                                        </div>
                                        <div class="text-center">
                                            <input type="hidden" name="edited_post_id" id="edited_post_id">
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>';

        echo '<input type="hidden" id="editedPostContent" name="editedPostContent">';



                    echo '</div>';
                    echo '</div>';
                    echo '</div>'; // close the middle wrapper start
              
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    
                     
                }
            }
                        // Close the database connection
                        $conn->close();
                        ?>
                                 
                 <script>
                                document.getElementById("whats-on-your-mind-container").onclick = function () {
                                    $("#postModal").modal("show");
                                };
                                
                                $(document).ready(function () {
                                // Initialize Bootstrap components here
                                $('[data-toggle="dropdown"]').dropdown(); // Initialize dropdowns
                                // Add any other initializations as needed
                            });
                  </script>

<script>

// Function to fetch and update reaction count for a post
function updateReactionCount(postId) {
    $.ajax({
        type: "GET",
        url: "fetch_reaction_count.php",
        data: {
            post_id: postId
        },
        success: function (response) {
            var counterElement = $(`[data-postid="${postId}"] .reaction-counter`);
            counterElement.text(response);
        },
        error: function () {
            console.error("Error fetching reaction count.");
        }
    });
}

$(document).ready(function () {
    // Initialize Bootstrap components here
    $('[data-toggle="dropdown"]').dropdown(); // Initialize dropdowns
    // Add any other initializations as need
$(document).ready(function () {
// Initialize Bootstrap components here
$('[data-toggle="dropdown"]').dropdown(); // Initialize dropdowns
// Add any other initializations as needed

// Handle edit post click
$(".edit-post").click(function () {
    var postId = $(this).data("postid");
    var postContent = $(this).data("postcontent");

    // Populate the modal with post content and post ID
    $("#edited_post_content").val(postContent);
    $("#edited_post_id").val(postId);

    // Store the edited post content in a hidden field
    $("#editedPostContent").val(postContent);

    // Show the edit post modal
    $("#editPostModal").modal("show");
});

// Handle form submission
$("#editPostForm").submit(function (e) {
    e.preventDefault();

    // Get the edited content from the textarea
    var editedContent = $("#edited_post_content").val();

    // Update the hidden field with the edited content
    $("#editedPostContent").val(editedContent);

    // Submit the form to edit_post.php
    this.submit();
});

// Handle edit comment click
$(".edit-comment").click(function () {
    var commentId = $(this).data("commentid");
    var commentContent = $(this).data("commentcontent");

    // Populate the modal with comment content and comment ID
    $("#edited_comment_content").val(commentContent);
    $("#edited_comment_id").val(commentId);

    // Show the edit comment modal
    $("#editCommentModal").modal("show");
});

// Handle form submission (similar to edit_post.js)
$("#editCommentForm").submit(function (e) {
    e.preventDefault();

    // Get the edited content from the textarea
    var editedContent = $("#edited_comment_content").val();

    // Update the hidden field with the edited content
    $("#editedCommentContent").val(editedContent);

    // Submit the form to edit_comment.php
    this.submit();
});
});

// Handle reaction button click
$(".reaction-button").click(function () {
    var postId = $(this).data("postid");
    var counterElement = $(this).find(".reaction-counter");

    // Simulate updating the counter immediately (before the AJAX request)
    var currentCount = parseInt(counterElement.text());
    var newCount = currentCount + 1;
    counterElement.text(newCount);

    // Send an AJAX request to record the reaction in your database
    $.ajax({
        type: "POST",
        url: "record_reaction.php",
        data: {
            post_id: postId,
            reaction_type: "heart"
        },
        success: function (response) {
            console.log("Response from server: " + response); // Log the response
            // Handle the response (e.g., display a success message)
            console.log("Reaction recorded successfully.");
            // Update the reaction count for the current post
            updateReactionCount(postId);
        },
        error: function () {
            // Handle errors (e.g., display an error message)
            console.error("Error recording reaction.");
        }
    });
});

// Fetch and update reaction counts for all posts when the page loads
$(".reaction-button").each(function () {
    var postId = $(this).data("postid");
    updateReactionCount(postId);
});
});

</script>

<!-- // Fetch and update reaction counts for all posts when the page loads -->
<script>
function checkInput() {
var inputText = document.getElementById('textInput').value;
var sendButton = document.getElementById('sendButton');

if (inputText.trim() !== '') {
    sendButton.style.backgroundColor = '#86dc3d'; /* Change color if input has text */
    sendButton.disabled = false;    
} else {
    sendButton.style.backgroundColor = 'lightgrey'; /* Revert to initial color if input is empty */
    sendButton.disabled = true;
}
}
</script>


                       
                       
                       

                      
                                       
</body>
</html>
