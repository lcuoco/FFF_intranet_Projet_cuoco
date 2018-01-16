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
		CreaJoueurs($jcateg, $jnom, $jprenom, $jadresse, $jcp, $jville, $jpays, $jemail, $jtelephone, $jclub);
		echo"<script>document.location.href='connexion.php';</script>";

	}
		if (isset($_POST['modifjoueurclub']) AND $_POST['modifjoueurclub']=='Faire le changement')
	{
		$jchang = $_POST['joueurmodifclub'];
		$cchang = $_POST['clubint'];
		modifclubjoueur($jchang, $cchang);
		echo"<script>document.location.href='connexion.php';</script>";
	}

	if (isset($_POST['affichhisto']) AND $_POST['affichhisto']=='Afficher historique du joueur')
	{
		$jhisto = $_POST['joueurhisto'];
		AffichHisto($jhisto);
	}
		if (isset($_POST['créeclub']) AND $_POST['créeclub']=='Gérer les Clubs')
	{
		$_SESSION['etat'] = 'creaclub';
		echo"<script>document.location.href='connexion.php';</script>";
	}
	$compteur = 0;
	for($compteur = 0 ; $compteur != sizeof($_SESSION['tab']) ; $compteur++){
	if (isset($_POST['modfier'.$compteur]) AND $_POST['modfier'.$compteur]=='Modifier')
	{
		$_SESSION['etat'] = 'joueurmodif';
		echo"<script>document.location.href='connexion.php';</script>";
		echo $_SESSION['tab'][$compteur];
		$_SESSION['joueuramodif'] = $_SESSION['tab'][$compteur];


	}
}
$dashboard = array();

?>