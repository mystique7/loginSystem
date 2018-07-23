<?php

	include "./dbConnect.php";


	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$email = $_POST['email'];
	$mobNo = $_POST['mobNo'];
	$password = $_POST['password'];

	//Hashing
	$salt = "*&9)%4gsgguysecret!{(";
	$pass = md5($salt.$password.$salt.md5($password.$salt));

	$sql="SELECT email FROM users WHERE email = '$email' ";
	$result = $link->query($sql);
	$count = mysqli_num_rows($result);
	if($count >=1) {
		echo '<script>
			alert("Email already taken.");
			window.location.assign("../signup.html");
		</script>';

	}
	else {
		$sql = " INSERT INTO users (firstname, lastname, phno, email, password) VALUES ('$firstName', '$lastName', '$mobNo', '$email', '$pass') ";

		if($link->query($sql)){
			echo '<script>
				alert("Registration Successful.");
				window.location.assign("../login.html");
			</script>';
			mail($email, "Welcome to Study Online.", "You have Succesfully registered for Study Online. Best regard from admin.");
		}
		else {
			echo '<script>
				alert("Registration Unsuccessful. Please try again later.");
			</script>';
		}

	}
	$link->close();

?>