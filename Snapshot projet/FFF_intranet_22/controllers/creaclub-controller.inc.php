<?php
//ici les differntes tests permettent de rediriger l'utilisateur vers la bonne page
//page de déconnexion
	//Ici on gere le formulaire de creation des clubs
	if (isset($_POST['creeClub']) AND $_POST['creeClub']=='Crée le Club')
	{
		$cnom = $_POST['nomClub'];
		$cville = $_POST['villeClub'];
		$cpays = $_POST['paysClub'];
		$pdo->CreaClub($cnom, $cville, $cpays);
		echo"<script>document.location.href='index.php';</script>";

	}
	//ici on gere le formulaire de suppresiion d'un club.
	if (isset($_POST['suppClub']) AND $_POST['suppClub']=='Supprimer le Club')
	{	

	}
	//enfin ici on gere les differents boutons sur le tableau qui permettent de modifier un club
	$compteur = 0;
	for($compteur = 0 ; $compteur != sizeof($_SESSION['tabclub']) ; $compteur++){
	if (isset($_POST['modfier'.$compteur]) AND $_POST['modfier'.$compteur]=='Modifier')
	{
		$_SESSION['etat'] = 'clubmodif';
		print_r($_SESSION['tabclub'] );
		echo"<script>document.location.href='index.php';</script>";
		$_SESSION['clubamodif'] = $_SESSION['tabclub'][$compteur];
	}
	if (isset($_POST['supprimer'.$compteur]) AND $_POST['supprimer'.$compteur]=='Supprimer')
	{
		$_SESSION['clubamodif'] = $_SESSION['tabclub'][$compteur];
		$csupp = $_SESSION['clubamodif'];
		$pdo->SuppClub($csupp);
		echo"<script>document.location.href='index.php';</script>";
		
	}
}