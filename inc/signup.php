<?php
session_start();
include 'connect.php';
$connect = connectToDB();

$email = $_POST['email'];
$password = $_POST['password'];
$reEnterPassword = $_POST['repassword'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$phone = $_POST['phone'];
$salt = uniqid(mt_rand(), true);

$query = "SELECT * FROM user WHERE email = '$email' LIMIT 1";
$result = mysqli_query($connect, $query);

if (mysqli_num_rows($result) == 1){
	$_SESSION['message'] = "Email is al in gebruik";
	header("Location: ../register.php");
}
else
{

	if($password == $reEnterPassword)
	{
		$password = md5($password) . $salt;

		$sql = "INSERT INTO user (userID,email,password,firstName,lastName,phone,salt) VALUES('','$email','$password','$firstname','$lastname','$phone','$salt')";

		$_SESSION['message'] = "Registratie succesvol";
		mysqli_query($connect, $sql);
		header("Location: ../login.php");
	}
	else
	{
		$_SESSION['message'] = "Wachtwoorden komen niet overeen";
		header("Location: ../register.php");
	}
}


?>

