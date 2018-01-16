<html>
  <head>
	 <link rel="stylesheet" type="text/css" href="connexion-index.css">
   <link rel="icon" type="image/png" href="balle.png" />
	 <title>Portail de Gestion de la FFF</title>
  </head>
  <body>
  <!-- Tableau contenant le bandeau -->
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
      </tr>
      <!-- formlaire peremettant la modification d'un club ne particulier --> 
    </table>
    <?php
    try
    {   
      $bdd = new PDO('mysql:host=localhost:8889;dbname=FFF', 'root', 'root');
    }
      catch (Exception $e)
    {
      die('Erreur : ' . $e->getMessage());
    }
    $resultatacc=$bdd->query('SELECT * FROM CLUB WHERE IDCLUB ="'.(int)$_SESSION['clubamodif'].'"');
    $accmodif = $resultatacc->fetch();
    ?>     
    <table class = 'tableModifJoueurs'>
      <tr><td colspan="2"><h2>Modification d'un Club par Mr. <?php echo $_SESSION['idUser'];?></h2></td></tr>
      </tr>
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES); ?>" method="post">
        <tr>
          <td>Nom : </td> 
          <td><input type = 'text' name='mnomClub' value ="<?php echo $accmodif['NOMCLUB'];?>"> </td>
        </tr>
        <tr>
          <td>Ville : </td>
          <td><input type = 'text' name='mvilleClub' value ="<?php echo $accmodif['VILLECLUB'];?>"> </td>
        </tr>
        <tr>
          <td>Pays : </td>
          <td><input type = 'text' name='mpaysClub' value ="<?php echo $accmodif['PAYSCLUB'];?>"> </td>
        </tr>
        <tr>
          <td></td>
          <td><input type='submit' name='modifClub' value='Modifier le Club'></td>
        </tr>
      </form>
  </table>
