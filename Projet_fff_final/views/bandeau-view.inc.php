<!--
Fichier bandeau-view.inc.php qui contient la vue du bandeau qui permet la navigation dans le site et localisé dans le dossier views
de FFF_intranet

Cette vue permet notement d'acceder au diverses fonctionnalités du site
-->

<link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="connexion-index.css">
    <div class="fluid-container">
      <div class ="row bc">
        <div class=" col-lg-12 ">
          <center><img class = "imgfff" src="./images/fffimg2.png" alt="Cinque Terre"></center>
        </div>
      </div>
    </div>
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES); ?>" method="post">
          <button class="navbar-brand btn btn-link" type="submit" name="envoyer" value="Menu Principal" ><span class="glyphicon glyphicon-home "></span> &nbsp;Accueil Portail</button>
      </div>
    </form>
      <form class="navbar-form navbar-left" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES); ?>" method="post">
        <div class="form-group">
          <button type="submit" class="btn btn-info" name="crée" value="Gerer les joueurs"><span class="glyphicon glyphicon-user"></span> Joueurs</button>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-success" name="créeclub" value="Gerer les Clubs"><span class="glyphicon glyphicon-tower"></span> Clubs</button>
        </div>
        <div class="form-group">
          <button type="submit" class=" btn btn-danger " name="go" value="Deconnexion"><span class="glyphicon glyphicon-log-out"></span> Deconnexion</button>
      </div>
    </form>
  </div>
</nav>
</div>