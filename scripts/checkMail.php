<?php

	
	include './dbConnect.php';

	$email = $_POST['email'];
	$sql = " SELECT * FROM users where email='$email' ";
	$res = $link->query($sql);
	$count = mysqli_num_rows($res);
	if ($count == 0) {
		echo '<script>
			alert("Email ID not found!");
			window.location.assign("../login.html");
		</script>';
	}
	else {
		session_start();
		$_SESSION['email'] = $email;
		header("Location: ../comm/resetPassword.html");
	}


?>
