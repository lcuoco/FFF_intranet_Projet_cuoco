<!--
Fichier creationClub-view.inc.php qui contient la vue de création des clubs et localisé dans le dossier views
de FFF_intranet

Cette vue permet notement de créer un clubs  dans la base
--> 
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="connexion-index.css">
		<link rel="icon" type="image/png" href="./images/balle.png" />
		<title>Portail de Gestion de la FFF</title>
	</head>
	<body>
			<div class ="fluid-container">
			 <div class="row">
  				<div class="col-lg-offset-1 col-lg-5">
  					<div class =" well well-sm" style ="margin-left: 10px;">
     					<form method='post'>
				            <div class ='text-center'><div class ='well well-sm back'><h5>Liste des Clubs</h5></div></div><div class ='tableov'></small></h5><table class = 'tableov table table-bordered table-striped table-hover hiddens' style ='width:100%;'>
					            <tr class ='text-center'>
					            <tr class = 'tablejoueurc'>
					            <th class = 'tablejoueurc'> Nom</th>
					            <th class = 'tablejoueurc'> Ville</th>
					            <th class = 'tablejoueurc'> Pays </th>
					            <div class ='text-center'><th colspan = '2'> Action à réaliser</th></div>
					            </tr>
							    <!-- On appel la fonction Affichclub qui renvoie les données relative au tableau des clubs -->
							  		<?php
							  		$idclub = array();
							        $i=0;	
							  		$bclub = $pdo->getNbClub();
							  		$club = $pdo->AffichClubs();
							  		while($i != $bclub)
									{
							  		    echo("<tr><td class = 'tablejoueurc'>".$club[$i]['NOMCLUB'].'</td>');
							            echo("<td class = 'tablejoueurc'>".$club[$i]['VILLECLUB'].'</td>');
							            echo("<td class = 'tablejoueurc'>".$club[$i]['PAYSCLUB'].'</td>');
							            $idclub[$i] = $club[$i]['IDCLUB'];
							            echo('<td class = "tablejoueurc"><input type="submit" name="modfier'.$i.'" value="Modifier" /></td> 
							                <td class = "tablejoueurc"><input type="submit" name="supprimer'.$i.'" value="Supprimer" /></td></tr>');
							            $i = $i+1;
							        }
							      echo('</small></h6></table></form></div>');
							      $_SESSION['tabclub'] = $idclub;  
									?>
						    </div>
						</div>
					<!-- On a ici le formulaire permettant de crée un club -->
					<div class="col-lg-5" style ="margin-right: 10px;">
  					<div class =" well well-sm" >
					<div class ='text-center'><div class ='well well-sm back'><h5>Création</h5></div></div></small></h6><table class = 'table '>
						<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES); ?>" method="post">
							<tr>
								<td class ='libeletable'>Nom : </td> 
								<td><input type = 'text' name='nomClub'> (Champ Obligatoire)</td>
							</tr>
							<tr>
								<td class ='libeletable'>Ville : </td>
								<td><input type = 'text' name='villeClub'> (Champ Obligatoire)</td>
							</tr>
							<tr>
								<td class ='libeletable'>Pays : </td>
								<td><input type = 'text' name='paysClub'> (Champ Obligatoire)</td>
							</tr>
							<tr>
								<td></td>
								<td><button type='submit' name='creeClub' value='Crée le Club' class='centreb btn btn-default'> <span class="glyphicon glyphicon-plus"></span> Créer le Club</button></td>
							</tr>
						</form>
					</table>
				</div>
			</div>
		</div>
	</div>
</body>
</html>



