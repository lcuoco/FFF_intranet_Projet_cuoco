<?php

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
  // On enregistre le message dans la BDD
  if (0 === sizeof($aListeErreurs))
  {
      $idToCheck = $_POST['pseudo'];
      $pwdToCheck = $_POST['pwd'];
      connectiondir($idToCheck, $pwdToCheck);
      echo"<script>document.location.href='connexion.php';</script>";
      

    
  }
}
 