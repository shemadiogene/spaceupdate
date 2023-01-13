<?php
    include '../inc/connect.php';
    $id = $_GET['id'];
    $qu1 = mysqli_query($conn,"SELECT *FROM conotification WHERE id = '$id'") or die(mysqli_error($conn));
    $fe = mysqli_fetch_array($qu1);
    if ($fe['status'] == 'unread') {
            $up1 = mysqli_query($conn,"UPDATE conotification SET status = 'read' WHERE id='$id'") or die(mysqli_error($conn));
        if ($qu1) {
            header("location:coUnreadNotification");
        }
    }

?>