<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit-no">
<title>Backup Database in PHP</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<style>
  body{
    background: #ddd;
    font-family: "Raleway";
  }

  .center{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate( -50%, -50%);
  }

  .popup{
    width: 350px;
    height: 280px;
    padding: 30px 20px;
    background: #f5f5f5;
    border-radius: 10px;
    box-sizing: border-box;
    z-index: 2;
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
   
   
  </style>
</head>
<div class="popup center">
    <div class="icon">
  <i class="fa fa-check"></i>
    </div>
    <div class="title">
      SUCCESS!!
    </div>
    <div class="description">
      YOU HAVE SUCCESSFULLY EXPORTED THE DATABASE FILE
    </div>
    <div class="dismiss-btn">
     <button id="dismiss-popup-btn"> 
      Dismiss
     </button>
    </div>
 </div>
 <div class="center"> 
  <a href="#" id="open-popup-btn" class="btn btn-success"> 
    Backup Database
</a>
 </div>
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
</body>
</html>


