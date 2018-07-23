<?php


	session_start();
	if (isset($_SESSION['is_logged_in'])) {
		session_unset();
		session_destroy();
		header("Location: ../login.html");
	}
	else {
		echo '<script>
			alert("You need to login.");
			window.location.assign("../login.html");
		</script>';
	}

?>