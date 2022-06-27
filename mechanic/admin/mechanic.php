<?php include"include/header.php"; ?>
 <?php include"include/sidebar.php"; ?>
 <?php require_once '../app/config/db.php';?>
 <?php 
      
    $sql= "SELECT * from mechanic where 1";
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
                     <h4>Table</h4>
                     <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                 
                        <li class="breadcrumb-item"><form action="add_mechanic.php"><button class="btn btn-warning waves-effect waves-light icofont icofont-ui-add "><span class="waves-light" style="margin-left:6px;color:#fff">Add Mechanic </span</button>
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
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <!-- <th>Email</th> -->
                                                <th>Address</th>
                                                <th>Phone Number</th>
                                                <th><i style="color:#373a3c;font-size:23px;" class="icofont icofont-edit"></i></th>
                                                <th><i style="color:#373a3c;font-size:23px;"  class="icofont icofont-bin"></i></th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($result as $row) {   ?>

                                            <tr>
                                                <th>
                                                <?php echo $row['mechanic_id'];?>
                                                </th>
                                                <td>
                                                <?php echo $row['first_name'];?>
                                                </td>
                                                <td>
                                                <?php echo $row['last_name'];?>
                                                </td>
                                                <!-- <td>
                                                <?php echo $row['email'];?>
                                                </td> -->
                                                <td>                                              
                                                <?php echo $row['address'];?>
                                                 </td>
                                                <td>
                                                <?php echo $row['phone_number'];?>
                                                </td>
                                               
                                                <td>                  
                                                <a href= "edit_mechanic.php?mechanic_id=<?php echo $row['mechanic_id'];  ?> " >  <i style="color:blue;font-size:23px;" class="icofont icofont-edit"></i>  </a></td>
                                              </a>
                                                                <td>
                                                <a href= "detele_mechanic.php?mechanic_id=<?php echo $row['mechanic_id'];  ?> " >  <i style="color:red;font-size:23px;"  class="icofont icofont-bin"></i>  </a></td>
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