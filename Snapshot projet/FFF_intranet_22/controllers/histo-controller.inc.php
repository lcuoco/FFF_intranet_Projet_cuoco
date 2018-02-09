<?php
$jhisto = $_SESSION['joueuramodif'];
$nomjoueur = $pdo->getNomjoueur($jhisto);
$affijou = $pdo->AffichHisto($jhisto);