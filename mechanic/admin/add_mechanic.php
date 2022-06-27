 
 <?php include"include/header.php"; ?>
 <?php include"include/sidebar.php"; ?>
 <?php require_once '../app/config/db.php';?>
 
<?php
$f_name =$l_name= $phone_number = $address =  "";
$f_name_err=$l_name_err = $phone_number_err = $address_err =  "";

// Processing form data when form is submitted
if (isset($_POST['add'])){


    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
   //  $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];

  

   

        // Prepare an insert statement
        $sql = "INSERT INTO mechanic (first_name, last_name,phone_number,address) VALUES ('$f_name','$l_name','$phone_number','$address')";
      
        mysqli_query($link, $sql);

     
    }


?>
 <div class="content-wrapper">
         <!-- Container-fluid starts -->
         <div class="container-fluid">
            <!-- Main content starts -->
            <div>
               <!-- Row Starts -->
               <div class="row">
                  <div class="col-sm-12 p-0">
                     <div class="main-header">
                        <h4>General Elements</h4>
                        <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                           <li class="breadcrumb-item"><a href="index.html"><i class="icofont icofont-home"></i></a>
                           </li>
                           <li class="breadcrumb-item"><a href="#">Forms Components</a>
                           </li>
                           <li class="breadcrumb-item"><a href="form-elements-bootstrap.html">General Elements</a>
                           </li>
                        </ol>
                     </div>
                  </div>
               </div>
               <!-- Row end -->

               <!-- Row start -->
               <div class="row">
                  <!-- Form Control starts -->
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header">
                           <h5 class="card-header-text">Input Types</h5>
                      
                        </div>
                    

                        <div class="card-block">
                           <form method="post">
                              <div class="form-group">
                                 <label for="name" class="form-control-label">First Name</label>
                                 <input type="text" class="form-control " name="f_name" placeholder="Enter First name" required>

                              </div>
                              <div class="form-group">
                                 <label for="name" class="form-control-label">last Name</label>
                                 <input type="text" class="form-control " name="l_name" placeholder="Enter Last name" required >

                              <!-- </div>
                              <div class="form-group">
                                 <label for="name" class="form-control-label">Email</label>
                                 <input type="text" class="form-control" name="email" placeholder="Enter Email" required>

                              </div> -->
                              <div class="form-group">
                                 <label for="name" class="form-control-label">Phone Number</label>
                                 <input type="text" class="form-control" name="phone_number" placeholder="Enter phone_number" required>

                              </div>
                            
                              <div class="form-group">
                                 <label for="exampleTextarea" class="form-control-label">Address</label>
                                 <textarea class="form-control " name="address" rows="4"></textarea>

                              </div>
                           
                              <button type="submit" name="add" class="btn btn-warning waves-effect waves-light">Submit</button>
                           </form>
                        </div>
                     </div>
                  </div>
                  <!-- Form Control ends -->

           
               </div>
               <!-- Row end -->

         
          
          

            </div>
            <!-- Main content ends -->
         </div>
         <!-- Container-fluid ends -->
      </div>
      <?php include"include/footer.php"; ?>