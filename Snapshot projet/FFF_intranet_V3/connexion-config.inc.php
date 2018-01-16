<?php
 
  /**
   * Constantes d'accès à la base de données
   * et de configuration du livre d'or
   **/
 
  // Adresse du serveur de base de données
  define('DB_SERVEUR', 'localhost:8889');
 
  // Login
  define('DB_LOGIN','root');
 
  // Mot de passe
  define('DB_PASSWORD','root');
 
  // Nom de la base de données
  define('DB_NOM','testco');
 
  // Nom de la table du livre d'or
  define('DB_GUESTBOOK_TABLE','profil');
 
  // Driver correspondant à la BDD utilisée
  define('DB_DSN','mysql:host='. DB_SERVEUR .';dbname='. DB_NOM);
 
  // Nombre de messages à afficher par page
  define('MAX_MESSAGES_PAR_PAGE', 15);
 
  // URL du livre d'or
  define('URL_GUESTBOOK', 'http://localhost:8888/coMVC/connexion.php');

  