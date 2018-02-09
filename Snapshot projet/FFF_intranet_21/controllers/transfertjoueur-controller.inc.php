	<?php
	//ici on gere le formulaire de transfert d'un joueur à une autre equipe
		if (isset($_POST['modifjoueurclub']) AND $_POST['modifjoueurclub']=='Faire le changement')
	{
		$jchang = $_SESSION['joueuramodif'];
		$cchang = $_POST['clubint'];
		$pdo->modifclubjoueur($jchang, $cchang);
		$_SESSION['etat'] = 'crea';
		echo"<script>document.location.href='index.php';</script>";
	}