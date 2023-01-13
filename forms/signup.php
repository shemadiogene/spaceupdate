<?php
$msg='';
if (isset($_POST['save'])) {
    $a = mysqli_real_escape_string($conn,$_POST['coName']);
    $b = mysqli_real_escape_string($conn,$_POST['coEmail']);
    $c = mysqli_real_escape_string($conn,$_POST['coLocation']);
    $d = mysqli_real_escape_string($conn,$_POST['phoneNumber']);
    $e = mysqli_real_escape_string($conn,$_POST['cousername']);
    $f = mysqli_real_escape_string($conn,$_POST['copassword']);
    $g = mysqli_real_escape_string($conn,$_POST['coTin']);

    //images

    $tk = mysqli_real_escape_string($conn,$_FILES["thumbnails"]["name"]);
    

    $ext1 = explode(".",$tk);
    
    $i = uniqid().".".$ext1[1];


    $check = mysqli_query($conn,"SELECT *FROM companies WHERE comName='$a' AND comTIN = '$g' ") or die(mysqli_error());
    if (mysqli_num_rows($check)>0) {
        $msg="<div class='alert alert-danger alert-dismissible' role='alert'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
        <h3>Your company already registered</h3>
        </div>";
    }else{
        
        $insert  = mysqli_query($conn,"INSERT INTO companies (id,comName,comEmail,comLocation,comPhone,comUsername,comPassword,comTIN,thumbnail,coStatus) VALUES
        ('','$a','$b','$c','$d','$e','$f','$g','$i','Approve')") or die(mysqli_error($conn));

        $saveNot = mysqli_query($conn,"INSERT INTO `adminnotification` (`id`, `content`, `notTime`, `status`) VALUES ('', 'New company created account',NULL, 'unread')") or die(mysqli_error($conn));

        move_uploaded_file($_FILES['thumbnails']['tmp_name'],"admin/media/companies/".$i);
        if ($insert) {
            sendsms($a,$d);
            $msg="<div class='alert alert-success alert-dismissible' role='alert'>
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                        <h3>Thanks for signing in</h3>
                        </div>";
        }else {
            $msg="<div class='alert alert-danger alert-dismissible' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                    <h3>Failed to be saved</h3>
                    </div>";
        }

    }
}
    function sendsms($names, $phone){

        $receiver=$phone;
        $sender="+250789223264";
        $mssg="Hello ".$names."You are welcome, Thanks for signing up at space company";

        $data=array(
                "sender"=>$sender,
                "recipients"=>$receiver,
                "message"=>$mssg,
            );

        $url="https://www.intouchsms.co.rw/api/sendsms/.json";
        $data=http_build_query($data);
        $username="bigwi";
        $password="bigwi@2617";

        $ch=curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_USERPWD,$username.":".$password);
        curl_setopt($ch,CURLOPT_POST,true);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
        $result=curl_exec($ch);
        $httpcode=curl_getinfo($ch,CURLINFO_HTTP_CODE);
        curl_close($ch);
    }

?>