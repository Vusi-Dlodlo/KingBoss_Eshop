<?php 
session_start();
include("DBConn.php");
$cartCount =  $_SESSION['count'];
$itemid = $_GET['id'];
$id =  $_SESSION['id'];
/*
$checkDat = "SELECT * from cart where userID = '$id'  &&  id = '$itemid'";
$res = $conn->query($checkDat)or die(''.$conn->error);
$result = mysqli_fetch_array($res);
if($result >0)
{
    $select ="UPDATE cart set Cart_Q =Cart_Q-1 WHERE Cart_Q > 1 && prodId = '$itemid'";
    $conn->query($select)or die(''.$conn->error);
        header('location: cart.php');
}else{

}
*/
    $sql ="DELETE FROM cart WHERE userID='$id' and id ='$itemid'";
    $query = mysqli_query($conn,$sql)or die("Unable to delete".mysqli_error($conn));
    header('location: cart.php');
?>