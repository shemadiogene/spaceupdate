<?php

include 'db.php';

$names = mysqli_real_escape_string($conn,$_POST['names']);
$emails = mysqli_real_escape_string($conn,$_POST['email']);
$phones = mysqli_real_escape_string($conn,$_POST['phone']);
$address = mysqli_real_escape_string($conn,$_POST['address']);
$dob = mysqli_real_escape_string($conn,$_POST['dob']);
$uname = mysqli_real_escape_string($conn,$_POST['username']);
$pass = mysqli_real_escape_string($conn,$_POST['password']);

$check = mysqli_query($conn,"SELECT *FROM users WHERE username ='$uname' AND passwords='$pass' AND email='$emails'") or die(mysqli_error($conn));
if (mysqli_num_rows($check)) {
    echo "User already registered";
}else{
 $query = mysqli_query($conn,"INSERT INTO users (id,names,email,phone,address,dob,username,passwords,profile) VALUES
  (NULL,'$names','$emails','$phones','$address','$dob','$uname','$pass','avatar-male')") or die(mysqli_error($conn));
  if ($query) {
      echo "Thanks for adding a new User";
  }
}
?>