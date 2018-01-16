 
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="connexion-index.css">
		<title> Portail des directeurs de ligue </title>
	</head>
	<body>
  		<table class = 'bandeau'>
  			<tr>
      			<td><form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES); ?>" method="post">
        			<input class = 'buttonbandeau' type="submit" name="go" value="Deconnexion" /></form>
    			</td>
				<td>
         			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES); ?>" method="post">
           				<input class = 'buttonbandeau' type="submit" name="envoyer" value="Retourner au menu Principal" />
           			</form>
           		</td>
      			<td>
         			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES); ?>" method="post">
          				<input class = 'buttonbandeau' type="submit" name="crée" value="Gerer les joueurs" />
    				</form>
    			</td>
			</tr>
     	</table>
  		<?php	AffichClubs(); 
          try
        {   
            $bdd = new PDO('mysql:host=localhost:8889;dbname=FFF', 'root', 'root');
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }?>

		<table class ='affi'>
			<tr>
				<td class ='cellule5'>
					<table class = 'tableModifClubs'>
						<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES); ?>" method="post">
							<tr>
								<td colspan='4' class ='titretable'><h2>Création d'un Club</h2></td>
							</tr>
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
								<td></td>
								<td><input type='submit' name='creeClub' value='Crée le Club'></td>
							</tr>
						</form>
					</table>
				</td>		
				<td class ='cellule6'>
					<table class = 'tableSuppJoueurs'>
						<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES); ?>" method="post">
							<tr>
								<td class ='titretable'><h2>Supression d'un club</h2></td>
							</tr>
							<tr>
								<td>Nom : <br><br></td> 
							<tr>
								<td> <select name="clubsupp" id="clubsupp" class='buttonsub' >
								<?php
								$repligue=$bdd->query('SELECT * FROM DIRECTEUR WHERE IDCOUSER = "'.$_SESSION['idUser'].'"');
        						$ligue = $repligue->fetch();
        						$nbligue = $ligue['IDLIGUE'];
        						$resultats=$bdd->query('SELECT * FROM CLUB WHERE IDLIGUE = "'.$nbligue.'"');
        						while($reponse = $resultats->fetch()){?>
        						<option value="<?php echo $reponse['IDCLUB']; ?>"> <?php echo $reponse['NOMCLUB'] ?></option>
								<?php } ?>
								</select><br></td>
							</tr>
							<tr>
								<td><input type='submit' name='suppClub' value='Supprimer le Club' class='buttonsub'> <br><br></td>
							</tr>
							<tr>
								<td> (Un Club ne sera pas supprimé si des<br> joueurs sont encore à l'interieur)</td>
							</tr>
						</form>
					</table>
				</td>
			</tr>
		</table>
	</body>
</html>


