
<html>
<head>
	<link rel="stylesheet" type="text/css" href="connexion-index.css">
	<title> Portail des directeurs de ligue </title>
</head>
<body>
  	<table class ='bandeau'>
  		<tr>
      <td><form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES); ?>" method="post">
        <input class = 'buttonbandeau' type="submit" name="go" value="Deconnexion" /></form>
    </td>
	<td>
         <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES); ?>" method="post">

          <input class = 'buttonbandeau' type="submit" name="envoyer" value="Retourner au menu Principal" />
    </td>
    </form>
      <td>
         <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES); ?>" method="post">

          <input class = 'buttonbandeau' type="submit" name="créeclub" value="Gérer les Clubs" />
    </td>
    </form>
</tr>
<?php AffichJoueurs();?>
		<table class="affi">
			<tr>
				<td class ='tableCreaJoueurs' >
					<table>
						<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES); ?>" method="post">
							<tr>
								<td class = 'titretable' colspan="2"><h2>Créer un Joueur</h2></td>
							</tr>
							<tr>
								<td class = 'libeletable' >Nom : </td> 
								<td><input type = 'text' name='nomJoueur'> * </td>
							</tr>
							<tr>
								<td class = 'libeletable' >Prenom : </td>
								<td><input type = 'text' name='prenomJoueur'> * </td>
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

				<td class ='tableChangJoueurs'>
					<form class ='formchange' action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES); ?>" method="post">
						<table>
							<tr>
								<td colspan='5'><h2>Changement d'un joueur de club par Mr. <?php echo $_SESSION['idUser'];?></h2></td>
							</tr>
							<tr>
								<td><h3>Choisir le Joueur à changer de club : </h3> </td>
							</tr>
							<tr> 
								<td> <br><select name="joueurmodifclub" id="joueurmodifclub">
									<?php
        							$repligue=$bdd->query('SELECT * FROM DIRECTEUR WHERE IDCOUSER = "'.$_SESSION['idUser'].'"');
        							$ligue = $repligue->fetch();
        							$nbligue = $ligue['IDLIGUE'];
        							$resultats=$bdd->query('SELECT * FROM JOUEUR WHERE IDLIGUE = "'.$nbligue.'"');
        							while($reponse = $resultats->fetch()){?>
        							<option value="<?php echo $reponse['IDJOUEUR']; ?>"> <?php echo $reponse['NOMJOUEUR'].' '.$reponse['PRENOMJOUEUR']; ?></option>
									<?php } ?></td>
								</select>
							</tr>
							<tr>		
								<td>Integre </td>
							</tr>
							<tr> 
								<td> <select name="clubint" id="clubint">
									<?php
        							$repligue=$bdd->query('SELECT * FROM DIRECTEUR WHERE IDCOUSER = "'.$_SESSION['idUser'].'"');
        							$ligue = $repligue->fetch();
        							$nbligue = $ligue['IDLIGUE'];
        							$resultats=$bdd->query('SELECT * FROM CLUB WHERE IDLIGUE = "'.$nbligue.'"');
        							while($reponse = $resultats->fetch()){?>
        							<option value="<?php echo $reponse['IDCLUB']; ?>"> <?php echo $reponse['NOMCLUB'] ?></option>
        							<?php } ?>
        							</select>
        						</td>
        					</tr>
								<td> <br><input type='submit' name='modifjoueurclub' value='Faire le changement'> </td>
							</tr>
						</table>
					</form>
				</td>
				<td class = 'tablejoueurhisto'>
					<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES); ?>" method="post">
						<table >
							<tr>
								<td colspan='3'><h2>Voir l'historique d'un joueur</h2 ></td>
							</tr>
							<tr>
								<td><h3>Choisir le Joueur à visualiser </h3> </td> 
							</tr>
							<tr>
								<td> <select name="joueurhisto" id="joueurhisto">
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
								<td><br><br><input type='submit' name='affichhisto' value='Afficher historique du joueur'></td>
							</tr>
						</table>
					</form>
				</td>
			</tr>
		</table>
	</body>
</html>




