<?php
include("DBConn.php");
if(isset($_POST['Reg']))
{
    $Name =$_POST['userName'];
    $Surname =$_POST['userSurname'];
    $Email =$_POST['userEmail'];
    $Password =$_POST['userPass'];
    $pass = md5($Password);

    //insert statement
    
    $check ="select * from customers  where Name ='$Name' and Name ='$Surname' and Email='$Email' and userPass ='$Password'";
    $sql = $conn->query($check);
    $row = mysqli_fetch_assoc($sql);
    $error_check = array();
    if($row)
    {
       if($row['Name'] ===$Name)
       {
           array_push($error_check,"User Name already Exists'");
       } 
        if($row['Surname'] ===$Surname)
       {
            array_push($error_check,'Last Name already Exists');
       } 
        if($row['Email'] ===$Email)
       {
            array_push($error_check,'Email already Exists');
       } 
        if($row['userPass'] ===$pass)
       {
            array_push($error_check,'Password already Exists');
       } 
    }
    if(count($error_check) ==0)
    {
        $sql ="insert into customers (Name,Surname,Email,userPass) values ('$Name','$Surname','$Email','$pass')";
        $insert = $conn->query($sql);
        if($insert)
        {
            echo "<script>alert('User Details Successfully Stored');</script>";
            header('location: Login.html');
        }
    }
    else{
        header("location:Register.html");
        echo "<script>alert('Couldnt Register user details'.$conn->error);</script>";
    }
}
$conn->close();
?>