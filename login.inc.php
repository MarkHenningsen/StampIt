<?php

/////////////////////////////////////////////////////////////////////// LOGIN  ////////////////////////////////////////////////////////////////////////////////

//Tjek om login knap er klikket
if (isset($_POST['login'])) {

	require 'db_connect.inc.php';

	$BrugernavnEmail = $_POST['BrugernavnEmail'];
	$LoginPassword = $_POST['LoginPassword'];

	//Tjek om felterne er tomme
	if (empty($BrugernavnEmail) || empty($LoginPassword)) {
		header("Location: index.php?underside=login.php&error=tommefelter");
		exit();
	}
	else {
		$sql = "SELECT * FROM bruger WHERE Brugernavn=? OR Email=?;";
		$stmt = mysqli_stmt_init($conn);
		//Virker database forbindelsen
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("Location: index.php?underside=login.php&error=sqlfejl");
			exit();
		}
		else{
			mysqli_stmt_bind_param($stmt, "ss", $BrugernavnEmail, $BrugernavnEmail);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			//Tjek om vi fik resultat fra database
			if ($row = mysqli_fetch_assoc($result)) {
				//Hash password for at tjekke om de matcher
				$tjekPassword = password_verify($LoginPassword, $row['Password']);
				if ($tjekPassword == false) {
					header("Location: index.php?underside=login.php&error=forkertpassword");
					exit();
				}
				//Log ind success, starter en session
				elseif ($tjekPassword == true) {
					session_start();
					$_SESSION['brugerId'] = $row['BrugerId'];
					$_SESSION['brugerNavn'] = $row['Brugernavn'];

					header("Location: index.php?underside=profile.php");
					exit();
				}
				//Hvis den hverken er true eller false
				else{
					header("Location: index.php?underside=login.php&error=forkertpassword");
					exit();
				}
			}
			//Hvis vi ikke fik data
			else{
				header("Location: index.php?underside=login.php&error=ingenbruger");
				exit();
			}
		}
	}

}
else{
	header("Location: index.php?underside=login.php");
	exit();
}
 ?>