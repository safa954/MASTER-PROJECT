<?php
require_once 'app/config/db.php';

$sql = "DELETE FROM products where product_id = '".$_GET['id']."'";
if (mysqli_query($link, $sql)) {
    header("location: my-products.php");
}