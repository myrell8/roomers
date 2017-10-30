<?php
	session_start();
	include 'connect.php';
	$connect = connectToDB();
	
	$buildingID = $_POST['buildingID'];
	$name = $_POST['addname'];
	$street = $_POST['street'];
	$strnumber = $_POST['number'];
	$areacode = $_POST['areacode'];
	$city = $_POST['city'];
	$type = $_POST['type'];
	$time = $_POST['time'];
	$year = $_POST['year'];
	$space = $_POST['space'];
	$layers = $_POST['layers'];
	$parking = $_POST['parking'];
	$description = $_POST['description'];

	$sql = "UPDATE building SET name = '$name', street = '$street', strnumber = '$strnumber', areacode = '$areacode', city = '$city', mainfunction = '$type', renttime = '$time', year = '$year', space = '$space', layers = '$layers', parking = '$parking', description = '$description' WHERE buildingID = " . $buildingID . "";

	mysqli_query($connect, $sql);
	header("Location: ../createadd.php");

?>
