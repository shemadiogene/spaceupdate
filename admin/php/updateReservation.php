<?php
    include '../includes/db.php';
    $ids = explode("!",$_GET['identifications']);
    $id = $ids[0];
    $offId = $ids[1];
    $approvedDay = date("Y-m-d");

    $sele = mysqli_query($conn,"SELECT *FROM customers WHERE reserveId='$id'") or die(mysqli_error($conn));

       $fes = mysqli_fetch_array($sele);

       if ($fes['reserveStatus']=='Pending') {
           $check = mysqli_query($conn,"UPDATE customers SET reserveStatus='SUCCESS', approvedAt='$approvedDay' WHERE reserveId='$id'") or die(mysqli_error($conn));
           $updateReserveStatus = mysqli_query($conn,"UPDATE offices SET saleStatus='reserved' WHERE id='$offId'") or die(mysqli_error($conn));
           if ($check) {
              //$remove = mysqli_query($conn,"DELETE FROM customers WHERE id='$id'") or die(mysqli_error($conn));
              header("location:../confirmed");
           }else{
               echo "Fail 1";
           }
       }else{
            $check1 = mysqli_query($conn,"UPDATE customers SET reserveStatus='Pending', approvedAt='' WHERE reserveId='$id'") or die(mysqli_error($conn));
            if ($check1) {
                $updateReserveStatus1 = mysqli_query($conn,"UPDATE offices SET saleStatus='reserve' WHERE id='$offId'") or die(mysqli_error($conn));
                if ($updateReserveStatus1) {
                    header("location:../bookedRentSpaces");
                }else{
                    echo "Failed";
                }
             }else {
                 echo "Fail 2";
             }
       }
    
?>