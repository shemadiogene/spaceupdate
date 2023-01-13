<?php
    include '../includes/db.php';
    $id = $_GET['identification'];
    //echo $id;
    $query = mysqli_query($conn, "SELECT *FROM customers WHERE `reserveId` = '$id'
                             LIMIT 1") or die(mysqli_error($conn));
    $row = mysqli_fetch_array($query);
    $offId = $row['offId'];
    $q = mysqli_query($conn,"UPDATE customers SET `reserveStatus` = 'Cancelled' WHERE reserveId='$id'") or die(mysqli_error($conn));
    if ($q) {
        mysqli_query($conn,"UPDATE offices SET `saleStatus` = 'reserve' WHERE id='$offId'") or die(mysqli_error($conn));
        header("location:../confirmed");
    }
?>