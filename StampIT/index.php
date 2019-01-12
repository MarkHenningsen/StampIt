<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>StampIt</title>
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/navbar.css">
</head>
<body>

<!-- TOP NAVBAR -->
<nav class="navbar navbar">
 </nav>

<!-- VENSTRE NAVBAR -->
<div class="menu-tab">

    <div id="one"></div>
    <div id="two"></div>
    <div id="three"></div>
</div>
<div class="menu-hide">
  <nav>
   <div class="profile-section">
      <div class="profile-section-inner">
         <h4>profil sektion</h4>
      </div>
      
      </div>
    <ul>
      <li><i class="fas fa-home"></i><a href="#">Hjem</a></li>
      <li><i class="fas fa-cog"></i><a href="#">Instillinger</a></li>
      <li><i class="fas fa-sign-out-alt"></i><a href="#">Log ud</a></li>

    </ul>
  </nav>
</div>

<!-- MØRK INDHOLD DIV -->
<div class="darken"></div>

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
<div class="container-fluid footericon">
<div class="row">
  <div class="col"><a href="index.php?underside=forside.php"><i class="fas fa-home"></i></a></div>
  <div class="col"><a href="index.php?underside=kupon.php"><i class="fas fa-award"></i></a></div>
  <div class="col"><i class="fas fa-map-marked-alt"></i></div>
  <div class="col"><i class="fas fa-user"></i></div>
</div>
</div>
     </div>





<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

<script src="js/navbar.js"></script>

</body>
</html>