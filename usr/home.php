<?php
	session_start();
	if(!isset($_SESSION['is_logged_in'])) {
		echo '<script>
			alert("You are not logged in");
			window.location.assign("../login.html");
		</script>';
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Home</title>
	<link href="../css/style.css" type="text/css" rel="stylesheet">
</head>
<body>
	<div class="header">
		<form method="post" action="../scripts/logout.php">
			<button class="lgt-btn">LOGOUT</button>
		</form>
	</div>
	<div class="side-pannel">
		<div class="user"></div>
		<h4 id="userID">
			<?php
				echo $_SESSION['name'];
			?>
		</h4>
		<div class="vertical-menu">
			<label>Account</label>
			<a href="./home.php"><img src="../src/icons/home.png" width="20px" height="20px"> Home</a>
			<a href="./settings.php"><img src="../src/icons/settings.png" width="20px" height="20px">Settings</a>
			<label>Courses</label>
			<a href="./users.php"><img src="../src/icons/edit.png" width="20px" height="20px">View Courses</a>
			
		</div>
	</div>
</body>
</html>