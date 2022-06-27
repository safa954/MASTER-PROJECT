 
 <?php include"include/header.php"; ?>
 <?php include"include/sidebar.php"; ?>
 <?php require_once '../app/config/db.php';?>
 
<?php
$name = $phone_number = $address =  "";
$name_err = $phone_number_err = $address_err =  "";


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

  

   

        // Prepare an insert statement
        $sql = "INSERT INTO transport_truck (name, phone_number,address) VALUES ('$name','$phone_number','$address')";
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
                                 <label for="name" class="form-control-label">Name</label>
                                 <input type="text" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" name="name" placeholder="Enter name">
                                 <span class="invalid-feedback"><?php echo $name_err; ?></span>

                              </div>
                              <div class="form-group">
                                 <label for="name" class="form-control-label">Phone Number</label>
                                 <input type="text" class="form-control <?php echo (!empty($phone_number_err)) ? 'is-invalid' : ''; ?>" name="phone_number" placeholder="Enter phone_number">
                                 <span class="invalid-feedback"><?php echo $phone_number_err; ?></span>

                              </div>
                            
                              <div class="form-group">
                                 <label for="exampleTextarea" class="form-control-label">Address</label>
                                 <textarea class="form-control  <?php echo (!empty($address_err)) ? 'is-invalid' : ''; ?>" name="address" rows="4"></textarea>
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