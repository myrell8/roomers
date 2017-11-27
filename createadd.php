<?php
  session_start();
	require("inc/connect.php");
  require("inc/functions.php");

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
$numrows = mysqli_num_rows($buildingresource);

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
      include("inc/navigation.php")
    ?>
    <div id="mainpage">
      <div id="content-container">
      <?php 
        if (isset($_SESSION['message'])) { ?>
          <span class="incorrect"><?php echo e($_SESSION['message']); ?></span>
          <?php unset($_SESSION['message']);
        }
      ?>
      
      <div id="search-open">Advertentie plaatsen</div>

      <div id="search-container">
        <form id="create-form" action="create.php" method="POST" enctype="multipart/form-data">
          <div id="form-left">
            <div id="filediv"><input name="file[]" type="file" id="file" /></div>
            <input type="button" id="add_more" class="upload" value="Meer foto's toevoegen"/>
          </div>
          <div id="form-right">
            <div id="top">
              <div>
                <span>Naam advertentie*</span>
                <input type="text" name="addname" required>
              </div>
            </div>
            <div id="mid">
              <div>
                <span>Straatnaam*</span>
                <input type="text" name="street" required>
              </div>
              <div>
                <span>Huisnummer*</span>
                <input type="text" name="number" required>
              </div>
              <div>
                <span>Postcode*</span>
                <input type="text" name="areacode" required>
              </div>
              <div>
                <span>Stad*</span>
                <input type="text" name="city" required>
              </div>
              <div>
                <span>Type gebouw</span>
                  <select name="type">
                  <option value="Niet bekend">Niet bekend</option>
                  <option value="School">School</option>
                  <option value="Kantoor">Kantoor</option>
                  <option value="Winkel">Winkel</option>
                  <option value="Horeca">Horeca</option>
                  <option value="Industrie">Industrie</option>
                  <option value="Woonruimte">Woonruimte</option>
                </select>
              </div>
              <div>
                <span>Tijd beschikbaar</span>
                <select name="time">
                  <option value="Niet bekend">Niet bekend</option>
                  <option value="< 1 maand">< 1 maand</option>
                  <option value="1 tot 3 maanden">1 tot 3 maanden</option>
                  <option value="3 tot 5 maanden">3 tot 5 maanden</option>
                  <option value="5 tot 12 maanden">5 tot 12 maanden</option>
                  <option value="1 jaar +">1 jaar +</option>
                </select>
              </div>
              <div>
                <span>Bouwjaar</span>
                <input type="text" name="year">
              </div>
              <div>
                <span>Ruimte (m²)</span>
                <input type="text" name="space">
              </div>
              <div>
                <span>Verdiepingen</span>
                <select name="layers">
                  <option value="Niet bekend">Niet bekend</option>
                  <option value="1 verdieping">1 verdieping</option>
                  <option value="2 verdiepingen">2 verdiepingen</option>
                  <option value="3 verdiepingen">3 verdiepingen</option>
                  <option value="4 verdiepingen">4 verdiepingen</option>
                  <option value="5+ verdiepingen">5+ verdiepingen</option>
                </select>
              </div>
              <div>
                <span>Parkeergelegenheid</span>
                <select name="parking">
                  <option value="Niet bekend">Niet bekend</option>
                  <option value="Ja">Ja</option>
                  <option value="Nee">Nee</option>
                  <option value="Beperkt">Beperkt</option>
                  <option value="Betaald">Betaald</option>
                </select>
              </div>
            </div> 
            <div id="bot">
              <p>Omschrijving*</p>
              <textarea class="description" name="description" required></textarea>
            </div>
            <input type="submit" id="create-button" value="Plaats nieuwe advertentie" name="submit">
          </div>
        </form>
      </div>

      <span id="addspan">Mijn advertenties</span>
        <div id="user-add">
        
        <?php if ($numrows == 0) { ?>
          <div id="no-add">Geen advertenties om weer te geven</div>
        <?php } ?>
        
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
            </div>
            <div class="result-div">
              <p class="result-name"><?php echo e($item['name']); ?></p>
              <p><?php echo e($item['street'] . " " . $item['strnumber']); ?></p>
              <p><?php echo e($item['areacode']); ?></p>
              <p><?php echo $item['renttime'] ?></p>
              <p><?php echo e($space); ?></p>
            </div>
            <div class="result-div-buttons">
              <a href="edit.php?id=<?php echo $item['buildingID']; ?>" class="info-button">Bewerken</a>
              <a href="inc/delete.php?id=<?php echo $item['buildingID']; ?>" class="info-button delete">Verwijderen</a>
              <input type="hidden" class="hidden" value="<?php echo $item['buildingID']; ?>">
            </div>
          </div>
        </div>
      <?php } ?>
      </div>
    </div>
  </body>

  <!-- JQuery and Ajax scripts -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="js/index.js"></script>
  <script src="js/script.js"></script>
</html>