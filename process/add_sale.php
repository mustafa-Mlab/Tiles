<?php
session_start();
include './config.php';
$memo = $_POST['memo'];
$total = $_POST['total'];
$due = $_POST['due'];
$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];

$profit = 0;
$sql = "SELECT * FROM `chart`ORDER BY id DESC";
$result = mysqli_query($con, $sql);
while ($row = mysqli_fetch_array($result)) {
$item = $row['item'];
$qty = $row['qty'];
$profit += ($row['s_rate']- $row['p_rate'])* $row['qty'];
$query = mysqli_query($con,"SELECT * FROM `stock` WHERE item = $item");
if (mysqli_num_rows($query) > 0) {
while ($data = mysqli_fetch_array($query)) {
$stock_id = $data['id'];
$stock_qty = $data['qty'] - $qty;
$stock_total = $data['p_rate'] * $stock_qty;
}
$query = "UPDATE stock SET qty = $stock_qty,total = $stock_total WHERE id= $stock_id AND item =$item";
if (!mysqli_query($con, $query)) {
die('Error: ' . mysqli_error($con));
}
}
}
date_default_timezone_set('Asia/Dhaka');
$created_date = date("Y-m-d h:i:sa");
$sql = "INSERT INTO `tiles`.`salse` (`memo_no`,`name`,`address`,`phone`, `total`, `due`, `profit`, `salse_date`) "
. "VALUES ('$memo','$name','$address','$phone', '$total', '$due', '$profit', '$created_date');";
if (!mysqli_query($con, $sql)) {
die('Error: ' . mysqli_error($con));
}
// echo "1 record added";
// $sql = "TRUNCATE TABLE chart";
// if (!mysqli_query($con, $sql)) {
//     die('Error: ' . mysqli_error($con));
// }
// echo "\n clear chart";
$memo++;
$query = "UPDATE memo SET data = $memo WHERE id= 1";
if (!mysqli_query($con, $query)) {
die('Error: ' . mysqli_error($con));
}
header("location:../index.php?id=sales");
require_once './end_config.php';
exit();