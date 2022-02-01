<?php 
session_start();
include("DBConn.php");
$cartCount =  $_SESSION['count'];
$itemid = $_GET['id'];
$id =  $_SESSION['id'];

$checkDat = "SELECT * from cart where userID = '$id'  &&  prodId = '$itemid'";
$res = $conn->query($checkDat)or die(''.$conn->error);
$result = mysqli_fetch_array($res);
if($result >0)
{
    $select ="UPDATE cart set Cart_Q =Cart_Q-1 WHERE userID = '$id' && prodId = '$itemid'";
    $data = $conn->query($select)or die(''.$conn->error);
    $res = mysqli_fetch_array($data);
    if($res > 0){
        
    }
}
 header('location: cart.php');
?>