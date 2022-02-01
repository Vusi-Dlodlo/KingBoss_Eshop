<?php
session_start();
include("DBConn.php");
if(isset($_POST['conc']))
{
    $name = $_POST['name'];
    $no = $_POST['moble'];
    $email = $_POST['email'];
    $query = "INSERT INTO `contactus`( `name`, `emailAddr`, `mobileNo`)
    values ('$name','$no','$email')";
        $check = $conn->query($query);
    
    if($check === true )
    {
        header("location:index.php");
    }
}
?>
