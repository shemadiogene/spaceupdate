<?php
    $msg = '';
    if (isset($_POST['save'])) {
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
       

    $check = mysqli_query($conn,"SELECT *FROM offices WHERE propertyId = '$m' AND name='$a'") or die(mysqli_error($conn));
    if (mysqli_num_rows($check)>0) {
        $msg = "<div class='alert alert-danger'><p>This space already registered</p></div>";
    }else{
        $save = mysqli_query($conn,"INSERT INTO offices (id,name,location,contact,price,rooms,propertyId,area,descriptions,status,saleStatus,thumnail,photo1,photo2,photo3,companyId)
        VALUES ('','$a','$b','$c','$d','$e','$m','$f','$desc','$g','reserve','$h','$i','$j','$k','$n')") or die(mysqli_error($conn));

        move_uploaded_file($_FILES['thumbnails']['tmp_name'],"media/spaceImages/".$h);
        move_uploaded_file($_FILES['img1']['tmp_name'],"media/spaceImages/".$i);
        move_uploaded_file($_FILES['img2']['tmp_name'],"media/spaceImages/".$j);
        move_uploaded_file($_FILES['img3']['tmp_name'],"media/spaceImages/".$k);

        if ($save) {
            $msg = "<div class='alert alert-success'><p>Office Registered successfully</p></div>";
        }
    }
    }
?>