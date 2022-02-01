<?php
session_start();
include("DBConn.php");
$curr = 'R';
if(!empty($_SESSION["Login"]))
{
    $id =  $_SESSION['id'];
    $cart_num = "SELECT sum(Cart_Q) as COUNT, prodId as ID from `cart` WHERE `userID` = '$id'";
    $getdata = mysqli_query($conn, $cart_num) or die("database error:".mysqli_error($conn));
    while($row = mysqli_fetch_assoc($getdata))
    {
        $_SESSION['count'] = $row['COUNT'];
        $cartCount =  $_SESSION['count'];
        $_SESSION['pId'] = $row['ID'];;
        $pID =  $_SESSION['pId'];
    }
        include('secondnav.php');
}
else{
        $cart_num = "SELECT count(id) as COUNT from `cart` WHERE `userID` = '0'";
    $getdata = mysqli_query($conn, $cart_num) or die("database error:".mysqli_error($conn));
    while($row = mysqli_fetch_assoc($getdata))
    {
        $_SESSION['count'] = $row['COUNT'];
        $cartCount =  $_SESSION['count'];
         $_SESSION['pId'] = $row['prodId'];;
        $pID =  $_SESSION['pId'];
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

    <title>Checkout Page</title>


</head>

<body>
    <main class="mt-5 pt-4">
        <div class="container wow fadeIn">

            <!-- Heading -->
            <h2 class="my-5 h2 text-center">Checkout form</h2>
             <form action="check.php" method="POST" onsubmit="return validate(this);">
            <!--Grid row-->
            <div class="row">

                <!--Grid column-->
                <div class="col-md-8 mb-4">

                    <!--Card-->
                    <div class="card">

                        <!--Card content-->
                        <form class="card-body">

                            <!--Grid row-->
                            <div class="row">

                                <!--Grid column-->
                                <div class="col-md-6 mb-2">

                                    <!--firstName-->
                                    <div class="md-form ">
                                        <input type="text" name="firstName" class="form-control">
                                        <label for="firstName" class="">First name</label>
                                    </div>

                                </div>
                                <!--Grid column-->

                                <!--Grid column-->
                                <div class="col-md-6 mb-2">

                                    <!--lastName-->
                                    <div class="md-form">
                                        <input type="text" name="lastName" class="form-control">
                                        <label for="lastName" class="">Last name</label>
                                    </div>

                                </div>
                                <!--Grid column-->

                            </div>
                            <!--Grid row-->

                            <!--Username-->
                            <div class="md-form input-group pl-0 mb-5">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" >@</span>
                                </div>
                                <input type="text" class="form-control py-0" placeholder="Username" name="uName" aria-describedby="basic-addon1">
                            </div>

                            <!--email-->
                            <div class="md-form mb-5">
                                <input type="text" name="email" class="form-control" placeholder="youremail@example.com">
                                <label for="email" class="">Email (optional)</label>
                            </div>

                            <!--address-->
                            <div class="md-form mb-5">
                                <input type="text" name="address" class="form-control" placeholder="1234 Main St">
                                <label for="address" class="">Address</label>
                            </div>

                            <!--Grid row-->
                            <div class="row">

                                <!--Grid column-->
                                <div class="col-lg-4 col-md-12 mb-4">

                                    <label for="country">Country</label>
                                    <input type="text" name="country" class="form-control" placeholder="USA or SA">
                                        <div class="invalid-feedback">
                                        Country name required.
                                    </div>
                                </div>
                                <!--Grid column-->

                                <!--Grid column-->
                                <div class="col-lg-4 col-md-6 mb-4">
                                    <label for="state">State</label>
                                    <input type="text" name="state" class="form-control" placeholder="Gauteng or New york">
                                       <div class="invalid-feedback">
                                        State name required.
                                    </div>
                                </div>
                                <!--Grid column-->

                                <!--Grid column-->
                                <div class="col-lg-4 col-md-6 mb-4">

                                    <label for="zip">Zip</label>
                                    <input type="text" class="form-control" name="zip" placeholder="" required>
                                    <div class="invalid-feedback">
                                        Zip code required.
                                    </div>

                                </div>
                                <!--Grid column-->

                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="cc-name">Name on card</label>
                                    <input type="text" class="form-control" name="ccname" placeholder="" required>
                                    <small class="text-muted">Full name as displayed on card</small>
                                    <div class="invalid-feedback">
                                        Name on card is required
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="cc-number">Credit card number</label>
                                    <input type="text" class="form-control" name="ccnumber" placeholder="" required>
                                    <div class="invalid-feedback">
                                        Credit card number is required
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="cc-expiration">Expiration</label>
                                    <input type="text" class="form-control" name="ccexpiration" placeholder="" required>
                                    <div class="invalid-feedback">
                                        Expiration date required
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="cc-expiration">CVV</label>
                                    <input type="text" class="form-control" name="cvv" placeholder="" required>
                                    <div class="invalid-feedback">
                                        Security code required
                                    </div>
                                </div>
                            </div>
                            <hr class="mb-4">
                            <button class="btn btn-primary btn-lg btn-block" type="submit" name="btnChkout">Continue to checkout</button>

                        </form>

                    </div>
                    <!--/.Card-->

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-4 mb-4">

                    <!-- Heading -->
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Your cart</span>
                        <span class="badge badge-secondary badge-pill"><?php echo $cartCount; ?></span>
                    </h4>
                    <?php 
                    $id =  $_SESSION['id'];
                    $sql = "select cart_D,Price,Category  from cart c,products p  where c.userId = '$id' and p.id ='$pID' ";
                    $getdata = mysqli_query($conn, $sql) or die("database error:".mysqli_error($conn));
                    while($row = mysqli_fetch_assoc($getdata))
                    {
                    if($row != 0){
                    
                    ?>
                    <!-- Cart -->
                    <ul class="list-group mb-3 z-depth-1">
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0"><?php echo $row['cart_D']; ?></h6>
                                <small class="text-muted"><?php echo $row['Category']; ?></small>
                            </div>
                            <span class="text-muted"><span class="text-danger bold">R </span><?php echo $row['Price']; ?> </span>
                        </li>
                        <?php }else{   ?>

                        <?php } }?>
                        <li class="list-group-item d-flex justify-content-between">
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
                            <span>Total (ZAR)</span>
                            <strong><span class="text-danger">R</span><?php echo $TotalP;?> </strong>
                        </li>
                    </ul>

                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->
            </form>
        </div>
    </main>
    <!--Main layout-->
</body>
<br />
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
