<?php 

//////////////////////////////////////////////////////////////////////////// OPRET BRUGER /////////////////////////////////////////////////////////////////

//Tjek om submit knappen er trykket, og hvis den er opret bruger i database
if (isset($_POST['submit'])) {

	//Henter forbindelse til database
	require 'db_connect.inc.php';

	$Navn = $_POST['Navn'];
	$Email = $_POST['Email'];
	$Brugernavn = $_POST['Brugernavn'];
	$Password = $_POST['Password'];
	$PasswordGentag = $_POST['PasswordGentag'];


/////////////////////////////////////////////////////////////////////// FEJL TJEKKER /////////////////////////////////////////////////////////////////
	//Tjek hvis felter ikke er udfyldt
	if (empty($Navn) || empty($Email) || empty($Brugernavn) || empty($Password) || empty($PasswordGentag)) {
		//Send tilbage med udfyldte data, undtagen password (for sikkerhed)
		header("Location: index.php?underside=profile.php&error=tommefelter&Navn=".$Navn."&Email=".$Email."&Brugernavn=".$Brugernavn);
		exit();
	}
	//Tjek hvis både mail og brugernavn er forkert
	elseif (!filter_var($Email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $Brugernavn)) {
		//Send tilbage med kun med navn udfylft, da resten er forkert
		header("Location: index.php?underside=profile.php&error=forkertmailbrugernavn&Navn=".$Navn);
		exit();
	}
	//Tjek hvis det er en rigtig email
	elseif (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
		//Send tilbage med udfyldte data, undtagen password (for sikkerhed) og email
		header("Location: index.php?underside=profile.php&error=forkertmail&Navn=".$Navn."&Brugernavn=".$Brugernavn);
		exit();
	}
	//Tjek hvis det er et rigtigt brugernavn
	elseif (!preg_match("/^[a-zA-Z0-9]*$/", $Brugernavn)) {
		//Send tilbage med udfyldte data, undtagen password (for sikkerhed) og brugernavn
		header("Location: index.php?underside=profile.php&error=forkertbrugernavn&Navn=".$Navn."&Email=".$Email);
		exit();
	}
	//Tjek om de to passwords matcher hinanden
	elseif ($Password !== $PasswordGentag) {
		//Send tilbage med udfyldte data
		header("Location: index.php?underside=profile.php&error=passwordfejl&Navn=".$Navn."&Email=".$Email."&Brugernavn=".$Brugernavn);
		exit();
	}
	//Tjek hvis brugernavn er taget
	else {
		$sql = "SELECT Brugernavn FROM Bruger WHERE Brugernavn=?";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			//Send tilbage hvis sql fejler
			header("Location: index.php?underside=profile.php&error=sqlfejl");
			exit();
		}
		else{
			mysqli_stmt_bind_param($stmt, "s", $Brugernavn);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultCheck = mysqli_stmt_num_rows($stmt);
			if ($resultCheck > 0) {
				//Send tilbage med udfyldt data undtagen brugernavn
				header("Location: index.php?underside=profile.php&error=brugernavntaget&Navn=".$Navn."&Email=".$Email);
				exit();
			}
/////////////////////////////////////////////////////////////// FEJL SLUT ///////////////////////////////////////////////////////////////////////////
			else{
				//Opret bruger til database med placeholder values for sikkerhed. Rolle er sat til at være Bruger som standard.
				$sql = "INSERT INTO Bruger (Navn, Brugernavn, Email, Password, FK_RolleId) VALUES (?, ?, ?, ?, 2)";
				$stmt = mysqli_stmt_init($conn);
				if (!mysqli_stmt_prepare($stmt, $sql)) {
				//Send tilbage hvis sql fejler
				header("Location: index.php?underside=profile.php&error=sqlfejl");
				exit();
				}
				else {
					//Hash password for kryptering og sikkerhed med bcrypt
					$hashPassword = password_hash($Password, PASSWORD_DEFAULT);


					mysqli_stmt_bind_param($stmt, "ssss", $Navn, $Brugernavn, $Email, $hashPassword);
					mysqli_stmt_execute($stmt);

					header("Location: index.php?underside=profile.php&opret=success");
					exit();
				}
			}
		}
	}
}

//Hvis der er prøvet at oprette uden at bruge formen.
else{
	header("Location: index.php?underside=profile.php");
	exit();
}

///////////////////////////////////////////////////////////////// OPRET BRUGER SLUT ///////////////////////////////////////////////////////////////////////////

?>