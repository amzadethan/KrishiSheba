<?php
	session_start();
	include 'dbconfig.php';
	session_destroy();
	echo "You are Being Signed Out";
	echo "<script>setTimeout(\"location.href = 'index.php';\",1500);</script>";
?>