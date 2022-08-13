<?php require_once '../app/config/db.php';?>

<?php

$sql = "DELETE FROM mechanic where mechanic_id = '".$_GET['mechanic_id']."'";
if (mysqli_query($link, $sql)) {
    header("location: mechanic.php");
}