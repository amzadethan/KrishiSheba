<?php
	session_start();
	include 'dbconfig.php';
	$user=$_SESSION["user"];
	$uid=$_SESSION["uid"];
	echo "".$user."<br>";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
</head>
<body>
<p>Farmers Welcome</p>
<table>
	<tr>
		<td>
			<button onclick="location.href= 'adform.php'">Adform</button>
		</td>
		<td>
			<button onclick="location.href= 'farmers_orders.php'">Orders Received</button>
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