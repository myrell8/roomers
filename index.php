<?php
  session_start();
  require("inc/connect.php");
  require("inc/functions.php");

  // if (!isset($_SESSION['userID'])) {
  // header("Location: index.php");
  // }

$connect = connectToDB();

$buildingquery = "
  SELECT *
  FROM building, user
  WHERE userID = user_ID
  ";

$orderBy = " ORDER BY buildingID DESC";
$typefiltered = 0;
$typemax = -1;
$searchType = "";

$checkbox1 = "";
$checkbox2 = "";
$checkbox3 = "";
$checkbox4 = "";
$checkbox5 = "";

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
if (isset($_GET['verdiepingen']) && $_GET['verdiepingen'] != "") {
  $searchLayers = $_GET['verdiepingen'];
  $buildingquery = $buildingquery . " AND layers = '" . $searchLayers . "'";
}

if (isset($_GET['parkeer']) && $_GET['parkeer'] != "") {
  $searchParking = $_GET['parkeer'];
  $buildingquery = $buildingquery . " AND parking = '" . $searchParking . "'";
}

if (isset($_GET['type1']) && $_GET['type1'] != "") {
    $typemax = $typemax + 1;
    $checkbox1 = "checked";
}
if (isset($_GET['type2']) && $_GET['type2'] != "") {
    $typemax = $typemax + 1;
    $checkbox2 = "checked";
}
if (isset($_GET['type3']) && $_GET['type3'] != "") {
    $typemax = $typemax + 1;
    $checkbox3 = "checked";
}
if (isset($_GET['type4']) && $_GET['type4'] != "") {
    $typemax = $typemax + 1;
    $checkbox4 = "checked";
}
if (isset($_GET['type5']) && $_GET['type5'] != "") {
    $typemax = $typemax + 1;
    $checkbox5 = "checked";
}

if (isset($_GET['type1']) && $_GET['type1'] != "" && $typefiltered < $typemax) {
  $searchType = $searchType . "'" . $_GET['type1'] . "', ";
  $typefiltered++;
}
else if (isset($_GET['type1']) && $_GET['type1'] != "") {
  $searchType = $searchType . "'" . $_GET['type1'] . "'";
}


if (isset($_GET['type2']) && $_GET['type2'] != "" && $typefiltered < $typemax) {
  $searchType = $searchType . "'" . $_GET['type2'] . "', ";
  $typefiltered++;
}
else if (isset($_GET['type2']) && $_GET['type2'] != "") {
  $searchType = $searchType . "'" . $_GET['type2'] . "'";
}


if (isset($_GET['type3']) && $_GET['type3'] != "" && $typefiltered < $typemax) {
  $searchType = $searchType . "'" . $_GET['type3'] . "', ";
  $typefiltered++;
}
else if (isset($_GET['type3']) && $_GET['type3'] != "") {
  $searchType = $searchType . "'" . $_GET['type3'] . "'";
}


if (isset($_GET['type4']) && $_GET['type4'] != "" && $typefiltered < $typemax) {
  $searchType = $searchType . "'" . $_GET['type4'] . "', ";
  $typefiltered++;
}
else if (isset($_GET['type4']) && $_GET['type4'] != "") {
  $searchType = $searchType . "'" . $_GET['type4'] . "'";
}


if (isset($_GET['type5']) && $_GET['type5'] != "" && $typefiltered < $typemax) {
  $searchType = $searchType . "'" . $_GET['type5'] . "', ";
  $typefiltered++;
}
else if (isset($_GET['type5']) && $_GET['type5'] != "") {
  $searchType = $searchType . "'" . $_GET['type5'] . "'";
}


if (isset($_GET['type1']) || isset($_GET['type2']) || isset($_GET['type3']) || isset($_GET['type4']) || isset($_GET['type5'])) {
  $buildingquery = $buildingquery . " AND mainfunction IN (" . $searchType . ")";
}

