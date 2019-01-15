<?php 
require 'db_connect.inc.php';

 $page = "kupon";

//Vælg hvad der skal tages ud fra databasen og hvilken tabel
$result = $conn->query("SELECT * FROM Kupon") or die($conn->error);

// Lav en repeater med data
while ($row = $result->fetch_assoc()):
 ?>

<div class="row kupon" style='background-image: url("images/<?php echo $row['Billede']; ?>")'>
  <div class="col-md-¨6"><h1><?php echo $row['Firma']; ?></h1></div>
<div class="col-md-6"><p><?php echo $row['Info']; ?></p></div>
</div>

<?php endwhile; ?>