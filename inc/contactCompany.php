<?php
    $msg = '';
    if (isset($_POST['sendMessages'])) {
        $a = mysqli_real_escape_string($conn,$_POST['cusNames']);
        $b = mysqli_real_escape_string($conn,$_POST['cusEmail']);
        $c = mysqli_real_escape_string($conn,$_POST['cusComments']);
        $coId = $fePro['id'];
        $che = mysqli_query($conn,"SELECT *FROM contactco WHERE content='$c' AND fullnames='$a'") or die(mysqli_error($conn));
        if (mysqli_num_rows($che)>0) {
            $msg = "<div class='alert alert-danger alert-dismissible' role='alert'>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                <h6><small>Your message already saved</small></h6>
                </div>";
        }else{
        $saving = mysqli_query($conn,"INSERT INTO `contactco` (`id`, `fullnames`, `email`, `content`,`status1`, `companyId`) VALUES (NULL, '$a', '$b', '$c','unread','$coId')") or die(mysqli_error($conn));
        if ($saving) {
            $msg = "<div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            <h6><small>Thanks for contacting in</small></h6>
            </div>";
        }
        }
    }
?>