<?php
session_start();
include("DBConn.php");
$curr = 'R';
if(!empty($_SESSION["Login"]))
{
    $id =  $_SESSION['id'];
    $cart_num = "SELECT count(id) as COUNT from `cart` WHERE `userID` = '$id'";
    $getdata = mysqli_query($conn, $cart_num) or die("database error:".mysqli_error($conn));
    while($row = mysqli_fetch_assoc($getdata))
    {
        $_SESSION['count'] = $row['COUNT']; 
        $cartCount =  $_SESSION['count'];
    }
        include('secondnav.php');
}
else{
    
 header('location: login.html');
        $cart_num = "SELECT count(id) as COUNT from `cart` WHERE `userID` = '0'";
    $getdata = mysqli_query($conn, $cart_num) or die("database error:".mysqli_error($conn));
    while($row = mysqli_fetch_assoc($getdata))
    {
        $_SESSION['count'] = $row['COUNT'];
        $cartCount =  $_SESSION['count'];
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

    <!-- Internal Styles -->
    <style>
        footer {
            padding: 7em 0;
            background-image: url('./Images/Products/Caps/');
            height: 500px;

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

            float: none;
        }
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
    <div class="container cart-page mt-2">
        <table>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>
            <?php 
                $id =  $_SESSION['id'];
                $sql = "select * from cart c where c.userId = '$id'";
                $getdata = mysqli_query($conn, $sql) or die("database error:".mysqli_error($conn));
                while($row = mysqli_fetch_assoc($getdata))
                {
                    if($row != 0){
                
            ?>
            <tr>
                <td class="Cartproduct">
                    <div class="cart-info">
                        <a href="SingleProduct.php?id=<?php echo $row['prodId'];?>"><img src="<?php echo $row['images']; ?>"></a>
                        <div>
                            <p><?php ?></p>
                            <small class="productPrice"><?php echo $row['cart_D']; ?></small>

                            <br />
                            <a type="button" class="btn btn-outline-dark btnremoveItem" href="remove.php?id=<?php echo $row['id'];?>">Remove</a>
                            <a type="button" class="btn btn-outline-primary btn-sm" href="increment.php?id=<?php echo $row['prodId'];?>"><i class="fa fa-arrow-up"></i></a>
                            <a type="button" class="btn btn-outline-danger btn-sm " href="decrement.php?id=<?php echo $row['prodId'];?>"><i class="fa fa-arrow-down"></i></a>
                        </div>
                    </div>
                </td>
                <td>
                    <span class="text-black" value="" id="Quant" runat="server"><?php echo $row['Cart_Q']; ?></span>
                </td>
                <td><span class="text-danger"> R </span><?php echo $row['Price']; ?> </td>
            </tr>
            <?php }else{   ?>

            <?php } }?>
        </table>
        <div class="total-price mt-2">
            <table>
                <?php
                //getting the sum of all the products based on the user id
                $tot = "SELECT SUM(Price)*Cart_Q as Total FROM cart where userID  = '$id'";
                $total = mysqli_query($conn,$tot)or die("database error".mysqli_error($conn));
                while($row = mysqli_fetch_assoc($total))
                { 
                    if($row != 0){
                        $TotalP = $row['Total'];
                    }else{
                        $TotalP = "Empty Cart";
                    }
                }
                ?>
                <tr>
                    <td>Total</td>

                    <td class="total-price-product"><span class="text-danger">R <?php echo $TotalP; ?></span></td>
                </tr>
            </table>
        </div>
        <div class="checkout">
            <div class="positioning">
                <a type="button" class="btn btn-info mt-2" href="checkout.php">Go To Checkout</a>
            </div>
        </div>
    </div>
    <br />
</body>
<div class="mt-5">
    <?php include('footer.php'); ?>
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

</html>
