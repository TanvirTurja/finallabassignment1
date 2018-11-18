<html>
<head>
	<title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
  	<script src="js/bootstrap.min.js"></script>
	
	
	<style>
	.error{
		color:#FF0000
	}
	</style>
</head>

<body class="container">
<br>
<a href="index.php"><span class="btn btn-primary">Home</span></a> <br />
<?php

$aiubiderr=$emailerr=$phonerr=$fullnameerr=$passerr="";
include("config.php");
//connect to db here

if(isset($_POST['submit'])) {
	if(!empty($_POST['aiubid']))
	{
		$aiubid = $_POST['aiubid'];
		
		if(!preg_match("/^[0-9][0-9]-[0-9][0-9][0-9][0-9][0-9]-[0-9]$/",$aiubid))
		{
			$aiubiderr="pattern doesn`t match ";
			
		}
		else{
			
		}
	}
	else{
		$aiubiderr="*ID can`t be empty";
	}

	if(!empty($_POST['fullname']))
	{
		$fullname = $_POST['fullname'];
		if(!preg_match("/^[a-zA-Z ]*$",$fullname))
		{
			$fullnameerr="only alphabet & white space allowed";
		}
		
	}
	
	if(!empty($_POST['email']))
	{
		$email = $_POST['email'];
		if(!Filter_Var($email,FILTER_VALIDATE_EMAIL))
		{
			$emailerr="Invalid email";
		}
	}
	
	else{
		$emailerr="*Email is required";
	}
    
	if(!empty($_POST['phone']))
	{
		$phone = $_POST['phone'];
	}
	
	else{
		$phonerr="*Enter your phone number";
	}
    if(!empty($_POST['password']))
	{
		$password = $_POST['password'];
		if(!preg_match("/^[a-zA-Z0-9 -_].{6,}$/",$password))
			{
				$passerr="aleast 6 characters required";
			}
	}
    

	/*if($pass == ""|| $aiubid == "" || $fullname == ""|| $email == "" || $phone == "") {
		echo "All fields should be filled. Either one or many fields are empty.";
		echo "<br/>";
		echo "<a href='register.php'>Go back</a>";
	} else {
		mysqli_query($conn,"INSERT INTO user(aiubid,fullname,email,phone,password) VALUES('$aiubid','$fullname','$email','$phone', md5('$pass'))")
			or die("Could not execute the insert query.");
			
		echo "<hr><div class='alert alert-success'>Registration successfully done. Click Home for login Now</div>";
	echo "<br/><hr>";} */
		
	
} //else {
?>

	<center><h2>New User Registration</h2><hr></center>
	<form name="form1" method="post" action="">
		<table class="table table-striped table-bordered table-condensed">
            <tr>
                <td>AIUB ID</td>
                <td><input type="text" name="aiubid" class="form-control" placeholder="Ex-11-11111-11">
				<span class="error"><?php echo"$aiubiderr"; ?></span>
				</td>
				
            </tr>
			
			    
            <tr>
                <td>Full Name</td>
                <td><input type="text" name="fullname" class="form-control">
				<span class="error"><?php echo"$fullnameerr"; ?></span>
				</td>
            </tr>
            <tr>
				<td>Email</td>
				<td><input type="text" name="email" class="form-control">
				<span class="error"><?php echo"$emailerr"; ?></span></td>
			</tr>
            <tr>
                <td>Phone Number</td>
                <td><input type="text" name="phone" class="form-control">
				<span class="error"><?php echo"$phonerr"; ?></span>
				</td>
            </tr>
			<tr> 
				<td>Password</td>
				<td><input type="password" name="password" class="form-control">
				<span class="error"><?php echo"$passerr"; ?></span></td>
			</tr>
			
			<tr>
                <td>Confirm Password:</td>
                <td><input type="password" name="cpass" class="form-control" >
				
				</td>
				
            </tr>
			<tr>
            <td colspan="2"><br></td>
            </tr>
            <tr> 
				
				<td colspan="2"><input type="submit" class="btn btn-success btn-block btn-lg" name="submit" value="Register"></td>
			</tr>
		</table>
	</form>
<?php
//}
//close the db connection here
?>
</body>
</html>
