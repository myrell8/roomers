<?php
  session_start();
  require("inc/connect.php");

  if (!isset($_SESSION['userID'])) {
  header("Location: index.php");
}

$connect = connectToDB();

$buildingquery = "
  SELECT *
  FROM building, user
  WHERE userID = user_ID
  ";

$orderBy = " ORDER BY buildingID ASC";

if (isset($_GET['ruimte']) && $_GET['ruimte'] != "") {
  $searchRuimte = $_GET['ruimte'];
  if ($searchRuimte == 1) {
    $minRuimte = 1;
    $maxRuimte = 50;
  }
  elseif ($searchRuimte == 2) {
    $minRuimte = 50;
    $maxRuimte = 100;
  }
  elseif ($searchRuimte == 3) {
    $minRuimte = 100;
    $maxRuimte = 150;
  }
  elseif ($searchRuimte == 4) {
    $minRuimte = 150;
    $maxRuimte = 200;
  }
  elseif ($searchRuimte == 5) {
    $minRuimte = 200;
    $maxRuimte = 250;
  }
  elseif ($searchRuimte == 6) {
    $minRuimte = 250;
    $maxRuimte = 300;
  }
  elseif ($searchRuimte == 7) {
    $minRuimte = 300;
    $maxRuimte = 350;
  }
  elseif ($searchRuimte == 8) {
    $minRuimte = 350;
    $maxRuimte = 400;
  }
  elseif ($searchRuimte == 9) {
    $minRuimte = 400;
    $maxRuimte = 450;
  }
  elseif ($searchRuimte == 10) {
    $minRuimte = 450;
    $maxRuimte = 500;
  }
  else{
    $minRuimte = 500;
    $maxRuimte = 99999;
  }

  $buildingquery = $buildingquery . " AND space BETWEEN " . $minRuimte . " AND " . $maxRuimte;
}

if (isset($_GET['tijd']) && $_GET['tijd'] != "") {
  $searchTijd = $_GET['tijd'];
  $buildingquery = $buildingquery . " AND renttime = '" . $searchTijd . "'";
}

if (isset($_GET['type']) && $_GET['type'] != "") {
  $searchType = $_GET['type'];
  $buildingquery = $buildingquery . " AND mainfunction = '" . $searchType . "'";
}

if (isset($_GET['verdiepingen']) && $_GET['verdiepingen'] != "") {
  $searchLayers = $_GET['verdiepingen'];
  $buildingquery = $buildingquery . " AND layers = '" . $searchLayers . "'";
}

if (isset($_GET['parkeer']) && $_GET['parkeer'] != "") {
  $searchParking = $_GET['parkeer'];
  $buildingquery = $buildingquery . " AND parking = '" . $searchParking . "'";
}

$buildingquery = $buildingquery . $orderBy;

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
</head>

<body>
  <?php  
    include("inc/header.php");
    include("inc/navigation.php");
  ?>
  <div id="mainpage">
    <img src="img/main.jpg" id="mainpic">
    <div id="content-container">
      <div id="search-open">Zoekfilters<i class="fa fa-arrows-v" aria-hidden="true"></i></div>
      <div id="search-container">
        <?php include("inc/searchform.php") ?>
      </div>
        <div class="search-result">
          <?php foreach ($BuildingArray as $item) { 
            if ($item['space'] == 0) {
              $space = "Niet bekend";
            }
            else{
              $space = $item['space'] . " m²"; 
            }

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

            if ($item['picture1'] == NULL) {
              $picture = "img/noimg.jpg";
            }
            else
            {
              $picture = $item['picture1'];
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
                  <p>Eigenaar</p>
                </div>
                <div class="result-div">
                  <p class="result-name"><?php echo $item['name'] ?></p>
                  <p><?php echo $item['street'] . " " . $item['strnumber'] ?></p>
                  <p><?php echo $item['areacode'] ?></p>
                  <p><?php echo $item['renttime'] ?></p>
                  <p><?php echo $space; ?></p>
                  <p><?php echo $item['firstName'] . " " . $item['lastName'] ?></p>
                </div>
                <div class="result-div-buttons">
                  <a class="info-button" href="details.php?id=<?php echo $item['buildingID']; ?>">Meer info</a>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div> 
    </div>
</body>

<!-- JQuery and Ajax scripts -->
<script type="text/javascript" src="js/jquery-3.2.1.min.js">
</script><script src="js/index.js"></script>


</html>