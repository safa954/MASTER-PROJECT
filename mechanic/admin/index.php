<?php include"include/header.php"; ?>
<?php include"include/sidebar.php";
?>
<?php require_once '../app/config/db.php';?>

<?php
$sql = "select count(*) as total from Products ";
$result=mysqli_query($link,$sql);
$data=mysqli_fetch_assoc($result);
$count = $data['total'];

$sql = "select count(*) as total from gas_station ";
$result=mysqli_query($link,$sql);
$data=mysqli_fetch_assoc($result);
$count_gas = $data['total'];

$sql = "select count(*) as total from mechanic ";
$result=mysqli_query($link,$sql);
$data=mysqli_fetch_assoc($result);
$count_mechanic = $data['total'];

//$count_mechanic = 0;
//if(){
//    if(mysqli_num_rows($result) > 0){
//        $count_mechanic = mysqli_num_rows($result);
//    }
//}
?>
      <div class="content-wrapper">
         <!-- Container-fluid starts -->
         <!-- Main content starts -->
         <div class="container-fluid">
            <div class="row">
               <div class="main-header">
                  <h4>Dashboard</h4>
               </div>
            </div>
            <!-- 4-blocks row start -->
            <div class="row dashboard-header">
               <div class="col-lg-3 col-md-6">
                  <div class="card dashboard-product">
                     <span>Products</span>
                     <h2 class="dashboard-total-products"><?php echo $count?></h2>
                     <div class="side-box">
                        <i class="ti-signal text-warning-color"></i>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6">
                  <div class="card dashboard-product">
                     <span>Gases</span>
                     <h2 class="dashboard-total-products"><?php echo $count_gas; ?></h2>
                     <div class="side-box ">
                        <i class="ti-gift text-primary-color"></i>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6">
                  <div class="card dashboard-product">
                     <span>Mechanics</span>
                     <h2 class="dashboard-total-products"><?php echo $count_mechanic?></span></h2>
                     <div class="side-box">
                        <i class="ti-direction-alt text-success-color"></i>
                     </div>
                  </div>
               </div>
            </div>
            <!-- 4-blocks row end -->

          

          
         </div>
         <!-- Main content ends -->
         <!-- Container-fluid ends -->
         <div class="fixed-button">
            <a href="#!" class="btn btn-md btn-primary">
              <i class="fa fa-shopping-cart" aria-hidden="true"></i> Upgrade To Pro
            </a>
         </div>
      </div>
   <?php include"include/footer.php"; ?>