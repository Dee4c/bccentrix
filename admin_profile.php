<?php
include "dbconn.php";
include "dashboard.php";
// include("admin_right_navbar.php");
// include "adminsession.php";
// include("right_navbar.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Profile Page</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="postmainlink/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<style>       
    body{
            background-color: #f9fafb;
            overflow-x: hidden;
             }

        .container{
             width:80%;
             margin-left: 20%;
             }

        .profile-page .profile-header {
            box-shadow: 0 0 10px 0 rgba(183, 192, 206, 0.2);
            border: 1px solid #f2f4f9;
        }

        .profile-page .profile-header .cover {
            position: relative;
            border-radius: .25rem .25rem 0 0;
        }


        .profile-page .profile-header .cover figure {
            margin-bottom: 0;
        }

        /* @media (max-width: 767px) {
            .profile-page .profile-header .cover figure {
                height: 110px;
                overflow: hidden;
            }
        }

        @media (min-width: 2400px) {
            .profile-page .profile-header .cover figure {
                height: 280px;
                overflow: hidden;
            }
        } */

        .profile-page .profile-header .cover figure img {
            border-radius: .25rem .25rem 0 0;
            width: 100%;
        }

        /* @media (max-width: 767px) {
            .profile-page .profile-header .cover figure img {
                -webkit-transform: scale(2);
                transform: scale(2);
                margin-top: 15px;
            }
        }

        @media (min-width: 2400px) {
            .profile-page .profile-header .cover figure img {
                margin-top: -55px;
            }
        } */

          .shade {
            position: absolute;
            width: 80%;
            height: 75.2%;
            background: linear-gradient(rgba(255, 255, 255, 0.1), lightgrey 115%);
            
        }

        .profile-page .profile-header .cover .cover-body {
            position: absolute;
            top: 250px;
            left: 0;
            /* z-index: 1; */
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
         
        /* @media (max-width: 767px) {
            .cover-body .profile-pic {
                width: 70px;
            }
        } */

        .cover-body .profile-name {
            font-size: 20px;
            font-weight: 600;
            margin-left: 17px;
        }

        .profile-page .profile-header .header-links {
            padding: 15px;
            display: -webkit-flex;
            display: flex;
            -webkit-justify-content: center;
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

                /* Center the comment button within the container */
                .comment-button-container {
                    text-align: right; /* Center the button horizontally */
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
                    /* height: 89vh; */
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
                    position: relative;
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
</style>
</head>

<body>
<!-- modal -->

        <div class="container" >
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
            
            <!-- Modal content-->
            <div class="modal-content"style=" background:linear-gradient(#DAEBC7, #05A3B5); ">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                <p>Some text in the modal.</p>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
            
            </div>
        </div>
   <!-- coverModal -->
        <div class="modal fade" id="coverModal" role="dialog">
            <div class="modal-dialog">
            
            <!-- Modal content-->
            <div class="modal-content"style=" background:linear-gradient(#DAEBC7, #05A3B5); ">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                <p>Some text in the modal.</p>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
            
            </div>
        </div>
    </div>

      <!-- aboutModal -->
      <div class="modal fade" id="aboutModal" role="dialog">
            <div class="modal-dialog">
            
            <!-- Modal content-->
            <div class="modal-content" style= " height: 600px; background:linear-gradient(#DAEBC7, #05A3B5); ">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                <p>Some text in the modal.</p>
                </div>
            </div>
          </div>
        </div>
    

    <!-- aboutModal -->
    <div class="modal fade" id="aboutModal" role="dialog">
            <div class="modal-dialog">
            
            <!-- Modal content-->
            <div class="modal-content" style= "background:linear-gradient(#DAEBC7, #05A3B5); ">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                <p>Some text in the modal.</p>
                </div>
            </div>
          </div>
        </div>
    
<!-- end of modal -->

<div class="container"> 
        <div class="profile-page tx-13">
            <div class="row">
                <div class="shade"></div>
                <div class="profile-container"  style=" width: 100%; background-color: lightgrey; background-size: cover;  background-image: url('<?php echo $_SESSION['cover_photo'] ?>'); " >
                  <div class="profile-header">
                        <div class="cover" style="height:75vh;" >
                            <figure >
                            <div class="image-container">
                            <img class="img-fluid" onclick="showImage('image2')" style="height: 81%; object-fit: cover; width: 95%;  border-radius: 30px; margin-left: 30px; " src="<?php echo $_SESSION['cover_photo'] ?>" alt=""> 
                                    <div class="popup_cover" id="image2">
                                        <span style="margin-top: 100px;" class="close" onclick="closePopup()">&times;</span>
                                    <div class="cover_photo">
                                        <img src="<?php echo $_SESSION['cover_photo'] ?>" alt="Enlarged Image">
                            </div>
                            </figure>
                            <div class="cover-body d-flex justify-content-between align-items-center">
                                <div>
                                <div class="image-container">
                                    <img class="profile-image" onclick="showImage('image1')" src="<?php echo $_SESSION['profile_picture'] ?>" alt="">
                                    <div class="popup" id="image1">
                                        <span style="margin-top: 100px;" class="close" onclick="closePopup()">&times;</span>
                                    <div class="profile_container">
                                        <img src="<?php echo $_SESSION['profile_picture'] ?>" alt="Enlarged Image">
                                    </div>
                                    </div>
                                </div>   
                                    <a href="admin_upload_profile_pictures.php" data-toggle="modal" data-target="#myModal" class=" rounded-circle img-thumbnail" style="position: absolute; display:flex; justify-content:center; align-items: center; top:220px; right:76%; width:40px; height: 40px; color: #000; font-size: 20px;"><i class="fa fa-camera rounded-circle"></i></a>
                                    <span class="profile-name" style="font-size:30px; color: black; position: absolute; left: 250px; top: 155px; "><?php echo $_SESSION['fname']; ?><?php echo ' ' ?><?php echo $_SESSION['lname'];?> </span> 
                            </div>
                                <div class="btn_coverphoto"  href="admin_upload_cover_photo.php"  data-toggle="modal" data-target="#coverModal">
                                <i class="fa fa-camera rounded-circle" style="font-size: 20px; margin-right: 10px;"></i>
                                        <span>Edit Cover Photo</span>
                                </div>
                            </div>
                            </div>
                        <div class="header-links" >
                            <ul class="" style="display: flex;">
                                <li class="options" >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-columns mr-1 icon-md">
                                        <path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18"></path>
                                    </svg>
                                    <a class="pt-1px d-none d-md-block" href="#">Timeline</a>
                                </li>
                                <!-- <li class="options" >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user mr-1 icon-md">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <a class="pt-1px d-none d-md-block" href="#">About</a>
                                </li> -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <script >
            function showImage(imageId) {
            // Hide all images
            var images = document.querySelectorAll('.hidden');
            images.forEach(function (image) {
            image.style.display = 'none';
            });

            // Show the selected image
            var selectedImage = document.getElementById(imageId);
            if (selectedImage) {
            selectedImage.style.display = 'block';
            }
        }

            function closePopup() {
                document.getElementById("image1").style.display = "none";
                document.getElementById("image2").style.display = "none";
            }

            
            </script>


            <div class="row profile-body" style="margin-top: 20px;">
                <!-- left wrapper start -->
                <div class="about-container  d-none d-md-block col-md-4 col-xl-3 left-wrapper" >
                    <div class="card" style="border: 1px solid lightgrey; border-radius: 8px; ">
                        <div class="card-body">
                            <div class="">
                                <h6 class="card-title" style=" font-size: 20px; font-weight: bold; margin-left: 20px; margin-top: 20px;" >About</h6>
                                <div class="dropdown" style="position: absolute;">
                                    <button class="btn" style=" position: absolute; margin-left: 220px; bottom: 5px; " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal icon-lg text-muted pb-3px">
                                            <circle cx="12" cy="12" r="1"></circle>
                                            <circle cx="19" cy="12" r="1"></circle>
                                            <circle cx="5" cy="12" r="1"></circle>
                                        </svg>
                                    </button>
                                    <div class="dropdown-menu" style=" padding: 10px; margin-left: 220px;" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item d-flex align-items-center" data-toggle="modal" data-target="#aboutModal" href="admin_manage_about.php">
                                            <svg style="color: black;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 icon-sm mr-2">
                                                <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                            </svg> <span style="color: black;" >Edit</span></a>
                                        <!-- <a class="dropdown-item d-flex align-items-center" href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye icon-sm mr-2">
                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                <circle cx="12" cy="12" r="3"></circle>
                                            </svg> <span class="">More</span></a> -->
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="mt-3">
                            <img class="icon" src="uploads/bio.png" style="position: absolute">
                                <label class="tx-11 font-weight-bold mb-0 text-uppercase" style="margin-left: 50px; font-size: 11px;">Bio:</label>
                                <p class="text-muted" style="font-size: 15px; margin-left: 50px;"><?php echo $_SESSION['bio'] ?></p>
                            </div>
                            <div class="mt-3">
                            <img class="icon" src="uploads/gender.png" style="position: absolute">
                                <label class="tx-11 font-weight-bold mb-0 text-uppercase" style="margin-left: 50px; font-size: 11px;">Gender:</label>
                                <p class="text-muted" style="font-size: 15px; margin-left: 50px;"><?php echo $_SESSION['gender'] ?></p>
                            </div>
                            <div class="mt-3">
                            <img class="icon" src="uploads/address.png" style="position: absolute">
                                <label class="tx-11 font-weight-bold mb-0 text-uppercase" style="margin-left: 50px; font-size: 11px;">Address:</label>
                                <p class="text-muted" style="font-size: 15px; margin-left: 50px;"><?php echo $_SESSION['location'] ?></p>
                            </div>
                            <div class="mt-3">
                            <img class="icon" src="uploads/phone.png" style="position: absolute">
                                <label class="tx-11 font-weight-bold mb-0 text-uppercase" style="margin-left: 50px; font-size: 11px;">Contact Number:</label>
                                <p class="text-muted" style="font-size: 15px; margin-left: 50px;"><?php echo $_SESSION['contact_number'] ?></p>
                            </div>
                            <div class="mt-3">
                            <img class="icon" src="uploads/birthdate.png" style="position: absolute">
                                <label class="tx-11 font-weight-bold mb-0 text-uppercase" style="margin-left: 50px; font-size: 11px;">Birthdate:</label>
                                <p class="text-muted" style="font-size: 15px; margin-left: 50px;"><?php echo date("M d,Y",strtotime($_SESSION['dob'])) ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="card" style="margin-top: 20px; border: 1px solid lightgrey; border-radius: 8px;">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <h6 class="card-title mb-0" style=" font-size: 20px; font-weight: bold; margin-left: 20px; margin-top: 20px;" >Photos</h6>
                                <div class="dropdown" style="position: absolute;">
                                    <button class="btn p-0" style="position: absolute; margin-left: 220px; bottom: 5px;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal icon-lg text-muted pb-3px">
                                            <circle cx="12" cy="12" r="1"></circle>
                                            <circle cx="19" cy="12" r="1"></circle>
                                            <circle cx="5" cy="12" r="1"></circle>
                                        </svg>
                                    </button>
                                    <div class="dropdown-menu" style="margin-left: 220px;" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item d-flex align-items-center" data-toggle="modal" data-target="#aboutModal" href="manage_about.php">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 icon-sm mr-2">
                                                <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                            </svg> <span class="" >Edit</span></a>
                                        <a class="dropdown-item d-flex align-items-center" href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye icon-sm mr-2">
                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                <circle cx="12" cy="12" r="3"></circle>
                                            </svg> <span class="">More</span></a>
                                    </div>
                                </div>
                            </div>
                            <hr>
                           
                        </div>
                    </div>
                </div>
<!-- left wrapper end -->
            <!-- middle wrapper start -->
                <div class="col-md-8 col-xl-6 middle-wrapper">
                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <!-- <div class="card rounded"> -->

                            <div class="modal fade" id="postModal" tabindex="-1" role="dialog" aria-labelledby="postModalLabel" aria-hidden="true">
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
                                                    <textarea class="form-control post-textarea-modal" name="post_content" id="post_content_modal" placeholder="What's the update?"></textarea>
                                                </div>
                                                <!-- Add an input field for image uploads -->
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
                            </div>

                            <div class="postcontainer" style="border: 2px solid lightgrey; border-radius:10px; height: 110px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
                                <div id="whats-on-your-mind-container">
                                    <div class="form-group">
                                    <img class="img-circle" style="width: 40px; height: 40px; object-fit:cover; margin-left:20px; margin-right: 20px; float:left;" src= "<?php echo $_SESSION['profile_picture'] ?>" alt="User Image">
                                        <textarea class="form-control" style=" width:80%; margin-left:10px; margin-right: 30px; margin-top:15px;  border-radius:25px;" name="post_content" id="post_content_whats_on_your_mind" placeholder="What's the update?"></textarea>
                                    </div>
                                    <hr style="margin-left:10px; margin-right:10px;" >
                                </div>
                                </div>

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


                            <?php
                        // Fetch posts and their comments
                        $sql = "SELECT post.*, concat(user.fname,' ',user.lname) as name,user.image_path  FROM post 
                                LEFT JOIN user ON post.user_id = user.user_id  WHERE user.user_id = $user_id
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
                                echo '<div class="panel panel-default custom-panel" style="width:100%; margin-top:25px;">';
                                echo '<div class="panel-heading" >';
                                echo '<div class="row">';
                                echo '<div class="col-xs-6">';
                                echo '<img class="img-circle" style="width: 40px; height: 40px; object-fit:cover; float:left;" src="'.$imagePath.'" alt="User Image">';
                                echo '<div style="font-weight: bold">' . $row['name'] . '</div>';
                                echo '<div style="margin-left: 40px">'; 
                                echo date("M d,Y h:i a",strtotime($row['date_created']));
                                echo '</div>';
                                echo '</div>';
                                echo '<div class="col-xs-6 text-right">';
                                
                                // Inside the while loop where you display posts
                                if ($user_id == $row['user_id']) {
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
                                    echo '<img src="' . $imagePath . '" alt="Image" style="max-height: 450px; max-width: 450px; ">'; // Adjust max-height and max-width as needed
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
                                echo '<div class="comment-button-container" style=" object-fit:cover; float:right; margin-top: 3px; margin-right:60px;">';
                                echo '<button type="submit" class="fas fa-paper-plane" name="comment"  style=" height: 35px;" id="sendButton" ></button>';
                                echo '</div>';
                                echo '<div class="form-group" style=" margin-top:10px; margin-bottom:40px; margin-left:90px; width:150%; height:30px;">';
                                echo '<textarea class="form-control comment-textarea" name="comment_content" placeholder="Add a comment" id="textInput" oninput="checkInput()" ></textarea>';
                                echo '</div>';
                                echo '</form>';

                                if ($comments_result->num_rows > 0) {
                                    echo '<div class="comments-container">'; // Container for comments
                                    while ($comment_row = $comments_result->fetch_assoc()) {
                                        // Display each comment here
                                        $comment_id = $comment_row['comment_id']; // Assuming you have a unique comment_id
                                        $comment_user_id = $comment_row['user_id']; // Get the user_id of the comment owner
                                        $image_Path = $comment_row['image_path'];// Get the profile of the user

                                        echo '<img class="img-circle" style="width: 40px; height: 40px; object-fit:cover; float:left; margin-top:10px;" src="'.$image_Path.'" alt="User Image">';
                                        echo '<div class="comment">';
                                        echo '<p style="font-weight: bold">' . $comment_row['name'] . ' - ' .  date("M d,Y h:i a",strtotime($comment_row['date_posted']))  . '</p>';
                                        echo '<p>' . $comment_row['content'] .'</p>';
                                    
                                        // Check if the current user is the owner of the comment
                                        if ($user_id == $comment_user_id) {
                                            // Add a unique identifier to the modal (e.g., comment-edit-modal-commentID)
                                            $modalId = "comment-edit-modal-" . $comment_id;

                                            // echo '<div class="dropdown" >';
                                            // echo '<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                                            // echo '<i class="fas fa-ellipsis-v"></i>';
                                            // echo '</button>';
                                            // echo '<ul class="dropdown-menu dropdown-menu-right">';
                                            // echo '<li><a href="#" class="edit-comment" data-toggle="modal" data-target="#'. $modalId.'"><i class="fas fa-edit"></i> Edit</a></li>';
                                            // echo '<li><a href="delete_comment.php?comment_id='. $comment_id. '" onclick="return confirm(\'Are you sure you want to delete this comment\')"><i class="fas fa-trash"></i> Delete</a></li>';
                                            // echo '</ul>';
                                            // echo '</div>';
                                            ?>
                                            <div class="dropdown">
                                            <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-right">
                                                    <!-- Add data-target attribute to target the correct modal -->
                                                    <li><a href="#" class="edit-comment" data-toggle="modal" data-target="#<?php echo $modalId; ?>"><i class="fas fa-edit"></i> Edit</a></li>
                                                    <li><a href="comment.php?comment_id=<?php echo $comment_id; ?>" onclick="return confirm('Are you sure you want to delete this comment?')"><i class="fas fa-trash"></i> Delete</a></li>
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
                                    
                                    }
                                    
                                    echo '</div>'; // Close the comments container
                                }

                                echo '</div>'; // Close the custom-panel 
                            }
                        }
                        ?>
                    <!-- Edit Post Modal -->

                    <!-- Edit Post Modal -->
                    <div class="modal fade" id="editPostModal" tabindex="-1" role="dialog" aria-labelledby="editPostModalLabel" aria-hidden="true">
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
                                        <div class="text-center"> <!-- Center-align the button -->
                                            <input type="hidden" name="edited_post_id" id="edited_post_id">
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Add a hidden input field to store the edited post content -->
                    <input type="hidden" id="editedPostContent" name="editedPostContent">

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
                                        <!-- </div> -->
                                    </div>
                                </div>
                            </div>
        <!-- middle wrapper end -->
                <!-- right wrapper start -->
                <!-- <div class="d-none d-xl-block col-xl-3 right-wrapper">
                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="card rounded">
                                <div class="card-body">
                                    <h6 class="card-title">latest photos</h6>
                                    <div class="latest-photos">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <figure>
                                                    <img class="img-fluid" src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                                                </figure>
                                            </div>
                                            <div class="col-md-4">
                                                <figure>
                                                    <img class="img-fluid" src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="">
                                                </figure>
                                            </div>
                                            <div class="col-md-4">
                                                <figure>
                                                    <img class="img-fluid" src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="">
                                                </figure>
                                            </div>
                                            <div class="col-md-4">
                                                <figure>
                                                    <img class="img-fluid" src="https://bootdey.com/img/Content/avatar/avatar4.png" alt="">
                                                </figure>
                                            </div>
                                            <div class="col-md-4">
                                                <figure>
                                                    <img class="img-fluid" src="https://bootdey.com/img/Content/avatar/avatar5.png" alt="">
                                                </figure>
                                            </div>
                                            <div class="col-md-4">
                                                <figure>
                                                    <img class="img-fluid" src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="">
                                                </figure>
                                            </div>
                                            <div class="col-md-4">
                                                <figure class="mb-0">
                                                    <img class="img-fluid" src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="">
                                                </figure>
                                            </div>
                                            <div class="col-md-4">
                                                <figure class="mb-0">
                                                    <img class="img-fluid" src="https://bootdey.com/img/Content/avatar/avatar8.png" alt="">
                                                </figure>
                                            </div>
                                            <div class="col-md-4">
                                                <figure class="mb-0">
                                                    <img class="img-fluid" src="https://bootdey.com/img/Content/avatar/avatar9.png" alt="">
                                                </figure>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 grid-margin">
                            <div class="card rounded">
                                <div class="card-body">
                                    <h6 class="card-title">suggestions for you</h6>
                                    <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
                                        <div class="d-flex align-items-center hover-pointer">
                                            <img class="img-xs rounded-circle" src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="">
                                            <div class="ml-2">
                                                <p>Mike Popescu</p>
                                                <p class="tx-11 text-muted">12 Mutual Friends</p>
                                            </div>
                                        </div>
                                        <button class="btn btn-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus" data-toggle="tooltip" title="" data-original-title="Connect">
                                                <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="8.5" cy="7" r="4"></circle>
                                                <line x1="20" y1="8" x2="20" y2="14"></line>
                                                <line x1="23" y1="11" x2="17" y2="11"></line>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
                                        <div class="d-flex align-items-center hover-pointer">
                                            <img class="img-xs rounded-circle" src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="">
                                            <div class="ml-2">
                                                <p>Mike Popescu</p>
                                                <p class="tx-11 text-muted">12 Mutual Friends</p>
                                            </div>
                                        </div>
                                        <button class="btn btn-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus" data-toggle="tooltip" title="" data-original-title="Connect">
                                                <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="8.5" cy="7" r="4"></circle>
                                                <line x1="20" y1="8" x2="20" y2="14"></line>
                                                <line x1="23" y1="11" x2="17" y2="11"></line>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
                                        <div class="d-flex align-items-center hover-pointer">
                                            <img class="img-xs rounded-circle" src="https://bootdey.com/img/Content/avatar/avatar4.png" alt="">
                                            <div class="ml-2">
                                                <p>Mike Popescu</p>
                                                <p class="tx-11 text-muted">12 Mutual Friends</p>
                                            </div>
                                        </div>
                                        <button class="btn btn-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus" data-toggle="tooltip" title="" data-original-title="Connect">
                                                <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="8.5" cy="7" r="4"></circle>
                                                <line x1="20" y1="8" x2="20" y2="14"></line>
                                                <line x1="23" y1="11" x2="17" y2="11"></line>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
                                        <div class="d-flex align-items-center hover-pointer">
                                            <img class="img-xs rounded-circle" src="https://bootdey.com/img/Content/avatar/avatar5.png" alt="">
                                            <div class="ml-2">
                                                <p>Mike Popescu</p>
                                                <p class="tx-11 text-muted">12 Mutual Friends</p>
                                            </div>
                                        </div>
                                        <button class="btn btn-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus" data-toggle="tooltip" title="" data-original-title="Connect">
                                                <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="8.5" cy="7" r="4"></circle>
                                                <line x1="20" y1="8" x2="20" y2="14"></line>
                                                <line x1="23" y1="11" x2="17" y2="11"></line>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
                                        <div class="d-flex align-items-center hover-pointer">
                                            <img class="img-xs rounded-circle" src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="">
                                            <div class="ml-2">
                                                <p>Mike Popescu</p>
                                                <p class="tx-11 text-muted">12 Mutual Friends</p>
                                            </div>
                                        </div>
                                        <button class="btn btn-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus" data-toggle="tooltip" title="" data-original-title="Connect">
                                                <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="8.5" cy="7" r="4"></circle>
                                                <line x1="20" y1="8" x2="20" y2="14"></line>
                                                <line x1="23" y1="11" x2="17" y2="11"></line>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex align-items-center hover-pointer">
                                            <img class="img-xs rounded-circle" src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="">
                                            <div class="ml-2">
                                                <p>Mike Popescu</p>
                                                <p class="tx-11 text-muted">12 Mutual Friends</p>
                                            </div>
                                        </div>
                                        <button class="btn btn-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus" data-toggle="tooltip" title="" data-original-title="Connect">
                                                <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="8.5" cy="7" r="4"></circle>
                                                <line x1="20" y1="8" x2="20" y2="14"></line>
                                                <line x1="23" y1="11" x2="17" y2="11"></line>
                                            </svg>
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- right wrapper end -->
            </div>
        </div>
        </div>


</body>
</html>

<!-- <div class="alert alert-success alert-dismissible d-flex align-items-center fade show">
    <i class="bi-check-circle-fill"></i>
    <strong class="mx-2">Success!</strong> Your message has been sent successfully.
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div> -->
