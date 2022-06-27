<?php
include'header.php';
require_once 'app/config/db.php';

?>

<?php
$full_name = $username = $password = $confirm_password = $email = $phone_num = "";
$full_name_arr = $username_err = $password_err = $confirm_password_err = $email_arr = $phone_num_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){


    // Validate email
    if(empty(trim($_POST['email'])))
    {
        $email_arr = "Please enter a email";
    }elseif (!filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL)){
        $email_arr = "Invalid email format";
    }else{
        $email = trim($_POST["email"]);
    }
    // Validate email
    if(empty(trim($_POST['phone_num'])))
    {
        $phone_num_err = "Please enter a phone number";
    }else{
        $phone_num = trim($_POST["phone_num"]);
    }
    if(empty(trim($_POST['full_name'])))
    {
        $full_name_arr = "Please enter a full name";
    }else{
        $full_name = trim($_POST["full_name"]);
    }
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else{
        // Prepare a select statement
        $sql = "SELECT user_id FROM users WHERE username = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }

    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($email_arr) && empty($phone_num_err) && empty($full_name_arr)){

        // Prepare an insert statement
        $sql = "INSERT INTO users (full_name,username, password,email,phone_num,role_type) VALUES (?,?,?,?,?,'customer')";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss",$param_full_name, $param_username, $param_password,$param_email,$param_phone_num);

            // Set parameters
            $param_full_name = $full_name;
            $param_email = $email;
            $param_username = $username;
            $param_phone_num = $phone_num;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
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
            <h2>Register</h2>
        </div>
    </div>
    <!-- banner -->


    <div class="container">
        <div class="spacer">
            <div class="row contact">
                <div class="col-lg-12 col-sm-12 ">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    
    <div class="form-group">
            <label>Full Name</label>
            <input type="text" name="full_name" class="form-control <?php echo (!empty($full_name_arr)) ? 'is-invalid' : ''; ?>" value="<?php echo $full_name; ?>">
            <span class="invalid-feedback"><?php echo $full_name_arr; ?></span>
        </div>
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
            <span class="invalid-feedback"><?php echo $username_err; ?></span>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" class="form-control <?php echo (!empty($email_arr)) ? 'is-invalid' : ''; ?>" value="<?php echo $email_arr; ?>">
            <span class="invalid-feedback"><?php echo $email_arr; ?></span>
        </div>
        <div class="form-group">
            <label>Phone Number</label>
            <input type="text" name="phone_num" class="form-control <?php echo (!empty($phone_num_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $phone_num_err; ?>">
            <span class="invalid-feedback"><?php echo $phone_num_err; ?></span>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
            <span class="invalid-feedback"><?php echo $password_err; ?></span>
        </div>
        <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
            <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
        </div>
        <button type="submit" class="btn btn-success" name="Submit">Register</button>

    </form>





                </div>

            </div>
        </div>
    </div>

<?php include'footer.php';?>