<?php
include("sidebar.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="postmainlink/design.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
    <!-- custom css file link  -->
    <style>
    *{
    /* margin:0; padding:0; */
    box-sizing: border-box;
    /* outline: none; border:none; */
    text-decoration: none;
    text-transform: capitalize;
    transition: .2s linear;
    }
    body{
        background:linear-gradient( #D1DFB7, #B9D9CF, #85CDFF);
    }

.container{
    /* background:linear-gradient(45deg, blueviolet, lightgreen); */
    padding:15px 9%;
    padding-bottom: 100px;
    margin-top:80px;
    margin-left:280px;

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
    margin-top: 140px;
    margin-left: 100px;
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
    font-size: 25px;
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

.container .box-container .boxfoods{
    margin-top: 140px;
    margin-left: 100px;
    box-shadow: 0 5px 10px rgba(0,0,0,.2);
    border-radius: 5px;
    text-align: center;
    padding:30px 20px;
}

.container .box-container .boxfoods img{
    height: 100px;
}

.container .box-container .boxfoods h3{
    color:#000;
    font-size: 25px;
    padding:10px 0;
}

.container .box-container .boxfoods p{
    color:#777;
    font-size: 15px;
    line-height: 1.8;
}

.container .box-container .boxfoods .btn{
    margin-top: 20px;
    display: inline-block;
   
    color:#fff;
    font-size: 22px;
    border-radius: 10px;
    padding: 8px 25px;
}

.container .box-container .boxfoods .btn:hover{
    letter-spacing: 1px;
}

.container .box-container .boxfoods:hover{
    box-shadow: 0 10px 15px rgba(0,0,0,.3);
    transform: scale(1.03);
}


@media (max-width:768px){
    .container{
        padding:0;
        padding-bottom: 0;
        margin-top:0px;
        margin-left:0px;
        margin: 0;
        margin-right: 40px;
        width: 100%
      }

    .container .box-container .box{
        margin-top:120px;
        margin-left: 20px;
        margin-right: 20px;
        box-shadow: 0 5px 10px rgba(0,0,0,.2);
        border-radius: 5px;
        text-align: center;
        padding:30px 20px;   
     }

     .container .box-container .boxfoods{
        margin-top:20px;
        margin-left: 18px;
        margin-right: 18px;
        box-shadow: 0 5px 10px rgba(0,0,0,.2);
        border-radius: 5px;
        text-align: center;
        padding:30px 20px;   
     }
}
</style>
</head>
<body>
   
<div class="container">

    <!-- <h1 class="heading">Your Department</h1> -->

    <div class="box-container">
       <a href="drygoods_announcement.php">
        <div class="box" style="background:linear-gradient( #00FF77,#053D00);">
            <img src="includes/dry.png" alt="">
            <h3>DRY GOODS</h3>
        </div>
        </a>

        <a href="foods_announcement.php">
        <div class="boxfoods" style="background:linear-gradient( #29C5F6,#3A9BDC, #5579C6, #1260CC, #0A2472);">
        <img src="includes/food.png" alt="">
            <h3>FOODS</h3>
        </div>
        </a>

    

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