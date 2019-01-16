<?php

$page = "profil";
require 'db_connect.inc.php';

if (isset($_SESSION['brugerId'])) {

  //Vælg hvad der skal tages ud fra databasen og hvilken tabel
  $result = $conn->query("SELECT * FROM kupon LIMIT 4") or die($conn->error);
    echo '<h2>Mine kuponner</h2>';
  // Lav en repeater med data
  while ($row = $result->fetch_assoc()):


    //Retaderet kode vi ikke ved hvordan vi ellers skal sætte op -.-
    echo '<a href="index.php?underside=indloes.php&kuponId='.$row['KuponId'].'">';
    echo '<div class="row kupon"';
    echo "style='background-image: ";
    echo 'url("images/';
    echo $row['Billede'];
    echo '")';
    echo "'>";
    echo '<div class="col-1"></div>';
    echo '<div class="col-7"><h4>'.$row['Firma'].'</h4></div>';
    echo '<div class="col-3"><h6 style="font-size: 14px;"><i class="fas fa-map-marker-alt"></i>'.$row['Distance'].'</h6></div> </div>
    </a>';
    
   

  endwhile;  

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

