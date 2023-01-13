<?php
    $msg = '';
    if (isset($_POST['contactus'])) {
        $names = mysqli_real_escape_string($conn,$_POST['fullNames']);
        $email = mysqli_real_escape_string($conn,$_POST['emails']);
        $subject = mysqli_real_escape_string($conn,$_POST['subjects']);
        $content = mysqli_real_escape_string($conn,$_POST['message']);

        $se = mysqli_query($conn,"SELECT *FROM contacts WHERE fullnames='$names' AND emails='$email' AND subjects='$subject' AND messages='$content'") or die(mysqli_error($conn));
        if (mysqli_num_rows($se)) {
            $msg="<div class='alert alert-danger alert-dismissible' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                    <h3>You already sent this message</h3>
                    </div>";
        }else{
            $sendMessage = mysqli_query($conn,"INSERT INTO `contacts` (`id`, `fullnames`, `emails`, `subjects`, `messages`,`sentAt`,`status1`) VALUES (NULL,'$names','$email','$subject','$content',NULL,'unread')") or die(mysqli_error($conn));
            $saveNot = mysqli_query($conn,"INSERT INTO `adminnotification` (`id`, `content`, `notTime`, `status`) VALUES ('', 'New Message',NULL, 'unread')") or die(mysqli_error($conn));
             if ($sendMessage) {
                $msg="<div class='alert alert-success alert-dismissible' role='alert'>
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                        <h3>Thanks for contacting us</h3>
                        </div>";
             }
        }
    }
?>