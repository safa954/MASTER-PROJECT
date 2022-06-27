<?php include'header.php';?>
<?php require_once 'app/config/db.php';?>
 <?php 
      
    $sql= "SELECT * from mechanic where 1";
    $result=$link->query($sql);

			 ?>

    <!-- banner -->
    <div class="inside-banner">
        <div class="container">
            <!--<span class="pull-right"><a href="#">Home</a> / Mechanics</span>-->
            <h2>Mechanic</h2>
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
    
         <div class="col-lg-2 col-sm-2 "><a href="#"><img src="images/agents/mechanic.jpg" class="img-responsive"  alt="<?php echo $row['first_name']." ".$row['last_name'];?>"></a></div>
        <div class="col-lg-7 col-sm-7 "><h4><?php echo $row['first_name']." ".$row['last_name'];?></h4><p><?php echo $row['address'];?></p></div>
        <div class="col-lg-3 col-sm-3 "> <a href="mailto:abc@realestate.com"></a><br>
        <span class="glyphicon glyphicon-earphone"></span> <?php echo $row['phone_number'];?></div>
      </div>
  
      <!-- agents -->
  
  </div>          <?php } ?>

</div>


</div>
</div>



<?php include'footer.php';?>