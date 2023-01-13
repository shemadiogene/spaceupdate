<?php
require_once("../includes/db.php");
$id = $_GET['deleteBooking'];
$delete = mysqli_query($conn,"DELETE FROM airportservices WHERE id='$id'") or die(mysqli_error($conn));
if ($delete) {
    echo "<script>window.top.location = '../airportTaxSer.php';</script>";
    # code...
}
?>