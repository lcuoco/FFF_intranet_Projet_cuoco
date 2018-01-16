<?php
//ici les differntes tests permettent de rediriger l'utilisateur vers la bonne page
//page de déconnexion
	if (isset($_POST['go']) AND $_POST['go']=='Deconnexion')
	{
		$_SESSION['etat'] = '';
		echo"<script>document.location.href='index.php';</script>";
	}
//page de gestion des joueurs
	if (isset($_POST['crée']) AND $_POST['crée']=='Gerer les joueurs')
	{
		$_SESSION['etat'] = 'crea';
		echo"<script>document.location.href='index.php';</script>";
		
	}
//page de création des clubs
	if (isset($_POST['créeclub']) AND $_POST['créeclub']=='Gerer les Clubs')
	{
		$_SESSION['etat'] = 'creaclub';
		echo"<script>document.location.href='index.php';</script>";
	}

?>