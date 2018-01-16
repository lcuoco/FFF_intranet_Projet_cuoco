<?php
cobdd();
if (isset($_POST['go']) AND $_POST['go']=='Deconnexion')
	{
		$_SESSION['etat'] = '';
		echo"<script>document.location.href='connexion.php';</script>";
	}
	AffichClubs();
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
	if (isset($_POST['modifClub']) AND $_POST['modifClub']=='Modifier le Club')
	{
		$mcmodif = $_POST['clubmodif'];
		$mcnom = $_POST['mnomClub'];
		$mcville = $_POST['mvilleClub'];
		$mcpays = $_POST['mpaysClub'];
		ModifClub($mcmodif, $mcnom, $mcville, $mcpays);
		echo"<script>document.location.href='connexion.php';</script>";
	}
$dashboard = array();

?>