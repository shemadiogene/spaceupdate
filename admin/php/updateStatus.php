<?php 
    include '../includes/db.php';
    $all = $_GET['coid'];
    $exp = explode("!",$all);
    $id = $exp[1];
    
    $status = mysqli_query($conn,"SELECT *FROM companies WHERE id = '$id'") or die(mysqli_error($conn));
    $fe = mysqli_fetch_array($status);
    //echo $fe['coStatus'];
    if ($fe['coStatus'] == 'Approve') {
        $query = mysqli_query($conn,"UPDATE companies SET coStatus = 'Approved' WHERE id='$id'") or die(mysqli_error($conn));
        if ($query) {
          ?>
            <script>window.location="../allCompanies";</script>
          <?php
        }
    }else{
        $query = mysqli_query($conn,"UPDATE companies SET coStatus = 'Approve' WHERE id='$id'") or die(mysqli_error($conn));
        ?>
            <script>window.location="../pendingCompanies";</script>
        <?php
        }
?>