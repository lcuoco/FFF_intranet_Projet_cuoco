<?php

/**
* Fichier connexion-controller.inc.php
*
*/ 

$aListeErreurs = array();

/** ---- 
 * Contrôle du formulaire
 */
if (!empty($_POST))
{
  // Nettoyage des chaines envoyées
  $_POST['pseudo']  = isset($_POST['pseudo'])  ? trim($_POST['pseudo'])  : '';
  $_POST['mdp'] = isset($_POST['mdp']) ? trim($_POST['mdp']) : '';
 
  // Le pseudo est-il rempli ?
  if (empty($_POST['pseudo']))
  {
    $aListeErreurs[] = 'Veuillez indiquer votre pseudo';
  }
 
  // Le message est-il rempli ?
  if (empty($_POST['pwd']))
  {
    $aListeErreurs[] = 'veuillez indiquer votre mot de passe';
  }

 
  // Si aucune erreur n'a été générée
  // On lance la fonction de test sur les identifiants entré par l'utlilisateur et celle de la base de donnée
  if (0 === sizeof($aListeErreurs))
  {
      $idToCheck = $_POST['pseudo'];
      $pwdToCheck = $_POST['pwd'];
      $pdo->connectiondir($idToCheck, $pwdToCheck);
      

    
  }
}
 