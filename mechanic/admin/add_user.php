 <?php include"include/header.php"; ?>
 <?php include"include/sidebar.php"; ?>
 <?php require_once '../app/config/db.php';?>

 <?php

// Processing form data when form is submitted
if (isset($_POST['Add'])){
 
    $full_name = $_POST['full_name'];
    $role_type = "admin";
    $email = $_POST['email'];
    $phone_number = $_POST['phone_num'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $username = $_POST['username'];

   

        // Prepare an insert statement
        $sql = "INSERT INTO users (full_name, email,phone_num,role_type,address,username,password) VALUES ('$full_name','$email','$phone_numbe','$role_type','$address',' $username','$password ')";
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
                                     <label for="name" class="form-control-label">Full Name</label>
                                     <input type="text" class="form-control " name="full_name"
                                         placeholder="Enter Full Name" required>

                                 </div>
                                 <div class="form-group">
                                     <label for="name" class="form-control-label">email</label>
                                     <input type="text" class="form-control " name="email"
                                         placeholder="Enter email" required>

                                 </div>
                                 <div class="form-group">
                                     <label for="name" class="form-control-label">Phone Num</label>
                                     <input type="text" class="form-control" name="phone_num" placeholder="Enter phone_num"
                                         required>

                                 </div>
                                 <div class="form-group">
                                     <label for="name" class="form-control-label">username</label>
                                     <input type="text" class="form-control" name="username"
                                         placeholder="Enter username" required>

                                 </div>
                                 <div class="form-group">
                                     <label for="name" class="form-control-label">password</label>
                                     <input type="text" class="form-control" name="password"
                                         placeholder="Enter password" required>

                                 </div>
                                 <div class="form-group">
                                     <label for="exampleTextarea" class="form-control-label">Address</label>
                                     <textarea class="form-control " name="address" rows="4"></textarea>

                                 </div>

                                 <button type="submit" name="add"
                                     class="btn btn-warning waves-effect waves-light">Submit</button>
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