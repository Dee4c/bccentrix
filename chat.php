<?php
  // include "chatpage.php";
  include_once "header.php";
  // session_start();
  include_once "dbconn.php";
  // if(!isset($_SESSION['id'])){
  //   header("location: index.php");
  // }
?>
<!-- include_once "header.php"; -->
<style>

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

          /* Responive media query */
          @media screen and (max-width: 450px) {

            .form, .users{
              padding: 20px;
            }
            .form header{
              text-align: center;
            }
            .form form .name-details{
              flex-direction: column;
            }
            .form .name-details .field:first-child{
              margin-right: 0px;
            }
            .form .name-details .field:last-child{
              margin-left: 0px;
            }

            .users header img{
              height: 45px;
              width: 45px;
            }
            .users header .logout{
              padding: 6px 10px;
              font-size: 16px;
            }
            :is(.users, .users-list) .content .details{
              margin-left: 15px;
            }

            .users-list a{
              padding-right: 10px;
            }

            .chat-area header{
              padding: 15px 20px;
            }
            .chat-box{
              height: 1000px;
              padding: 10px 15px 15px 20px;
            }
            .chat-box .chat p{
              font-size: 15px;
            }
            .chat-box .outogoing .details{
              max-width: 230px;
            }
            .chat-box .incoming .details{
              max-width: 265px;
            }
            .incoming .details img{
              height: 30px;
              width: 30px;
            }
            .chat-area form{
              padding: 20px;
            }
            .chat-area form input{
              height: 40px;
              width: calc(100% - 48px);
            }
            .chat-area form button{
              width: 45px;
            }
          }
  </style>
<body>
  <div class="">
    <section class="chat-area">
      <header>
        <?php 
          $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
          $sql = mysqli_query($conn, "SELECT * FROM user WHERE user_id = {$user_id}");
          if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
          }else{
            header("location: users.php");
          }
        ?>
        <a href="chatpage.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <img style="border-radius: 50%;" src="<?php echo $row['image_path']; ?>" alt="">
        <div class="details">
          <span><?php echo $row['fname']. " " . $row['lname'] ?></span>
          <p><?php echo $row['is_active']; ?></p>
        </div>
      </header>
      <div class="chat-box">

      </div>
      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
        <input type="text" name="message" class="input-field"  placeholder="Type a message here..." autocomplete="off">
        <button><i class="fab fa-telegram-plane"></i></button>
      </form>

      <!-- <form action="#" enctype="multipart/form-data">
        <label for="file"></label>
        <input type="file" name="file_path" accept=".pdf, .doc, .docx" required>
        <button>Upload</button>
    </form> -->
    </section>
  </div>

  

  <script>
    const form = document.querySelector(".typing-area"),
incoming_id = form.querySelector(".incoming_id").value,
inputField = form.querySelector(".input-field"),
sendBtn = form.querySelector("button"),
chatBox = document.querySelector(".chat-box");

form.onsubmit = (e)=>{
    e.preventDefault();
}

inputField.focus();
inputField.onkeyup = ()=>{
    if(inputField.value != ""){
        sendBtn.classList.add("active");
    }else{
        sendBtn.classList.remove("active");
    }
}

sendBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "chatinsert-chat.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              inputField.value = "";
              scrollToBottom();
          }
      }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}
chatBox.onmouseenter = ()=>{
    chatBox.classList.add("active");
}

chatBox.onmouseleave = ()=>{
    chatBox.classList.remove("active");
}

setInterval(() =>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "chatget-chat.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            let data = xhr.response;
            chatBox.innerHTML = data;
            if(!chatBox.classList.contains("active")){
                scrollToBottom();
              }
          }
      }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("incoming_id="+incoming_id);
}, 500);

function scrollToBottom(){
    chatBox.scrollTop = chatBox.scrollHeight;
  }
  
  </script>

  

</body>
</html>
