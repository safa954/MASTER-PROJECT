<?php
include'header.php';
require_once 'app/config/db.php';

if(!isset($_SESSION["loggedin"])){
    header("location: login.php");
    exit;
}
$title =$product_id= $description = $phone_number = $price = $file_name = "";
$sql = "select * from products join users on users.user_id = products.user_id where product_id = '".$_GET['id']."'";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $title = $row['title'];
            $description = $row['description'];
            $phone_number = $row['phone_number'];
            $price = $row['price'];
            $file_name = $row['file_name'];
            $product_id = $row['product_id'];
            $name_user = $row['full_name'];
        }
    }
}

?>
<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <!--<span class="pull-right"><a href="#">Home</a> / Buy</span>-->
    <h2>View Details</h2>
</div>
</div>
<!-- banner -->


<div class="container">
<div class="properties-listing spacer">

<div class="row">
<div class="col-lg-3 col-sm-4 hidden-xs">

<div class="hot-properties hidden-xs">
<h4></h4>


</div>



<div class="advertisement">
  <h4></h4>

</div>

</div>

<div class="col-lg-9 col-sm-8 ">

<h2><?php echo $title?></h2>
<div class="row">
  <div class="col-lg-8">
  <div class="property-images">
    <!-- Slider Starts -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators hidden-xs">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      </ol>
      <div class="carousel-inner">
        <!-- Item 1 -->
        <div class="item active">
          <img src="image/<?php echo $file_name?>" class="properties" alt="properties" />
        </div>

        <!-- # Item 4 -->
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div>
<!-- #Slider Ends -->

  </div>
  



  <div class="spacer"><h4><span class="glyphicon glyphicon-th-list"></span> Properties Detail</h4>
  <p><?php echo $description;?></p>

  </div>

  </div>
  <div class="col-lg-4">
  <div class="col-lg-12  col-sm-6">
<div class="property-info">
<p class="price">$ <?php echo $price;?></p>
<!--  <p class="area"><span class="glyphicon glyphicon-map-marker"></span> 344 Villa, Syndey, Australia</p>-->
  
  <div class="profile">
  <span class="glyphicon glyphicon-user"></span> <?php echo $name_user; ?>
  <p>Phone Number : <br><?php echo $phone_number?></p>
  </div>
</div>


</div>
<div class="col-lg-12 col-sm-6 ">
<!-- <div class="enquiry">
  <h6><span class="glyphicon glyphicon-envelope"></span> Post Enquiry</h6>
  <form role="form">
                <input type="text" class="form-control" placeholder="Full Name"/>
                <input type="text" class="form-control" placeholder="you@yourdomain.com"/>
                <input type="text" class="form-control" placeholder="your number"/>
                <textarea rows="6" class="form-control" placeholder="Whats on your mind?"></textarea>
      <button type="submit" class="btn btn-primary" name="Submit">Send Message</button>
      </form>
 </div>          -->
</div>
  </div>
</div>
</div>
</div>
</div>
</div>

<?php include'footer.php';?>