<?php
    include '../includes/db.php';
    $id = $_GET['id'];
    //echo $id;
    $approvedDay = date("Y-m-d");

    $sele = mysqli_query($conn,"SELECT *FROM customers WHERE reserveId='$id'") or die(mysqli_error($conn));

       $fes = mysqli_fetch_array($sele);

       if ($fes['reserveStatus']=='Pending') {
           $check = mysqli_query($conn,"UPDATE customers SET reserveStatus='SUCCESS', approvedAt='$approvedDay'") or die(mysqli_error($conn));
           $updateReserveStatus = mysqli_query($conn,"UPDATE offices SET saleStatus='reserved' WHERE id='$offId'") or die(mysqli_error($conn));
           if ($check) {
              //$remove = mysqli_query($conn,"DELETE FROM customers WHERE id='$id'") or die(mysqli_error($conn));
              header("location:../confirmed");
           }else{
               echo "Fail 1";
           }
       }else{
            $check1 = mysqli_query($conn,"UPDATE customers SET reserveStatus='Pending', approvedAt=''") or die(mysqli_error($conn));
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