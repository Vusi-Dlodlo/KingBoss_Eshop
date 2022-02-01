<?php 
include("DBConn.php");
$cartCount = $_SESSION['count'];
?>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark  ">

    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="index.php"><img src="./Images/Background/logo1.jpeg" width="60" height="54" /></a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home<span class="sr-only"></span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="products.php">Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Contact.php">Contact us</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="Login.html">Login</a>
                    <a class="dropdown-item" href="Register.html">Register</a>
                    <a class="dropdown-item" href="cart.php"><i class="fa fa-shopping-cart"></i></a>
                </div>
            </li>
        </ul>
        <span class="navbar-text">
            <i class="fa fa-shopping-cart"></i><span class="badge badge-pill badge-danger lblcount baseline-top">
                <?php echo $cartCount; ?>
            </span>
        </span>
    </div>

</nav>
