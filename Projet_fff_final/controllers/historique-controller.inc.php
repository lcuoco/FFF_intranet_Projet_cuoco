<?php
/**
* le fichier historique-controller.inc.php se trouve dans le dossier controller et permet l'affichage de l'historique d'un joueur séléctionner precedement
*
*/
$jhisto = $_SESSION['joueuramodif'];
$nomjoueur = $pdo->getNomjoueur($jhisto);
$affijou = $pdo->AffichHisto($jhisto);