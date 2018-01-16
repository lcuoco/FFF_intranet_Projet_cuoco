<?php
session_start();
//Ici nous somes dans le controler singleton qui va permettre d'inclure le modeole ainsi que les diffrentes vues en fonction des diffrents controlers
// on demare ici une session pour pouvoirstocker dans une variable de session l'etat qui en fonction de sa valeur enverra une vue ou une autre
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
  elseif($_SESSION['etat'] == 'clubmodif')
  {
    require('./views/modifclub-view.inc.php');
    require('./controllers/modifclub-controller.inc.php');
  }