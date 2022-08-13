<?php include'header.php';
require_once 'app/config/db.php';
?>

    <div class="">


        <div id="slider" class="sl-slider-wrapper">

            <div class="sl-slider">

                <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
                    <div class="sl-slide-inner">
                        <div class="bg-img"><img src="images/slider//2.jpg" width="100%" height="700px"></div>
                        <h2><a href="#">Welcome To Mechanic Care</a></h2>
                        <blockquote>
                            <p class="location"><span class="glyphicon glyphicon-map-marker"></span> Jordan</p>
                            <p> The best site for selling parts in the world</p>

                        </blockquote>
                    </div>
                </div>

                <div class="sl-slide" data-orientation="vertical" data-slice1-rotation="10" data-slice2-rotation="-15" data-slice1-scale="1.5" data-slice2-scale="1.5">
                    <div class="sl-slide-inner">
                        <div class="bg-img "><img src="images/slider/1.jpg" width="100%" height="700px"></div>
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


<!-- banner -->
<!-- #Header Starts -->





<div class="container">

<!-- Header Starts -->
<div class="header">
<!-- <a href="index.php"><img src="image/logo.png" height="200x" width="200px" ></a> -->

              <ul class="pull-right">
               <li><a href="mechanics.php">Mechanics</a></li>
                  <li><a href="gas.php">Gas</a></li>
                  <li><a href="track.php">Track</a></li>
              </ul>
</div>
<!-- #Header Starts -->
</div>
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


   
</div>


  
</div>
<?php include'footer.php';?>