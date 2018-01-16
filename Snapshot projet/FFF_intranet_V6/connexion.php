<?php
session_start();
    require('./modele/connexion-modele.inc.php');
    require('./controllers/connexion-controller.inc.php');
  if(empty($_SESSION['etat']))
  {
    require('./views/connexion-view.inc.php');
  }
  elseif($_SESSION['etat'] == 'co')
  {
    require('./views/connected-view.inc.php');
    require('./controllers/connected-controller.inc.php');
  }
  elseif($_SESSION['etat'] == 'crea')
  {
    require('./views/playercrea-view.inc.php');
    require('./controllers/playercrea-controller.inc.php');
  }
   elseif($_SESSION['etat'] == 'creaclub')
  {
    require('./views/creaclub-view.inc.php');
    require('./controllers/creaclub-controller.inc.php');
  }
 elseif($_SESSION['etat'] == 'joueurmodif')
  {
    require('./views/modifjoueur-view.inc.php');
    require('./controllers/modifjoueur-controller.inc.php');
  }