<?php
  session_start();

  if (!isset($_SESSION['userID'])) {
    header("Location: index.php");
  }

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
        <img src="img/logo.png" height="200" width="200">
        <h1 id="info-title">Veelgestelde vragen</h1>
        <div class="infocontainer">
          <div class="FAQ-div">
            <p class="FAQ-title">Hoe werkt deze FAQ?</p>
            <p class="FAQ-text">Nou dat is een hele goede vraag Benny. Daar weet ik het antwoord eerlijk gezegd ook niet op omdat deze FAQ namelijk nog een work in progress is.</p>
          </div>

          <div class="FAQ-div2">
            <p class="FAQ-title">FAQ</p>
            <p class="FAQ-text">!Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>

          <div class="FAQ-div">
            <p class="FAQ-title">Hoe werkt deze FAQ?</p>
            <p class="FAQ-text">Nou dat is een hele goede vraag Benny. Daar weet ik het antwoord eerlijk gezegd ook niet op omdat deze FAQ namelijk nog een work in progress is.</p>
          </div>

          <div class="FAQ-div2">
            <p class="FAQ-title">FAQ</p>
            <p class="FAQ-text">!Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>

          <div class="FAQ-div">
            <p class="FAQ-title">Hoe werkt deze FAQ?</p>
            <p class="FAQ-text">Nou dat is een hele goede vraag Benny. Daar weet ik het antwoord eerlijk gezegd ook niet op omdat deze FAQ namelijk nog een work in progress is.</p>
          </div>

          <div class="FAQ-div2">
            <p class="FAQ-title">FAQ</p>
            <p class="FAQ-text">!Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
        </div>
      </div> 
    </div>

    <div id="footer">
      <a href="index.php">Terug naar de hoofdpagina</a>
    </div>
  </body>

  <!-- JQuery and Ajax scripts -->
  <script src="js/index.js"></script>

</html>