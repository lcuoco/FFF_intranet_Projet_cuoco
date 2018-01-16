<?php
if (isset($_POST['go']) AND $_POST['go']=='Deconnexion')
	{
		$_SESSION['etat'] = '';
		echo"<script>document.location.href='connexion.php';</script>";
	}
	AffichJoueurs();
	if (isset($_POST['envoyer']) AND $_POST['envoyer']=='Retourner au menu Principal')
	{
		$_SESSION['etat'] = 'co';
		echo"<script>document.location.href='connexion.php';</script>";
	}
	if (isset($_POST['crée']) AND $_POST['crée']=='Crée un nouveau joueur')
	{
		$_SESSION['etat'] = 'crea';
		echo"<script>document.location.href='connexion.php';</script>";
	}
	if (isset($_POST['creeJoueur']) AND $_POST['creeJoueur']=='Crée le joueur')
	{
		$jnom = $_POST['nomJoueur'];
		$jprenom = $_POST['prenomJoueur'];
		$jcateg = $_POST['categJoueur'];
		$jadresse = $_POST['adresseJoueur'];
		$jcp = $_POST['cpJoueur'];
		$jville = $_POST['villeJoueur'];
		$jpays = $_POST['paysJoueur'];
		$jemail = $_POST['emailJoueur'];
		$jtelephone = $_POST['telephoneJoueur'];
		$jclub = $_POST['clubJoueur'];
		$jligue = $_POST['ligueJoueur'];
		CreaJoueurs($jcateg, $jnom, $jprenom, $jadresse, $jcp, $jville, $jpays, $jemail, $jtelephone, $jclub, $jligue);
		echo"<script>document.location.href='connexion.php';</script>";

	}
		if (isset($_POST['modifJoueur']) AND $_POST['modifJoueur']=='Modifier le joueur')
	{
		$jmodif = $_POST['joueurmodif'];
		$mjnom = $_POST['mnomJoueur'];
		$mjprenom = $_POST['mprenomJoueur'];
		$mjcateg = $_POST['mcategJoueur'];
		$mjadresse = $_POST['madresseJoueur'];
		$mjcp = $_POST['mcpJoueur'];
		$mjville = $_POST['mvilleJoueur'];
		$mjpays = $_POST['mpaysJoueur'];
		$mjemail = $_POST['memailJoueur'];
		$mjtelephone = $_POST['mtelephoneJoueur'];
		$mjclub = $_POST['mclubJoueur'];
		$mjligue = $_POST['mligueJoueur'];
		ModifJoueur($jmodif, $mjcateg, $mjnom, $mjprenom, $mjadresse, $mjcp, $mjville, $mjpays, $mjemail, $mjtelephone, $mjclub, $mjligue);
		echo"<script>document.location.href='connexion.php';</script>";
	}
		if (isset($_POST['créeclub']) AND $_POST['créeclub']=='Gérer les Clubs')
	{
		$_SESSION['etat'] = 'creaclub';
		echo"<script>document.location.href='connexion.php';</script>";
	}
$dashboard = array();

?>