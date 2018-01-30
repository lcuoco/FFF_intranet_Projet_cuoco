<?php
//ici les differntes tests permettent de rediriger l'utilisateur vers la bonne page
//page de déconnexion

	//ici on gere l'affichage d l'historique de transfert d'un joueuer

	if (isset($_POST['creationj']) AND $_POST['creationj']=='Crée un joueur')
	{	
		$_SESSION['etat'] = 'joueurhisto';
		echo"<script>document.location.href='index.php';</script>";

	}
	//Ici on gere les boutons permmetant de modifier un joueru donné
	$compteur = 0;
	for($compteur = 0 ; $compteur != sizeof($_SESSION['tab']) ; $compteur++){
	if (isset($_POST['modfier'.$compteur]) AND $_POST['modfier'.$compteur]=='Modifier')
	{
		$_SESSION['etat'] = 'joueurmodif';
		echo"<script>document.location.href='index.php';</script>";
		$_SESSION['joueuramodif'] = $_SESSION['tab'][$compteur];


	}
	if (isset($_POST['transferer'.$compteur]) AND $_POST['transferer'.$compteur]=='Transferer')
	{
		$_SESSION['etat'] = 'transfertjoueur';
		echo"<script>document.location.href='index.php';</script>";
		$_SESSION['joueuramodif'] = $_SESSION['tab'][$compteur];


	}
	if (isset($_POST['historique'.$compteur]) AND $_POST['historique'.$compteur]=='Historique')
	{
		$_SESSION['joueuramodif'] = $_SESSION['tab'][$compteur];
		$_SESSION['ok'] = 1;
		$jhisto = $_SESSION['joueuramodif'];
		$pdo->AffichHisto($jhisto);
		echo"<script>document.location.href='index.php';</script>";
		


	}
}


?>