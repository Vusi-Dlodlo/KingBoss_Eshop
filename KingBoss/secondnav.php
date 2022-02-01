<?php 
include("DBConn.php");
$cartCount =  $_SESSION['count'];
?>
   <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php"><img src="./Images/Background/logo1.jpeg" width="60" height="54" /></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>


    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto ">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home</a>
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
                    <a class="dropdown-item" href="cart.php">View Cart <i class="fa fa-shopping-cart"></i></a>
                    <a class="dropdown-item" href="checkout.php">Checkout <i class="fa fa-check"></i></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="logout.php">Logout <i class="fa fa-lock-open"></i></a>
                </div>
            </li>
        </ul>
        <span class="navbar-text">
            <button class="ml-3 btn btn-outline-danger btn-sm" data-toggle="tooltip" data-placement="bottom" data-original-title="<?php echo $_SESSION["Login"]; ?>"> <i class="fa fa-user"></i></button>
        </span>
        <span class="navbar-text">
            <i class="fa fa-shopping-cart ml-3"></i><span class="badge badge-pill badge-danger lblcount baseline-top">
                <?php echo $cartCount; ?>
            </span>
        </span>
    </div>
</nav>
