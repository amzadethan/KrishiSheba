<?php
	session_start();
	include_once'dbconfig.php';

	$action = array();
	$action="success";
	
	if (isset($_POST['btn-signin'])) 
	{
		$uname= mysqli_real_escape_string($db,$_POST['uname']);
		$_SESSION["users"] = $uname;
		$pass= mysqli_real_escape_string($db,$_POST['pass']);
		if (empty($uname)) 
		{
			$action="error";
		}
		if (empty($pass)) 
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
			$chk="SELECT user_name FROM users WHERE user_name='$uname' AND user_pass='$pass'";
			$query=$db->query($chk);
			$rc=mysqli_num_rows($query);
			if($rc==0)
			{
				?>
				<script> alert('User Name & Password Do Not Match');</script>
				<?php
			}
			else
			{
				if ($uname=='amzad.ethan') 
				{
					header("Location:adminpanel.php");
				}
				else
				{
					$_SESSION["user"]=$uname;
					$chc="SELECT id FROM users WHERE user_name='$uname'";
					$rslt=mysqli_query($db,$chc) or die('error');
					$rs=mysqli_fetch_assoc($rslt);
					$_SESSION["uid"]=$rs['id'];
					$chk="SELECT user_type FROM users WHERE user_name='$uname'";
					$result=mysqli_query($db,$chk) or die('error');
					$rc=mysqli_fetch_assoc($result);
					$utype=$rc['user_type'];
					if ($utype=='false') 
					{
						header("Location:customers_home.php");
					}
					else
					{
						header("Location:farmers_home.php");
					}
				}
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign In</title>
</head>
<body>
<form method="post" id="login_form">
			<table cellspacing="0">
				<tbody>
					<tr>
						<td>
							<label for="uname">User Name</label>
						</td>
						<td>
							<label for="pass">Password</label>
						</td>
					</tr>
					<tr>
						<td>
							<input type="text" class="inputtext" name="uname" id="uname" value tabindex="1" />
						</td>
						<td>
							<input type="password" class="inputtext" name="pass" id="pass" tabindex="2" />
						</td>
						<td>
							<label class="loginButton" id="loginButton">
								<button type="submit" name="btn-signin">Log In</button>
							</label>
						</td>
						<td>
							<label class="signupButton" id="signupButton">
								<div class="links"><a href="signup.php">|| Registration</a></div>
							</label>
						</td>
					</tr>
				</tbody>
			</table>
		</form>
</body>
</html>