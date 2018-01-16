<?php
session_start();
    require(dirname(__FILE__).'/connexion-modele.inc.php');
    require(dirname(__FILE__).'/connexion-controller.inc.php');
  if(empty($_SESSION['etat']))
  {
    require(dirname(__FILE__).'/connexion-view.inc.php');
  }
  elseif($_SESSION['etat'] == 'co')
  {
    require(dirname(__FILE__).'/connected-view.inc.php');
    require(dirname(__FILE__).'/connected-controller.inc.php');
  }
  elseif($_SESSION['etat'] == 'crea')
  {
    require(dirname(__FILE__).'/playercrea-view.inc.php');
    require(dirname(__FILE__).'/playercrea-controller.inc.php');
  }
   elseif($_SESSION['etat'] == 'creaclub')
  {
    require(dirname(__FILE__).'/creaclub-view.inc.php');
    require(dirname(__FILE__).'/creaclub-controller.inc.php');
  }