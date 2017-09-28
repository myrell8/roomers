<?php
session_start();
include 'connect.php';
$connect = connectToDB();
$user = $_SESSION['userID'];

$sql = "SELECT * FROM user WHERE userID = '$user'";

$changeresource = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($changeresource);
$oldpass = md5($_POST['oldpass1']) . $row['salt'];
$newpass = md5($_POST['newpass']) . $row['salt'];

	if ($_POST['oldpass1'] != $_POST['oldpass2']) {
		$_SESSION['changefail'] = "Wachtwoord niet veranderd";
		header("Location: ../changepass.php");
	}
	else 
	{
		if ($oldpass == $row['password']) 
		{
			$sql = "UPDATE user SET password = '$newpass' WHERE userID = '$user'";
			$changeresource = mysqli_query($connect, $sql);
			header("Location: logout.php");
		}
		else
		{
			$_SESSION['changefail'] = "Wachtwoord niet veranderd";
			header("Location: ../changepass.php");
		}
	}
?>