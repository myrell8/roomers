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

$sql = "INSERT INTO user (userID,email,password,firstName,lastName,phone) VALUES('','$email','$password','$firstname','$lastname','$phone')";

if($password == $reEnterPassword)
{
	$_SESSION['message'] = "Registratie succesvol";
	mysqli_query($connect, $sql);
	header("Location: ../login.php");
}
else
{
	$_SESSION['message'] = "Wachtwoorden komen niet overeen";
	header("Location: ../register.php");
}
?>