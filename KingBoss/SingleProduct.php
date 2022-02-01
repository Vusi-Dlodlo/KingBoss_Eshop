<?php
session_start();
include("DBConn.php");
if(!empty($_SESSION["Login"]))
{
    $getID = $_GET['id'];
    $id =  $_SESSION['id'];
    $cart_num = "SELECT count(Id) as COUNT from `cart` WHERE `userID` = '$id'";
    $getdata = mysqli_query($conn, $cart_num) or die("database error:".mysqli_error($conn));
    while($row = mysqli_fetch_assoc($getdata))
    {
        $_SESSION['count'] = $row['COUNT'];
        $cartCount =  $_SESSION['count'];
    }
        include('secondnav.php');
}
else{
        $cart_num = "SELECT count(Id) as COUNT from `cart` WHERE `userID` = '0'";
    $getdata = mysqli_query($conn, $cart_num) or die("database error:".mysqli_error($conn));
    while($row = mysqli_fetch_assoc($getdata))
    {
        $_SESSION['count'] = $row['COUNT'];
        $cartCount =  $_SESSION['count'];
    }
    include('firstnav.php');
    $getID = $_GET['id'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--External Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">


    <!-- Internal Styles -->
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


        .carousel-inner>.item>img {
            width: 100%;
            height: 570px;
        }

        .newarrival {
            background: red;
            width: 50px;
            color: white;
            font-size: 12px;
            font-weight: bold;
        }

        .col-md-7 {
            color: #555;

        }

        .price {
            font-size: 26px;
            font-weight: bold;
            padding-top: 20px;
        }

        input {
            border: 1px solid #ccc;
            font-weight: bold;
            height: 33px;
            text-align: center;
            width: 30px;
        }

    </style>
    <link href="/css/stylesheet.css" rel="stylesheet" type="text/css">
    <script src="https://kit.fontawesome.com/cb6dbcb9a2.js" crossorigin="anonymous"></script>
    <link href="./Styles/css/fontawesome.css" rel="stylesheet">
    <link href="./Styles/css/all.css" rel="stylesheet">
    <link href="./Styles/css/style.css" rel="stylesheet">


    <title>King Boss</title>


</head>

<body>
    <br>
    <div class="container mt-5">
        <div class="row">
            <?php
            $sql = "SELECT * FROM `products` where id ='$getID'";
            $getdata = mysqli_query($conn, $sql) or die("database error:".mysqli_error($conn));
            while($row = mysqli_fetch_assoc($getdata))
            { ?>
            <div class="col-md-5">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="<?php echo $row['product_image']; ?>" class="img-fluid" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo $row['product_image']; ?>" class="img-fluid" alt="...">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7 mt-1">
               <br/>
                <p class="newarrival text-center"></p>
                <h2><?php echo $row['Description'] ?></h2>
                <p><?php echo $row['category']; ?></p>
                <p class="price text-danger">R <?php echo $row['CostPrice']; ?></p>
                <p><b>Availability: </b> In Stock</p>
                <p><b>Condition: </b>New</p>
                <p><b>Brand:</b> King Boss Clothing</p>
                <br />
                <a class="btn btn-danger btn-md mr-1 mb-2 material-tooltip-main waves-effect waves-light cartbtn" href="addtocart.php?id=<?php echo $row['id'];?>" name="Add"><i class="fas fa-shopping-cart" data-toggle="tooltip" data-placement="top" data-original-title="Add to cart"></i></a>
            </div>
            <?php } ?>
        </div>
    </div>
</body>
<div class="mt-5">
    <?php include("footer.php"); ?>
</div>
<!-- External Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>

<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    });

</script>
