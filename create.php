<?php	session_start();
	include 'inc/connect.php';
if($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST) && empty($_FILES) && $_SERVER['CONTENT_LENGTH'] > 0)
{ 
die("error");
}
if (isset($_POST['submit'])) {
	$connect = connectToDB();
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
	$numberOfFiles = count(array_filter($_FILES['file']['name']));
	$j = 0;     // Variable for indexing uploaded image.

	if ($year == "") {
		$year = "Niet bekend";
	}
	if ($space == "") {
		$space = 0;
	}
	
		for ($i = 0; $i < count($_FILES['file']['name']); $i++) {
		$target_path = "img/";     // Declaring Path for uploaded images.
		// Loop to get individual element from the array
		$validextensions = array("jpeg", "jpg", "png");      // Extensions which are allowed.
		$ext = explode('.', basename($_FILES['file']['name'][$i]));   // Explode file name from dot(.)
		$file_extension = end($ext); // Store extensions in the variable.
		$target_path = $target_path . md5(uniqid()) . "." . $ext[count($ext) - 1];     // Set the target path with a new name of image.
		$j = $j + 1;      // Increment the number of uploaded images according to the files in array.
		if (($_FILES["file"]["size"][$i] < 1000000)     // Approx. 1000kb files can be uploaded.
		&& in_array($file_extension, $validextensions)) {
		if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path)) {
		// If file moved to uploads folder.
		echo $j. ').<span id="noerror">Image uploaded successfully!.</span><br/><br/>';
		} else {     //  If File Was Not Moved.
		echo $j. ').<span id="error">please try again!.</span><br/><br/>';
		}
		} else {     //   If File Size And File Type Was Incorrect.
		echo $j. ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';
		}
			
			if ($numberOfFiles == 0) {
				$image1 = "";
			}
			else{

				if (!isset($image1) && $j <= $numberOfFiles) {
					$image1 = $target_path;
					$count = 1;
				}
				elseif ($count == 1 && $j <= $numberOfFiles) {
					$image2 = $target_path;
					$count = 2;
				}
				elseif ($count == 2 && $j <= $numberOfFiles) {
					$image3 = $target_path;
					$count = 3;
				}
				elseif ($count == 3 && $j <= $numberOfFiles) {
					$image4 = $target_path;
					$count = 4;
				}
				elseif ($count == 4 && $j <= $numberOfFiles) {
					$image5 = $target_path;
				}
			} 
		} 

	$sql = "INSERT INTO building(buildingID,user_ID,name,picture1,picture2,picture3,picture4,picture5,street,strnumber,areacode,city,mainfunction,renttime,year,space,layers,parking,description) VALUES('','$user','$name','$image1','$image2','$image3','$image4','$image5','$street','$strnumber','$area','$city','$type','$time','$year','$space','$layers','$parking','$desc')";

	mysqli_query($connect, $sql);
	header("Location:main.php"); 
}
?>