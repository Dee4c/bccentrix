<?php
include("sidebar.php");

// Include the session.php file that sets the department in the session
// include("session.php");

// Get the user's department from the session
$user_department = $_SESSION['department'];

// Debugging: Output the user's department to check what's stored in $user_department
echo "User's department: " . $user_department;
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
    <!-- <link rel="stylesheet" href=""> -->
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
    margin-top:150px;
    margin-left:270px;
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


.container .box-container .boxdept{
    margin-top: 30px;
    margin-left: 10px;
    box-shadow: 0 5px 10px rgba(0,0,0,.2);
    border-radius: 5px;
    text-align: center;
    padding:30px 20px;
    
}

.container .box-container .boxdept img{
    height: 100px;
}

.container .box-container .boxdept h3{
    color:#000;
    font-size: 25px;
    padding:10px 0;
}

.container .box-container .boxdept p{
    color:#777;
    font-size: 15px;
    line-height: 1.8;
}

.container .box-container .boxdept .btn{
    margin-top: 20px;
    display: inline-block;
    color:#fff;
    font-size: 22px;
    border-radius: 10px;
    padding: 8px 25px;
}

.container .box-container .boxdept .btn:hover{
    letter-spacing: 1px;
}

.container .box-container .boxdept:hover{
    box-shadow: 0 10px 15px rgba(0,0,0,.3);
    transform: scale(1.03);
}

.gen_icon_badge{
            font-size: 20px; 
            margin-left:30px; 
            margin-top: 185px; 
            position: absolute; 
            background: red; 
            border-radius: 50%; 
            min-width: 30px; 
            height: 30px; 
            color: white; 
            text-align: center;
          }
.is_icon_badge{
            font-size: 20px; 
            margin-left:770px; 
            margin-top: 245px; 
            position: absolute; 
            background: red; 
            border-radius: 50%; 
            min-width: 30px; 
            height: 30px; 
            color: white; 
            text-align: center;
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
        margin-top:90px;
        margin-left: 20px;
        margin-right: 20px;
        box-shadow: 0 5px 10px rgba(0,0,0,.2);
        border-radius: 5px;
        text-align: center;
        padding:30px 20px;   
     }

     .container .box-container .boxdept{
        margin-top:10px;
        margin-left: 18px;
        margin-right: 0px;
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

    <?php
        // Display the "GENERAL" department box for all users
        echo '<div class="boxdept"  style="background:linear-gradient( #DAEBC7, #05A3b5);">';
        echo '<img src="includes/Bago-removebg-preview.png" alt="">';
        echo '<span class="gen_icon_badge" id="gen_show_notif">0</span>';
        echo '<h3>GENERAL</h3>';
        echo '<a href="gen_announcement.php" id="genupdateButton" class="btn" style="background:#9B870C;">Announcements</a>';
        echo '</div>';
        ?>

        <?php
        if ($user_department === 'BSIS') {
            echo '<div class="boxdept" style="background:linear-gradient( #00FF77,#053D00);">';
            echo '<img src="boximages/Bsislogo.png" alt="">';
            echo '<span class="gen_icon_badge" id="is_post_count">0</span>';
            echo '<h3>INFORMATION SYSTEM</h3>';
            echo '<a href="bsis_announcement.php" id="isupdateButton" class="btn" style="background:#11553C;">Announcements</a>';
            echo '</div>';
        }
        
        if ($user_department === 'BSEDUC') {
            echo '<div class="boxdept" style="background:linear-gradient( #29C5F6,#3A9BDC, #5579C6, #1260CC, #0A2472);">';
            echo '<img src="includes/edc.png" alt="">';
            echo '<span class="gen_icon_badge" id="educ_post_count">0</span>';
            echo '<h3>EDUCATION</h3>';
            echo '<a href="bseduc_announcement.php" id="educupdateButton" class="btn" style="background:#051650;">Announcements</a>';
            echo '</div>';
        }

        if ($user_department === 'CRIM') {
            echo '<div class="boxdept" style="background:linear-gradient( #E2252B,#D21502, #B80F0A, #850000);">';
            echo '<img src="includes/crim.png" alt="">';
            echo '<span class="gen_icon_badge" id="crim_post_count">0</span>';
            echo '<h3>CRIMINOLOGY </h3>';
            echo '<a href="bscrim_announcement.php" id="crimupdateButton" class="btn" style="background:#710C04;">Announcements</a>';
            echo '</div>';
        }

        if ($user_department === 'ARTS') {
            echo '<div class="boxdept" style="background:linear-gradient( #FED404,#FF9A02, #EE9626);">';
            echo '<img src="includes/officeadd.png" alt="">';
            echo '<span class="gen_icon_badge" id="arts_post_count">0</span>';
            echo '<h3>ARTS </h3>';
            echo '<a href="bsa_announcement.php" id="artsupdateButton" class="btn" style="background:#9B870C;">Announcements</a>';
            echo '</div>';
        }

        if ($user_department === 'BSOA') {
            echo '<div class="boxdept" style="background:linear-gradient( #F2EDB6, #A96E44);">';
            echo '<img src="includes/officeadd.png" alt="">';
            echo '<span class="gen_icon_badge" id="oa_post_count">0</span>';
            echo '<h3>BSOA</h3>';
            echo ' <a href="bsoa_announcement.php"  id="oaupdateButton" class="btn" style="background:#9B870C;">Announcements</a>';
            echo '</div>';
        }
        ?>

    </div>
</div>
<!-- GEN NOTIFICATION BADGE -->
<script> 

        const gen_notify_label = document.getElementById('gen_show_notif');
            
            let gen_cnt = new XMLHttpRequest();

            function gennotify_me() {
                gen_cnt.open('GET', 'seen_check.php', true);

                gen_cnt.send();
                
                gen_cnt.onload = ()=>{
                    if (gen_cnt.status == 200) {
                        let get_data = JSON.parse(gen_cnt.responseText);

                        if (get_data == get_data){
                            gen_notify_label.innerHTML = get_data;
                        }
                        else{
                            // notify_btn.innerHTML +=get_data;
                        }
                    }
                }
            }

            window.onload = () => {
                gennotify_me();

                setInterval(()=>{
                    gennotify_me();
                }, 1000);
                
            }

</script>

<script>
    // Function to handle the button click and perform the update
    function handleUpdate() {
        var genupdatedContent = "";

        // Update the content of the div
        document.getElementById("genupdateButton").innerHTML;

        fetch('gen_post_content_seen.php', {
            method: 'POST',
            body: JSON.stringify({ genupdatedContent: genupdatedContent }),
        });
    }

    document.getElementById("genupdateButton").addEventListener("click", handleUpdate);
</script>

<!-- IS NOTIFICATION BADGE -->
<script>
    function updateCount() {
        // Make an asynchronous request to fetch the count from the server
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Update the content with the new count
                document.getElementById("is_post_count").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "is_seen_check.php", true);
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
        document.getElementById("isupdateButton").innerHTML;

        fetch('is_post_seen.php', {
            method: 'POST',
            body: JSON.stringify({ isupdatedContent: isupdatedContent }),
        });
    }

    document.getElementById("isupdateButton").addEventListener("click", handleUpdate);
