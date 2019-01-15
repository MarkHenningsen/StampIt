<?php 
$page = "forside";

require 'db_connect.inc.php';

//Vælg hvad der skal tages ud fra databasen og hvilken tabel
$result = $conn->query("SELECT * FROM Tilbud") or die($conn->error);

// Lav en repeater med data
while ($row = $result->fetch_assoc()):
 ?>

<div class="row kupon" style='background-image: url("images/<?php echo $row['TilbudBillede']; ?>")'>
  <div class="col-md-¨6"><h1><?php echo $row['TilbudFirma']; ?></h1></div>
<div class="col-md-6"><p><?php echo $row['TilbudInfo']; ?></p></div>
</div>

<?php endwhile; ?>