if (isset($_GET['sort'])) {
  if ($_GET['sort'] == 1) {
    $orderBy = " ORDER BY buildingID DESC";
  }
  if ($_GET['sort'] == 2) {
    $orderBy = " ORDER BY buildingID ASC";
  }
  if ($_GET['sort'] == 3) {
    $orderBy = " ORDER BY name ASC";
  }
  if ($_GET['sort'] == 4) {
    $orderBy = " ORDER BY name DESC";
  }
  if ($_GET['sort'] == 5) {
    $orderBy = " ORDER BY space ASC";
  }
  if ($_GET['sort'] == 6) {
    $orderBy = " ORDER BY space DESC";
  }
}

$buildingquery = $buildingquery . $orderBy;

$buildingresource = mysqli_query($connect, $buildingquery);

$BuildingArray = array();
  while($result = mysqli_fetch_assoc($buildingresource))
  {
    $BuildingArray[] = $result;
  }

if (!isset($_GET['page'])) {
  $slice = 0;
  $active = 1;
}
elseif ($_GET['page'] == 1) {
  $slice = 0;
  $active = 1;
}
else{
  $slice = $_GET['page'] - 1;
  $active = $_GET['page'];
}

$slice = $slice * 10;

$BuildingArray = array_slice($BuildingArray, $slice,10);

$pagecount = mysqli_num_rows($buildingresource);
$pagecount = $pagecount/10;
$pagecount = ceil($pagecount);

$count = 0 + $slice;
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Roomers">
  <meta name="author" content="Myrell Richardson">
  <link rel="icon" href="img/logo.png">
  <title>Roomers</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,600" rel="stylesheet">
  <script defer src="lib/fontawesome/everything.min.js"></script>
  <script defer src="lib/fontawesome/fontawesome.min.js"></script>

  <link rel="stylesheet" href="css/main.css">
</head>

<body ondragstart="return false">
  <?php include 'inc/header.php'; ?>
  <section class="ads">
    <div class="inner">
      <div class="item-filters">
        <?php include("inc/searchform.php") ?>
      </div>
      <div class="ad-items">
        <div class="ads-head">
          <div class="item-search">
            <div class="control">
              <input class="input" type="text" placeholder="Zoek hier">
            </div>
          </div>
        </div>
        <div class="items-holder">
          <?php foreach ($BuildingArray as $item) { 
            $count++;
            if ($item['space'] == 0) {
              $space = "Niet bekend";
            }
            else{
              $space = $item['space'] . " m²"; 
            }
            if ($item['picture1'] == NULL) {
              $picture = "img/noimg.jpg";
            }
            else
            {
              $picture = 'img/items/' . $item['picture1'];
            }
          ?>
          <div class="item-card">
            <a class="item-card-img" href="details.php?id=<?php echo $item['buildingID'];?>">
              <img src=<?php echo $picture ?>>
            </a>
            <div class="item-card-info">
              <a class="item-card-btn" href="details.php?id=<?php echo $item['buildingID'];?>">
                <?php echo e($item['name']); ?>
              </a>
              <div class="item-card-desc">
                <div class="item-info"><label>Stad:</label><span><?php echo $item['city']; ?></span></div>
                <div class="item-info"><label>Adres:</label><span><?php echo e($item['street'] . " " . $item['strnumber']); ?></span></div>
                <div class="item-info"><label>Postcode:</label><span><?php echo e($item['areacode']); ?></span></div>
                <div class="item-info"><label>Beschikbaar:</label><span><?php echo $item['renttime']; ?></span></div>
                <div class="item-info"><label>Ruimte:</label><span><?php echo e($space); ?></span></div>
              </div>
              <div class="item-card-new">
                Nieuw
              </div>
            </div>
          </div>
          <?php } ?>
        </div>         
      </div>
    </div>
  </section>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="lib/main.js"></script>
</body>

</html>