<?php
	session_start();
	include 'dbconfig.php';
	$user=$_SESSION["user"];
	echo "".$user."<br>";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
</head>
<body>
	<h1>Customers Welcome</h1>
	<table>
		<tr>
			<td>
				<button onclick="location.href= 'productads.php'">View Products</button>
			</td>
		</tr>
		<tr>
			<td>
				<a href='signout.php'>Sign Out</a>
			</td>
		</tr>
	</table>
</body>
</html>