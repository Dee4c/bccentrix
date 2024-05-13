<?php
require ('con1.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Message Notification Badge</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <style>

    .notify-btn{
        position: absolute;
    }
    
    .icon-button i{
     font-size: 50px;
     width: 50px;
     height: 50px;
    }

    .icon-button_badge{
        position: absolute;
        background: red;
        border-radius: 50%;
        min-width: 20px;
        height: 20px;
        color: white;
        bottom: 30px;
        right: -1px;
        text-align: center;
        }
  </style>
</head>
<body>

<div class="notify">
    <div class="notify-btn" id="notify-btn">

    <button type="button" class="icon-button">
        <span> <i class="fa fa-bell"></i></span>
        <span class="icon-button_badge" id="show_notif">0</span>
    </button>

</div>

<div class="notify-menu" id="notify-menu">

  </div>
</div>

<script> 
 const notify_btn = document.getElementById('notify-btn');
 const notify_label = document.getElementById('show_notif');
 const notify_container = document.getElementById('notify-menu');
    
     let xhr = new XMLHttpRequest();

     function notify_me() {
        xhr.open('GET', 'select.php', true);

        xhr.send();
        
        xhr.onload = ()=>{
            if (xhr.status == 200) {
                 let get_data = JSON.parse(xhr.responseText);

                 if (get_data == get_data){
                    notify_label.innerHTML = get_data;
                    
                 }
                 else{
                    notify_btn.innnerHTML +=get_data;
                 }
            }
        }
     }

     window.onload = () => {
        notify_me();

        setInterval(()=>{
            notify_me();
        }, 1000);
        
     }

     notify_btn.addEventListener('click', (e)=> {
        e.preventDefault();


        notify_container.classList.toggle('show');

        xhr.open('GET', 'notifdata.php', true);
        xhr.send();
        notify_container.innerHTML ='';
        xhr.onload = function(){
            if (xhr.status == 200){
                let data =  JSON.parse(xhr.responseText);

                data.forEach(message => {
                    let li = `<li>${message.msg}</li>`;

                    notify_container.innerHTML += li;
                });
            }
        }
     })
  </script>


</body>
</html>

