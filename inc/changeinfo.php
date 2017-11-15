<?php
	session_start();
	include 'connect.php';
	$connect = connectToDB();
		$user = $_SESSION['userID'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$reEnterPassword = $_POST['repassword'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$phone = $_POST['phone'];

		$sql = "SELECT * FROM user WHERE userID = " . $user . "";

		$loginresource = mysqli_query($connect, $sql);
		$row = mysqli_fetch_assoc($loginresource);

		if (mysqli_num_rows($loginresource) > 0)
		{	
			if ($password == $reEnterPassword) {
				$password = md5($password) . $row['salt'];
					if ($password == $row['password']) {
						$sql2 = "UPDATE user SET firstName = '$firstname', lastName = '$lastname', phone = '$phone' WHERE userID = " . $user;
						mysqli_query($connect, $sql2);
						$sql = "SELECT * FROM user WHERE userID = " . $user . "";

						$loginresource = mysqli_query($connect, $sql);
						$row = mysqli_fetch_assoc($loginresource);
						$_SESSION['username'] = $row['firstName'] . " " . $row['lastName'];
						header("Location: ../main.php");
					}
					else
					{
						header("Location: ../accountinfo.php");
						$_SESSION['message'] = "Verificatie mislukt: Inloggegevens onjuist";
					}
			}
			else{
				header("Location: ../accountinfo.php");
				$_SESSION['message'] = "Verificatie mislukt: Inloggegevens onjuist";
			}
		}
		else
		{
			header("Location: ../accountinfo.php");
			$_SESSION['message'] = "Verificatie mislukt: Inloggegevens onjuist";
		}
?>
