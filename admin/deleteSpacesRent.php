<?php 
    include("includes/db.php");
    $id = $_GET['deleteCar'];
    $delete = mysqli_query($conn,"DELETE FROM car_rent WHERE carId='$id'") or die(mysqli_error($conn));
    if ($delete) {
        echo "<script>window.top.location = 'rentCars.php'</script>";
        # code...
    }
?>