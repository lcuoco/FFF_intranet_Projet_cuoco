
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
    </td>
    </form>
      <td>
         <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES); ?>" method="post">

          <input class = 'buttonbandeau' type="submit" name="crée" value="Gerer les joueurs" />
    </td>
    </form>
        </form>
</tr>
      
  </table>

		
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES); ?>" method="post">
			<table class = 'tableModifClubs'>
				<tr>
				<td colspan='2'><h1>Création d'un club par Mr. <?php echo $_SESSION['idUser'];?></h1></td>
			</tr>
				<tr>
					<td>Nom : </td> 
					<td><input type = 'text' name='nomClub'> (Champ Obligatoire)</td>
				</tr>
				<tr>
					<td>Ville : </td>
					<td><input type = 'text' name='villeClub'> (Champ Obligatoire)</td>
				</tr>
				<tr>
					<td>Pays : </td>
					<td><input type = 'text' name='paysClub'> (Champ Obligatoire)</td>
				</tr>
					<td></td>
					<td><input type='submit' name='creeClub' value='Crée le Club'></td>
				</tr>
			</table>		
		
		<?php
					try
        			{   
            			$bdd = new PDO('mysql:host=localhost:8889;dbname=FFF', 'root', 'root');
        			}
        				catch (Exception $e)
        			{
            			die('Erreur : ' . $e->getMessage());
        			}?>			
<table class = 'tableCreaClubs'>
				<tr><td colspan="2"><h1>Modification d'un Club par Mr. <?php echo $_SESSION['idUser'];?></h1></td></tr>
				<tr>
					<td><h2>Choisir le Club à Modifier : </h2> </td> 
					<td> <select name="clubmodif" id="clubmodif">
			<?php

        $repligue=$bdd->query('SELECT * FROM DIRECTEUR WHERE IDCOUSER = "'.$_SESSION['idUser'].'"');
        $ligue = $repligue->fetch();
        $nbligue = $ligue['IDLIGUE'];
        $resultats=$bdd->query('SELECT * FROM CLUB WHERE IDLIGUE = "'.$nbligue.'"');
        while($reponse = $resultats->fetch()){?>
        <option value="<?php echo $reponse['IDCLUB']; ?>"> <?php echo $reponse['NOMCLUB'] ?></option>

<?php
      }?>
						 
					
				</tr>
			</select>

		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES); ?>" method="post">
				<tr>
					<td>Nom : </td> 
					<td><input type = 'text' name='mnomClub'> </td>
				</tr>
				<tr>
					<td>Ville : </td>
					<td><input type = 'text' name='mvilleClub'> </td>
				</tr>
				<tr>
					<td>Pays : </td>
					<td><input type = 'text' name='mpaysClub'> </td>
				</tr>
					<td></td>
					<td><input type='submit' name='modifClub' value='Modifier le Club'></td>
				</tr>
			</table>
		
		

		
	</form>
	</form>
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES); ?>" method="post">
			<table class = 'tableSuppJoueurs'>
				<tr><td colspan='2'><h1>Supression d'un club par Mr. <?php echo $_SESSION['idUser'];?></h1></td></tr>
				<tr>
					<td>Nom : </td> 
					<td> <select name="clubsupp" id="clubsupp">
			<?php

        $repligue=$bdd->query('SELECT * FROM DIRECTEUR WHERE IDCOUSER = "'.$_SESSION['idUser'].'"');
        $ligue = $repligue->fetch();
        $nbligue = $ligue['IDLIGUE'];
        $resultats=$bdd->query('SELECT * FROM CLUB WHERE IDLIGUE = "'.$nbligue.'"');
        while($reponse = $resultats->fetch()){?>
        <option value="<?php echo $reponse['IDCLUB']; ?>"> <?php echo $reponse['NOMCLUB'] ?></option>
<?php } ?></select></td>
					<td><input type='submit' name='suppClub' value='Supprimer le Club'> (Un Club ne sera pas supprimé si des joueurs sont encore à l'interieur)</td>
				</tr>
			</table>
		
		

		
	</form>


</body>
</html>


