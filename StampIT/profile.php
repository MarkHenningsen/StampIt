<div class="form-wrap">
    <div class="tabs">
      <h3 class="signup-tab"><a class="active" href="#signup-tab-content">Opret dig</a></h3>
      <h3 class="login-tab"><a href="#login-tab-content">Login</a></h3>
    </div><!--.tabs-->

    <div class="tabs-content">
      <div id="signup-tab-content" class="active">
        <form class="signup-form" action="" method="post">
          <input type="email" class="input" id="user_email" autocomplete="off" placeholder="Email">
          <input type="text" class="input" id="user_name" autocomplete="off" placeholder="Brugernavn">
          <input type="password" class="input" id="user_pass" autocomplete="off" placeholder="Password">
          <input type="submit" class="button" value="Opret">
        </form><!--.login-form-->
        <div class="help-text">
          <p>Ved at oprettelse godkender du</p>
          <p><a href="#">Terms of service</a></p>
        </div><!--.help-text-->
      </div><!--.signup-tab-content-->

      <div id="login-tab-content">
        <form class="login-form" action="" method="post">
          <input type="text" class="input" id="user_login" autocomplete="off" placeholder="Email eller brugernavn">
          <input type="password" class="input" id="user_pass" autocomplete="off" placeholder="Password">
          <input type="checkbox" class="checkbox" id="remember_me">
          <label for="remember_me">Husk mig</label>

          <input type="submit" class="button" value="Login">
        </form><!--.login-form-->
        <div class="help-text">
          <p><a href="#">Glemt dit password?</a></p>
        </div><!--.help-text-->
      </div><!--.login-tab-content-->
    </div><!--.tabs-content-->
  </div><!--.form-wrap-->

