<?php
include'header.php';
require_once 'app/config/db.php';
if(!isset($_SESSION["loggedin"])){
    header("location: login.php");
    exit;
}
?>

<?php
$password = $confirm_password = "";
$password_err = $confirm_password_err = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){

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
    if( empty($password_err) && empty($confirm_password_err)){

        // Prepare an insert statement
        $sql = "UPDATE Users SET password=? WHERE user_id=?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sd", $param_password,$param_user_id);

            // Set parameters
            $param_user_id = $_SESSION['user_id'];
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: index.php");
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
            <h2>Change Password</h2>
        </div>
    </div>
    <!-- banner -->


    <div class="container">
        <div class="spacer">
            <div class="row contact">
                <div class="col-lg-12 col-sm-12 ">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
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
                        <button type="submit" class="btn btn-success" name="Submit">Change Password</button>

                    </form>





                </div>

            </div>
        </div>
    </div>

<?php include'footer.php';?>