<?php
session_start();
include("DBConn.php");
$curr = 'R';
if(!empty($_SESSION["Login"]))
{
    include('secondnav.php');
    $id =  $_SESSION['id'];
    $cart_num = "SELECT count(c.id) as COUNT from cart c inner join customers u on c.userID = u.id
    where c.id = '$id'";
    $getdata = mysqli_query($conn, $cart_num) or die("database error:".mysqli_error($conn));
    while($row = mysqli_fetch_assoc($getdata))
    {
        $cartCount = $row['COUNT'];
    }
}
else{
    $id = 0;
        $cart_num = "SELECT count(c.id) as COUNT from cart c inner join customers u on c.userID = u.id
    where c.id = '$id'";
    $getdata = mysqli_query($conn, $cart_num) or die("database error:".mysqli_error($conn));
    while($row = mysqli_fetch_assoc($getdata))
    {
        $cartCount = $row['COUNT'];
    }
    include('firstnav.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
    <!--External Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <style>
        .mask {
            background-image: url('./Images/Background/wavesOpacity.svg');
        }

        footer {
            padding: 7em 0;
            background-image: url('./Images/Products/Caps/');

        }

        .footer-07 {
            background: #121212;
        }

        .footer-07 a {
            color: #a3de83;
        }

        .footer-07 p {
            color: rgba(255, 255, 255, 0.3);
        }

        .footer-07 .footer-heading {
            font-size: 30px;
            color: #fff;
            font-weight: 700;
            margin-bottom: 30px;
        }

        .footer-07 .footer-heading .logo {
            color: #fff;
        }

        .footer-07 .menu {
            margin-bottom: 30px;
        }

        .footer-07 .menu a {
            color: rgba(255, 255, 255, 0.6);
            margin: 0 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .card {
            border: none;
            height: auto;

        }

        .footer-07 .ftco-footer-social li a {
            background: transparent;
            border: 1px solid #a3de83;
        }

        .ftco-footer-social li {
            list-style: none;
            margin: 0 10px 0 0;
            display: inline-block;
        }


        .ftco-footer-social li a span {
            position: absolute;
            font-size: 20px;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }

        .ftco-footer-social li a:hover {
            color: #fff;
        }

        @media all and (min-width: 992px) {
            .navbar .nav-item .dropdown-menu {
                display: block;
                opacity: 0;
                visibility: hidden;
                transition: .4s;
                margin-top: 0;
            }

            .navbar .nav-item:hover .dropdown-menu {
                transition: .3s;
                opacity: 1;
                visibility: visible;
                top: 100%;
                transform: rotateX(0deg);
            }

            .nav .navbar-nav li a :hover {
                color: white !important;
            }

        }

    </style>
    <link href="/css/stylesheet.css" rel="stylesheet" type="text/css">
    <script src="https://kit.fontawesome.com/cb6dbcb9a2.js" crossorigin="anonymous"></script>
    <link href="./Styles/css/fontawesome.css" rel="stylesheet">
    <link href="./Styles/css/all.css" rel="stylesheet">
    <link href="./Styles/css/style.css" rel="stylesheet">
    
    <!-- Internal Scripts -->
	<script type="text/javascript" src="">
	</script>

    <title>Contact Us</title>

	
</head>

<body>
<div class="container mt-5">
    
</div>
</body>
<br/>
<?php include("footer.php"); ?>
<!-- External Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>

<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    });

</script>
</html>
