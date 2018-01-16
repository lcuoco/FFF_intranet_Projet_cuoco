<?php
//ici les differntes tests permettent de rediriger l'utilisateur vers la bonne page
//page de déconnexion
if (isset($_POST['go']) AND $_POST['go']=='Deconnexion')
	{
		$_SESSION['etat'] = '';
		echo"<script>document.location.href='index.php';</script>";
	}
	//page d'acceuil
	if (isset($_POST['envoyer']) AND $_POST['envoyer']=='Retourner au menu Principal')
	{
		$_SESSION['etat'] = 'co';
		echo"<script>document.location.href='index.php';</script>";
	}
	//page de gestion des joueurs
	if (isset($_POST['crée']) AND $_POST['crée']=='Gerer les joueurs')
	{
		$_SESSION['etat'] = 'crea';
		echo"<script>document.location.href='index.php';</script>";
	}
	//Ici on gere le formulaire de creation des clubs
	if (isset($_POST['creeClub']) AND $_POST['creeClub']=='Crée le Club')
	{
		$cnom = $_POST['nomClub'];
		$cville = $_POST['villeClub'];
		$cpays = $_POST['paysClub'];
		CreaClub($cnom, $cville, $cpays);
		echo"<script>document.location.href='index.php';</script>";

	}
	//ici on gere le formulaire de suppresiion d'un club.
	if (isset($_POST['suppClub']) AND $_POST['suppClub']=='Supprimer le Club')
	{	
		$csupp = $_POST['clubsupp'];
		echo $csupp;
		SuppClub($csupp);
		echo"<script>document.location.href='index.php';</script>";
	}
	//enfin ici on gere les differents boutons sur le tableau qui permettent de modifier un club
	$compteur = 0;
	for($compteur = 0 ; $compteur != sizeof($_SESSION['tabclub']) ; $compteur++){
	if (isset($_POST['modfier'.$compteur]) AND $_POST['modfier'.$compteur]=='Modifier')
	{
		$_SESSION['etat'] = 'clubmodif';
		print_r($_SESSION['tabclub'] );
		echo"<script>document.location.href='index.php';</script>";
		$_SESSION['clubamodif'] = $_SESSION['tabclub'][$compteur];
	}
}