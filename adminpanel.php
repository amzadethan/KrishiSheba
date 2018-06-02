<?php
session_start();
if (!isset($_SESSION["admin"])) 
{
	header("Location:index.php");
}
if (isset($_POST['btn-signout'])) 
	{
		session_destroy();
		header("Location:index.php");
	}
//else
//{
//	header("Location:adminpanel.php");
//}
include ('dbConfig.php');
?>

<!DOCTYPE HTML PUBLIC>
<html>
<head>
<title>TOURISM BD (Admin Panel)</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="style.css" />
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
</head>

<body>
<form method="post">
	<div id="header">
		<div class="login">
			<button type="submit" name="btn-signout">Sign Out</button>
		</div>
		<ul id="menu">
			<li><a href="index.php">Home </a></li>
			<li><a href="index2.html">About us</a></li>                                                         
			<li><a href="offers.php">Latest Offers</a></li>
			<li><a href="placeadmin.php">Places</a></li>                       
			<li><a href="bookings.php"> Reservation </a></li>
			<li><a href="adminpanel.php"> Admin panel </a></li>
		</ul>
	</div>
</form>
	<div id="wrapper">																																																																																		
		<div id="sidebar">
			<div class="logo_block">
				<a href="#"><img src="images/i.jpg" alt="setalpm" width="198" height="156" /></a><br />
				<span class="slogan">Best offers for You in Bangladesh</span>
				<p class="text1">Admin Panel</p>
			</div>
			
</div>


<div id="content">

	<div>
	<h1>:: Bookings Table:: </h1>
   </div>		

		</br>
		</br>
		<div id="table">
				<table width="80%" text-align="center" border="3">
								<tr bgcolor='#C0C0C0'>
									<th>Booking ID</th>
									<th>User Name</th>
									<th>user Contact No.</th>
									<th>Booked Place</th>
									<th>Booked Hotel</th>
									<th>Booked Transport</th>
									<th>Booked Guide</th>
									<th>Guest No.</th>
									<th>Booking Date</th>
									<th>Reservation Date</th>
									<th>Selected Package</th>
									
								</tr>
								<?php				

				include('dbconfig.php');
				$query="select * from bookings";
				$run=$db->query($query);

				if($run==FALSE){
					die(mysqli_error($db));
				}				
			while($row=mysqli_fetch_array($run)){
					$bookingid=$row[0];
					$user_name=$row[1];
					$user_contact=$row[2];
					$booked_place=$row[3];
					$hotid=$row[4];
					$transid=$row[5];
					$guideid=$row[6];
					$guestno=$row[7];
					$booking_date=$row[8];
					$reserved_date=$row[9];
					$pckg=$row[10];
			?>



								<tr>
									<td><?php echo $bookingid; ?></td>
									<td><?php echo $user_name; ?></td>
									<td><?php echo $user_contact; ?></td>
									<td><?Php echo $booked_place; ?></td>
									<td><?php echo $hotid; ?></td>
									<td><?php echo $transid; ?></td>
									<td><?php echo $guideid; ?></td>
									<td><?php echo $guestno; ?></td>
									<td><?php echo $booking_date;?></td>
									<td><?php echo $reserved_date;?></td>
									<td><?php echo $pckg; ?></td>
									
								</tr>
								<?php } ?>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									
								</tr>
				</table>
				</div>

				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />



					<div><h1> :: All users table ::</h1>
					</div>
					<br />
					<br />
					<div id="table">
				<table width="100%" text-align="center" border="5">
								<tr bgcolor='#C0C0C0'>
									<th>User id</th>
									<th>User fullname</th>
									<th>User Name</th>
									<th>user E-mail</th>
									<th>user pass</th>
									<th>Option</th>
								</tr>
				<?php				

				include('dbConfig.php');
				$query="select * from users";
				$run=$db->query($query);

				if($run==FALSE){
					die(mysqli_error($db));
				}				
			while($row=mysqli_fetch_array($run)){
					$user_id=$row[0];
					$user_name=$row[1];
					$user_user_name=$row[2];
					$user_user_email=$row[3];
					$user_user_pass=$row[4];
			?>



								<tr>
									<td><?php echo $user_id; ?></td>
									<td><?php echo $user_name; ?></td>
									<td><?Php echo $user_user_name; ?></td>
									<td><?php echo $user_user_email;?></td>
									<td><?php echo $user_user_pass;?></td>
									<td><button><a href="delete.php?del=<?php echo $user_id;?>">DELETE</a></button></button>
									</td>
								</tr>
								<?php } ?>
				</table>
				</div>
				</div>
			</div>
			
				
			
				
		
		

</body>
</html>