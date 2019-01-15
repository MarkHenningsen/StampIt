<?php require_once 'upload.inc.php'; ?>

<?php 
//Tjek om der er en session besked
if (isset($_SESSION['message'])):
?>

<!-- Udskriv besked, med style fra opret eller slet, samt besked -->
<div class="alert alert-<?=$_SESSION['msg_type']?>">
	<?php 
		echo $_SESSION['message'];
		unset($_SESSION['message']);
	 ?>
</div>
<?php endif ?>



<!-- Opret forbindelse til database og tabeller -->
<?php 
$mysqli = new mysqli('localhost', 'root', '', 'db_stampit') or die(mysqli_eror($mysqli));
$result = $mysqli->query("SELECT * FROM Tilbud") or die($mysqli->error);
?>



<div class="container">

<!------------------- Tabel til oprettede tilbud, samt rediger og slet ------------------->
<div class="row justify-content-center">
	<table class="table">
		<thead>
			<tr>
				<th>Firma</th>
				<th>Billede</th>
				<th>Info</th>
				<th colspan="2"></th>
			</tr>
		</thead>
		<!-- While loop til at printe alt fra databasen -->
		<?php 
			while ($row = $result->fetch_assoc()):
		 ?>
		 <tr>
		 	<td><?php echo $row['TilbudFirma']; ?></td>
		 	<td><?php echo $row['TilbudBillede']; ?></td>
		 	<td><?php echo $row['TilbudInfo']; ?></td>
		 	<td>
		 		<a href="index.php?underside=opret.php&rediger=<?php echo $row['TilbudId']; ?>" class="btn btn-info">Rediger</a>
		 		<a href="upload.inc.php?slet=<?php echo $row['TilbudId']; ?>" class="btn btn-danger">Slet</a>
		 	</td>
		 </tr>
		<?php endwhile; ?>
	</table>
</div>

<?php
function pre_r($array){
	echo '<pre>';
	print_r($array);
	echo '</pre>';
}
 ?>

<!--------------------------- OPRET OG REDIGER FORM --------------------------------------->
<div class="row justify-content-center">
<form action="upload.inc.php" method="POST" enctype="multipart/form-data">
	<input type="hidden" name="TilbudId" value="<?php echo $TilbudId; ?>">

	<div class="form-group">
	<label for="TilbudFirma">Firma</label>
	<input type="text" name="TilbudFirma" class="form-control" value="<?php echo $TilbudFirma; ?>" placeholder="Indtast firmanavn">
</div>

<div class="form-group">
	<label for="TilbudBillede">Billede</label><br>
	<input type="text" name="TilbudBillede" value="<?php echo $TilbudBillede; ?>" id="TilbudBillede"></div>
	<div class="form-group">
	<label for="TilbudInfo">Info</label>
	<input type="text" name="TilbudInfo" class="form-control" value="<?php echo $TilbudInfo; ?>" placeholder="Indtast info" style="height:100px;">
</div>

	<div class="form-group">
		<?php 
		if ($update == true):
		 ?>
		 <button type="submit" name="opdater" class="btn btn-info" >Rediger</button>
		 <?php else: ?>
	<button type="submit" name="gem" class="btn btn-primary" >Gem</button>
<?php endif; ?>
</div>
</form></div></div>
