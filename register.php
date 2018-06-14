<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
</head>
<body>

<?php
require('database/config.php');


//our included config file
//include "config.php";
//check whether data with the name usename has been submitted
//print_r($_POST);
if(isset($_POST['username'])) {
	//variables to hold our submitted data with post
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	//our sql statement that we will execute
	$sql = "INSERT INTO `user` (`id`, `username`, `email`, `password`) VALUES (NULL, '$username', '$email', '$password')";
	//Executing the sql query with the connection
//echo $sql; die;
$re = mysqli_query($con, $sql);
	//Check to see whether request was true or false
	if ($re) {
		echo "Successfully Registered";
	}else{
		echo "An Error Occured";
	}
  }

?>


<form method="POST">
<table width="20%" bgcolor="0099CC" align="center">

<tr>
<td colspan=2><center><font size=4><b>Registration Page</b></font></center></td>
</tr>

<tr>
<td><label for="User Name">User name</label></td>
<td><input type="text" name="username" placeholder="Username" required></td>
</tr>

<tr>
<td><label for="inputEmail">Email address</label></td>
<td><input type="email" name="email" id="inputEmail" placeholder="Email address" required autofocus></td>
</tr>

<tr>
<td><label for="inputPassword">Password</label></td>
<td><input type="password" name="password" id="inputPassword" placeholder="Password" required></td>
</tr>

<tr>
<td ><input type="Reset"></td>
<td><button type="submit">Register</button><a href="login.php">Login</a></td>
</tr>
</table>
</form>

</html>
