<?php
if (isset($_POST['go']) AND $_POST['go']=='Deconnexion')
	{
		$_SESSION['etat'] = '';
		echo"<script>document.location.href='connexion.php';</script>";
		//$_POST['hello'] ='';
	}
	if (isset($_POST['envoyer']) AND $_POST['envoyer']=='Voir les Joueurs de Votre Ligue')
	{
		AffichJoueurs();
	}
$dashboard = array();

?>