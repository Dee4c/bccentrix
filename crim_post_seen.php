<?php
require ('con1.php');

$query = 'UPDATE bscrim_post SET seen_check= 1';

$stm =$pdo->prepare($query);

if ($stm->execute()){
    $query2 = 'SELECT content FROM bscrim_post WHERE seen_check = 1 ';

    $stm2 = $pdo->prepare($query2);
    $stm2->execute();

    $result = $stm2->fetchAll();

    echo json_encode($result);

}

?>