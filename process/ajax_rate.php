<?php

include './config.php';
session_start();
if ($_POST['id']) {
    $row_id = $_POST['id'];
    $qty = 0;
    $item = 0;
    $sql = mysqli_query($con, "SELECT * FROM `stock` WHERE `item` ='" . $row_id . "'");
    $row = mysqli_fetch_array($sql);
    $num = mysqli_num_rows($sql);
    if ($num === 0) {
        echo "Wrong, id";
    } else {
        $qty = $row['qty'];
        $p_rate = $row['p_rate'];
        $s_rate = $row['s_rate'];
        $company = $row['company'];
        $data = $qty . "," . $p_rate . "," . $s_rate . "," . $company ;
        echo $data;
    }
}
?>