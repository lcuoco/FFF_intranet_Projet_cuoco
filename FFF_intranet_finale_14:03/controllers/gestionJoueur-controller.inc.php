<?php
/**
*Le fichier creationJoueur-controller.inc.php permet de gérer le formulaire de création d'un joueur 
*
*Il permet de traiter les données entrés dans le formulaire
*/

	//ici on gere l'affichage d l'historique de transfert d'un joueuer

	if (isset($_POST['creationj']) AND $_POST['creationj']=='Crée un joueur')
	{	
		$_SESSION['action'] = 'joueurhisto';
		echo"<script>document.location.href='index.php';</script>";

	}
	//Ici on gere les boutons permmetant de modifier un joueur donné
	$compteur = 0;
	for($compteur = 0 ; $compteur != sizeof($_SESSION['tab']) ; $compteur++){
	if (isset($_POST['modfier'.$compteur]) AND $_POST['modfier'.$compteur]=='Modifier')
	{
		//Ici on redirige l'utilisateur vers une page contenat un formulaire de modification d'un joueur
		$_SESSION['action'] = 'joueurmodif';
		echo"<script>document.location.href='index.php';</script>";
		// Ici on enrgistre le joueur choisis dans une variable de session 
		$_SESSION['joueuramodif'] = $_SESSION['tab'][$compteur];


	}
	if (isset($_POST['transferer'.$compteur]) AND $_POST['transferer'.$compteur]=='Transferer')
	{
		//Ici on redirige l'utilisateur vers une page contenat un formulaire de transfert d'un joueur
		$_SESSION['action'] = 'transfertjoueur';
		echo"<script>document.location.href='index.php';</script>";
		// Ici on enrgistre le joueur choisis dans une variable de session 
		$_SESSION['joueuramodif'] = $_SESSION['tab'][$compteur];


	}
	if (isset($_POST['historique'.$compteur]) AND $_POST['historique'.$compteur]=='Historique')
	{
		$_SESSION['action'] = 'histo';
		// Ici on enrgistre le joueur choisis dans une variable de session 
		$_SESSION['joueuramodif'] = $_SESSION['tab'][$compteur];
		//Ici on fait appel au modele pour afficher l'historique du joueur séléctionné
		$pdo->AffichHisto($jhisto);
		echo"<script>document.location.href='index.php';</script>";
		


	}
}


?>