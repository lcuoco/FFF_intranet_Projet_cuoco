<?php
	/**
	*Le fichier creationJoueur-controller.inc.php permet de gérer le formulaire de création d'un joueur 
	*
	*Il permet de traiter les données entrés dans le formulaire
	*/
	if (isset($_POST['creeJoueur']) AND $_POST['creeJoueur']=='Crée le joueur')
	{
		//On recupere tous lec champs dans des variables 
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

		//On fait ensuite appel au modele pour crée le joueur
		$pdo->CreaJoueurs($jcateg, $jnom, $jprenom, $jadresse, $jcp, $jville, $jpays, $jemail, $jtelephone, $jclub);

		//enfin on force le retour à la page précédente
		$_SESSION['action'] = 'crea';
		echo"<script>document.location.href='index.php';</script>";

	}
