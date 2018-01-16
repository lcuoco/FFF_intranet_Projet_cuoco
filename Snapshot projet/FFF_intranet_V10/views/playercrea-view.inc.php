
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="connexion-index.css">
		<title> Portail de Gestion de la FFF  </title>
	</head>
	<body>
		<!-- Tableau contenant le bandeau -->
  		<table class ='bandeau'>
  			<tr>
      			<td>
      				<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES); ?>" method="post">
        				<input class = 'buttonbandeau' type="submit" name="go" value="Deconnexion" />
    				</form>
    			</td>
    			<td>
         			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES); ?>" method="post">
 						<input class = 'buttonbandeau' type="submit" name="envoyer" value="Retourner au menu Principal" />
 					</form>
   				</td>
   				<td>
         			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES); ?>" method="post">
						<input class = 'buttonbandeau' type="submit" name="créeclub" value="Gérer les Clubs" />
					</form>
				</td>
			</tr>
		</table>
		<!-- appel de la focntion qui affiche la liste des joueurs et leur bouton modifier --> 
		<?php AffichJoueurs();?>
		<table class ='affi'>
			<tr>
				<td  class ='cellule1'>
					<!-- Formulaire de creation d'un joueur -->
					<table class ='tableCreaJoueurs'>
						<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES); ?>" method="post">
							<tr>
								<td class = 'titretable' colspan="2"><h2>Créer un Joueur</h2></td>
							</tr>
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
									<?php         
									try
        							{   
            							$bdd = new PDO('mysql:host=localhost:8889;dbname=FFF', 'root', 'root');
        							}
        							catch (Exception $e)
        							{
            						die('Erreur : ' . $e->getMessage());
        							}
        							?>	
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
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td>(*Champ Obligatoire)</td>
								<td><input type='submit' name='creeJoueur' value='Crée le joueur'></td>
							</tr>
						</form>
					</table>
				</td>
				<td class ='cellule2'>
					<!-- formulaire de trasfert d'un joueur vers un autre club -->
				<table class ='tableChangJoueurs'>
					<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES); ?>" method="post">
						<tr>
							<td class ='titretable'><h2>Transfert</h2></td>
						</tr>
						<tr> 
							<td> <br><select class ='buttonsub' name="joueurmodifclub" id="joueurmodifclub">
									<?php
        							$repligue=$bdd->query('SELECT * FROM DIRECTEUR WHERE IDCOUSER = "'.$_SESSION['idUser'].'"');
        							$ligue = $repligue->fetch();
        							$nbligue = $ligue['IDLIGUE'];
        							$resultats=$bdd->query('SELECT * FROM JOUEUR WHERE IDLIGUE = "'.$nbligue.'"');
        							while($reponse = $resultats->fetch()){?>
        							<option value="<?php echo $reponse['IDJOUEUR']; ?>"> <?php echo $reponse['NOMJOUEUR'].' '.$reponse['PRENOMJOUEUR']; ?></option>
									<?php } ?></select><br></td>
						</tr>
						<tr>		
							<td class= 'integre'>Integre <br><br></td>
						</tr>
						<tr> 
							<td> <select class ='buttonsub' name="clubint" id="clubint">
									<?php
        							$repligue=$bdd->query('SELECT * FROM DIRECTEUR WHERE IDCOUSER = "'.$_SESSION['idUser'].'"');
        							$ligue = $repligue->fetch();
        							$nbligue = $ligue['IDLIGUE'];
        							$resultats=$bdd->query('SELECT * FROM CLUB WHERE IDLIGUE = "'.$nbligue.'"');
        							while($reponse = $resultats->fetch()){?>
        							<option value="<?php echo $reponse['IDCLUB']; ?>"> <?php echo $reponse['NOMCLUB'] ?></option>
        							<?php } ?>
        							</select><br><br>
        					</td>
        				</tr>
        				<tr>
							<td> <br><input class ='buttonsub' type='submit' name='modifjoueurclub' value='Faire le changement'> </td>
						</tr>
					</form>
				</table>
				</td>
				<td class ='cellule3'>
					<!-- formulaire de choix de l'historique du joueur a afficher-->
					<table class = 'tablejoueurhisto'>
						<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES); ?>" method="post">
							<tr>
								<td colspan='3' class ='titretable'><h2>Historique</h2 ></td>
							</tr>
							<tr>
								<td class= 'integre'><h3>Choisir le Joueur à visualiser </h3> </td> 
							</tr>
							<tr>
								<td> <select class ='buttonsub' name="joueurhisto" id="joueurhisto">
									<?php
        							$repligue=$bdd->query('SELECT * FROM DIRECTEUR WHERE IDCOUSER = "'.$_SESSION['idUser'].'"');
        							$ligue = $repligue->fetch();
        							$nbligue = $ligue['IDLIGUE'];
        							$resultats=$bdd->query('SELECT * FROM JOUEUR WHERE IDLIGUE = "'.$nbligue.'"');
        							while($reponse = $resultats->fetch()){?>
       		 						<option value="<?php echo $reponse['IDJOUEUR']; ?>"> <?php echo $reponse['NOMJOUEUR'].' '.$reponse['PRENOMJOUEUR']; ?></option>
									<?php } ?>
								</select>
								</td>	
							</tr>
							<tr>
								<td><br><br><input class ='buttonsub' type='submit' name='affichhisto' value='Afficher historique du joueur'></td>
							</tr>
						</form>
					</table>
				</td>
			</body>
		</html>




