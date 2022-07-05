<?php include'header.php';
require_once 'app/config/db.php';

if(!isset($_SESSION["loggedin"])){
    header("location: login.php");
    exit;
}

$title =$product_id= $description = $phone_number = $price = $file_name = "";
$title_err = $price_err = $phone_number_err = "";

?>
    <!-- banner -->
    <div class="inside-banner">
        <div class="container">
           <!-- <span class="pull-right"><a href="index.php">Home</a> / Buy, Sale & Rent</span>-->
            <h2>Buy & Sale</h2>
        </div>
    </div>
    <!-- banner -->


    <div class="container">
        <div class="properties-listing spacer">

            <div class="row">
                <div class="col-lg-3 col-sm-4 ">

                    <div class="search-form">



                    </div>






                </div>

                <div class="col-lg-9 col-sm-8">

                    <div class="row">
                        <?php
                        $sql = "select * from Products ";
                        if($result = mysqli_query($link, $sql)){
                            if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_array($result)){

                                    ?>
                                    <div class="col-lg-4 col-sm-6">
                                        <div class="properties">
                                            <div class="image-holder"><img src="image/<?php echo $row['file_name'] ?>" class="img-responsive" alt="properties">
                                                <div class="status sold"><?php echo $row['status'] ?></div>
                                            </div>
                                            <h4><a href="property-detail.php"><?php echo $row['title'] ?></a></h4>
                                            <p class="price">Price: $<?php echo $row['price'] ?></p>
                                            <!--        <div class="listing-detail"><span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room">5</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Living Room">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Parking">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Kitchen">1</span> </div>-->
                                            <a class="btn btn-primary" href="property-detail.php?id=<?php echo $row['product_id']?>">View Details</a>


                                        </div>
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
    </div>


<?php include'footer.php';?>