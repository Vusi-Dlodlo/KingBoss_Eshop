<?php
include("DBConn.php");
session_start();
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
        .mask {
            background-image: url('./Images/Background/wavesOpacity.svg');
        }

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

    <header>
        <div class="mask">
            <div class="mask" style="background-color:#292B2C;">
                <div class="d-flex justify-content-center align-items-center h-100">
                    <div class="text-white">
                        <h1 class="mb-3">King Boss Clothing</h1>
                        <h4 class="mb-3">Welcome to our small ecommerce website,<br /><span class="text-danger"> We hope you have a splending time.</span></h4>
                        <a class="btn btn-dark btn-lg" href="products.php" role="button">Shop now</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <title>King Boss</title>


</head>

<body>
    <br />

    <div class="container mt-2">
        <div class="text-center">
            <hr>
            <h3 class="mt-3">Categories</h3>
            <hr>
            <br>
            <div class="row mt-2">
                <div class="col-sm-6 ">
                    <div class="card shadow h-75">
                        <?php
                $sql ="SELECT * FROM products where id ='12'";
                $getdata = mysqli_query($conn, $sql) or die("database error:".mysqli_error($conn));
                while($row = mysqli_fetch_assoc($getdata))
                {
                ?>
                        <div class="overlay">
                            <a href="Category.php?category=<?php echo $row['category'];?>">
                                <img src="<?php echo $row['product_image']; ?>" class="card-img-top" width="60" height="54" alt="">
                            </a>
                        </div>
                        <div class="card-body text-center">
                            <a href="" class="text-muted">
                            </a>
                            <h6><?php echo $row['category']; ?></h6>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-sm-6 ">
                    <div class="card shadow h-75">
                        <?php
                $sql ="SELECT * FROM products where id ='28'";
                $getdata = mysqli_query($conn, $sql) or die("database error:".mysqli_error($conn));
                while($row = mysqli_fetch_assoc($getdata))
                {
                ?>
                        <div class="overlay">
                            <a href="Category.php?category=<?php echo $row['category'];?>">
                                <img src="<?php echo $row['product_image']; ?>" class="card-img-top rounded" width="60" height="54" alt="">
                            </a>
                        </div>
                        <div class="card-body text-center">
                            <a href="" class="text-muted">
                            </a>
                            <h6><?php echo $row['category']; ?></h6>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card shadow h-75">
                        <?php
                $sql ="SELECT * FROM products where id ='6'";
                $getdata = mysqli_query($conn, $sql) or die("database error:".mysqli_error($conn));
                while($row = mysqli_fetch_assoc($getdata))
                {
                ?>
                        <div class="overlay">
                            <a href="Category.php?category=<?php echo $row['category'];?>">
                                <img src="<?php echo $row['product_image']; ?>" class="card-img-top rounded" width="60" height="54" alt="">
                            </a>
                        </div>
                        <div class="card-body text-center">
                            <a href="" class="text-muted">
                            </a>
                            <h6><?php echo $row['category']; ?></h6>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card h-75 shadow">
                        <?php
                $sql ="SELECT * FROM products where id ='21'";
                $getdata = mysqli_query($conn, $sql) or die("database error:".mysqli_error($conn));
                while($row = mysqli_fetch_assoc($getdata))
                {
                ?>
                        <div class="overlay">
                            <a href="Category.php?category=<?php echo $row['category'];?>">
                                <img src="<?php echo $row['product_image']; ?>" class="card-img-top" width="60" height="54" alt="">
                            </a>
                        </div>
                        <div class="card-body text-center">
                            <a href="" class="text-muted">
                            </a>
                            <h6><?php echo $row['category']; ?></h6>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


    //

    <div class="content">
        <div class="container">
            <hr>
            <div class="text-center">
                <h3 class="mt-3">Our Bestsellers</h3>
                <hr />
                <h4></h4>
                <div class="row mt-4">
                    <?php
                $sql ="SELECT * FROM products where id ='01'";
                $getdata = mysqli_query($conn, $sql) or die("database error:".mysqli_error($conn));
                while($row = mysqli_fetch_assoc($getdata))
                {
                ?>
                    <div class="col-lg-4 col-md-6 mb-4 ">
                        <div class="card border-0">
                            <div class="view zoom overlay shadow">
                                <a href="SingleProduct.php?id=<?php echo $row['id'];?>">
                                    <img src="<?php echo $row['product_image']; ?>" class="card-img-top rounded" alt="">
                                </a>
                            </div>
                            <div class="card-body text-center">
                                <a href="" class="text-muted">
                                    <h6><?php echo $row['category']; ?></h6>
                                </a>
                                <strong>
                                    <a href="#" class="" type="text/plain">
                                        <?php echo $row['Description']; ?>
                                        <span class="badge badge-pill alert-danger">New</span>
                                    </a>
                                    <ul class="rating">
                                        <li class="fa fa-star"></li>
                                        <li class="fa fa-star"></li>
                                        <li class="fa fa-star "></li>
                                        <li class="fa fa-star-half"></li>
                                        <li class="fa fa-star disable"></li>
                                    </ul>
                                </strong>
                                <strong><?php echo $curr.' '. $row['CostPrice']; ?></strong>
                                <hr>
                            </div>
                        </div>
                    </div>
                    <?php 
        }
                ?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <?php
                $sql ="SELECT * FROM products where id ='2'";
                $getdata = mysqli_query($conn, $sql) or die("database error:".mysqli_error($conn));
                while($row = mysqli_fetch_assoc($getdata))
                {
                ?>
                        <div class="card border-0">
                            <div class="view overlay shadow">
                                <a href="SingleProduct.php?id=<?php echo $row['id'];?>">
                                    <div class=""> <img src="<?php echo $row['product_image']; ?>" class="card-img-top rounded" alt=""></div>
                                </a>
                            </div>
                            <div class="card-body text-center">
                                <a href="" class="text-muted">
                                    <h6><?php echo $row['category']; ?></h6>
                                </a>
                                <strong>
                                    <a href="#" class="text-dark" type="text/plain">
                                        <?php echo $row['Description']; ?>
                                        <span class="badge badge-pill alert-danger">New</span>
                                    </a>
                                    <ul class="rating">
                                        <li class="fa fa-star"></li>
                                        <li class="fa fa-star"></li>
                                        <li class="fa fa-star"></li>
                                        <li class="fa fa-star"></li>
                                        <li class="fa fa-star"></li>
                                    </ul>
                                </strong>
                                <strong class="pr-3"> <?php echo $curr.' '. $row['CostPrice']; ?></strong>
                                <hr>
                            </div>
                        </div>
                        <?php } ?>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4">
                        <?php
                $sql ="SELECT * FROM products where id ='3'";
                $getdata = mysqli_query($conn, $sql) or die("database error:".mysqli_error($conn));
                while($row = mysqli_fetch_assoc($getdata))
                {
                ?>
                        <div class="card border-0">
                            <div class="view overlay shadow">
                                <a href="SingleProduct.php?id=<?php echo $row['id'];?>">
                                    <div class=""> <img src="<?php echo $row['product_image']; ?>" class="card-img-top rounded" alt=""></div>
                                </a>
                            </div>
                            <div class="card-body text-center">
                                <a href="" class="text-muted">
                                    <h6><?php echo $row['category']; ?></h6>
                                </a>
                                <strong>
                                    <a href="#" class="text-dark" type="text/plain">
                                        <?php echo $row['Description']; ?>
                                        <span class="badge badge-pill alert-danger"></span>
                                    </a>
                                    <ul class="rating">
                                        <li class="fa fa-star"></li>
                                        <li class="fa fa-star"></li>
                                        <li class="fa fa-star "></li>
                                        <li class="fa fa-star"></li>
                                        <li class="fa fa-star disable"></li>
                                    </ul>
                                </strong>
                                <strong class="p-2"> <?php echo $curr.' '. $row['CostPrice']; ?></strong>
                                <hr>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <br />
        <!-- products card-->

        <div class="container">
            <hr>
            <div class="text-center">
                <h3 class="mt-1">New Products</h3>
                <hr />
                <h4></h4>
                <div class="row mt-4">
                    <div class="col-lg-4 col-md-6 mb-4">
                        <?php
                $sql ="SELECT * FROM products where id ='11'";
                $getdata = mysqli_query($conn, $sql) or die("database error:".mysqli_error($conn));
                while($row = mysqli_fetch_assoc($getdata))
                {
                ?>
                        <div class="card border-0">
                            <div class="view overlay shadow">
                                <a href="SingleProduct.php?id=<?php echo $row['id'];?>">
                                    <div class=""> <img src="<?php echo $row['product_image']; ?>" class="card-img-top rounded" alt=""></div>
                                </a>
                            </div>
                            <div class="card-body text-center">
                                <a href="" class="text-muted">
                                    <h6><?php echo $row['category']; ?></h6>
                                </a>
                                <strong>
                                    <a href="#" class="text-dark" type="text/plain">
                                        <?php echo $row['Description']; ?>
                                        <span class="badge badge-pill alert-danger">New</span>
                                    </a>
                                    <br>
                                </strong>
                                <strong class="pr-3"> <?php echo $curr.' '. $row['CostPrice']; ?></strong>
                                <hr>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <?php
                $sql ="SELECT * FROM products where id ='28'";
                $getdata = mysqli_query($conn, $sql) or die("database error:".mysqli_error($conn));
                while($row = mysqli_fetch_assoc($getdata))
                {
                ?>
                        <div class="card border-0">
                            <div class="view overlay shadow">
                                <a href="SingleProduct.php?id=<?php echo $row['id'];?>">
                                    <div class=""> <img src="<?php echo $row['product_image']; ?>" class="card-img-top rounded" alt=""></div>
                                </a>
                            </div>
                            <div class="card-body text-center">
                                <a href="" class="text-muted">
                                    <h6><?php echo $row['category']; ?></h6>
                                </a>
                                <strong>
                                    <a href="#" class="text-dark" type="text/plain">
                                        <?php echo $row['Description']; ?>
                                        <span class="badge badge-pill alert-danger">New</span>
                                    </a>
                                </strong>
                                <br />
                                <strong class="pr-3"> <?php echo $curr.' '. $row['CostPrice']; ?></strong>
                                <hr>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <?php
                $sql ="SELECT * FROM products where id ='17'";
                $getdata = mysqli_query($conn, $sql) or die("database error:".mysqli_error($conn));
                while($row = mysqli_fetch_assoc($getdata))
                {
                ?>
                        <div class="card border-0">
                            <div class="view overlay shadow">
                                <a href="SingleProduct.php?id=<?php echo $row['id'];?>">
                                    <div class=""> <img src="<?php echo $row['product_image']; ?>" class="card-img-top rounded" alt=""></div>
                                </a>
                            </div>
                            <div class="card-body text-center">
                                <a href="" class="text-muted">
                                    <h6><?php echo $row['category']; ?></h6>
                                </a>
                                <strong>

                                    <a href="#" class="text-dark" type="text/plain">
                                        <?php echo $row['Description']; ?>
                                        <span class="badge badge-pill alert-danger">New</span>
                                    </a>
                                </strong>
                                <br />
                                <strong class="pr-3"> <?php echo $curr.' '. $row['CostPrice']; ?></strong>
                                <hr>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
