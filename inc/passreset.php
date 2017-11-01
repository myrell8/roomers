<?php
session_start();
include 'connect.php';
$connect = connectToDB();
$user = $_SESSION['userID'];

$sql = "SELECT * FROM user WHERE userID = '$user'";

$changeresource = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($changeresource);
$oldpass = $row['password'];
$newpass = md5($_POST['newpass']) . $row['salt'];
$newpassRE = md5($_POST['newpass_re']) . $row['salt'];

if ($newpass == $newpassRE) {
	$sql = "UPDATE user SET password = '$newpass' WHERE userID = '$user'";
	mysqli_query($connect, $sql);
	header("Location: logout.php");
}
else {
	$_SESSION['changefail'] = "Wachtwoorden komen niet overeen";
	header("Location: ../resetpass.php");
}

?>