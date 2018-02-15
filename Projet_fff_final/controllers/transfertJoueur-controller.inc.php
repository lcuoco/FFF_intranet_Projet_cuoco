	<?php
	/**
*Le fichier transfertJoueur-controller.inc.php permet de gérer lees tranferts de joueurs vers une autre équipe
*
*Il permet de traiter les données entrés dans le formulaire
*/
		if (isset($_POST['modifjoueurclub']) AND $_POST['modifjoueurclub']=='Faire le changement')
	{
		$jchang = $_SESSION['joueuramodif'];
		$cchang = $_POST['clubint'];
		//On appel le modele pour effectuer le transfert en fonction des informations entrées
		$pdo->modifclubjoueur($jchang, $cchang);
		// puis on redirige l'utilisateur vers la page précedente
		$_SESSION['action'] = 'crea';
		echo"<script>document.location.href='index.php';</script>";
	}