<?php
  session_start();
	require("inc/connect.php");

  if (!isset($_SESSION['userID'])) {
    header("Location: index.php");
  }

  $connect = connectToDB();

  $userquery = "
    SELECT *
    FROM user
    WHERE userID = " . $_SESSION['userID'] . "
    ";

  $userresource = mysqli_query($connect, $userquery);

  $UserArray = array();
    while($result = mysqli_fetch_assoc($userresource))
    {
      $UserArray[] = $result;
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
        <form class="register-form" id="change-form" action="inc/changeinfo.php" method="POST" name="rform">
          <span class="login-span">Verifieer en verander gegevens</span>
          <?php 
              if (isset($_SESSION['message'])) { ?>
                <span class="incorrect"><?php echo $_SESSION['message']; ?></span>
              <?php unset($_SESSION['message']); }?>
            <div class="form-group-register">
              <div class="form-input">
                  <span class="form-span">Emailadres</span>
                  <input class="input-class" type="email" name="email" required>
              </div>
              <div class="form-input">
                  <span class="form-span">Wachtwoord</span>
                  <input class="input-class" type="password" name="password" required>
              </div>
              <div class="form-input">
                  <span class="form-span">Wachtwoord opnieuw</span>
                  <input class="input-class" type="password" name="repassword" required>
              </div>
              <div class="form-input">
                  <span class="form-span">Voornaam</span>
                  <input class="input-class" type="text" name="firstname" required>
              </div>
              <div class="form-input">
                  <span class="form-span">Achternaam</span>
                  <input class="input-class" type="text" name="lastname" required>
              </div>
              <div class="form-input">
                  <span class="form-span">Telefoonnummer</span>
                  <input class="input-class" type="tel" name="phone" id="phone-input" required>
              </div>
            </div>
            <input class="login-button" type="submit" name="loginbutton" value="Doorgaan">
            <a href="account.php" class="login-button" id="login-back">Terug</a>
        </form>
      </div> 
    </div>
  </body>

  <!-- JQuery and Ajax scripts -->
  <script src="js/index.js"></script>

</html>