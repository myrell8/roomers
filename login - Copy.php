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
        <form id="login-form" action="inc/logincheck.php" method="POST" name="vform">
          <span class="login-span">Login</span>
          <div class="form-group">

            <?php 
              if (isset($_SESSION['message'])) { ?>
              <span class="correct"><?php echo $_SESSION['message']; ?></span>
            <?php unset($_SESSION['message']); }?>
            <?php
              if (isset($_SESSION['loginfail'])) { ?>
              <span class="incorrect"><?php echo $_SESSION['loginfail']; ?></span>
            <?php unset($_SESSION['loginfail']); }?>

            <div class="form-input">
                <span class="form-span">Emailadres</span>
                <input class="input-class" type="email" name="email">
                <span id="email_error" class="val_error"></span>
            </div>
            <div class="form-input">
                <span class="form-span">Password</span>
                <input class="input-class pass" type="password" name="password">
                <span id="password_error" class="val_error"></span>
            </div>
          </div>
            <a href="passrecovery.php" class="forget-pw">Wachtwoord vergeten?</a>
            <input class="login-button" type="submit" name="loginbutton" value="Login">
            <a href="index.php" class="login-button" id="login-back">Terug</a>
        </form>
      </div>
    </div>
  </body>

  <!-- JQuery and Ajax scripts -->
  <script src="js/index.js"></script>

</html>