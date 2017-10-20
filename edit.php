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
  WHERE buildingID = " . $_GET['id'] . "
  ";

$buildingresource = mysqli_query($connect, $buildingquery);
$row = mysqli_fetch_assoc($buildingresource);

$id =  $_GET['id'];

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
      include("inc/navigation.php");
    ?>
    <div id="mainpage">
      <div id="content-container">
       <form id="create-form" action="create.php" method="POST" enctype="multipart/form-data">
        <div id="form-left">
          <div id="filediv"><input name="file[]" type="file" id="file" /></div>
          <input type="button" id="add_more" class="upload" value="Add More Files"/>
        </div>
        <div id="form-right">
          <div id="top">
            <div>
              <span>Naam advertentie*</span>
              <input type="text" name="addname" required value=<?php echo $row['name']; ?>>
            </div>
          </div>
          <div id="mid">
            <div>
              <span>Straatnaam*</span> 
              <input type="text" name="street" required value=<?php echo $row['street']; ?>>
            </div>
            <div>
              <span>Huisnummer*</span>
              <input type="text" name="number" required value=<?php echo $row['strnumber']; ?>>
            </div>
            <div>
              <span>Postcode*</span>
              <input type="text" name="areacode" required value=<?php echo $row['areacode']; ?>>
            </div>
            <div>
              <span>Stad*</span>
              <input type="text" name="city" required value=<?php echo $row['city']; ?>>
            </div>
            <div>
              <span>Type gebouw</span>
                <select name="type">
                <option value=<?php echo $row['city']; ?>><?php echo $row['mainfunction']; ?></option>
                <option value="Niet bekend">Niet bekend</option>
                <option value="School">School</option>
                <option value="Kantoor">Kantoor</option>
                <option value="Winkel">Winkel</option>7
                <option value="Horeca">Horeca</option>
                <option value="Industrie">Industrie</option>
                <option value="Woonruimte">Woonruimte</option>
              </select>
            </div>
            <div>
              <span>Tijd beschikbaar</span>
              <select name="time">
                <option value=<?php echo $row['renttime']; ?>><?php echo $row['renttime']; ?></option>
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
              <input type="text" name="year" value=<?php echo $row['year']; ?>>
            </div>
            <div>
              <span>Ruimte (m²)</span>
              <input type="text" name="space" value=<?php echo $row['space']; ?>>
            </div>
            <div>
              <span>Verdiepingen</span>
              <select name="layers">
                <option value=<?php echo $row['layers']; ?>><?php echo $row['layers']; ?></option>
                <option value="Niet bekend">Niet bekend</option>
                <option value="1">1 verdieping</option>
                <option value="2">2 verdiepingen</option>
                <option value="3">3 verdiepingen</option>
                <option value="4">4 verdiepingen</option>
                <option value="5+">5+ verdiepingen</option>
              </select>
            </div>
            <div>
              <span>Parkeergelegenheid</span>
              <select name="parking">
                <option value=<?php echo $row['parking']; ?>><?php echo $row['parking']; ?></option>
                <option value="Niet bekend">Niet bekend</option>
                <option value="Ja">Ja</option>
                <option value="Nee">Nee</option>
                <option value="Beperkt">Beperkt</option>
                <option value="Betaald">Betaald</option>
              </select>
            </div>
          </div> 
          <div id="bot">
            <p>Beschrijving*</p>
            <textarea name="description" cols="100" rows="10" required><?php echo $row['description']; ?></textarea>
          </div>
          <input type="submit" id="create-button" value="Bewerk advertentie" name="submit">
        </div>
      </form>
    </div>
  </body>

  <!-- JQuery and Ajax scripts -->
  <script src="js/index.js"></script>
</html>