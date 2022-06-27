<?php
include'header.php';
require_once 'app/config/db.php';
if(!isset($_SESSION["loggedin"])){
    header("location: login.php");
    exit;
}
?>

<?php
$username = $password = $confirm_password = $email = $phone_num =$address = $full_name= "";
$username_err  = $email_arr = $phone_num_err = $full_name_arr = "";

$sql = "select * from USERS where user_id = '".$_SESSION['user_id']."'";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $username = $row['username'];
            $email = $row['email'];
            $phone_num = $row['phone_num'];
            $full_name = $row['full_name'];
            $address = $row['address'];
        }
    }
}

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $address = trim($_POST['address']);
    // Validate fullname
    if(empty(trim($_POST['full_name'])))
    {
        $full_name_arr = "Please enter a Full Name";
    }else{
        $full_name = trim($_POST["full_name"]);
    }
    // Validate email
    if(empty(trim($_POST['email'])))
    {
        $email_arr = "Please enter a email";
    }elseif (!filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL)){
        $email_arr = "Invalid email format";
    }else{
        $email = trim($_POST["email"]);
    }
    // Validate phone number
    if(empty(trim($_POST['phone_num'])))
    {
        $phone_num_err = "Please enter a phone number";
    }else{
        $phone_num = trim($_POST["phone_num"]);
    }
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else{
        $username = trim($_POST["username"]);

    }


    // Validate password

    // Validate confirm password


    // Check input errors before inserting in database
    if(empty($username_err) &&empty($full_name_arr)  && empty($email_arr) && empty($phone_num_err)){

        // Prepare an insert statement
        $sql = "UPDATE Users SET full_name=?, username=?, email=?, phone_num=?, address=? WHERE user_id=?";

//        $sql = "INSERT INTO users (username, password,email,phone_num) VALUES (?,?,?,?)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssd", $param_full_name, $param_username,$param_email,$param_phone_num,$param_address,$param_user_id);

            // Set parameters
            $param_user_id = $_SESSION['user_id'];
            $param_email = $email;
            $param_username = $username;
            $param_phone_num = $phone_num;
            $param_full_name = $full_name;
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


    <div class="inside-banner">
        <div class="container">
            <h2>Account </h2>
        </div>
    </div>
    <!-- banner -->


    <div class="container">
        <div class="spacer">
            <div class="row contact">
                <div class="col-lg-12 col-sm-12 ">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" readonly class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
            <span class="invalid-feedback"><?php echo $username_err; ?></span>
        </div>
        <div class="form-group">
            <label>Full Name</label>
            <input type="text" name="full_name" class="form-control <?php echo (!empty($full_name_arr)) ? 'is-invalid' : ''; ?>" value="<?php echo $full_name; ?>">
            <span class="invalid-feedback"><?php echo $full_name_arr; ?></span>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" class="form-control <?php echo (!empty($email_arr)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
            <span class="invalid-feedback"><?php echo $email_arr; ?></span>
        </div>
        <div class="form-group">
            <label>Phone Number</label>
            <input type="text" name="phone_num" class="form-control <?php echo (!empty($phone_num_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $phone_num; ?>">
            <span class="invalid-feedback"><?php echo $phone_num_err; ?></span>
        </div>
        <div class="form-group">
            <label>Address</label>
            <textarea class="form-control" name="address"><?php echo $address; ?></textarea>
<!--            <input type="text" name="phone_num" class="form-control --><?php //echo (!empty($phone_num_err)) ? 'is-invalid' : ''; ?><!--" value="--><?php //echo $address; ?><!--">-->
<!--            <span class="invalid-feedback">--><?php //echo $phone_num_err; ?><!--</span>-->
        </div>
        <button type="submit" class="btn btn-success" name="Submit">Update</button>
        <br/>
        <br/>
        <a href="change-password.php" class="btn btn-default" >Change Password</a>

    </form>





                </div>

            </div>
        </div>
    </div>

<?php include'footer.php';?>