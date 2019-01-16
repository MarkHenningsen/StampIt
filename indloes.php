<?php 
require 'db_connect.inc.php';

$page = "indloes.php";


//Vælg hvad der skal tages ud fra databasen og hvilken tabel

$result = $conn->query("SELECT * FROM kupon WHERE KuponId = '$_GET[kuponId]'") or die($conn->error);



?>
<?php 
while ($row = $result->fetch_assoc()):
	?>
	<div class="container">
		<div class="row">
			<div class="col kupon" style='background-image: url("images/<?php echo $row['Firmabillede']; ?>")'>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<h4 style="padding:20px 0;"><?php echo $row['Firma']; ?></h4>
			</div>	
		</div>
		<div class="row">
			<div class="col">
				<h6 style="padding:20px 0;"><?php echo $row['Info']; ?></h6>
			</div>	
		</div>
		<div class="row">
			<div class="col">
				<div class="btn btn-light">Indløs her</div>
			</div>	
		</div>
	</div>



	<?php endwhile; ?>