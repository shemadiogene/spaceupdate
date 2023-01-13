<?php
    $msg = '';
    if (isset($_POST['updateRent'])) {
       $a = mysqli_real_escape_string($conn,$_POST['offName']);
       $b = mysqli_real_escape_string($conn,$_POST['offLocation']);
       $c = mysqli_real_escape_string($conn,$_POST['offPhoneNumber']);
       $d = mysqli_real_escape_string($conn,$_POST['offPrices']);
       $e = mysqli_real_escape_string($conn,$_POST['offRooms']);
       $f = mysqli_real_escape_string($conn,$_POST['offArea']);
       $g = mysqli_real_escape_string($conn,$_POST['offStatus']);
       $desc = mysqli_real_escape_string($conn,$_POST['descs']);
       $img1 = mysqli_real_escape_string($conn,$_FILES['thumbnails']['name']);
       $img2 = mysqli_real_escape_string($conn,$_FILES['img1']['name']);
       $img3 = mysqli_real_escape_string($conn,$_FILES['img2']['name']);
       $img4 = mysqli_real_escape_string($conn,$_FILES['img3']['name']);

       $ext1 = explode(".",$img1);
       $ext2 = explode(".",$img2);
       $ext3 = explode(".",$img3);
       $ext4 = explode(".",$img4);

       $h = uniqid().".".$ext1[1];
       $i = uniqid().".".$ext1[1];
       $j = uniqid().".".$ext1[1];
       $k = uniqid().".".$ext1[1];
        $upper = strtoupper($a);
       $n = $_SESSION['spacecompanies']; //companyId
       $m = trim($upper).date('Ym').$n.date('Y');//PropertId
       

       if (empty($img1) && empty($img2) && empty($img3) && empty($img4)) {
        
        $updates = mysqli_query($conn,"UPDATE offices SET name='$a',location='$b',contact='$c',price='$d',rooms='$e',area='$f',descriptions='$desc',
        status='$g' WHERE id = '$id'") or die(mysqli_error($conn));
 
         if ($updates) {
             $msg = "<div class='alert alert-success'><p>Office updated successfully</p></div>";
         }
        
       }else if(!empty($img1)){
            $updates1 = mysqli_query($conn,"UPDATE offices SET name='$a',location='$b',contact='$c',price='$d',rooms='$e',area='$f',descriptions='$desc',
            status='$g',thumnail='$h',photo1='$i',photo2='$j',photo3='$k' WHERE id = '$id'") or die(mysqli_error($conn));
            
            move_uploaded_file($_FILES['thumbnails']['tmp_name'],"media/spaceImages/".$h);
            move_uploaded_file($_FILES['img1']['tmp_name'],"media/spaceImages/".$i);
            move_uploaded_file($_FILES['img2']['tmp_name'],"media/spaceImages/".$j);
            move_uploaded_file($_FILES['img3']['tmp_name'],"media/spaceImages/".$k);

            if ($updates1) {
                $msg = "<div class='alert alert-success'><p>Office updated successfully</p></div>";
            }
       }
    }
?>