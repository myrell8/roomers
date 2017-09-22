<?php
	session_start();
	include 'connect.php';
	$connect = connectToDB();
		$email = $_POST['email'];
		$password = $_POST['password'];

		$sql = ("SELECT * FROM user WHERE email = '$email' AND password = '$password'");

		$loginResult = mysqli_query($connect, $sql);
		if (!$row = mysqli_fetch_assoc($loginResult))
		{	
			$_SESSION['incorrect'] = "login failed";
			header("Location: ../login.php");
		}
		else
		{
			$_SESSION['userID'] = $row['userID'];
			$_SESSION['username'] = $row['firstName'] . " " . $row['lastName'];
			header("Location: ../main.php");
		}
?>