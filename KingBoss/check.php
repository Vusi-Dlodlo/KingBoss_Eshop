<?php 
session_start();
include("DBConn.php");
if(!empty($_SESSION["Login"]))
{
    $id =  $_SESSION['id'];
    $res = $conn->query("SELECT cart_D, SUM(Price)*Cart_Q as Total FROM cart where userID = '$id'")or die(''.$conn->error);
    $result = mysqli_fetch_array($res);
    if($result >1)
    {
        $_SESSION['des'] = $result['cart_D'];
        $_SESSION['total'] = $result['Total'];
    }
    
    if(isset($_POST['btnChkout']))
    {
        $cSurname =$_POST['lastName'];
        $name =$_POST['firstName'];
        $Uname =$_POST['uName'];
        $email =$_POST['email'];
        $addr = $_POST['address'];
        $zip = $_POST['zip'];
        $country = $_POST['country'];
        $State = $_POST['state'];
        $total = $_SESSION['total'];
        $des = $_SESSION['des'];
        $ccv = $_POST['cvv'];
        $cno = $_POST['ccnumber'];
        $EDate = $_POST[''];
        $Acname = $_POST['ccname'];
    
        $query = "INSERT INTO `orders`
        (`cusName`, `cusSurname`, `userName`, `email`, `cusAddress`, `CountryName`, `Statename`, `ZipCode`, `CardName`, `CardNo`, `ExpDate`, `Cvv`, `pName`, `pTotal`, `userID`) values
        ('$name','$cSurname','$Uname','$email','$addr','$country','$State','$zip','$Acname','$cno','$EDate','$ccv','$des','$total','$id')";
        
        $check =$conn->query($query)or die(''.$conn->error);
        if($check === true){
            header('location: orderconfirmation.php');

        }
        else{
            echo "couldnt store ";
        }
        
    }
}
?>