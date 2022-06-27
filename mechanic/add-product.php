<?php
include'header.php';
require_once 'app/config/db.php';

?>

<?php
$title = $description = $phone_number = $price = $file_name = "";
$title_err  = $file_name_err = $price_err = $phone_number_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate title
    if(empty(trim($_POST['price'])))
    {
        $price_err = "Please enter a price";
    }else{
        $price = trim($_POST["price"]);
    }
    // Validate title
    if(empty(trim($_POST['title'])))
    {
        $title_err = "Please enter a title";
    }else{
        $title = trim($_POST["title"]);
    }
    // Validate phone number
    if(empty(trim($_POST['phone_number'])))
    {
        $phone_number_err = "Please enter a phone number";
    }else{
        $phone_number = trim($_POST["phone_number"]);
    }
    //validate file
    if(!isset($_FILES["file"])){
        $file_name_err = "Please Upload File.";
    } else{
        $filename = $_FILES["file"]["name"];
        $tempname = $_FILES["file"]["tmp_name"];
        $folder = "image/".$filename;
        $file_name = $filename;
        move_uploaded_file($tempname, $folder);

    }
    $description = $_POST['description'];
    $user_id = $_SESSION['user_id'];
    // Validate password

    // Check input errors before inserting in database
    if(empty($file_name_err) && empty($price_err)&& empty($title_err) && empty($phone_number_err)){

        // Prepare an insert statement
        $sql = "INSERT INTO products (user_id, title,description,phone_number,file_name,price) VALUES (?,?,?,?,?,?)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "dssssd", $param_user_id, $param_title,$param_description,$param_phone_number,$param_file_name,$param_price);

            // Set parameters
            $param_price = $price;
            $param_user_id = $user_id;
            $param_title = $title;
            $param_description = $description;
            $param_file_name = $file_name;
            $param_phone_number = $phone_number;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: my-products.php");
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
            <h2>New Product</h2>
        </div>
    </div>
    <!-- banner -->


    <div class="container">
        <div class="spacer">
            <div class="row contact">
                <div class="col-lg-12 col-sm-12 ">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control <?php echo (!empty($title_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $title; ?>">
                            <span class="invalid-feedback"><?php echo $title_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="number" step="0.02" name="price" class="form-control <?php echo (!empty($price_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $price_err; ?>">
                            <span class="invalid-feedback"><?php echo $price_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" name="phone_number" class="form-control <?php echo (!empty($phone_number)) ? 'is-invalid' : ''; ?>" value="<?php echo $phone_number; ?>">
                            <span class="invalid-feedback"><?php echo $phone_number_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>File</label>
                            <input type="file" name="file" accept="image/*" class="form-control <?php echo (!empty($file_name_err)) ? 'is-invalid' : ''; ?>">
                            <span class="invalid-feedback"><?php echo $file_name_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea  name="description" class="form-control"><?php echo $description; ?></textarea>
                        </div>

                        <button type="submit" class="btn btn-success" name="Submit">Add Product</button>

                    </form>





                </div>

            </div>
        </div>
    </div>

<?php include'footer.php';?>