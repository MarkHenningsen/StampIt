<?php

$page = "profil";

if (isset($_SESSION['brugerId'])) {
    echo '<h2>Mine kuponner</2>';
    //Skal senere redirect til en profil side.














}
else{
    echo ' <div class="form-wrap">
    <div class="tabs">
      <h3 class="signup-tab"><a class="active" href="#">Opret dig</a></h3>
      <h3 class="signup-tab"><a href="index.php?underside=login.php">Login</a></h3>

    </div><!--.tabs-->

    <div class="tabs-content">';

// Udskriv fejl og success beskeder
    
    if (isset($_GET['error'])){
        if ($_GET['error'] == "forkertmailbrugernavn") {
          echo '<p class="signuperror">Benyt gyldig email og brugernavn!</p>';
        }
        elseif ($_GET['error'] == "forkertmail") {
          echo '<p class="signuperror">Benyt gyldig email!</p>';
        }
        elseif ($_GET['error'] == "forkertbrugernavn") {
          echo '<p class="signuperror">Benyt gyldigt brugernavn!</p>';
        }
        elseif ($_GET['error'] == "passwordfejl") {
          echo '<p class="signuperror">De to password er ikke ens!</p>';
        }
        elseif ($_GET['error'] == "brugernavntaget") {
          echo '<p class="signuperror">Brugernavnet er allerede i brug!</p>';
        }
        elseif ($_GET['error'] == "tommefelter") {
          echo '<p class="signuperror">Udfyld alle felterne!</p>';
        }
      }
      elseif (isset($_GET['opret'])){
        if ($_GET['opret'] == "success") {
        echo '<p class="signupsuccess">Bruger oprettet!</p>';
      }
    }
      


  echo  '<!----------------------------------- SIGN UP FORM ------------------------------------------->

    <div id="signup-tab-content" class="active">

        <form class="signup-form" action="signup.inc.php" method="post">
          <input type="text" class="input" name="Navn" id="Navn" autocomplete="off" placeholder="Navn">
          <input type="email" class="input" name="Email" id="Email" autocomplete="off" placeholder="Email">
          <input type="text" class="input" name="Brugernavn" id="Brugernavn" autocomplete="off" placeholder="Brugernavn">
          <input type="password" class="input" name="Password" id="Password" autocomplete="off" placeholder="Password">
          <input type="password" class="input" name="PasswordGentag" id="PasswordGentag" autocomplete="off" placeholder="Gentag password">
          <input type="submit" name="submit" class="button" value="Opret">
        </form><!--.login-form-->


        <div class="help-text">
        </div><!--.help-text-->
      </div><!--.signup-tab-content-->


    
  </div><!--.form-wrap--><p class="login-status">';
  }

 ?>





