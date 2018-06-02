<?php
	session_start();
	include 'dbconfig.php';
	$user=$_SESSION["user"];
	echo "".$user."<br>";
	$action="success";
	if (isset($_POST['btn-postAd']))
	{
		$chk="SELECT id FROM users WHERE user_name='$user'";
		$result=mysqli_query($db,$chk) or die('error');
		$rc=mysqli_fetch_assoc($result);
		$farmerid=$rc['id'];
		$title= mysqli_real_escape_string($db,$_POST['title']);
		$price= mysqli_real_escape_string($db,$_POST['price']);
		$phone= mysqli_real_escape_string($db,$_POST['phone']);
		$district= mysqli_real_escape_string($db,$_POST['district']);
		$subDistrict= mysqli_real_escape_string($db,$_POST['subDistrict']);
		$details= mysqli_real_escape_string($db,$_POST['details']);

		if (empty($title)) 
		{
			$action="error";
		}
		if (empty($price)) 
		{
			$action="error";
		}
		if (empty($phone)) 
		{
			$action="error";
		}
		if (empty($district)) 
		{
			$action="error";
		}
		if (empty($subDistrict)) 
		{
			$action="error";
		}
		if (empty($details)) 
		{
			$action="error";
		}
		if ($action!="success")
		{
			?>
			<script> alert('Please Fill Up All The Fields Properly');</script>
			<?php
		}
		if ($action=="success") 
		{
			$add=$db->query("INSERT INTO productpost(farmerid,title,price,phone,district,subDistrict,details) VALUES('$farmerid','$title','$price','$phone','$district','$subDistrict','$details')");
			if($add) 
			{
				header("Location:farmers_home.php");
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Post Ad</title>
</head>
<body>
	<p>Ad Post</p>
	<form method="post" id="postad_form">
		<table cellspacing="0">
			<tbody>
				<tr>
					<td>
						<label for="title">Product Name</label>
					</td>
					<td>
						<input type="text" name="title" id="title" tabindex="1" />
					</td>
				</tr>
				<tr>
					<td>
						<label for="district">District</label>
					</td>
					<td>
						<input type="text" name="district" id="district" tabindex="2" />
					</td>
				</tr>
				<tr>
					<td>
						<label for="subDistrict">Sub District</label>
					</td>
					<td>
						<input type="text" name="subDistrict" id="subDistrict" tabindex="3" />
					</td>
				</tr>
				<tr>
					<td>
						<label for="details">Product Details</label>
					</td>
					<td>
						<input type="text" name="details" id="details" tabindex="4" />
					</td>
				</tr>
				<tr>
					<td>
						<label for="price">Price</label>
					</td>
					<td>
						<input type="text" name="price" id="price" tabindex="5" />
					</td>
				</tr>
				<tr>
					<td>
						<label for="phone">Contact No.</label>
					</td>
					<td>
						<input type="text" name="phone" id="phone" tabindex="6" />
					</td>
				</tr>
				<tr>
					<td>
						<label class="postAd" id="postAd">
							<button type="submit" name="btn-postAd">Post Ad</button>
						</label>
					</td>
				</tr>
			</tbody>
		</table>
	</form>
</body>
</html>