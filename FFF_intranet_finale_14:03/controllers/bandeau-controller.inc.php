<?php
/**
*le fichier bandeau-controller.inc.php localisé dans le dossier controller permet de gérer les actions effectué par l'utilisateur en utilisant les boutons du bandeau 
*
*ici les differents tests permettent de rediriger l'utilisateur vers la bonne page
*/

/**
* Retour au menu principal
*/
	if (isset($_POST['envoyer']) AND $_POST['envoyer']=='Menu Principal')
	{
		$_SESSION['action'] = '';
		echo"<script>document.location.href='index.php';</script>";
	}

//Deconnexion
	if (isset($_POST['go']) AND $_POST['go']=='Deconnexion')
	{
		$_SESSION['etat'] = '';
		echo"<script>document.location.href='index.php';</script>";
	}

//Page de gestion des joueurs
	if (isset($_POST['crée']) AND $_POST['crée']=='Gerer les joueurs')
	{
		$_SESSION['action'] = 'crea';
		echo"<script>document.location.href='index.php';</script>";
	}

//Page de création des clubs
	if (isset($_POST['créeclub']) AND $_POST['créeclub']=='Gerer les Clubs')
	{
		$_SESSION['action'] = 'creaclub';
		echo"<script>document.location.href='index.php';</script>";
	}

//Les boutosn de retours en arrières
		if (isset($_POST['retour']) AND $_POST['retour']=='Retourner')
	{
		$_SESSION['action'] = 'crea';
		echo"<script>document.location.href='index.php';</script>";
	}
	if (isset($_POST['retourc']) AND $_POST['retourc']=='Retourner')
	{
		$_SESSION['action'] = 'creaclub';
		echo"<script>document.location.href='index.php';</script>";
	}

?>