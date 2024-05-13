<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<style>
   .drpbtn{
    position: absolute;
    display: flex;
    align-items: center;
    justify-items: space-between;
    cursor: pointer;
    text-decoration: none;
   }

   .drpbtn i{
    font-size: 12px;
    padding:4px;
    width: 20px;
    color: white;
   }

   .drpbtn i:hover{
    font-size: 12px;
    padding:4px;
    width: 20px;
    color: black;
   }

  </style>
<?php 
    // include 'adminsession.php';
    session_start();
    if(isset($_SESSION['admin_id'])){
        include_once "dbconn.php";
        $outgoing_id = $_SESSION['admin_id'];
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $output = "";
        $sql = "SELECT * FROM messages LEFT JOIN user ON user.user_id = messages.outgoing_msg_id
                WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
                OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                if($row['outgoing_msg_id'] === $outgoing_id){
                    $output .= '<div class="chat outgoing">
                                <div class="details">
                                <div class="dropdown">
                                <a href="#" method="Get" class="drpbtn"><i class="fas fa-trash"></i></a> <p style="margin-left: 20px;">'. $row['msg'] .'</p>
                                </div>
                                </div>
                        </div>';

                }else{
                    $output .= '<div class="chat incoming">
                                <img style="border-radius:50%;" src="'.$row['image_path'].'" alt="">
                                <div class="details">
                                    <p>'. $row['msg'] .'</p>
                                </div>
                                </div>';
                }
            }
        }else{
            $output .= '<div class="text">No messages are available. Once you send message they will appear here.</div>';
        }
        echo $output;
    }else{
        header("location: ../index.php");
    }
?>











