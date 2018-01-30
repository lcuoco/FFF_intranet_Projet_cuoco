
<html>
	<head>
		<link rel="icon" type="image/png" href="balle.png" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="connexion-index.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
		<title> Portail de Gestion de la FFF  </title>
	</head>
	<body>
		<div class ="fluid-container">
			 <div class="row">
  				<div class="col-lg-12">
  					<div class =" well well-sm " style ="margin-left: 10px; margin-right: 10px;">
  						<div class ='well well-sm back'><div class ='text-center '><h5>Liste des joueurs </h5></div></div><div class ='tableov2'><small><h6> <form method='post'><table class = 'table table-bordered table-striped table-hover '>
            <thead>
            <tr class ='text-center'>
            <th class = 'col-md-1'> Nom</th>
            <th class = 'col-md-1'> Prénom</th>
            <th class = 'col-md-1'> Catégorie </th>
            <th class = 'col-md-1'> Adresse </th>
            <th class = 'col-md-1'> Code Postal</th>
            <th class = 'col-md-1'> Ville </th>
            <th class = 'col-md-1'> Pays </th>
            <th class = 'col-md-1'> Adresse Mail</th>
            <th class = 'col-md-1'> Numéro de Telephone</th>
            <th class = 'col-md-1'> Club de foot</th>
            <th class = 'col-md-3 text-center' colspan ='3'> Action à réaliser</th>
            </tr></thead>
					<?php
					$ok = $pdo->getLongJoueur();
					$joueur = $pdo->AffichJoueurs();
					$i = 0;
					$idfnc = array();
					while($i != $ok)
					{
						echo("<tr><td class = 'col-md-1'>".$joueur[$i]['NOMJOUEUR'].'</td>');
            			echo("<td class = 'col-md-1'>".$joueur[$i]['PRENOMJOUEUR'].'</td>');
            			$categorie = $pdo->getCategJoueur($joueur[$i]['IDCATEGORIE']);
            			echo("<td class = 'col-md-1'>".$categorie.'</td>');
            			echo("<td class = 'col-md-1'>".$joueur[$i]['ADRESSEJOUEUR'].'</td>');
            			echo("<td class = 'col-md-1'>".$joueur[$i]['CPJOUEUR'].'</td>');
            			echo("<td class = 'col-md-1'>".$joueur[$i]['VILLEJOUEUR'].'</td>');
            			echo("<td class = 'col-md-1'>".$joueur[$i]['PAYSJOUEUR'].'</td>');
            			echo("<td class = 'col-md-1'>".$joueur[$i]['EMAILJOUEUR'].'</td>');
            			echo("<td class = 'col-md-1'>".$joueur[$i]['TELEPHONEJOUEUR'].'</td>');
            			$club = $pdo->getClubJoueur($joueur[$i]['IDJOUEUR']);
            			$idfnc[$i] = $joueur[$i]['IDJOUEUR'];
            			echo("<td class = 'col-md-1'>".$club.'</td>');
            			echo('<td class = "col-md-1"><input type="submit" name="modfier'.$i.'" value="Modifier" /></td>');
            			echo('<td class = "col-md-1"><input type="submit" name="transferer'.$i.'" value="Transferer" /></td>');
            			echo('<td class = "col-md-1"><input type="submit" name="historique'.$i.'" value="Historique" /></td></tr>');
            			$i = $i+1;

					}
				echo('</small></h6></tbody></table></form></div><br>Nombre de Joueurs : '.$ok.'');
      			$_SESSION['tab'] = $idfnc;     
					?>



							</div>
					<div class ="col-lg-offset-1 col-lg-3">
						<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES); ?>" method="post">
						<button class ='btn btn-primary' type='submit' name='creationj' value='Crée un joueur'> <span class="glyphicon glyphicon-plus"></span> Créer un nouveau joueur</button>
					</form>
					</div>
					<div class ="col-lg-7">
								<?php if ($_SESSION['ok'] != 1)
								{$pdo->AffichHisto(null, 'hidden'); } 
								else {echo $_SESSION['a'];}
								$_SESSION['ok'] = 0;
								?>
						</div>
					</div>

											</tr>
										</form>
									</table>
								</div>
							</div>
						</div>




							


