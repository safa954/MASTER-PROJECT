<?php include"include/header.php"; ?>
 <?php include"include/sidebar.php"; ?>
 <?php require_once '../app/config/db.php';?>
 <?php 
      
    $sql= "SELECT * from contact_us ";
    $result=$link->query($sql);

			 ?>
<div class="content-wrapper">
            <!-- Container-fluid starts -->
            <!-- Main content starts -->
            <div class="container-fluid">
                <!-- Header Starts -->
                <div class="row">
               <div class="col-sm-12 p-0">
                  <div class="main-header">
                     <h4></h4>
                     <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                 
</form>  </li>
                      
                     </ol>
                  </div>
               </div>
            </div>
            <!-- Header end -->


                    <!-- 2-1 block start -->
                    <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-block">
                                <div class="table-responsive">
                                    <table class="table m-b-0 photo-table">
                                        <thead style="background-color:#f57c00 !important">
                                            <tr class="text-uppercase">
                                                <th>#</th>
                                                <th>Full name</th>
                                               
                                                <th>Email</th>

                                                <th>Message</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($result as $row) {   ?>

                                            <tr>
                                                <th>
                                                <?php echo $row['contact_id'];?>
                                                </th>
                                                <td>
                                                <?php echo $row['full_name'];?>
                                                </td>
                                                <td>
                                                <?php echo $row['email'];?>
                                                </td>
                                                <td>
                                                <?php echo $row['message'];?>
                                                </td>

                                            </tr>
                                            <?php } ?>
                                      

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                 
                </div>
                <!-- 2-1 block end -->
</div>

</div>


<?php include"include/footer.php"; ?>