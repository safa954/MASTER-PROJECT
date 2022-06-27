 
 <?php include"include/header.php"; ?>
 <?php include"include/sidebar.php"; ?>
 <?php require_once '../app/config/db.php';?>
 
<?php
$f_name =$l_name= $phone_number = $address =  "";
$f_name_err=$l_name_err = $phone_number_err = $address_err =  "";

if(isset($_GET['mechanic_id'])){
    $mechanic_id = $_GET['mechanic_id'];
}
$sql = "select * from mechanic where mechanic_id = '".$mechanic_id."'";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $f_name = $row['first_name'];
            $l_name = $row['last_name'];
            // $email = $row['email'];
            $address = $row['address'];
            $phone_number = $row['phone_number'];
        }
    }
}
// Processing form data when form is submitted



    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $f_name = $_POST['f_name'];
        $l_name = $_POST['l_name'];
      //   $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];
        $address = $_POST['address'];


            // Prepare an insert statement
            $sql = "UPDATE mechanic SET first_name=?, last_name=?, address=?, phone_number=? WHERE mechanic_id=?";


            if($stmt = mysqli_prepare($link, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "ssssd", $param_fname, $param_lname,$param_phone_number,$param_address,$param_mechanic_id);

                // Set parameters
                $param_mechanic_id = $mechanic_id;
                $param_fname = $f_name;
                $param_lname = $l_name;
               //  $param_email = $email;
                $param_phone_number = $phone_number;
                $param_address=$address;

                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    // Redirect to login page
                  //   header("location: mechanic.php");
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }

                // Close statement
                mysqli_stmt_close($stmt);
            }
        }

        // Close connection
        mysqli_close($link);












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
                                 <input type="text" class="form-control " name="f_name" value=" <?php echo $f_name?>" placeholder="Enter First name" required>

                              </div>
                              <div class="form-group">
                                 <label for="name" class="form-control-label">last Name</label>
                                 <input type="text" class="form-control " name="l_name"  value=" <?php echo $l_name?>" placeholder="Enter Last name" required >

                              </div>
                              <!-- <div class="form-group">
                                 <label for="name" class="form-control-label">Email</label>
                                 <input type="text" class="form-control" name="email" value=" <?php echo $email?>" placeholder="Enter Email" required>

                              </div> -->
                              <div class="form-group">
                                 <label for="name" class="form-control-label">Phone Number</label>
                                 <input type="text" class="form-control" name="phone_number" value=" <?php echo $phone_number?>" placeholder="Enter phone_number" required>

                              </div>
                            
                              <div class="form-group">
                                 <label for="exampleTextarea" class="form-control-label">Address</label>
                                 <textarea class="form-control " name="address" rows="4"> <?php echo $address?></textarea>

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