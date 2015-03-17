<?php

session_start();
include './config.php';

$memo = $_POST['memo'];
if (!empty($_POST['due'])) {
    $due = $_POST['due'];
} else
    $due = 0;

$sql = "UPDATE `salse` SET due = $due WHERE memo_no= $memo";
if (!mysqli_query($con, $sql)) {
    die('Error: ' . mysqli_error($con));
}

header("location:../index.php?id=view_memos");
require_once './end_config.php';
exit();
    