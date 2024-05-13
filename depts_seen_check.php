<?php
include 'dbconn.php';

$sql = "SELECT COUNT(*) AS count FROM gen_post WHERE seen_check = 0 UNION
        SELECT COUNT(*) AS count FROM bsis_post WHERE seen_check = 0 ";
        

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $count = $row["count"];
    echo $count;
} else {
    echo "0";
}

$conn->close();
?>
