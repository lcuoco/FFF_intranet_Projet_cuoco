<?php
//ici les differntes tests permettent de rediriger l'utilisateur vers la bonne page
//page de déconnexion
if (isset($_POST['go']) AND $_POST['go']=='Deconnexion')
	{
		$_SESSION['etat'] = '';
		echo"<script>document.location.href='index.php';</script>";
	}
	//page de retour à l'acceil
	if (isset($_POST['envoyer']) AND $_POST['envoyer']=='Retourner au menu Principal')
	{
		$_SESSION['etat'] = 'co';
		echo"<script>document.location.href='index.php';</script>";
	}
	//page de creation des clubs
		if (isset($_POST['créeclub']) AND $_POST['créeclub']=='Gérer les Clubs')
	{
		$_SESSION['etat'] = 'creaclub';
		echo"<script>document.location.href='index.php';</script>";
	}
	//Ici on gere le formulaire dmodification d'un joueur.
			if (isset($_POST['modifJoueur']) AND $_POST['modifJoueur']=='Modifier le joueur')
	{
		$jmodif = $_SESSION['joueuramodif'];
		$mjnom = $_POST['mnomJoueur'];
		$mjprenom = $_POST['mprenomJoueur'];
		$mjcateg = $_POST['mcategJoueur'];
		$mjadresse = $_POST['madresseJoueur'];
		$mjcp = $_POST['mcpJoueur'];
		$mjville = $_POST['mvilleJoueur'];
		$mjpays = $_POST['mpaysJoueur'];
		$mjemail = $_POST['memailJoueur'];
		$mjtelephone = $_POST['mtelephoneJoueur'];
		$pdo->ModifJoueur($jmodif, $mjcateg, $mjnom, $mjprenom, $mjadresse, $mjcp, $mjville, $mjpays, $mjemail, $mjtelephone);
		echo"<script>document.location.href='index.php';</script>";
		$_SESSION['etat'] = 'crea';
	}