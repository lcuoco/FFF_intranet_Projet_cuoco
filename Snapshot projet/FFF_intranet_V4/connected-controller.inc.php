<?php
if (isset($_POST['go']) AND $_POST['go']=='Deconnexion')
	{
		$_SESSION['etat'] = '';
		echo"<script>document.location.href='connexion.php';</script>";
	}
	if (isset($_POST['crée']) AND $_POST['crée']=='Gerer les joueurs')
	{
		$_SESSION['etat'] = 'crea';
		echo"<script>document.location.href='connexion.php';</script>";
		
	}
	if (isset($_POST['créeclub']) AND $_POST['créeclub']=='Gerer les Clubs')
	{
		$_SESSION['etat'] = 'creaclub';
		echo"<script>document.location.href='connexion.php';</script>";
	}
$dashboard = array();

?>