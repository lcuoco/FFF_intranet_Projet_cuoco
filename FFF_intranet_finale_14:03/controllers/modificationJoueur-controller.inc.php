<?php
/**
*Le fichier modificationJoueur-controller.inc.php permet de gérer le formulaire de modification d'un joueur 
*
*Il permet de traiter les données entrés dans le formulaire
*/
	//Ici on gere le formulaire dmodification d'un joueur.
	if (isset($_POST['modifJoueur']) AND $_POST['modifJoueur']=='Modifier le joueur')
	{
		//On recupere tous lec champs dans des variables 
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

		//On fait ensuite appel au modele pour modifier le joueur
		$pdo->ModifJoueur($jmodif, $mjcateg, $mjnom, $mjprenom, $mjadresse, $mjcp, $mjville, $mjpays, $mjemail, $mjtelephone);

		//enfin on force le retour à la page précédente
		echo"<script>document.location.href='index.php';</script>";
		$_SESSION['action'] = 'crea';
	}