      <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
  <head>
    <title>Ma connexion</title>
    <h1> Bonjour Mr <?php echo $_SESSION['idUser'] ?></h1>
         <link rel="stylesheet" type="text/css" href="connexion-index.css">
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
  </head>
  <body>
  	<table>
  		<tr>
      <td><form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES); ?>" method="post">
        <input type="submit" name="go" value="Deconnexion" /></form>
    </td>
	<td>
         <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES); ?>" method="post">

          <input type="submit" name="envoyer" value="Voir les Joueurs de Votre Ligue" onsubmit=" return montre();" />
    </td>
</tr>
      </form>
  </table>
</body>
</html>
 