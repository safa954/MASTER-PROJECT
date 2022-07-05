<?php
include'header.php';
require_once 'app/config/db.php';
if(!isset($_SESSION["loggedin"])){
    header("location: login.php");
    exit;
}
?>

<?php
$title =$product_id= $description = $phone_number = $price = $file_name = "";
$title_err = $price_err = $phone_number_err = "";


$sql = "select * from products where product_id = '".$_GET['id']."'";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $title = $row['title'];
            $description = $row['description'];
            $phone_number = $row['phone_number'];
            $price = $row['price'];
            $file_name = $row['file_name'];
            $product_id = $row['product_id'];
        }
    }
}

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
    if(isset($_FILES["file"]) && !empty($_FILES["file"]["name"])){
        $filename = $_FILES["file"]["name"];
        $tempname = $_FILES["file"]["tmp_name"];
        $folder = "image/".$filename;
        $file_name = $filename;
        move_uploaded_file($tempname, $folder);
    }
    $description = $_POST['description'];
    $user_id = $_SESSION['user_id'];

    if( empty($price_err)&& empty($title_err) && empty($phone_number_err)){

        $sql = "UPDATE products SET title=?, description=?, file_name=?, phone_number=?,price=? WHERE product_id=?";
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "ssssdd", $param_title, $param_description,$param_file_name,$param_phone_number,$param_price,$param_product_id);

            $param_price = $price;
            $param_title = $title;
            $param_product_id = $product_id;
            $param_description = $description;
            $param_file_name = $file_name;
            $param_phone_number = $phone_number;
            if(mysqli_stmt_execute($stmt)){
                header("location: my-products.php");
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
            mysqli_stmt_close($stmt);
        }
    }
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
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id=<?php echo $_GET['id']?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control <?php echo (!empty($title_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $title; ?>">
                            <span class="invalid-feedback"><?php echo $title_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="number" step="0.02" name="price" class="form-control <?php echo (!empty($price_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $price; ?>">
                            <span class="invalid-feedback"><?php echo $price_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" name="phone_number" class="form-control <?php echo (!empty($phone_number)) ? 'is-invalid' : ''; ?>" value="<?php echo $phone_number; ?>">
                            <span class="invalid-feedback"><?php echo $phone_number_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>File</label>
                            <input type="file" name="file" accept="image/*" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea  name="description" class="form-control"><?php echo $description; ?></textarea>
                        </div>

                        <button type="submit" class="btn btn-success" name="Submit">Edit</button>

                    </form>





                </div>

            </div>
        </div>
    </div>


<?php include'footer.php';?>