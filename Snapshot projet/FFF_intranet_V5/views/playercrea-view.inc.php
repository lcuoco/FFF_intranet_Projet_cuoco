
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
		<table class = 'tableCreaJoueurs'>
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES); ?>" method="post">
				<tr>
					<td colspan="2"><h2>Création d'un joueur par Mr. <?php echo $_SESSION['idUser'];?></h2></td>
				</tr>
				<tr>
					<td>Nom : </td> 
					<td><input type = 'text' name='nomJoueur'> * </td>
				</tr>
				<tr>
					<td>Prenom : </td>
					<td><input type = 'text' name='prenomJoueur'> * </td>
				</tr>
				<tr>
					<td>Categorie : </td>
					<td><select name='categJoueur' id = 'categJoueur'>
					<?php         
					try
        			{   
            			$bdd = new PDO('mysql:host=localhost:8889;dbname=FFF', 'root', 'root');
        			}
        				catch (Exception $e)
        			{
            			die('Erreur : ' . $e->getMessage());
        			}?>	
        			<?php $resultats=$bdd->query('SELECT * FROM CATEGORIE');
        			while($reponse = $resultats->fetch()){?>
       				<option value="<?php echo $reponse['IDCATEGORIE']; ?>"><?php echo $reponse['nomCategorie']; ?></option>
       				<?php }?></td>

				</tr>
				<tr>
					<td>Adresse : </td>
					<td><input type = 'text' name='adresseJoueur'></td>
				</tr>
				<tr>
					<td>Code Postal : </td>
					<td><input type = 'text' name='cpJoueur'></td>
				</tr>
				<tr>
					<td>Ville : </td>
					<td><input type = 'text' name='villeJoueur'></td>
				</tr>
				<tr>
					<td>Pays : </td>
					<td><input type = 'text' name='paysJoueur'></td>
				</tr>
				<tr>
					<td>Email : </td>
					<td><input type = 'text' name='emailJoueur'></td>
				</tr>
				<tr>
					<td>Telephone : </td>
					<td><input type = 'text' name='telephoneJoueur'></td>
				</tr>
				<tr>
					<td>Club : </td>
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
			</table>
		</td>
				<td>
					<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES); ?>" method="post">
			<table class = 'tableModifJoueurs'>
				<tr> <td colspan="2"><h2>Modification d'un joueur par Mr. <?php echo $_SESSION['idUser'];?></h2></td></tr>
				<tr>
					<td><h3>Choisir le Joueur à Modifier : </h3> </td> 
					<td> <select name="joueurmodif" id="joueurmodif">

			<?php

        $repligue=$bdd->query('SELECT * FROM DIRECTEUR WHERE IDCOUSER = "'.$_SESSION['idUser'].'"');
        $ligue = $repligue->fetch();
        $nbligue = $ligue['IDLIGUE'];
        $resultats=$bdd->query('SELECT * FROM JOUEUR WHERE IDLIGUE = "'.$nbligue.'"');
        while($reponse = $resultats->fetch()){?>
        <option value="<?php echo $reponse['IDJOUEUR']; ?>"> <?php echo $reponse['NOMJOUEUR'].' '.$reponse['PRENOMJOUEUR']; ?></option>

<?php
      }?>
						 
					
				</tr>
			</select>
				<tr><td colspan="2"><h3> Choix des options a modifier </h3></td></tr>
				<tr>
					<td>Nom : </td>
					<td><input type = 'text' name='mnomJoueur'> </td>
				</tr>
				<tr>
					<td>Prenom : </td>
					<td><input type = 'text' name='mprenomJoueur'> </td>
				</tr>
				<tr>
					<td>Categorie : </td>
					<td><select name='mcategJoueur' id ='mcategJoueur'>
						<option></option>
					<?php
					$resultats=$bdd->query('SELECT * FROM CATEGORIE');
        			while($reponse = $resultats->fetch()){?>
       				<option value="<?php echo $reponse['IDCATEGORIE']; ?>"> <?php echo $reponse['nomCategorie']; ?></option>
       				<?php }?>
					</td>
				</tr>
				<tr>
					<td>Adresse : </td>
					<td><input type = 'text' name='madresseJoueur'></td>
				</tr>
				<tr>
					<td>Code Postal : </td>
					<td><input type = 'text' name='mcpJoueur'></td>
				</tr>
				<tr>
					<td>Ville : </td>
					<td><input type = 'text' name='mvilleJoueur'></td>
				</tr>
				<tr>
					<td>Pays : </td>
					<td><input type = 'text' name='mpaysJoueur'></td>
				</tr>
				<tr>
					<td>Email : </td>
					<td><input type = 'text' name='memailJoueur'></td>
				</tr>
				<tr>
					<td>Telephone : </td>
					<td><input type = 'text' name='mtelephoneJoueur'></td>
				</tr>
				<tr>
					<td>Club : </td>
					<td><select name='mclubJoueur' id ='mclubJoueur'>
					<option></option> 
					<?php $resultats=$bdd->query('SELECT * FROM CLUB WHERE IDLIGUE = "'.$_SESSION['idligueco'].'"');
        			while($reponse = $resultats->fetch()){?>
       				<option value="<?php echo $reponse['IDCLUB']; ?>"><?php echo $reponse['NOMCLUB']; ?></option>
       				<?php }?></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td><input type='submit' name='modifJoueur' value='Modifier le joueur'></td>
				</tr>
			</table>
			</form>


					<form class ='formchange' action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES); ?>" method="post">
			<table class = 'tableChangJoueurs'>
				<tr><td colspan='5'><h2>Changement d'un joueur de club par Mr. <?php echo $_SESSION['idUser'];?></h2></td></tr>
				<tr>
					<td><h3>Choisir le Joueur à changer de club : </h3> </td> 
					<td> <select name="joueurmodifclub" id="joueurmodifclub">

			<?php

        $repligue=$bdd->query('SELECT * FROM DIRECTEUR WHERE IDCOUSER = "'.$_SESSION['idUser'].'"');
        $ligue = $repligue->fetch();
        $nbligue = $ligue['IDLIGUE'];
        $resultats=$bdd->query('SELECT * FROM JOUEUR WHERE IDLIGUE = "'.$nbligue.'"');
        while($reponse = $resultats->fetch()){?>
        <option value="<?php echo $reponse['IDJOUEUR']; ?>"> <?php echo $reponse['NOMJOUEUR'].' '.$reponse['PRENOMJOUEUR']; ?></option>

<?php
      }?>
					<td>Integre </td> 
					<td> <select name="clubint" id="clubint">
			<?php

        $repligue=$bdd->query('SELECT * FROM DIRECTEUR WHERE IDCOUSER = "'.$_SESSION['idUser'].'"');
        $ligue = $repligue->fetch();
        $nbligue = $ligue['IDLIGUE'];
        $resultats=$bdd->query('SELECT * FROM CLUB WHERE IDLIGUE = "'.$nbligue.'"');
        while($reponse = $resultats->fetch()){?>
        <option value="<?php echo $reponse['IDCLUB']; ?>"> <?php echo $reponse['NOMCLUB'] ?></option>
<?php } ?></select></td>
					<td><input type='submit' name='modifjoueurclub' value='Faire le changement'> </td>
				</tr>
			</table>
		
		

		
	
	
		
	</form>


			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES); ?>" method="post">
			<table class = 'tablejoueurhisto'>
				<tr><td colspan='3'><h2>Voir l'historique d'un joueur</h2 ></td></tr>
				<tr>
					<td><h3>Choisir le Joueur à visualiser </h3> </td> 
					<td> <select name="joueurhisto" id="joueurhisto">

			<?php

        $repligue=$bdd->query('SELECT * FROM DIRECTEUR WHERE IDCOUSER = "'.$_SESSION['idUser'].'"');
        $ligue = $repligue->fetch();
        $nbligue = $ligue['IDLIGUE'];
        $resultats=$bdd->query('SELECT * FROM JOUEUR WHERE IDLIGUE = "'.$nbligue.'"');
        while($reponse = $resultats->fetch()){?>
        <option value="<?php echo $reponse['IDJOUEUR']; ?>"> <?php echo $reponse['NOMJOUEUR'].' '.$reponse['PRENOMJOUEUR']; ?></option>

<?php
      }?>
					<td><input type='submit' name='affichhisto' value='Afficher historique du joueur'></td>
				</tr>
			</table>





		
		

		
	
	
		
	</form>

</body>
</html>




