<div class="kuponindhold"><?php 
require 'db_connect.inc.php';

$page = "kupon";

//Vælg hvad der skal tages ud fra databasen og hvilken tabel
$result = $conn->query("SELECT * FROM kupon") or die($conn->error);

// Lav en repeater med data
while ($row = $result->fetch_assoc()):
	?>

	<a href="index.php?underside=indloes.php&kuponId=<?php echo $row['KuponId'] ?>">
		<div class="row kupon" style='background-image: url("images/<?php echo $row['Billede']; ?>")'>
			<div class="col-1"></div>
			<div class="col-7"><h4><?php echo $row['Firma']; ?></h4></div>
			<div class="col-3 "><h6 style="font-size: 14px;"><i class="fas fa-map-marker-alt"></i><?php echo $row['Distance']; ?></h6></div>
		</div>
	</a>
<?php endwhile; ?>


</div>
