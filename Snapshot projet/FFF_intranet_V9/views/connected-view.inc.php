      <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
  <head>
    <title>Ma connexion</title>
    
         <link rel="stylesheet" type="text/css" href="connexion-index.css">
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
  </head>
  <body>
  	<table class ='bandeau'>
  		<tr>
      <td><form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES); ?>" method="post">
        <input class = 'buttonbandeau' type="submit" name="go" value="Deconnexion" /></form>
    </td>
      <td>
         <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES); ?>" method="post">

          <input class = 'buttonbandeau' type="submit" name="crée" value="Gerer les joueurs" />
    </td>
    </form>
      </td>
    </form>
      <td>
         <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES); ?>" method="post">

          <input class = 'buttonbandeau' type="submit" name="créeclub" value="Gerer les Clubs" />
    </td>
    </form>
</tr>
      
  </table>
  <div class = 'textconnect'>
  <h1> Bonjour Monsieur <?php echo $_SESSION['idUser'] ?> :</h1>
  <p class ='inconnect'> Cette Apllication Web va vous permettre de créer ou de mettre à jour les informations relatives aux joueurs et au clubs appartenant à votre ligue. <br><br> <u>Pour commencer veuillez choisir une rubrique corespondant à vos besoin dans le bandeau ci-dessus.</u></p></div>
</body>
</html>
 