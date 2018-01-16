
<html>
<head>
	<link rel="stylesheet" type="text/css" href="connexion-index.css">
	<title> Portail des directeurs de ligue </title>
</head>
<body>
  	<table>
  		<tr>
      <td><form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES); ?>" method="post">
        <input type="submit" name="go" value="Deconnexion" /></form>
    </td>
	<td>
         <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES); ?>" method="post">

          <input type="submit" name="envoyer" value="Retourner au menu Principal" />
    </td>
    </form>
      <td>
         <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES); ?>" method="post">

          <input type="submit" name="crée" value="Crée un nouveau joueur" />
    </td>
    </form>
        </form>
      <td>
         <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES); ?>" method="post">

          <input type="submit" name="AffichClubs" value="Voir les Clubs" />
    </td>
    </form>
</tr>
      
  </table>

		<h1>Création d'un joueur par Mr. <?php echo $_SESSION['idUser'];?></h1>
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES); ?>" method="post">
			<table class = 'tableCreaJoueurs'>
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
		
		
		

		
	</form>

</body>
</html>


