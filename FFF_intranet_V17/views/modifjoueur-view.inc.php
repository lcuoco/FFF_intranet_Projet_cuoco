<html>
	<head>
		<link rel="stylesheet" type="text/css" href="connexion-index.css">
		<link rel="icon" type="image/png" href="balle.png" />
		<title> Portail de Gestion de la FFF </title>
	</head>
	<body><div class = "container">
		<div class="row">
			<div class="col-lg-offset-4 col-lg-4 well well-sm col-lg-offset-4">
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES); ?>" method="post">
		<!-- formulaire de modification  d'un joueur -->
		<table class =' tablecent table-borderless table-condensed table-hover'>
			<?php
			try
        	{   
            	$bdd = new PDO('mysql:host='.$_SESSION['host'].';dbname='.$_SESSION['db'].'',''.$_SESSION['user'].'',''.$_SESSION['mdp'].'');
        	}
        	catch (Exception $e)
        	{
            	die('Erreur : ' . $e->getMessage());
        	}
        	$resultataff=$bdd->query('SELECT * FROM JOUEUR WHERE IDJOUEUR ="'.(int)$_SESSION['joueuramodif'].'"');
        	$affmodif = $resultataff->fetch();
        	$repcat = $bdd->query('SELECT * FROM CATEGORIE WHERE IDCATEGORIE = "'.$affmodif['IDCATEGORIE'].'"');
            $afficatnom = $repcat->fetch();
        	?>
       		<div class ='text-center'><div class ='well well-sm back'><h5>Modification</h5></div></div>
			<tr>
				<td>Nom : </td>
				<td><input type = 'text' name='mnomJoueur' value ="<?php echo $affmodif['NOMJOUEUR'];?>" > </td>
			</tr>
			<tr>
				<td>Prénom : </td>
				<td><input type = 'text' name='mprenomJoueur' value ="<?php echo $affmodif['PRENOMJOUEUR'];?>" ></td>
			</tr>
			<tr>
				<td>Catégorie : </td>
				<td><select name='mcategJoueur' id ='mcategJoueur' >
						<option value ="<?php echo $affmodif['IDCATEGORIE'];?>"> <?php echo $afficatnom['nomCategorie']; ?></option>
						<?php
						$resultats=$bdd->query('SELECT * FROM CATEGORIE');
        				while($reponse = $resultats->fetch()){?>
       					<option value="<?php echo $reponse['IDCATEGORIE']; ?>"> <?php echo $reponse['nomCategorie']; ?></option>
       					<?php }?>
				</td>
			</tr>
			<tr>
				<td>Adresse : </td>
				<td><input type = 'text' name='madresseJoueur' value ="<?php echo $affmodif['ADRESSEJOUEUR'];?>"></td>
			</tr>
			<tr>
				<td>Code Postal : </td>
				<td><input type = 'text' name='mcpJoueur' value ="<?php echo $affmodif['CPJOUEUR'];?>"></td>
			</tr>
			<tr>
				<td>Ville : </td>
				<td><input type = 'text' name='mvilleJoueur' value ="<?php echo $affmodif['VILLEJOUEUR'];?> "></td>
			</tr>
			<tr>
				<td>Pays : </td>
				<td><input type = 'text' name='mpaysJoueur' value ="<?php echo $affmodif['PAYSJOUEUR'];?>"></td>
			</tr>
			<tr>
				<td>Email : </td>
				<td><input type = 'text' name='memailJoueur' value ="<?php echo $affmodif['EMAILJOUEUR'];?>"></td>
			</tr>
			<tr>
				<td>Telephone : </td>
				<td><input type = 'text' name='mtelephoneJoueur' value ="<?php echo $affmodif['TELEPHONEJOUEUR'];?>"></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td><button type='submit' name='modifJoueur' value='Modifier le joueur' class='centreb btn btn-default'><span class="glyphicon glyphicon-edit"> </span> Modifier le joueur</button> </td>
			</tr>
		</table>
		</form>
	</body>
</html>
