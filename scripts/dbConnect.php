<?php

	$link = mysqli_connect("localhost", "root", "", "studentcoursereg");
	if(!$link) {
		echo "Unable to connect to DB!";
	}

?>