<?php 
session_start();
include("DBConn.php");
if(isset($_POST['Log']))
{
    $email = $_POST['userEmail'];
    $Password = $_POST['userPass'];
    $pass = md5($Password);
    $res = $conn->query("select * from customers  where Email='$email' and userPass ='$pass'")or die(''.$conn->error);
    
    $result = mysqli_fetch_array($res);
    
    if($result >1)
    {
        $_SESSION["Login"]=$result['Name'];
        $_SESSION["LName"]=$result['Surname'];
        $_SESSION['id']=$result['id'];
        header("location:index.php");
    }
    else
    {
        header("location:Login.html");
        echo "<script>alert('Couldnt login'.$conn->error);</script>";
    }
}
?>

