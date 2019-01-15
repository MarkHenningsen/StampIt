
<?php
if (isset($_SESSION['brugerId'])) {
        header("Location: index.php?underside=profile.php");
        exit();
}
else{
    echo '
    <div class="form-wrap">


    <div class="tabs">
      <h3 class="signup-tab"><a href="index.php?underside=profile.php">Opret dig</a></h3>
      <h3 class="signup-tab"><a class="active" href="#">Login</h3>
    </div><!--.tabs-->

    <div class="tabs-content">


<!---------------------------------- LOGIN FORM ----------------------------------------------->
      <div id="login-tab-content" class="active">

        <form class="login-form" action="login.inc.php" method="post">
          <input type="text" class="input" name="BrugernavnEmail" id="BrugernavnEmail" autocomplete="off" placeholder="Email eller brugernavn">
          <input type="password" class="input" name="LoginPassword" id="LoginPassword" autocomplete="off" placeholder="Password">
          <input type="checkbox" class="checkbox" id="remember_me">
          <label for="remember_me">Husk mig</label>

          <input type="submit" class="button" name="login" value="Login">
        </form><!--.login-form-->


        <div class="help-text">
          <p><a href="#">Glemt dit password?</a></p>
        </div><!--.help-text-->
      </div><!--.login-tab-content-->
    </div><!--.tabs-content-->

    
  </div><!--.form-wrap-->';
  }
 ?>




