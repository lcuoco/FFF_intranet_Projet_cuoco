<html>
  <head>
    <title>Portail de Gestion de la FFF</title>
    <link rel="icon" type="image/png" href="balle.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
     <link rel="stylesheet" type="text/css" href="connexion-index.css">
         <div class="fluid-container">
      <div class ="row bc">
        <div class=" col-lg-12 ">
 <center><img class = "imgfff" src="./images/fffimg2.png" alt="Cinque Terre"></center>
</div>
</div>
</div>
<h1><div class = 'text-center well well-sm' style = 'padding: 20px;'> Connexion au portail de Gestion des Ligues </h1></div>
  </head>
  <body>
    <!-- Ici on veut afficher les erreurs si il y en a dans le formulaire sinon on execute le controller-->
      <?php if (sizeof($aListeErreurs) > 0) : ?>
        <ul>
          <?php foreach ($aListeErreurs as $sErreur) : ?>
          <div class="alert alert-danger" style = 'margin-top: 20px;'><li><strong>Attention ! </strong><?php echo htmlspecialchars($sErreur); ?></li></div>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>
    <!-- Ici le tableau contenant le formulaire de connexion-->
    <div class ='container' style = 'margin-top: 100px; '>
      <div class ='row'>
      </div>
      <div class ='row'>
        <div class ='col-lg-offset-4 col-lg-4 well well-sm' style = 'padding: 20px;'>
      <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES); ?>" method="post">
        <div class="form-group">
          <label class="control-label col-lg-3" for="pseudo">Pseudonyme </label>
          <div class = 'col-lg-4'>  
          <input type="text" name="pseudo" id="pseudo"/>  
        </div>
      </div>
      <div class="form-group">
          <label class="control-label col-lg-3" for="password">Mot de Passe </label> 
           <div class="col-lg-4">
          <input type="password" name="pwd" id="pwd"/></td>
      </div>
    </div>
        </tr>
        <tr>
          <td><input type="submit" name="envoyer" value="Soumettre" /></td>
        </tr>
      </form>
    </table>
  </div>
</div>
</div>


  </body>
</html>