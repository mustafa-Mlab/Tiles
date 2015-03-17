<?php
session_start();
include './config.php';

$id = $_POST['id'];
$sql = "DELETE FROM `chart` WHERE id = $id";
if ($con->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}
header("location:../index.php?id=sales");
require_once './end_config.php';
exit();
?>