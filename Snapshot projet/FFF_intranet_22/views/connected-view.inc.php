<!-- cette vue est la vue affiché quand l'utilisateur resussi à s'authetifier-->
<html >
  <head>
    <title>Portail de Gestion de la FFF</title>
    <link rel="icon" type="image/png" href="./images/balle.png" >
    <link rel="stylesheet" type="text/css" href="connexion-index.css">
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
  <!-- Contenant qui contient le texte a afficher au directeur de ligue -->
  <div class="container"> 
  <div class="well">
  <h1 class ="text-center"> Bonjour Monsieur <?php echo $_SESSION['idUser'] ?> :</h1>
  <div class ="text-center"><h2><small>Cette Apllication Web va vous permettre de créer ou de mettre à jour les informations relatives aux joueurs et aux clubs appartenant à votre ligue et relative à la <abbr title ="Fédération Française de Football">FFF</abbr>. <br><br> <u>Pour commencer veuillez choisir une rubrique corespondant à vos besoin dans le bandeau ci-dessus.</u></p><small></h2></div>
</body>
</html>