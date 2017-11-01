<?php
	session_start();
	require("inc/connect.php");

	if (isset($_SESSION['userID'])) {
	header("Location: main.php");
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
  </head>

  <body id="home-bg">
    <div class="home">
      <div class="home-content">
        <img src="img/logo.png" height="200" width="200" id="home-logo">
        <p class="home-titles">Welkom!</p>
        <p class="home-subtext">Roomers is een platform dat eigenaren van (leegstaande) panden helpt in contact te komen met particulieren die op zoek zijn naar een ruimte om te huren.</p>
        <div class="home-button-container">
          <a href="login.php" class="home-button">Login</a>
          <a href="register.php" class="home-button">Registreer</a>
        </div>
      </div>
    </div>
  </body>

  <!-- JQuery and Ajax scripts -->
  <script src="js/index.js"></script>

</html>