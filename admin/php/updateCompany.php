<?php
    include '../includes/db.php';
    if (isset($_POST['coName'])) {
        $a = mysqli_real_escape_string($conn,$_POST['coName']);
        $b = mysqli_real_escape_string($conn,$_POST['coEmail']);
        $c = mysqli_real_escape_string($conn,$_POST['coLocation']);
        $d = mysqli_real_escape_string($conn,$_POST['coPhone']);
        $e = mysqli_real_escape_string($conn,$_POST['cousername']);
        $f = mysqli_real_escape_string($conn,$_POST['copassword']);
        $g = mysqli_real_escape_string($conn,$_POST['comTin']);
        $id = mysqli_real_escape_string($conn,$_POST['userId']);
    
        //images
    
        $tk = mysqli_real_escape_string($conn,$_FILES['thumbnails']['name']);

        if (empty($tk)) {
              $update  = mysqli_query($conn,"UPDATE companies SET comName='$a',comEmail='$b',comLocation='$c',comPhone='$d',comTIN='$g',comUsername='$e',comPassword='$f' WHERE id = '$id'") or die(mysqli_error($conn));
              //move_uploaded_file($_FILES['thumbnails']['tmp_name'],"media/companies/".$i);
              if ($update) {
                  echo $msg="<div class='alert alert-success alert-dismissible' role='alert'>
                              <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                              <h3>Thanks for updating company</h3>
                              </div>";
              }else {
                  echo $msg="<div class='alert alert-danger alert-dismissible' role='alert'>
                          <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                          <h3>Failed to be saved</h3>
                          </div>";
              }
        }else{

        $ext1 = explode(".",$tk);
        $i = uniqid().".".$ext1[1];

          $update1  = mysqli_query($conn,"UPDATE companies SET comName='$a',comEmail='$b',comLocation='$c',comPhone='$d',comTIN='$g',thumbnail='$i',comUsername='$e',comPassword='$f' WHERE id = '$id'") or die(mysqli_error($conn));
              move_uploaded_file($_FILES['thumbnails']['tmp_name'],"media/companies/".$i);
              if ($update1) {
                  echo $msg="<div class='alert alert-success alert-dismissible' role='alert'>
                              <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                              <h3>Thanks for updating company</h3>
                              </div>";
              }else {
                  echo $msg="<div class='alert alert-danger alert-dismissible' role='alert'>
                          <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                          <h3>Failed to be saved</h3>
                          </div>";
              }
        }
    }
?>