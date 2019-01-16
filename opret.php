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
$mysqli = new mysqli('markh.dk.mysql', 'markh_dk_db_stampit', 'StampIt', 'markh_dk_db_stampit') or die(mysqli_eror($mysqli));
$result = $mysqli->query("SELECT * FROM tilbud") or die($mysqli->error);
?>



<div class="container">

	<!------------------- Tabel til oprettede tilbud, samt rediger og slet ------------------->
	<div class="row">
		<div class="limiter">
			<div class="container-table100">
				<div class="wrap-table100">
					<div class="table100">
						<table >
							<thead>

								<tr class="table100-head">
									<th class="column1">Firma</th>
									<th class="column2">Billede</th>
									<th class="column3">Info</th>
									<th colspan="2"></th>
								</tr>
							</thead>
							<!-- While loop til at printe alt fra databasen -->
							<?php 
							while ($row = $result->fetch_assoc()):
								?>
								<tr>
									<td class="column1"><?php echo $row['TilbudFirma']; ?></td>
									<td class="column2"><?php echo $row['TilbudBillede']; ?></td>
									<td class="column3"><?php echo $row['TilbudInfo']; ?></td>
									<td class="column4">
										<a href="index.php?underside=opret.php&rediger=<?php echo $row['TilbudId']; ?>" class="btn btn-info">Rediger</a>
										<a href="upload.inc.php?slet=<?php echo $row['TilbudId']; ?>" class="btn btn-danger">Slet</a>
									</td>
								</tr>
							<?php endwhile; ?>
						</table>
					</div>
				</div>
			</div>
		</div>


		<?php
		function pre_r($array){
			echo '<pre>';
			print_r($array);
			echo '</pre>';
		}
		?>

		<!--------------------------- OPRET OG REDIGER FORM --------------------------------------->
		<div class="container">
			<form action="upload.inc.php" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="TilbudId" value="<?php echo $TilbudId; ?>">

					<div class="form-group">
						<label for="TilbudFirma"><span style="font-weight: bold;">Firma</span></label>
					<input type="text" name="TilbudFirma" class="form-control" value="<?php echo $TilbudFirma; ?>" placeholder="Indtast firmanavn">
				</div>

				<div class="form-group">
					<label for="TilbudBillede"><span style="font-weight: bold;">Billede</span></label><br>
					<input type="text" name="TilbudBillede" class="form-control" value="<?php echo $TilbudBillede; ?>" id="TilbudBillede" placeholder="Indtast billedesti"></div>
					<div class="form-group">
						<label for="TilbudInfo"><span style="font-weight: bold;">Info</span></label>
						<input type="text" name="TilbudInfo" class="form-control" value="<?php echo $TilbudInfo; ?>" placeholder="Indtast info" style="padding-bottom:100px;">
					</div>

					<div class="form-group">
						<?php 
						if ($update == true):
							?>
							<button type="submit" name="opdater" class="btn btn-info" style="margin-bottom: 70px;" >Rediger</button>
							<?php else: ?>
								<button type="submit" name="gem" class="btn btn-primary" style="margin-bottom: 60px" >Gem</button>
							<?php endif; ?>
						</div>
					</form></div></div>
