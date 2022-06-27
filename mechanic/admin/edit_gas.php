 
 <?php include"include/header.php"; ?>
 <?php include"include/sidebar.php"; ?>
 <?php require_once '../app/config/db.php';?>
 
<?php

$name = $phone_number = $address =  "";
$name_err = $phone_number_err = $address_err =  "";
if(isset($_GET['station_id'])){
    $station_id = $_GET['station_id'];
}
$username = $password = $confirm_password = $email = $phone_num =$address = $full_name= "";
$username_err  = $email_arr = $phone_num_err = $full_name_arr = "";

$sql = "select * from gas_station where station_id = '".$station_id."'";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $name = $row['name'];
            $phone_number = $row['phone_number'];
            $address = $row['address'];
        }
    }
}
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate name
    if(empty(trim($_POST['name'])))
    {
        $name_err = "Please enter name";
    }else{
        $name = trim($_POST["name"]);
    }
    // Validate phone_number
    if(empty(trim($_POST['phone_number'])))
    {
        $phone_number_err = "Please enter phone_number";
    }else{
        $phone_number = trim($_POST["phone_number"]);
    }
    // Validate address
    if(empty(trim($_POST['address'])))
    {
        $address_err = "Please enter address";
    }else{
        $address = trim($_POST["address"]);
    }
  
    $name = $_POST['name'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];


    if(empty($name_err) &&empty($phone_number_err)  && empty($address_err)){

        // Prepare an insert statement
        $sql = "UPDATE gas_station SET name=?, phone_number=?, address=? WHERE station_id=?";

//        $sql = "INSERT INTO users (username, password,email,phone_num) VALUES (?,?,?,?)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssd", $param_name, $param_phone_number,$param_address,$param_station_id);

            // Set parameters
            $param_station_id = $station_id;
            $param_name = $name;
            $param_phone_number = $phone_number;
            $param_address=$address;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: account.php");
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($link);

     
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
                                 <label for="name" class="form-control-label">Name</label>
                                 <input type="text" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" name="name" value="<?php echo $name?>" placeholder="Enter name">
                                 <span class="invalid-feedback"><?php echo $name_err; ?></span>

                              </div>
                              <div class="form-group">
                                 <label for="name" class="form-control-label">Phone Number</label>
                                 <input type="text" class="form-control <?php echo (!empty($phone_number_err)) ? 'is-invalid' : ''; ?>" name="phone_number" value="<?php echo $phone_number?>" placeholder="Enter phone_number">
                                 <span class="invalid-feedback"><?php echo $phone_number_err; ?></span>

                              </div>
                            
                              <div class="form-group">
                                 <label for="exampleTextarea" class="form-control-label">Address</label>
                                 <textarea class="form-control  <?php echo (!empty($address_err)) ? 'is-invalid' : ''; ?>" name="address" rows="4"><?php echo $address;?></textarea>
                                 <span class="invalid-feedback"><?php echo $address_err; ?></span>

                              </div>
                           
                              <button type="submit" name="submit" class="btn btn-warning waves-effect waves-light">Submit</button>
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