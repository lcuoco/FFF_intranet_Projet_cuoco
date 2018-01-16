<?php
if (isset($_POST['go']) AND $_POST['go']=='Deconnexion')
	{
		$_SESSION['etat'] = '';
		echo"<script>document.location.href='connexion.php';</script>";
	}
	if (isset($_POST['envoyer']) AND $_POST['envoyer']=='Retourner au menu Principal')
	{
		$_SESSION['etat'] = 'co';
		echo"<script>document.location.href='connexion.php';</script>";
	}
	if (isset($_POST['crée']) AND $_POST['crée']=='Gerer les joueurs')
	{
		$_SESSION['etat'] = 'crea';
		echo"<script>document.location.href='connexion.php';</script>";
	}
		if (isset($_POST['creeClub']) AND $_POST['creeClub']=='Crée le Club')
	{
		$cnom = $_POST['nomClub'];
		$cville = $_POST['villeClub'];
		$cpays = $_POST['paysClub'];
		CreaClub($cnom, $cville, $cpays);
		echo"<script>document.location.href='connexion.php';</script>";

	}
	if (isset($_POST['suppClub']) AND $_POST['suppClub']=='Supprimer le Club')
	{	
		$csupp = $_POST['clubsupp'];
		echo $csupp;
		SuppClub($csupp);
		echo"<script>document.location.href='connexion.php';</script>";
	}
	$compteur = 0;
	for($compteur = 0 ; $compteur != sizeof($_SESSION['tabclub']) ; $compteur++){
	if (isset($_POST['modfier'.$compteur]) AND $_POST['modfier'.$compteur]=='Modifier')
	{
		$_SESSION['etat'] = 'clubmodif';
		print_r($_SESSION['tabclub'] );
		echo"<script>document.location.href='connexion.php';</script>";
		echo $_SESSION['tabclub'][$compteur];
		$_SESSION['clubamodif'] = $_SESSION['tabclub'][$compteur];
	}
}