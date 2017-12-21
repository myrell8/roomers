<nav class="navbar is-fixed-top is-transparent">
  <div class="navbar-brand">
    <a class="navbar-item" href="main.php">
      <img src="img/logo.png" alt="Roomers" height="112">
    </a>
    <div class="navbar-burger burger" data-target="navbarExampleTransparentExample">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>

  <div id="navbarExampleTransparentExample" class="navbar-menu">
    <div class="navbar-start">
      <a class="navbar-item" href="https://bulma.io/">
        Home
      </a>
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link" href="/documentation/overview/start/">
          Docs
        </a>
        <div class="navbar-dropdown is-boxed">
          <a class="navbar-item" href="/documentation/overview/start/">
            Overview
          </a>
          <a class="navbar-item" href="https://bulma.io/documentation/modifiers/syntax/">
            Modifiers
          </a>
          <a class="navbar-item" href="https://bulma.io/documentation/columns/basics/">
            Columns
          </a>
          <a class="navbar-item" href="https://bulma.io/documentation/layout/container/">
            Layout
          </a>
          <a class="navbar-item" href="https://bulma.io/documentation/form/general/">
            Form
          </a>
          <hr class="navbar-divider">
          <a class="navbar-item" href="https://bulma.io/documentation/elements/box/">
            Elements
          </a>
          <a class="navbar-item is-active" href="https://bulma.io/documentation/components/breadcrumb/">
            Components
          </a>
        </div>
      </div>
    </div>

    <div class="navbar-end">
      <div class="navbar-item">
        <div class="field is-grouped">
        <?php
          if (isset($_SESSION['userID'])) { ?>
          Ingelogd als <?php echo $_SESSION['username']; ?>
          <p class="control">
              <a class="button is-primary" href="inc/logout.php">
                <span>Logout</span>
              </a>
          </p>
        <?php } else { ?>
            <p class="control">
              <a class="bd-tw-button button" data-social-network="Twitter" data-social-action="tweet" data-social-target="http://localhost:4000" target="_blank" href="login.php">
                <span>
                  Inloggen
                </span>
              </a>
            </p>
            <p class="control">
              <a class="button is-primary" href="register.php">
                <span>Registeren</span>
              </a>
            </p>
        <?php } ?>
        </div>
       </div>
      </div>
    </div>
  </div>
</nav>