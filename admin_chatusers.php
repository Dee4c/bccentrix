<?php
    include "adminsession.php";
    // session_start();
    include_once "dbconn.php";
    $outgoing_id = $_SESSION['admin_id'];
    $sql = "SELECT * FROM user WHERE NOT user_id = {$outgoing_id} ORDER BY user_id DESC";
    $query = mysqli_query($conn, $sql);
    $output = "";
    if(mysqli_num_rows($query) == 0){
        $output .= "No users are available to chat";
    }elseif(mysqli_num_rows($query) > 0){
        include_once "admin_chatdata.php";
    }
    echo $output;
?>