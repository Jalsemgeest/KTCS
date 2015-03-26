<nav class="navbar navbar-default">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">KTCS</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <?php if (isset($_SESSION["USER_ID"]) || isset($_SESSION["EMP_ID"])) { 
            if ($_SESSION["CURR_PAGE"] == "profile") { ?>
              <li class="active"><a href="profile.php">Profile</a></li>
              <?php } else { ?>
              <li><a href="profile.php">Profile</a></li>

          <?php } 
              } if (isset($_SESSION["CURR_PAGE"]) && $_SESSION["CURR_PAGE"] == "availability") { ?>
              <li class="active"><a href="check_availability.php">Check Availability</a></li>
          <?php } else { ?>
              <li><a href="check_availability.php">Check Availability</a></li>
          <?php } 
          if (isset($_SESSION["EMP_ID"])) { ?>
              <li><a href="emp_actions.php">Employee Actions</a></li>
            <?php } ?>
        </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php if (isset($_SESSION["USER_ID"]) || isset($_SESSION["EMP_ID"])) { ?>
          <li><a href="logout.php">Logout</a></li>
        <?php }
         else {
              if (isset($_SESSION["CURR_PAGE"]) && $_SESSION["CURR_PAGE"] == "login") { ?>
                <li class="active"><a href="login.php">Log in</a></li>
        <?php } else { ?>
                <li><a href="login.php">Log in</a></li>
        <?php } }?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>