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
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES); ?>" method="post">
			<table class = 'tableModifJoueurs'>
				<tr> <td colspan="2"><h2>Modification d'un joueur par Mr. <?php echo $_SESSION['idUser'];?></h2></td></tr>



			<?php
			        try
        {   
            $bdd = new PDO('mysql:host=localhost:8889;dbname=FFF', 'root', 'root');
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());

        }
        $resultataff=$bdd->query('SELECT * FROM JOUEUR WHERE IDJOUEUR ="'.(int)$_SESSION['joueuramodif'].'"');
        $affmodif = $resultataff->fetch();
        ?>
        

						 
				<tr><td colspan="2"><h3> Choix des options a modifier </h3></td></tr>
				<tr>
					<td>Nom : </td>
					<td><input type = 'text' name='mnomJoueur' value ="<?php echo $affmodif['NOMJOUEUR'];?>" > </td>
				</tr>
				<tr>
					<td>Prenom : </td>
					<td><input type = 'text' name='mprenomJoueur' value ="<?php echo $affmodif['PRENOMJOUEUR'];?>" ></td>
				</tr>
				<tr>
					<td>Categorie : </td>
					<td><select name='mcategJoueur' id ='mcategJoueur' >
						<option value ="<?php echo $affmodif['IDCATEGORIE'];?>"> <?php echo $affmodif['IDCATEGORIE']; ?></option>
					<?php
					$resultats=$bdd->query('SELECT * FROM CATEGORIE');
        			while($reponse = $resultats->fetch()){?>
       				<option value="<?php echo $reponse['IDCATEGORIE']; ?>"> <?php echo $reponse['nomCategorie']; ?></option>
       				<?php }?>
					</td>
				</tr>
				<tr>
					<td>Adresse : </td>
					<td><input type = 'text' name='madresseJoueur' value ="<?php echo $affmodif['ADRESSEJOUEUR'];?>"></td>
				</tr>
				<tr>
					<td>Code Postal : </td>
					<td><input type = 'text' name='mcpJoueur' value ="<?php echo $affmodif['CPJOUEUR'];?>"></td>
				</tr>
				<tr>
					<td>Ville : </td>
					<td><input type = 'text' name='mvilleJoueur' value ="<?php echo $affmodif['VILLEJOUEUR'];?> "></td>
				</tr>
				<tr>
					<td>Pays : </td>
					<td><input type = 'text' name='mpaysJoueur' value ="<?php echo $affmodif['PAYSJOUEUR'];?>"></td>
				</tr>
				<tr>
					<td>Email : </td>
					<td><input type = 'text' name='memailJoueur' value ="<?php echo $affmodif['EMAILJOUEUR'];?>"></td>
				</tr>
				<tr>
					<td>Telephone : </td>
					<td><input type = 'text' name='mtelephoneJoueur' value ="<?php echo $affmodif['TELEPHONEJOUEUR'];?>"></td>
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
<?php echo $_SESSION['joueuramodif']; ?>