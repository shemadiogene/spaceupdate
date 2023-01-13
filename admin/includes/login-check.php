<?php 
session_start();

if (isset($_POST['login'])) {

	$email=mysqli_real_escape_string($conn,$_POST['email']);
	$password=mysqli_real_escape_string($conn,$_POST['password']);

	$sql=mysqli_query($conn,"SELECT * FROM admin WHERE username='$email'  AND passwords='$password'");

	if (mysqli_num_rows($sql)) {
		$_SESSION['admin']="spaceco";
		header("location: admin/index.php");

	}else{
		?>
		<script>
			swal('Oops!', 'Incorrent username or password!', 'error');
		</script>
	<?php 
		}
	} 
	?>

