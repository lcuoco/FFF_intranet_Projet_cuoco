

<?php         
try
{   
	$bdd = new PDO('mysql:host='.$_SESSION['host'].';dbname='.$_SESSION['db'].'',''.$_SESSION['user'].'',''.$_SESSION['mdp'].'');
}
	catch (Exception $e)
{
   	die('Erreur : ' . $e->getMessage());
}
?>	
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
  				<div class="col-lg-9">
  					<div class =" well well-sm " style ="margin-left: 10px;">
					<?php AffichJoueurs();?>
					</div>
						<div class="row">
							<div class="col-lg-3 well well-sm" style ="margin-left: 25px;">
								<table class ='table-borderless table-condensed table-hover'>
									<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES); ?>" method="post">
										<div class ="text-center well well-sm back"><h5>Historique</h5>
										</div>
										<div class ="text-center"><h5>Choisir le joueur a visualiser :</h5>
										</div>
										<select class ="centre btn btn-default" name="joueurhisto" id="joueurhisto">
											<?php
        									$repligue=$bdd->query('SELECT * FROM DIRECTEUR WHERE IDCOUSER = "'.$_SESSION['idUser'].'"');
        									$ligue = $repligue->fetch();
        									$nbligue = $ligue['IDLIGUE'];
        									$resultats=$bdd->query('SELECT * FROM JOUEUR WHERE IDLIGUE = "'.$nbligue.'"');
        									while($reponse = $resultats->fetch()){?>
       		 								<option value="<?php echo $reponse['IDJOUEUR']; ?>"> <?php echo $reponse['NOMJOUEUR'].' '.$reponse['PRENOMJOUEUR']; ?></option>
											<?php } ?>
											</select>
										<tr>
											<td><br><br><input class ='centrea btn btn-default' type='submit' name='affichhisto' value='Afficher historique du joueur'></td>
										</tr>
									</form>
								</table>
							</div>
								<div class="col-lg-3 well well-sm" style ="margin-left: 10px;">
									<table class ='table table-borderless table-condensed table-hover'>
										<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES); ?>" method="post">
											<div class ="text-center"><div class ='well well-sm back'> <h5>Transfert</h5></div>
												<br><select class ='centrea btn btn-default' name="joueurmodifclub" id="joueurmodifclub">
												<?php
        										$repligue=$bdd->query('SELECT * FROM DIRECTEUR WHERE IDCOUSER = "'.$_SESSION['idUser'].'"');
        										$ligue = $repligue->fetch();
        										$nbligue = $ligue['IDLIGUE'];
        										$resultats=$bdd->query('SELECT * FROM JOUEUR WHERE IDLIGUE = "'.$nbligue.'"');
        										while($reponse = $resultats->fetch()){?>
        										<option value="<?php echo $reponse['IDJOUEUR']; ?>"> <?php echo $reponse['NOMJOUEUR'].' '.$reponse['PRENOMJOUEUR']; ?></option>
												<?php } ?></select><br></td></div>
												<div class ="text-center"><h5><span class="glyphicon glyphicon-arrow-down"></span></h5> 
												<select class ='centrea btn btn-default' name="clubint" id="clubint">
												<?php
        										$repligue=$bdd->query('SELECT * FROM DIRECTEUR WHERE IDCOUSER = "'.$_SESSION['idUser'].'"');
        										$ligue = $repligue->fetch();
        										$nbligue = $ligue['IDLIGUE'];
        										$resultats=$bdd->query('SELECT * FROM CLUB WHERE IDLIGUE = "'.$nbligue.'"');
        										while($reponse = $resultats->fetch()){?>
        										<option value="<?php echo $reponse['IDCLUB']; ?>"> <?php echo $reponse['NOMCLUB'] ?></option>
        										<?php } ?>
        										</select><br><br>
        										 <br><input class ='centrea btn btn-default' type='submit' name='modifjoueurclub' value='Faire le changement'></div>
										</form>
									</table>
								</div>
								<?php if ($_SESSION['ok'] != 1)
								{AffichHisto(null, 'hidden'); } 
								else {echo $_SESSION['a'];}
								$_SESSION['ok'] = 0;
								?>
						</div>
					</div>
						<div class=" col-lg-3 ">
							<div class="well well-sm crea">
								<div class ="text-center well well-sm back"><h5>Créer un Joueur</h5>
								</div>
									<table class ='table table-borderless table-condensed table-hover'>
										<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES); ?>" method="post">
											<tr>
												<td class = 'libeletable' >Nom : *</td> 
												<td><input type = 'text' name='nomJoueur'></td>
											</tr>
											<tr>
												<td class = 'libeletable' >Prenom : *</td>
												<td><input type = 'text' name='prenomJoueur'></td>
											</tr>
											<tr>
												<td class = 'libeletable' >Categorie : </td>
												<td><select name='categJoueur' id = 'categJoueur'>
        										<?php $resultats=$bdd->query('SELECT * FROM CATEGORIE');
        										while($reponse = $resultats->fetch()){?>
       											<option value="<?php echo $reponse['IDCATEGORIE']; ?>"><?php echo $reponse['nomCategorie']; ?></option>
       											<?php }?>
       											</td>
											</tr>
											<tr>
												<td class = 'libeletable' >Adresse : </td>
												<td><input type = 'text' name='adresseJoueur'></td>
											</tr>
											<tr>
												<td class = 'libeletable' >Code Postal : </td>
												<td><input type = 'text' name='cpJoueur'></td>
											</tr>
											<tr>
												<td class = 'libeletable' >Ville : </td>
												<td><input type = 'text' name='villeJoueur'></td>
											</tr>
											<tr>
												<td class = 'libeletable' >Pays : </td>
												<td><input type = 'text' name='paysJoueur'></td>
											</tr>
											<tr>
												<td class = 'libeletable' >Email : </td>
												<td><input type = 'text' name='emailJoueur'></td>
											</tr>
											<tr>
												<td class = 'libeletable' >Téléphone : </td>
												<td><input type = 'text' name='telephoneJoueur'></td>
											</tr>
											<tr>
												<td class = 'libeletable' >Club : </td>
												<td><select name='clubJoueur' id ='clubJoueur'>
												<?php $resultats=$bdd->query('SELECT * FROM CLUB WHERE IDLIGUE = "'.$_SESSION['idligueco'].'"');
        										while($reponse = $resultats->fetch()){?>
       											<option value="<?php echo $reponse['IDCLUB']; ?>"><?php echo $reponse['NOMCLUB']; ?></option>
       											<?php }?>
       											</select>
												</td>
											</tr>
											<tr>
												<td>(*Champs Obligatoires)</td>
												<td><button class ='btn btn-default' type='submit' name='creeJoueur' value='Crée le joueur'> <span class="glyphicon glyphicon-plus"></span> Créer le joueur</button></td>
											</tr>
										</form>
									</table>
								</div>
							</div>
						</div>



							