</script>

<!-- EDUC NOTIFICATION BADGE -->
<script>
    function updateCount() {
        // Make an asynchronous request to fetch the count from the server
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Update the content with the new count
                document.getElementById("educ_post_count").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "educ_seen_check.php", true);
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
        document.getElementById("educupdateButton").innerHTML;

        fetch('educ_post_seen.php', {
            method: 'POST',
            body: JSON.stringify({ isupdatedContent: isupdatedContent }),
        });
    }

    document.getElementById("educupdateButton").addEventListener("click", handleUpdate);
</script>

<!-- CRIM NOTIFICATION BADGE -->
<script>
    function updateCount() {
        // Make an asynchronous request to fetch the count from the server
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Update the content with the new count
                document.getElementById("crim_post_count").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "crim_seen_check.php", true);
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
        document.getElementById("crimupdateButton").innerHTML;

        fetch('crim_post_seen.php', {
            method: 'POST',
            body: JSON.stringify({ isupdatedContent: isupdatedContent }),
        });
    }

    document.getElementById("crimupdateButton").addEventListener("click", handleUpdate);
</script>

<!-- ARTS NOTIFICATION BADGE -->
<script>
    function updateCount() {
        // Make an asynchronous request to fetch the count from the server
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Update the content with the new count
                document.getElementById("arts_post_count").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "arts_seen_check.php", true);
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
        document.getElementById("artsupdateButton").innerHTML;

        fetch('arts_post_seen.php', {
            method: 'POST',
            body: JSON.stringify({ isupdatedContent: isupdatedContent }),
        });
    }

    document.getElementById("artsupdateButton").addEventListener("click", handleUpdate);
</script>

<!-- OA NOTIFICATION BADGE -->
<script>
    function updateCount() {
        // Make an asynchronous request to fetch the count from the server
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Update the content with the new count
                document.getElementById("oa_post_count").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "oa_seen_check.php", true);
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
        document.getElementById("oaupdateButton").innerHTML;

        fetch('oa_post_seen.php', {
            method: 'POST',
            body: JSON.stringify({ isupdatedContent: isupdatedContent }),
        });
    }

    document.getElementById("oaupdateButton").addEventListener("click", handleUpdate);
</script>





</body>
</html>