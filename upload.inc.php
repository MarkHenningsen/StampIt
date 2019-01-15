<?php 


//Forbindelse til database
$mysqli = new mysqli('localhost', 'root', '', 'db_stampit') or die(mysqli_error($mysqli));

//Sæt default values for data til at være tomme, hvis rediger ikke er trykket
$TilbudFirma = '';
$TilbudBillede = '';
$TilbudInfo = '';
$TilbudId = 0;
$update = false;

///////////////////////////////////////////////////// OPRET //////////////////////////////////////////////////

//Tjek at gem knap er trykket og opret
if (isset($_POST['gem'])) {
	$TilbudFirma = $_POST['TilbudFirma'];
	$TilbudBillede = $_POST['TilbudBillede'];
	$TilbudInfo = $_POST['TilbudInfo'];

	//tilføj til database
	$mysqli->query("INSERT INTO Tilbud (TilbudFirma, TilbudBillede, TilbudInfo) VALUES('$TilbudFirma', '$TilbudBillede', '$TilbudInfo')") or 
		die($mysqli->error);

	//Udskriv besked når fuldført
	session_start();
	$_SESSION['message'] = "Dataen er blevet gemt!";
	$_SESSION['msg_type'] = "success";

	//Send bruger tilbage til opret side
	header("location: index.php?underside=opret.php");
}

///////////////////////////////////////////////////// SLET ///////////////////////////////////////////////////

//Tjek at slet knap er trykket, og slet ud fra valgt ID.
if (isset($_GET['slet'])) {
	$TilbudId = $_GET['slet'];
	$mysqli->query("DELETE FROM Tilbud WHERE TilbudId=$TilbudId") or die($mysqli->error());

	//Udskriv besked når fuldført
	session_start();
	$_SESSION['message'] = "Dataen er blevet slettet!";
	$_SESSION['msg_type'] = "danger";

	//Send bruger tilbage til opret side
	header("location: index.php?underside=opret.php");
}

///////////////////////////////////////////////////// REDIGER /////////////////////////////////////////////////

//Tjek at rediger knap er trykket, sæt data i input felter.
if (isset($_GET['rediger'])) {
	$TilbudId = $_GET['rediger'];
	//Ændre knap til rediger
	$update = true;
	$result = $mysqli->query("SELECT * FROM Tilbud WHERE TilbudId=$TilbudId") or die($mysqli->error());
	//Tjek om ID findes
	if (count($result)==1) {
		$row = $result->fetch_array();
		$TilbudFirma = $row['TilbudFirma'];
		$TilbudBillede = $row['TilbudBillede'];
		$TilbudInfo = $row['TilbudInfo'];
	}
}


//Tjek at rediger knap er trykket, og opdater data i databasen med det nye.
if (isset($_POST['opdater'])) {
	$TilbudId = $_POST['TilbudId'];
	$TilbudFirma = $_POST['TilbudFirma'];
	$TilbudBillede = $_POST['TilbudBillede'];
	$TilbudInfo = $_POST['TilbudInfo'];

	$mysqli->query("UPDATE Tilbud SET TilbudFirma='$TilbudFirma', TilbudBillede='$TilbudBillede', TilbudInfo='$TilbudInfo' WHERE TilbudId=$TilbudId") or die($mysqli->error);

	session_start();
	$_SESSION['message'] = "Dataen er blevet opdateret!";
	$_SESSION['msg_type'] = "warning";

	header("location: index.php?underside=opret.php");
}


 ?>