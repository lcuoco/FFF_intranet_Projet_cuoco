<!--
Fichier modificationJoueur-view.inc.php  qui contient la vue de modification des joueurs et localisé dans le dossier views
de FFF_intranet

Cette vue permet nottement de modifier un joueur deja existant dans la base
-->
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="connexion-index.css">
		<link rel="icon" type="image/png" href="./images/balle.png" />
		<title> Portail de Gestion de la FFF </title>
	</head>
	<body>
		<div class = "container">
			<div class="row">
				<form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES); ?>" method="post">
            	<button type="submit" class="btn btn-danger" name="retour" value="Retourner" style='margin-bottom: 10px; margin-left: 10px;'><span class="glyphicon glyphicon-circle-arrow-left"></span> Retour</button></form>
					<div class="col-lg-offset-4 col-lg-4 well well-sm col-lg-offset-4">
						<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES); ?>" method="post">
						<!-- formulaire de modification  d'un joueur -->
							<table class =' tablecent table-borderless table-condensed table-hover'>
								<?php
								$i =0;
					        	$resultataff=$pdo->getInfojoueur($_SESSION['joueuramodif']);
					        	$resultacateg=$pdo->getCategJoueur($_SESSION['joueuramodif']);
					        	$nomcateg=$pdo->getNomCateg($resultataff['IDCATEGORIE']);
					        	$lescateg=$pdo->getCategDeroulante($resultataff['IDCATEGORIE']);
					        	$nbcateg=$pdo->getNbCategDeroulante($resultataff['IDCATEGORIE']);
					        	?>
					       		<div class ='text-center'><div class ='well well-sm back'><h5>Modification</h5></div></div>
									<tr>
										<td>Nom : </td>
										<td><input type = 'text' name='mnomJoueur' value ="<?php echo $resultataff['NOMJOUEUR'];?>" > </td>
									</tr>
									<tr>
										<td>Prénom : </td>
										<td><input type = 'text' name='mprenomJoueur' value ="<?php echo $resultataff['PRENOMJOUEUR'];?>" ></td>
									</tr>
									<tr>
										<td>Catégorie : </td>
										<td><select name='mcategJoueur' id ='mcategJoueur' >
												<option value ="<?php echo $resultaff['IDCATEGORIE'];?>"> <?php echo $nomcateg; ?></option>
												<?php
												
						        				while($i != $nbcateg){?>
						       					<option value="<?php echo $lescateg[$i]['IDCATEGORIE']; ?>"> <?php echo $lescateg[$i]['nomCategorie']; ?></option>
						       					<?php $i++; }?>
										</td>
									</tr>
									<tr>
										<td>Adresse : </td>
										<td><input type = 'text' name='madresseJoueur' value ="<?php echo $resultataff['ADRESSEJOUEUR'];?>"></td>
									</tr>
									<tr>
										<td>Code Postal : </td>
										<td><input type = 'text' name='mcpJoueur' value ="<?php echo $resultataff['CPJOUEUR'];?>"></td>
									</tr>
									<tr>
										<td>Ville : </td>
										<td><input type = 'text' name='mvilleJoueur' value ="<?php echo $resultataff['VILLEJOUEUR'];?> "></td>
									</tr>
									<tr>
										<td>Pays : </td>
										<td><input type = 'text' name='mpaysJoueur' value ="<?php echo $resultataff['PAYSJOUEUR'];?>"></td>
									</tr>
									<tr>
										<td>Email : </td>
										<td><input type = 'text' name='memailJoueur' value ="<?php echo $resultataff['EMAILJOUEUR'];?>"></td>
									</tr>
									<tr>
										<td>Telephone : </td>
										<td><input type = 'text' name='mtelephoneJoueur' value ="<?php echo $resultataff['TELEPHONEJOUEUR'];?>"></td>
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
