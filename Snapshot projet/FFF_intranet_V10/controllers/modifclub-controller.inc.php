<?php
//ici les differntes tests permettent de rediriger l'utilisateur vers la bonne page
//page de déconnexion
if (isset($_POST['go']) AND $_POST['go']=='Deconnexion')
	{
		$_SESSION['etat'] = '';
		echo"<script>document.location.href='connexion.php';</script>";
	}
	//page de retour au menu Principal
	if (isset($_POST['envoyer']) AND $_POST['envoyer']=='Retourner au menu Principal')
	{
		$_SESSION['etat'] = 'co';
		echo"<script>document.location.href='connexion.php';</script>";
	}
	// page de la creation des joueurs
	if (isset($_POST['crée']) AND $_POST['crée']=='Gerer les joueurs')
	{
		$_SESSION['etat'] = 'crea';
		echo"<script>document.location.href='connexion.php';</script>";
	}
	// ici on gere le formulaire de la modification des clubs 
		if (isset($_POST['modifClub']) AND $_POST['modifClub']=='Modifier le Club')
	{
		$mcmodif = $_SESSION['clubamodif'];
		$mcnom = $_POST['mnomClub'];
		$mcville = $_POST['mvilleClub'];
		$mcpays = $_POST['mpaysClub'];
		ModifClub($mcmodif, $mcnom, $mcville, $mcpays);
		echo"<script>document.location.href='connexion.php';</script>";
		$_SESSION['etat'] = 'creaclub';
	}