<?php require_once '../app/config/db.php';?>

<?php

$sql = "DELETE FROM transport_truck where trans_truck_id = '".$_GET['trans_truck_id']."'";
if (mysqli_query($link, $sql)) {
    header("location: mechanic.php");
}