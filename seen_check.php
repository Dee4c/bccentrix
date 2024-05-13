<?php
require('con1.php');

$query = 'SELECT COUNT(*) from gen_post WHERE seen_check=0';

$stm = $pdo->prepare($query);

$stm->execute();

if ($stm->rowCount()>0){
    $result = $stm->fetch();

    echo json_encode($result[0]);
}
?>