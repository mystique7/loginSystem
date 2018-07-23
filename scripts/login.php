<?php

	include './dbConnect.php';

	$email = $_POST['email'];
	$pass = $_POST['password'];


	//Hash fn
	$salt = "*&9)%4gsgguysecret!{(";
	$password = md5($salt.$pass.$salt.md5($pass.$salt));


	$sql = " SELECT * FROM users where email='$email' ";
	$res = $link->query($sql);
	$name = "";
	$emailID = "";
	$passwd = ""; 
	$type = "";
	while($row = mysqli_fetch_row($res)) {
		$name = $row[1]." ".$row[2];
		$emailID = $row[4];
		$passwd = $row[5];
		$type = $row[6];
	}

	// echo $passwd."<br>";
	// echo $password;
	
	if ($passwd == $password) {
		if ($type == 20) {
			header('Location: ../usr/home.php');
		}
		else {
			header('Location: ../admin/home.php');
		}
	}
	else {
		echo '<script>
			alert("Incorrect password.");
			window.location.assign("../login.html");
			
		</script>';
	}
	
	
	//Session settings
	session_start();
	$_SESSION['is_logged_in'] = true;
	$_SESSION['email']  = $emailID;
	$_SESSION['name'] = $name;
	$_SESSION['type'] = $type;


?>