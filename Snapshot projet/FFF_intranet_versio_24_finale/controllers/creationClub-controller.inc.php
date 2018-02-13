<?php
/**
*le fichier club-controller.inc.php est localisé dans le dossier controller et permet de réaliser des actions sur les clubs
*
*Il permet entre autre, la création, la modification et la suppression d'un club
*/


	//Ici on gere le formulaire de creation des clubs
	if (isset($_POST['creeClub']) AND $_POST['creeClub']=='Crée le Club')
	{
		//On récupere les valeur des champs dans des variables
		$cnom = $_POST['nomClub'];
		$cville = $_POST['villeClub'];
		$cpays = $_POST['paysClub'];

		//On fait ensuite appel au modele pour crée un nouveau club
		$pdo->CreaClub($cnom, $cville, $cpays);
		echo"<script>document.location.href='index.php';</script>";

	}
	

	//enfin ici on gere les differents boutons sur le tableau qui permettent de modifier un club
	//le compteur permet ici d'identifier le club concerné par les modifications demandés
	$compteur = 0;
	for($compteur = 0 ; $compteur != sizeof($_SESSION['tabclub']) ; $compteur++){
	if (isset($_POST['modfier'.$compteur]) AND $_POST['modfier'.$compteur]=='Modifier')
	{
		//On redirigie l'utilisateur vers la page de modification des clubs
		$_SESSION['action'] = 'clubmodif';
		echo"<script>document.location.href='index.php';</script>";
		//On mémorise le joueur choisi
		$_SESSION['clubamodif'] = $_SESSION['tabclub'][$compteur];
	}

	//ici on gere le formulaire de suppresiion d'un club.
	if (isset($_POST['supprimer'.$compteur]) AND $_POST['supprimer'.$compteur]=='Supprimer')
	{
		//On mémorise le joueur choisi
		$_SESSION['clubamodif'] = $_SESSION['tabclub'][$compteur];
		$csupp = $_SESSION['clubamodif'];
		//On fait appel au modeleafin de supprimer le club
		$pdo->SuppClub($csupp);
		echo"<script>document.location.href='index.php';</script>";
		
	}
}