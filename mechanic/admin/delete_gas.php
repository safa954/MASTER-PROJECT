<?php require_once '../app/config/db.php';?>

<?php

$sql = "DELETE FROM gas_station where station_id = '".$_GET['station_id']."'";
if (mysqli_query($link, $sql)) {
    header("location: gas.php");
}