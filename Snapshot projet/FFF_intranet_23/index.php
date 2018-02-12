<?php
session_start();

/**
* Fichier index.php
*
*Ici nous somes dans le controler singleton qui va permettre d'inclure le modeole ainsi que les diffrentes vues en fonction des diffrents controlers
*
*on demare ici une session pour pouvoirstocker dans une variable de session l'etat qui en fonction de sa valeur enverra une vue ou une autre
*
*/ 


    //En premier lieu on appelle le modele
    require('./modele/connexion-modele.inc.php');
    //recuperation de l'unique insatnce de la classe 
    $pdo = PdoFFF::getPdoFFF();
    require('./controllers/connexion-controller.inc.php');
    
//Ici on peut voir les differntes cas possibles et donc les differents appels en fonction des actions
switch ($_SESSION['etat'])
{
  case '':
    require('./views/connexion-view.inc.php');
    break;

  case 'co':
    require('./views/bandeau-view.inc.php');
    require('./views/connected-view.inc.php');
    require('./controllers/bandeau-controller.inc.php');
    break;

  case 'crea':
    require('./views/bandeau-view.inc.php');
    require('./views/playercrea-view.inc.php');
    require('./controllers/playercrea-controller.inc.php');
    require('./controllers/bandeau-controller.inc.php');
    break;

  case 'creaclub':
    require('./views/bandeau-view.inc.php');
    require('./views/creaclub-view.inc.php');
    require('./controllers/creaclub-controller.inc.php');
    require('./controllers/bandeau-controller.inc.php');
    break;

  case 'joueurmodif':
    require('./views/bandeau-view.inc.php');
    require('./views/modifjoueur-view.inc.php');
    require('./controllers/modifjoueur-controller.inc.php');
    require('./controllers/bandeau-controller.inc.php');
    break;

  case 'clubmodif':
    require('./views/bandeau-view.inc.php');
    require('./views/modifclub-view.inc.php');
    require('./controllers/modifclub-controller.inc.php');
    require('./controllers/bandeau-controller.inc.php');
    break;

  case 'joueurhisto':
    require('./views/bandeau-view.inc.php');
    require('./views/histojoueur-view.inc.php');
    require('./controllers/histojoueur-controller.inc.php');
    require('./controllers/bandeau-controller.inc.php');
    break;

  case 'transfertjoueur':
    require('./views/bandeau-view.inc.php');
    require('./views/transfertjoueur-view.inc.php');
    require('./controllers/transfertjoueur-controller.inc.php');
    require('./controllers/bandeau-controller.inc.php');
    break;

      case 'histo':
    require('./views/bandeau-view.inc.php');
    require('./controllers/histo-controller.inc.php');
    require('./views/histo-view.inc.php');

    require('./controllers/bandeau-controller.inc.php');
    break;

}
//ici on appel le footer
  require('./views/footer-view.inc.php');

  