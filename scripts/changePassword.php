<?php

	include './dbConnect.php';

	$pass = $_POST['password'];

	$salt = "*&9)%4gsgguysecret!{(";
	$hashedPass = md5($salt.$pass.$salt.md5($pass.$salt));

	// echo $hashedPass;

	session_start();
	$email = $_SESSION['email'];
	$type = $_SESSION['type'];

	$sql = " UPDATE users SET password='$hashedPass' WHERE email='$email' ";
	if ($link->query($sql)) {
		if ($type == 20) {
			echo '<script>
				alert("Password updated successfully!");
				window.location.assign("../usr/home.php");
			</script>';
		}
		else {
			echo '<script>
				alert("Password updated successfully!");
				window.location.assign("../admin/home.php");
			</script>';
		}
		
	}
	else {
		echo '<script>
			alert("Error while updating password!!");
		</script>';
	}



?>