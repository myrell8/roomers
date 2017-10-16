<?php	
session_start();
include 'connect.php';
$connect = connectToDB();
if($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST) && empty($_FILES) && $_SERVER['CONTENT_LENGTH'] > 0)
{ 
	die("error");
}

if (isset($_POST['submit'])) {
	$mid = $_POST['id'];
	$sql = "SELECT * FROM building WHERE buildingID = $mid";
	$result = mysqli_query($connect, $sql);
	$row = mysqli_fetch_assoc($result);
	
	$user = $_SESSION['userID'];
	$name = mysql_real_escape_string($_POST['addname']);
	$street = $_POST['street'];
	$strnumber = $_POST['number'];
	$area = $_POST['areacode'];
	$city = mysql_real_escape_string($_POST['city']);
	$type = $_POST['type'];
	$time = $_POST['time'];
	$year = $_POST['year'];
	$space =  $_POST['space'];
	$layers = $_POST['layers'];
	$parking = $_POST['parking'];
	$desc = mysql_real_escape_string($_POST['description']);

	$allowed = array('jpg','jpeg','png');
	$ext = end(explode('.', $_FILES['photo']['name']));

	if (in_array($ext, $allowed)) 
	{
	
		if ($_FILES['photo']['size'] < 15242880) {
			unlink("../".$row['picture']);
			$namepot = md5(rand()).'.'.$ext;
			$sqlpath = "img/".$namepot;	
			$path = "../img/".$namepot;
			$result = move_uploaded_file($_FILES['photo']['tmp_name'], $path);
			$sql = "UPDATE building SET name = '$name', street = '$street', strnumber = '$strnumber', areacode = '$area', city = '$city', mainfunction = '$type', renttime = '$time', year = '$year', space = '$space', layers = '$layers', parking = '$parking', description = '$desc',picture='$sqlpath' WHERE buildingID = " . $_SESSION['buildingID'];
			mysqli_query($connect, $sql);
			header("Location: ../main.php");
		} 
		else 
		{
        	$_SESSION['message'] = "Probleem bij het aanpassen van de advertentie, probeer opnieuw.";
        	header("Location: ../main.php");
		}
	}
	else
	{
		$sql = "UPDATE building SET name = '$name', street = '$street', strnumber = '$strnumber', areacode = '$area', city = '$city', mainfunction = '$type', renttime = '$time', year = '$year', space = '$space', layers = '$layers', parking = '$parking', description = '$desc' WHERE buildingID = " . $_SESSION['buildingID'];
			mysqli_query($connect, $sql);
			header("Location: ../main.php");
	}	
}
else
{
	$_SESSION['message'] = "Probleem bij het aanpassen van de advertentie, probeer opnieuw.";
    header("Location: ../main.php");
}
?>