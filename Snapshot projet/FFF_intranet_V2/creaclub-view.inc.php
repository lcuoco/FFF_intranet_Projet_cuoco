
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

          <input type="submit" name="crée" value="Gerer les joueurs" />
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

		<h1>Création d'un club par Mr. <?php echo $_SESSION['idUser'];?></h1>
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
		
		<?php
					try
        			{   
            			$bdd = new PDO('mysql:host=localhost:8889;dbname=FFF', 'root', 'root');
        			}
        				catch (Exception $e)
        			{
            			die('Erreur : ' . $e->getMessage());
        			}?>			
<table class = 'tableCreaJoueurs'>
				<h1>Modification d'un Club par Mr. <?php echo $_SESSION['idUser'];?></h1>
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
		</table>

		<h1>Création d'un club par Mr. <?php echo $_SESSION['idUser'];?></h1>
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES); ?>" method="post">
			<table class = 'tableCreaJoueurs'>
				<tr>
					<td>Nom : </td> 
					<td><input type = 'text' name='mnomClub'> (Champ Obligatoire)</td>
				</tr>
				<tr>
					<td>Ville : </td>
					<td><input type = 'text' name='mvilleClub'> (Champ Obligatoire)</td>
				</tr>
				<tr>
					<td>Pays : </td>
					<td><input type = 'text' name='mpaysClub'> (Champ Obligatoire)</td>
				</tr>
					<td></td>
					<td><input type='submit' name='modifClub' value='Modifier le Club'></td>
				</tr>
			</table>
		
		

		
	</form>

		
	</form>

</body>
</html>


