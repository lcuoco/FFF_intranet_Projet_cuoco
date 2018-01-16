<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
  <head>
    <title>Portail de Gestion de la FFF</title>
    <div class = 'bandeau'><h1>Site de la Federation Français de Football</h1></div>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
     <link rel="stylesheet" type="text/css" href="connexion-index.css">
  </head>
  <body>
    <!-- Ici on veut afficher les erreurs si il y en a dans le formulaire sinon on execute le controller-->
      <?php if (sizeof($aListeErreurs) > 0) : ?>
        <ul>
          <?php foreach ($aListeErreurs as $sErreur) : ?>
          <li><?php echo htmlspecialchars($sErreur); ?></li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>
    <!-- Ici le tableau contenant le formulaire de connexion-->
      <table class = 'tableco'>
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES); ?>" method="post">
        <tr>
          <td><label for="pseudo">Pseudo :</label> </td>
          <td><input type="text" name="pseudo" id="pseudo"/></td>
        </tr>
        <tr>
          <td><label for="password">Password :</label></td>
          <td><input type="password" name="pwd" id="pwd"/></td>
        </tr>
        <tr>
          <td><input type="submit" name="envoyer" value="Soumettre" /></td>
        </tr>
      </form>


  </body>
</html>