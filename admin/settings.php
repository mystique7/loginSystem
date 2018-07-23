<?php
	session_start();
	if (!isset($_SESSION['is_logged_in'])) {
		header("Location: ../login.html");
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Settings</title>
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
			
		</div>
	</div>
	<div class="container">
		<h2 id="page-header">Change Password</h2><hr>
		<form class="form-group" name="changePassword" method="post" action="../scripts/changePassword.php" onsubmit="return checkPass()">
			<input class="form-control" type="password" name="password" placeholder="Enter New Password">
			<input class="form-control" type="password" name="newPassword" placeholder="Confirm New Password">
			<input class="sbmt-btn" type="submit" value="Change Password">
		</form>
	</div>
</body>
<script type="text/javascript">
	function checkPass() {
		// body...
		var pass = document.forms['changePassword']['password'].value;
		var newPass = document.forms['changePassword']['newPassword'].value;

		if (pass != newPass) {
			alert("The passwords do not match!");
			window.location.assign("./settings.php");
		}
	}
</script>
</html>