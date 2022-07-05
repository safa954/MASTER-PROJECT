<!DOCTYPE html>
<html lang="en">
<head>
<title>Mechanic Care </title>
<meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<?php
session_start();
?>
 	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css" />
  <link rel="stylesheet" href="assets/style.css"/>
  <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.js"></script>
  <script src="assets/script.js"></script>



<!-- Owl stylesheet -->
<link rel="stylesheet" href="assets/owl-carousel/owl.carousel.css">
<link rel="stylesheet" href="assets/owl-carousel/owl.theme.css">
<script src="assets/owl-carousel/owl.carousel.js"></script>
<!-- Owl stylesheet -->


<!-- slitslider -->
    <link rel="stylesheet" type="text/css" href="assets/slitslider/css/style.css" />
    <link rel="stylesheet" type="text/css" href="assets/slitslider/css/custom.css" />
    <script type="text/javascript" src="assets/slitslider/js/modernizr.custom.79639.js"></script>
    <script type="text/javascript" src="assets/slitslider/js/jquery.ba-cond.min.js"></script>
    <script type="text/javascript" src="assets/slitslider/js/jquery.slitslider.js"></script>
<!-- slitslider -->

</head>

<body>


<!-- Header Starts -->
<div class="navbar-wrapper">

        <div class="navbar-inverse" role="navigation">
          <div class="container">
            <div class="navbar-header">


              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>

            </div>


            <!-- Nav Starts -->
            <div class="navbar-collapse  collapse">
              <ul class="nav navbar-nav navbar-right">
               <li><a href="index.php">Home</a></li>
<?php if(!isset($_SESSION["loggedin"])){?>
                  <li > <a href="login.php">Login</a></li>
    <li > <a href="register.php">Register</a></li>

<?php } ?>
                  <li><a href="about.php">About</a></li>
                <li><a href="mechanics.php">Mechanics</a></li>
                  <li><a href="gas.php">Gas</a></li>
                  <li><a href="track.php">Track</a></li>

                <li><a href="contact.php">Contact</a></li>
                  <?php if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){?>
                      <li > <a href="account.php">Account</a></li>
                  <?php } ?>
                  <?php if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){?>
                      <li > <a href="logout.php">LOGOUT</a></li>
                  <?php } ?>
              </ul>
            </div>
            <!-- #Nav Ends -->

          </div>
        </div>

    </div>
<!-- #Header Starts -->





<div class="container">

<!-- Header Starts -->
<div class="header">
<a href="index.php"><img src="image/logo.png" height="200x" width="200px" ></a>

              <ul class="pull-right">
                <li><a href="my-products.php">My Products</a></li>
                <li><a href="products.php">Show All Products</a></li>
              </ul>
</div>
<!-- #Header Starts -->
</div>