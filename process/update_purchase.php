<?php

session_start();
include './config.php';


date_default_timezone_set('Asia/Dhaka');
$created_date = date("Y-m-d h:i:sa");

$errflag = 0;

$id = $_POST['id'];
$item = $_POST['item'];
$company = $_POST['company'];
$qty = $_POST['qty'];
$p_rate = $_POST['purchase_rate'];
$s_rate = $_POST['selling_rate'];
$total = $_POST['total'];
if (!empty($_POST['due'])) {
    $due = $_POST['due'];
} else
    $due = 0;

$sql = mysqli_query($con, "SELECT * FROM `purchase` WHERE `id` ='" . $id . "'");
$row = mysqli_fetch_array($sql);
$num = mysqli_num_rows($sql);
if ($num === 0) {
    $quantity = $row['qty'];
}

$stQrate = $qty - $quantity;
$sql = mysqli_query($con, "SELECT * FROM `stock` WHERE `item` ='" . $item . "'");
$row = mysqli_fetch_array($sql);
{
	$stQrate = $row['qty'] + $stQrate;
}

$stTotal = $stQrate * $p_rate;

$sql = "UPDATE purchase SET qty = $qty,total = $total, p_rate = $p_rate, s_rate = $s_rate, company ='" . $company . "'  WHERE id= $id AND item =$item";
if (!mysqli_query($con, $sql)) {
    die('Error: ' . mysqli_error($con));
}


$sql = "UPDATE stock SET qty = $stQrate ,total = $stTotal, p_rate = $p_rate, s_rate = $s_rate, company ='". $company."'  WHERE item =$item";
if (!mysqli_query($con, $sql)) {
    die('Error: ' . mysqli_error($con));
   }

header("location:../index.php?id=view_purchase");
require_once './end_config.php';
exit();
    