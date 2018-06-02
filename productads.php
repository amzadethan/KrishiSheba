<?php
	session_start();
	include 'dbconfig.php';
	$user=$_SESSION["user"];
	echo "".$user."<br>";
	$uid=$_SESSION["uid"];

	if (isset($_POST['ord'])) 
	{
		$uid=$_SESSION["uid"];
		$cell=$_POST["coninfo"];
		$pid=$_POST['p_id'];
		$sql="SELECT farmerid FROM productpost WHERE id=$pid";
		$result=mysqli_query($db,$sql);
		while($rc=mysqli_fetch_assoc($result))
		{
			$fid=$rc['farmerid'];
		}
		$add=$db->query("INSERT INTO orders(customer_id,farmer_id,product_id,phone) VALUES('$uid','$fid','$pid','$cell')");
		if ($add) 
		{
			echo "Order Placed Successfully";
			echo '<META HTTP-EQUIV="Refresh" Content="4; URL=customers_home.php">';
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Products</title>
</head>
<body>
	<form method="POST">
		<table>
			<tr>
				<td>Order</td>
				<td>
					<select name="p_id">
						<option>Product ID</option>
						<?php
							$sql="SELECT * FROM productpost";
							$result=mysqli_query($db,$sql);
							while($rc=mysqli_fetch_assoc($result))
							{
								$p_id=$rc['id'];
								echo "<option value='$p_id'>$p_id</option>";
							}
						?>
					</select>
				</td>
				<td>Contact Info: </td>
				<td>
					<input type="text" name="coninfo" id="coninfo"/>
				</td>
				<td>
					<input type="submit" name="ord" value="Order"/>
				</td>
			</tr>
		</table>
	</form>
	<div id="table">
		<table width="80%" text-align="center" border="2" cellspacing="0">
			<tr>
				<td>Product ID</td>
				<td>Product Name</td>
				<td>Product By</td>
				<td>Details</td>
				<td>District</td>
				<td>Sub Dicstrict</td>
				<td>Price</td>
				<td>Contact No</td>
			</tr>
			<?php
				include 'dbconfig.php';
				$chk="SELECT * FROM productpost";
				$result=mysqli_query($db,$chk) or die('error');
				
				while ($rc=mysqli_fetch_assoc($result)) 
				{
					$farmerid=$rc['farmerid'];
					$productid=$rc['id'];
					$chc="SELECT user_fname FROM users WHERE id='$farmerid'";
					$rslt=mysqli_query($db,$chc) or die('error');
					$rs=mysqli_fetch_assoc($rslt);
					$farmername=$rs['user_fname'];
					$title=$rc['title'];
					$details=$rc['details'];
					$district=$rc['district'];
					$subDistrict=$rc['subDistrict'];
					$price=$rc['price'];
					$phone=$rc['phone'];
					?>
			<tr>
				<td><?php echo $productid; ?></td>
				<td><?php echo $title; ?></td>
				<td><?php echo $farmername; ?></td>
				<td><?php echo $details; ?></td>
				<td><?php echo $district; ?></td>
				<td><?php echo $subDistrict; ?></td>
				<td><?php echo $price; ?></td>
				<td><?php echo $phone; ?></td>
			</tr>
					<?php
				}
			?>
		</table>
	</div>
</body>
</html>