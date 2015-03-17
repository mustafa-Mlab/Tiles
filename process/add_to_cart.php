<?php

session_start();
include './config.php';


date_default_timezone_set('Asia/Dhaka');
$created_date = date("Y-m-d h:i:sa");

$errflag = 0;

$memo = $_POST['memo'];
$item = $_POST['item'];
$company = $_POST['company'];
$qty = $_POST['qty'];
$rate = $_POST['rate'];
$total = $_POST['total'];
$p_rate = $_POST['p_rate'];


$sql = "INSERT INTO `tiles`.`chart` (`memo`, `item`, `company`, `p_rate`, `s_rate`, `qty`, `total`) "
        . "VALUES ('$memo', '$item', '$company','$p_rate','$rate','$qty', '$total');";

if (!mysqli_query($con, $sql)) {
    die('Error: ' . mysqli_error($con));
}
echo "1 record added";
//
//$sql = "SELECT * FROM mem_date WHERE memo = ". $memo." ";
//$stock = mysqli_query($con, $sql);
//$num = mysqli_num_rows($stock);
//if ($num === 0) {
//    $sql = "INSERT INTO `tiles`.`mem_date` (`memo`, `memo_date`) VALUES ('$memo','$created_date')";
//    if (!mysqli_query($con, $sql)) {
//        die('Error: ' . mysqli_error($con));
//    }
//    echo "1 record added";
//}
header("location:../index.php?id=sales");
require_once './end_config.php';
exit();
?>