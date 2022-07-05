<?php include'header.php';
require_once 'app/config/db.php';
?>

    <div class="">


        <div id="slider" class="sl-slider-wrapper">

            <div class="sl-slider">

                <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
                    <div class="sl-slide-inner">
                        <div class="bg-img bg-img-1"></div>
                        <h2><a href="#">Welcome To Mechanic Care</a></h2>
                        <blockquote>
                            <p class="location"><span class="glyphicon glyphicon-map-marker"></span> Jordan</p>
                            <p> The best site for selling parts in the world</p>

                        </blockquote>
                    </div>
                </div>

                <div class="sl-slide" data-orientation="vertical" data-slice1-rotation="10" data-slice2-rotation="-15" data-slice1-scale="1.5" data-slice2-scale="1.5">
                    <div class="sl-slide-inner">
                        <div class="bg-img bg-img-2"></div>
                        <h2><a href="#">We have the best mechanics</a></h2>
                        <blockquote>
                            <p class="location"><span class="glyphicon glyphicon-map-marker"></span>Jordan</p>
                            <p>We have the best certified mechanics</p>
                        </blockquote>
                    </div>
                </div>



            <nav id="nav-dots" class="nav-dots">
                <span class="nav-dot-current"></span>
                <span></span>
            </nav>

        </div><!-- /slider-wrapper -->
    </div>

<div class="banner-search">
  <div class="container">
    <!-- banner -->

    <div class="searchbar">
      <div class="row">

    <div class="col-lg-5 col-lg-offset-1 col-sm-6 ">
        <?php if(!isset($_SESSION["loggedin"])){?>

            <p>Join now and get updated with all the properties deals.</p>
          <a class="btn btn-info"  href="login.php">Login</a>
        <?php }  ?>
    </div>

      </div>

    </div>
  </div>
</div>
<!-- banner -->
<div class="container">
  <div class="properties-listing spacer"> <a href="products.php" class="pull-right viewall">View All Listing</a>
    <h2>Featured Properties</h2>
    <div id="owl-example" class="owl-carousel">
<?php
$sql = "select * from Products ";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){

            ?>
            <div class="properties">
                <div class="image-holder"><img src="image/<?php echo $row['file_name'] ?>" class="img-responsive" alt="properties">
                    <div class="status sold"><?php echo $row['status'] ?></div>
                </div>
                <h4><a href="property-detail.php"><?php echo $row['title'] ?></a></h4>
                <p class="price">Price: $<?php echo $row['price'] ?></p>
                <!--        <div class="listing-detail"><span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room">5</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Living Room">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Parking">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Kitchen">1</span> </div>-->
                <a class="btn btn-primary" href="property-detail.php?id=<?php echo $row['product_id']?>">View Details</a>


            </div>

            <?php
        }
        mysqli_free_result($result);
    }

}
?>
    </div>
  </div>

    <div class="spacer">
        <div class="row">
            <div class="col-lg-6 col-sm-9 recent-view">
                <h3>About Us</h3>
                <p>It’s a website that manages the affairs of cars that provides the common services that you need, these services include: informing the user of vehicle matters that need to be followed up periodically, assistance with possible sudden malfunctions, and the ability for users to view and sell auto parts and communicate with each other.<br><a href="about.php">Learn More</a></p>

            </div>
        </div>
    </div>
</div>
<?php include'footer.php';?>