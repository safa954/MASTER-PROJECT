<?php include'header.php';?>
<?php require_once 'app/config/db.php';?>
 <?php 
      
    $sql= "SELECT * from gas_station where 1";
    $result=$link->query($sql);

			 ?>

    <!-- banner -->
    <div class="inside-banner">
        <div class="container">
           <!-- <span class="pull-right"><a href="#">Home</a> / Gas Stations</span>-->
            <h2>Gas Station</h2>
        </div>
    </div>
    <!-- banner -->

    <div class="container">
<div class="spacer agents">

<div  class="row">

<?php foreach ($result as $row) {   ?>

  <div  class="col-lg-7  col-lg-offset-2 col-sm-12">
      <!-- agents -->
      <div   class="row">
         <div class="col-lg-2 col-sm-2 "><a href="#"><img src="images/agents/gas.jpg" class="img-responsive"  alt="agent name"></a></div>
        <div class="col-lg-7 col-sm-7 "><h4><?php echo $row['name'];?></h4><p><?php echo $row['address'];?></p></div>
        <div class="col-lg-3 col-sm-3 "> <br>
        <span class="glyphicon glyphicon-earphone"></span> <?php echo $row['phone_number'];?></div>
      </div>
  
      <!-- agents -->
  
  </div>
<?php } ?>

</div>


</div>
</div>



<?php include'footer.php';?>