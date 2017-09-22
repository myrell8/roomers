<?php
  session_start();
	require("inc/connect.php");

  if (!isset($_SESSION['userID'])) {
    header("Location: index.php");
  }

  $connect = connectToDB();

$buildingquery = "
  SELECT *
  FROM building
  WHERE user_ID = " . $_SESSION['userID'] . "
  ";

$buildingresource = mysqli_query($connect, $buildingquery);

$BuildingArray = array();
  while($result = mysqli_fetch_assoc($buildingresource))
  {
    $BuildingArray[] = $result;
  }

$even = "1";
$count = 0;
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <meta name="description" content="Roomers">
    <meta name="author" content="Myrell Richardson">
    <link rel="icon" href="img/logo.png">
    <title>Roomers</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome/css/font-awesome.min.css">
  </head>

  <body>
    <?php  
      include("inc/header.php");
      include("inc/navigation.php")
    ?>
    <div id="mainpage">
      <div id="content-container">
        <div id="user-add">
         <?php foreach ($BuildingArray as $item) { 
            $count++;
            if ($even == "0") {
              $container = "item-container";
              $resultinfo = "result-info";
              $even = "1";
            }
            else
            {
              $container = "item-container2";
              $resultinfo = "result-info2";
              $even = "0";
            }

            if ($item['picture'] == NULL) {
              $picture = "img/noimg.jpg";
            }
            else
            {
              $picture = $item['picture']; 
            } ?>

            <div class=<?php echo $container ?>>
              <p><?php echo $count; ?></p>
              <img src=<?php echo $picture ?> class="result-img">
              <div class=<?php echo $resultinfo ?>>
                <div class="result-title-div">
                  <p>Naam</p>
                  <p>Adres</p>
                  <p>Postcode</p>
                  <p>Beschikbaarheid</p>
                  <p>Ruimte</p>
                </div>
                <div class="result-div">
                  <p class="result-name"><?php echo $item['name'] ?></p>
                  <p><?php echo $item['street'] . " " . $item['strnumber'] ?></p>
                  <p><?php echo $item['areacode'] ?></p>
                  <p><?php echo $item['renttime'] ?></p>
                  <p><?php echo $item['space'] . "m²"?></p>
                </div>
                <a href="#" class="info-button">Bewerken</a>
              </div>
            </div>
          <?php } ?>
          </div>
        <?php include("inc/createform.php") ?>
    </div>
  </body>

  <!-- JQuery and Ajax scripts -->
  <script src="js/index.js"></script>
</html>