<?php
include("dashboard.php")?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <!-- custom css file link  -->
    <link rel="stylesheet" href="">
    <style>
    *{
    font-family: 'Poppins', sans-serif;
    margin:0; padding:0;
    box-sizing: border-box;
    outline: none; border:none;
    text-decoration: none;
    text-transform: capitalize;
    transition: .2s linear;
    
}

.container{
    /* background:linear-gradient(45deg, blueviolet, lightgreen); */
    padding:15px 9%;
    padding-bottom: 100px;
    margin-top:80px;
    margin-left:240px;
}

.container .heading{
    text-align: center;
    padding-bottom: 15px;
    color:#000;
    text-shadow: 0 5px 10px rgba(0,0,0,.2);
    font-size: 50px;
}

.container .box-container{
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(270px, 1fr));
    gap:15px;
    /* background:linear-gradient(45deg, blueviolet, lightgreen); */
}

.container .box-container .box{
    box-shadow: 0 5px 10px rgba(0,0,0,.2);
    border-radius: 5px;
    
    text-align: center;
    padding:30px 20px;
}

.container .box-container .box img{
    height: 100px;
}

.container .box-container .box h3{
    color:#000;
    font-size: 20px;
    padding:10px 0;
}

.container .box-container .box p{
    color:#777;
    font-size: 15px;
    line-height: 1.8;
}

.container .box-container .box .btn{
    margin-top: 20px;
    display: inline-block;
   
    color:#fff;
    font-size: 22px;
    border-radius: 10px;
    padding: 8px 25px;
}

.container .box-container .box .btn:hover{
    letter-spacing: 1px;
}

.container .box-container .box:hover{
    box-shadow: 0 10px 15px rgba(0,0,0,.3);
    transform: scale(1.03);
}

@media (max-width:768px){
    .container{
        padding:20px;
    }
}
</style>
</head>
<body>
   
<div class="container">

    <!-- <h1 class="heading">Your Department</h1> -->

    <div class="box-container">

        <div class="box" style="background:linear-gradient( #00FF77,#053D00);">
            <img src="boximages/Bsislogo.png" alt="">
            <h3>INFORMATION SYSTEM</h3>
            <a href="admin_bsis_announcement.php" class="btn" style="background:#11553C;">Announcements</a>
        </div>

        <div class="box" style="background:linear-gradient( #29C5F6,#3A9BDC, #5579C6, #1260CC, #0A2472);">
        <img src="includes/edc.png" alt="">
            <h3>EDUCATION </h3>
            <a href="admin_bseduc_announcement.php" class="btn" style="background:#051650;">Announcements</a>
        </div>

        <div class="box" style="background:linear-gradient( #E2252B,#D21502, #B80F0A, #850000);">
            <img src="includes/crim.png" alt="">
            <h3>CRIMINOLOGY </h3>
            <a href="admin_bscrim_announcement.php" class="btn" style="background:#710C04;">Announcements</a>
        </div>

        <div class="box" style="background:linear-gradient( #F2EDB6, #A96E44);">
            <img src="includes/officeadd.png" alt="">
            <h3>OFFICE ADMINISTRATION</h3>
            <a href="admin_bsoa_announcement.php" class="btn" style="background:#9B870C;">Announcements</a>
        </div>

        <div class="box" style="background:linear-gradient( #FED404,#FF9A02, #EE9626);">
            <img src="includes/arts.png" alt="">
            <h3>ARTS</h3>
            <a href="admin_bsa_announcement.php" class="btn" style="background:#9B870C;">Announcements</a>
        </div>

        <div class="box" style="background:linear-gradient( #DAEBC7, #05A3b5);">
            <img src="includes/Bago-removebg-preview.png" alt="">
            <h3>GENERAL</h3>
            <a href="admin_gen_announcement.php" class="btn" style="background:#9B870C;">Announcements</a>
        </div>

        <!-- <div class="box">
            <img src="boximages/icon-5.png" alt="">
            <h3>JQuery</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, commodi?</p>
            <a href="#" class="btn">read more</a>
        </div>

        <div class="box">
            <img src="boximages/icon-6.png" alt="">
            <h3>React.js</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, commodi?</p>
            <a href="#" class="btn">read more</a>
        </div> -->

    </div>
</div>


</body>
</html>