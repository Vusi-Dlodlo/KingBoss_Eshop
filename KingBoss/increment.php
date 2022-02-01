<?php 
session_start();
include("DBConn.php");
$cartCount =  $_SESSION['count'];
$itemid = $_GET['id'];
$id =  $_SESSION['id'];

$select ="UPDATE cart set Cart_Q =Cart_Q+1 WHERE userID = '$id' && prodId = '$itemid'";
$conn->query($select)or die(''.$conn->error);
header('location: cart.php');
?>