<?php

	
	include './dbConnect.php';


	session_start();
	$email = $_SESSION['email'];

	// echo $email;

	$pass = $_POST['password'];

	$salt = "*&9)%4gsgguysecret!{(";
	$hashedPassword = md5($salt.$pass.$salt.md5($pass.$salt));

	$sql = " UPDATE users SET password='$hashedPassword' WHERE email='$email' ";
	if ($link->query($sql)) {
		echo '<script>
			alert("Password changed successfully.");
			window.location.assign("../login.html");
		</script>';
	}


?>