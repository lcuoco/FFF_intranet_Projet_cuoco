<?php
session_start();
    require(dirname(__FILE__).'/connexion-modele.inc.php');
    require(dirname(__FILE__).'/connexion-controller.inc.php');
  if(empty($_SESSION['etat']))
  {
    require(dirname(__FILE__).'/connexion-view.inc.php');
  }
  else
  {
    require(dirname(__FILE__).'/ok.php');
    require(dirname(__FILE__).'/connected-controller.inc.php');
  }
echo' session:'.$_SESSION['etat'];