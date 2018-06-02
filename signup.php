<?php
session_start();
include 'dbconfig.php';

//creating variables to help checking if the information field of sign up form is empty
//variables that will hold the status of the signup process

$action = array(); //defined an array called action
$action="success"; //setting array action value, result will hold either success or error

//***Done Defining Variables for signup status***


if (isset($_POST['btn-signup'])) 
{
	//Preventing user from Injecting mySQL and get access to database
	
	$fullname= mysqli_real_escape_string($db,$_POST['fullname']);
	$uname= mysqli_real_escape_string($db,$_POST['uname']);
	$email= mysqli_real_escape_string($db,$_POST['email']);
	$pass= mysqli_real_escape_string($db,$_POST['pass']);
	$type= mysqli_real_escape_string($db,$_POST['type']);

		
	//***Done Preventing Access***

	//checking if any required information field has left empty or not
	
	if (empty($fullname)) 
	{
		$action="error";
	}
	if (empty($uname)) 
	{
		$action="error";
	}
	if (empty($email)) 
	{
		$action="error";
	}
	if (empty($pass)) 
	{
		$action="error";
	}

	
	if ($action!="success")
	{
		# code...
		?>
		<script> alert('Please Fill Up All The Fields Properly');</script>
		<?php
	}
	//***Done Checking Field Informations***

	//***Checking if The Informations are overlapped or not***

	if ($action=="success") 
	{
		$chk="SELECT  user_name FROM users WHERE user_name='$uname'";
		$query=mysqli_query($db,$chk);
		$rc=mysqli_num_rows($query);

		if($rc>0)
		{
			?>
			<script> alert('User Name Already Exists!!!');</script>
			<?php
			$action="error";
		}
		$chk="SELECT  user_email FROM users WHERE user_email='$email'";
		$query=mysqli_query($db,$chk);
		$rc=mysqli_num_rows($query);
		if($rc>0)
		{
			?>
			<script> alert('Email Already Exists!!!');</script>
			<?php
			$action="error";
		}
	}
	//***Done Checking Overlapped Information

	//***Confirming No Errors & moving to SignUp the User***

	if ($action!="error") 
	{
		$add=$db->query("INSERT INTO users(user_name,user_fname,user_email,user_type,user_pass) VALUES('$uname','$fullname','$email','$type','$pass')");
		if ($add) 
		{
			?>
				<script>alert('You have been successfully Registered');</script>
			<?php
		}
		$_SESSION["user"]=$uname;
	}
	

	//***Adding the User into the Database**
	if($action!="error")
	{
	if ($add) 
	{
		if ($type=='true') 
		{
			header("Location:farmers_home.php");
		}
		else
		{
			header("Location:customers_home.php");
		}
	}
	else if($action!="success")
	{
		?>
			<script>alert('Error While Registering You');</script>
		<?php
	}
}

	//***Done With Adding & Error Checking***


}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Farmer's Den</title>
	</head>

	<body>
		<form method="post" id="signup_form">
			<table cellspacing="0">
				<tbody>
					<tr>
						<td>
							<label for="fullname">Full Name</label>
						</td>
						<td>
							<label for="uname">User Name</label>
						</td>
						<td>
							<label for="email">E-mail</label>
						</td>
						<td>
							<label for="pass">Password</label>
						</td>
						<td>
							<label for="type">User Type</label>
						</td>
					</tr>
					<tr>
						<td>
							<input type="text" name="fullname" id="fullname" tabindex="1" />
						</td>
						<td>
							<input type="text" class="inputtext" name="uname" id="uname" value tabindex="2" />
						</td>
						<td>
							<input type="email" name="email" id="email" tabindex="3" />
						</td>
						<td>
							<input type="password" class="inputtext" name="pass" id="pass" tabindex="4" />
						</td>
						<td>
							<p><input type="radio" name="type" id="type" value="true"/>Farmer</p>
						</td>
						<td>
							<p><input type="radio" name="type" id="type" value="false"/>Customer</p>
						</td>
						<td>
							<label class="signupButton" id="signupButton">
								<button type="submit" name="btn-signup">Sign Up</button>
							</label>
						</td>
						<td>
							<label class="loginButton" id="loginButton">
								<div class="links"><a href="signin.php">|| Log In</a></div>
							</label>
						</td>
					</tr>
				</tbody>
			</table>
		</form>
	</body>
</html>
