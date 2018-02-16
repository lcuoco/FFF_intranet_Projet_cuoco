<?php
	/**
	*Le fichier modificationClub-controller.inc.php permet de gérer le formulaire de modification d'un club 
	*
	*Il permet de traiter les données entrés dans le formulaire
	*/
		if (isset($_POST['modifClub']) AND $_POST['modifClub']=='Modifier le Club')
	{
		//On recupere tous lec champs dans des variables 
		$mcmodif = $_SESSION['clubamodif'];
		$mcnom = $_POST['mnomClub'];
		$mcville = $_POST['mvilleClub'];
		$mcpays = $_POST['mpaysClub'];
		//On fait ensuite appel au modele pour modifier le club
		$pdo->ModifClub($mcmodif, $mcnom, $mcville, $mcpays);

		//enfin on force le retour à la page précédente
		echo"<script>document.location.href='index.php';</script>";
		$_SESSION['action'] = 'creaclub';
	}