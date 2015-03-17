<?php

session_start();
include './config.php';


date_default_timezone_set('Asia/Dhaka');
$created_date = date("Y-m-d h:i:sa");

$errflag = 0;

$item = $_POST['id'];
$company = $_POST['company'];
$qty = $_POST['qty'];
$p_rate = $_POST['purchase_rate'];
$s_rate = $_POST['selling_rate'];
$total = $_POST['total'];
if (!empty($_POST['due'])) {
    $due = $_POST['due'];
} else
    $due = 0;



$sql = "INSERT INTO `tiles`.`purchase` (`item`, `company`, `qty`, `p_rate`, `s_rate`, `total`, `due`, `created_date`) "
        . "VALUES ('$item', '$company', '$qty', '$p_rate', '$s_rate', '$total', '$due', '$created_date');";

if (!mysqli_query($con, $sql)) {
    die('Error: ' . mysqli_error($con));
}
echo "1 record added";
//$sql = "SELECT item FROM item where item = " . $item . " ";
//$result = mysqli_query($con, $sql);
//$num = mysqli_num_rows($result);
//if ($num === 0) {
//    $sql = "INSERT INTO `tiles`. `item` (`item`) VALUES ('$item')";
//}
//if (!mysqli_query($con, $sql)) {
//    die('Error: ' . mysqli_error($con));
//}
//echo "1 record added";

//check if already exist in stock
$sql = "SELECT * FROM stock WHERE item = ". $item." ";
$stock = mysqli_query($con, $sql);
$num = mysqli_num_rows($stock);
if ($num === 0) {
    $sql = "INSERT INTO `stock` (`item`,`company`,`qty`,`p_rate`, `s_rate`, `total` ) "
            . "VALUES ('$item', '$company','$qty','$p_rate','$s_rate','$total')";
    if (!mysqli_query($con, $sql)) {
        die('Error: ' . mysqli_error($con));
    }
    echo "1 record added";
} else {
    while ($row = mysqli_fetch_array($stock)) {
        $qty += $row['qty'];
        $total += $row['total'];
        $id = $row['id'];
    }
    $sql = "UPDATE stock SET qty = $qty,total = $total, p_rate = $p_rate, s_rate = $s_rate WHERE id= $id AND item =$item";
    if (!mysqli_query($con, $sql)) {
        die('Error: ' . mysqli_error($con));
    }
}
header("location:../index.php?id=new_purchase");
require_once './end_config.php';
exit();
?>