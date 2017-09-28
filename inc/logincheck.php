<?php
	session_start();
	include 'connect.php';
	$connect = connectToDB();
		$email = $_POST['email'];
		$password = $_POST['password'];

		$sql = ("SELECT * FROM user WHERE email = '$email'");

		$loginresource = mysqli_query($connect, $sql);
		$row = mysqli_fetch_assoc($loginresource);

		if (mysqli_num_rows($loginresource) > 0)
		{	
			$password = md5($password) . $row['salt'];
			if ($password == $row['password']) {
				$_SESSION['userID'] = $row['userID'];
				$_SESSION['username'] = $row['firstName'] . " " . $row['lastName'];
				header("Location: ../main.php");
			}
			else
			{
				$_SESSION['loginfail'] = "Login mislukt";
				header("Location: ../login.php");
			}
		}
		else
		{
			$_SESSION['loginfail'] = "Login mislukt";
			header("Location: ../login.php");
		}
?>
