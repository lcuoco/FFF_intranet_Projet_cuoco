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
require('./modele/FFF_intranet-modele.inc.php');
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
    require('./controllers/bandeau-controller.inc.php');
    switch ($_SESSION['action'])
    {
        case '':
            require('./views/acceuil-view.inc.php');
            break;
        case 'crea':
            require('./views/gestionJoueur-view.inc.php');
            require('./controllers/gestionJoueur-controller.inc.php');

            break;

        case 'creaclub':
            require('./views/creationClub-view.inc.php');
            require('./controllers/creationClub-controller.inc.php');
            break;

        case 'joueurmodif':
            require('./views/modificationJoueur-view.inc.php');
            require('./controllers/modificationJoueur-controller.inc.php');
            break;

        case 'clubmodif':
            require('./views/modificationClub-view.inc.php');
            require('./controllers/modificationClub-controller.inc.php');
            break;

        case 'joueurhisto':
            require('./views/creationJoueur-view.inc.php');
            require('./controllers/creationJoueur-controller.inc.php');
            break;

        case 'transfertjoueur':
            require('./views/transfertJoueur-view.inc.php');
            require('./controllers/transfertJoueur-controller.inc.php');
            break;

        case 'histo':
            require('./controllers/historique-controller.inc.php');
            require('./views/historique-view.inc.php');
            break;
    }
    break;



}
//ici on appel le footer
  require('./views/footer-view.inc.php');

  