<div class="forsideindhold"> <?php 
 $page = "forside";

 require 'db_connect.inc.php';

//Vælg hvad der skal tages ud fra databasen og hvilken tabel
 $result = $conn->query("SELECT * FROM tilbud") or die($conn->error);

// Lav en repeater med data
 while ($row = $result->fetch_assoc()):
 	?>




 	<div class="card-container">
 		<div class="card" style='background-image: url("images/<?php echo $row['TilbudBillede'];  ?>")'>

 		<div class="side back">  <div class="col-12"><h1><?php echo $row['TilbudFirma']; ?></h1></div>
 			<div class="col-12"><p style="height:100%"><?php echo $row['TilbudInfo']; ?></p></div>	
 		</div>
 	</div>
 </div>

 <?php endwhile; ?></div>