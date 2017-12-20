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
  <section class="hero is-fullheight">
    <div class="hero-body">
      <div class="container has-text-centered">
        <div class="column is-4 is-offset-4">
          <h3 class="title has-text-grey">Login</h3>
          <p class="subtitle has-text-grey">Please login to proceed.</p>
            <?php
              if (isset($_SESSION['loginfail'])) { ?>
              <div class="notification is-danger"><?php echo $_SESSION['loginfail']; ?></div>
            <?php unset($_SESSION['loginfail']); }?>
          <div class="box">
            <figure class="avatar">
              <img src="img/logo.png" width="75px">
            </figure>
            <form id="login-form" action="inc/logincheck.php" method="POST" name="vform">
              <div class="field">
                <div class="control">
                  <input class="input is-large" type="email" placeholder="Your Email" name="email" autofocus="">
                </div>
              </div>
              <div class="field">
                <div class="control">
                  <input class="input is-large" type="password" placeholder="Your Password" name="password">
                </div>
              </div>
              <div class="field">
                <label class="checkbox">
                  <input type="checkbox">
                  Remember me
                </label>
              </div>
              <input class="button is-block is-info is-large full-width" type="submit" name="loginbutton" value="Login">
            </form>
          </div>
          <p class="has-text-grey">
            <a href="../">Sign Up</a> &nbsp;·&nbsp;
            <a href="../">Forgot Password</a> &nbsp;·&nbsp;
            <a href="../">Need Help?</a>
          </p>
        </div>
      </div>
    </div>
  </section>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="lib/main.js"></script>
</body>

</html>