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
	<title>View Orders</title>
</head>
<body>
	<table width="80%" text-align="center" border="2" cellspacing="0">
		<tr>
			<td>Product Name</td>
			<td>Product ID</td>
			<td>Order By</td>
			<td>Contact No</td>
		</tr>
	
			<?php
				include 'dbconfig.php';
				$chk="SELECT * FROM orders WHERE farmer_id=$uid";
				$result=mysqli_query($db,$chk) or die('error');
				while ($rc=mysqli_fetch_assoc($result)) 
				{
					$pid=$rc['product_id'];
					$chc="SELECT * FROM productpost WHERE id='$pid'";
					$rslt=mysqli_query($db,$chc) or die('error');
					$rs=mysqli_fetch_assoc($rslt);
					$proname=$rs['title'];
					$cid=$rc['customer_id'];
					$chc="SELECT * FROM users WHERE id='$cid'";
					$rslt=mysqli_query($db,$chc) or die('error');
					$rs=mysqli_fetch_assoc($rslt);
					$cname=$rs['user_fname'];
					$cell=$rc['phone'];
					?>
					<tr>
						<td><?php echo $proname; ?></td>
						<td><?php echo $pid; ?></td>
						<td><?php echo $cname; ?></td>
						<td><?php echo $cell; ?></td>
					</tr>
					<?php
				}
			?>
	</table>
</body>
</html>