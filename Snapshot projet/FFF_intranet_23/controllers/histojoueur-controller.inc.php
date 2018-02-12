<?php
	// Ici on gere le formulaire de creation d'un nouveau joueur
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
		$pdo->CreaJoueurs($jcateg, $jnom, $jprenom, $jadresse, $jcp, $jville, $jpays, $jemail, $jtelephone, $jclub);
		$_SESSION['etat'] = 'crea';
		echo"<script>document.location.href='index.php';</script>";

	}
