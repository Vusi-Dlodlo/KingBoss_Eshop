<?php 
session_start();
include("DBConn.php");
$itemid = $_GET['id'];
$curr = ' R';
if(!empty($_SESSION["Login"]))
{
    $id =  $_SESSION['id'];
    $res = $conn->query("SELECT * FROM cart where prodId ='$itemid' && userID = '$id'")or die(''.$conn->error);
    $result = mysqli_fetch_array($res);
    if($result >1)
    {
        $_SESSION['qty'] = $result['Cart_Q']+1;
        $qty = $_SESSION['qty'];
        //UPDATE cart set Cart_Q =Cart_Q+1 WHERE prodId =1 && userID = 1 
        $select ="UPDATE cart set Cart_Q ='$qty' WHERE prodId ='$itemid' && userID = '$id' ";
        $conn->query($select)or die(''.$conn->error);
        header('location: products.php');
    }else{
      $sql ="SELECT * FROM products where id ='$itemid'";
        $getdata = mysqli_query($conn, $sql) or die("database error:".mysqli_error($conn));
        while($row = mysqli_fetch_assoc($getdata))
        {
            $img = $row['product_image'];
            $des = $row['Description'];
            $price = $row['CostPrice'];
            $qty = $row['quantity'] =1;
            $_SESSION['prdid'] = $row['id'];
            $prdId = $row['id'];
            $query = "insert into cart (`prodId`, `userID`, `images`, `cart_D`, `Cart_Q`, `Price`) values 
            ($prdId,$id,'$img','$des','$qty','$price')";
            $add=mysqli_query($conn,$query) or die(mysqli_error($conn));  
            if($add===true)
            {
                echo "<script>window.alert('Item Added To Cart')</script>";
            }   
        }
        header('location: products.php');
    }  
}
else{
    echo "<script>window.alert('Please Login First To continue')</script>";
    header('location: login.html');
}
?>

