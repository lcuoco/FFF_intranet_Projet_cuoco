<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
  <head>
    <title>Ma connexion</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
     <link rel="stylesheet" type="text/css" href="connexion-index.css">
  </head>
  <body>
    <h1>Connexion au Site de la gestion des joueurs</h1>
 
      <?php /** Affichage des erreurs générées **/ ?>
      <?php if (sizeof($aListeErreurs) > 0) : ?>
        <ul>
          <?php foreach ($aListeErreurs as $sErreur) : ?>
          <li><?php echo htmlspecialchars($sErreur); ?></li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>
      <table>
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES); ?>" method="post">
        <tr>
          <td><label for="pseudo">Pseudo :</label> </td>
          <td><input type="text" name="pseudo" id="pseudo"/></td>
        </tr>
        <tr>
          <td><label for="password">Password :</label></td>
          <td><input type="text" name="pwd" id="pwd"/></td>
        </tr>
        <tr>
          <td><input type="submit" name="envoyer" value="Soumettre" /></td>
        </tr>
      </form>


  </body>
</html>