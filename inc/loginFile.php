<?php
	$msg='';
	if (isset($_POST['login'])) {

		$username=mysqli_real_escape_string($conn,$_POST['uname']);
		$password=mysqli_real_escape_string($conn,$_POST['pass']);
		
		$sql=mysqli_query($conn,"SELECT * FROM admin WHERE username='$username'  AND passwords='$password'") or die(mysqli_error($conn));
		$sql2=mysqli_query($conn,"SELECT * FROM companies WHERE comUsername='$username'  AND comPassword='$password'") or die(mysqli_error($conn));

		
		if (mysqli_num_rows($sql)>0) {
			$fes = mysqli_fetch_array($sql);
			$_SESSION['spaceco']=$fes['id'];
			?>
			<script type="text/javascript">
				window.location = "admin/index";
			</script>
			<?php

		}else if(mysqli_num_rows($sql2)>0){
			$feCo = mysqli_fetch_array($sql2);
			if ($feCo['coStatus'] == "Approve") {
				$msg="<div class='alert alert-danger alert-dismissible' role='alert'>
				<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
				<p>This account is not yet approved</p>
				</div>";
			}else{
				$_SESSION['spacecompanies']=$feCo['id'];
			?>
				<script type="text/javascript">
					window.location = "admin/dashboardCompany";
				</script>
			<?php
		}
	}else{
		$msg="<div class='alert alert-danger alert-dismissible' role='alert'>
			<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
			<p>Wrong username or password</p>
			</div>";
	}
}
?>