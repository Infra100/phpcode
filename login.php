
<html>
<head>
<title>Login Page</title>
</head>
<body>

<?php

//dsadsadsadsadsadsatest
//our included config file
include "database/config.php";
//starting our session to preserve our login
session_start();
//check whether data with the session name username has already been created
//if so redirect to hhomepage
if (isset($_SESSION['username'])) {
	//redirecting if there is already a session with the name username
	//header("Location: index.php");
}
//check whether data with the name username has been submitted
if (isset($_POST['username'])) {
	//variables to hold our submitted data with post
	$username = $_POST['username'];
	$pass = md5($_POST['password']);
	//our sql statement that we will execute
	$sql = "SELECT * FROM user WHERE username='$username' AND password='$pass'";
	//Executing the sql query with the connection
	$re = mysqli_query($con, $sql);
	//check to see if there is any record / row in the database
	//if there is then the user exists
	if (mysqli_num_rows($re)) {
		//echo "Welcome";
		//creating a session name with username ad inserting the submitted username
		$_SESSION['username'] = $username;
		//redirecting to homepage

	header("Location: test1.php");
	}else{
		//display error if no record exists
		echo "Error : Invalid Login Credentials";
	}
}
?>


<form method="POST">
<table width="20%" bgcolor="0099CC" align="center">

<tr>
<td colspan=2><center><font size=4><b>Application Login Page</b></font></center></td>
</tr>

<tr>
<td>Username:</td>
<td><input type="text" name="username" placeholder="Username" required></td>
</tr>

<tr>
<td>Password:</td>
<td><input type="password" name="password" id="inputPassword" placeholder="Password" required></td>
</tr>

<tr>
<td ><input type="Reset"></td>
<td><button type="submit">Login</button><a href="register.php">Register</a></td>
</tr>

</table>
</form>

</html>
