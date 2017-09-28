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

if($password == $reEnterPassword)
{
	$password = md5($password) . $salt;

	$sql = "INSERT INTO user (userID,email,password,salt,firstName,lastName,phone) VALUES('','$email','$password','$salt','$firstname','$lastname','$phone')";

	$_SESSION['message'] = "Registratie succesvol";
	mysqli_query($connect, $sql);
	header("Location: ../login.php");
}
else
{
	$_SESSION['message'] = "Registratie mislukt";
	header("Location: ../register.php");
}
?>

