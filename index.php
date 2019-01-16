<?php 
session_start();

require 'db_connect.inc.php';


$page = "forside";
require 'db_connect.inc.php';

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>StampIt</title>

 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
 <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
 <link rel="icon" href="images/favicon.ico" type="image/x-icon">
 <link rel="stylesheet" href="css/style.css">
 <link rel="stylesheet" href="css/navbar.css">
</head>
<body>


 <!-- TOP NAVBAR -->
 <nav class="navbar navbar"> 
  <div class="container">
      <div class="col-4"></div>
      <div class="col-4"> <a href="index.php?underside=forside.php"><img src="images/stampitlogo_hvid.png" width="72px;" alt="logo"></a></div>
      <div class="col-4"><a href="#"><img id="filter" src="images/Asset1.png" alt="filter" width="35px"></a></div>
 
  </div>
</nav>

<!-- VENSTRE NAVBAR -->
<div class="menu-tab">

 <div id="one"></div>
 <div id="two"></div>
 <div id="three"></div>
</div>
<div class="menu-hide">
  <nav>
    <div class="row profile-section">
     <div class="col-12">
      <h2><?php
      if (isset($_SESSION['brugerId'])) {
        $result = $conn->query("SELECT * FROM bruger WHERE BrugerId = '$_SESSION[brugerId]'") or die($conn->error);


        while ($row = $result->fetch_assoc()):


          echo $row['Navn']."</h2>";
          echo $row['Email'];

        endwhile;
      }
      else{
        echo 'StampIt';
      } ?> 

    </div>

  </div>
  <ul>
   <li><i class="fas fa-home"></i><a href="index.php?underside=forside.php">Hjem</a></li>


   <?php 
   if (isset($_SESSION['brugerId'])) {
    echo '
    <li><i class="fas fa-cog"></i><a href="index.php?underside=instillinger.php">Instillinger</a></li>
    <li><i class="fas fa-award"></i><a href="index.php?underside=opret.php">Opret kupon</a></li>
    <li><i class="fas fa-sign-out-alt"></i><a href="logout.inc.php">Log ud</a></li>';
  }
  else{
    echo '<li><i class="fas fa-sign-in-alt"></i><a href="index.php?underside=login.php">Log ind</a></li>';
  }
  ?>

</ul>
</nav>
</div>

<!-- MØRK INDHOLD DIV -->
<a href=#><div class="darken"></div></a>

<!-- INDHOLD -->
<div class="container indhold">
 <?php
 if(!isset($_GET['underside'])){
include("forside.php");//default load ved første gang siden loades
}else{
 include($_GET['underside']);
}
?>

</div>


<!-- FOOTER -->
<div id="footer">
 <div class="container-fluid footerbox">
  <div class="row" id="footerdiv">
   <div class="col"><a href="index.php?underside=forside.php"><i class="fas fa-home footerlink <?php echo ($page == "forside" ? "active" : "")?>"></i></a></div>
   <div class="col"><a href="index.php?underside=kupon.php"><i class="fas fa-award footerlink <?php echo ($page == "kupon" ? "active" : "")?>"></i></a></div>
   <div class="col"><a href="index.php?underside=maps.php"><i class="fas fa-map-marked-alt footerlink <?php echo ($page == "maps" ? "active" : "")?>"></i></a></div>
   <div class="col"><a href="index.php?underside=profile.php"><i class="fas fa-user footerlink <?php echo ($page == "profil" ? "active" : "")?>"></i></a></div>
 </div>
</div>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

<script src="js/navbar.js"></script>


</body>
</html>