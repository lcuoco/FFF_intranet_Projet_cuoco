<!--
Fichier acceuil-view.inc.php qui contient la vue de modification des clubs et localisé dans le dossier views
de FFF_intranet

Cette vue permet notement de modifier un club deja existant dans la base
-->
<html>
  <head>
	 <link rel="stylesheet" type="text/css" href="connexion-index.css">
   <link rel="icon" type="image/png" href="./images/balle.png" />
	 <title>Portail de Gestion de la FFF</title>
  </head>
  <body>
    <div class = "container">
      <div class="row">
        <form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES); ?>" method="post">
          <button type="submit" class="btn btn-danger" name="retourc" value="Retourner" style='margin-bottom: 10px; margin-left: 10px;'><span class="glyphicon glyphicon-circle-arrow-left"></span> Retour</button>
        </form>
        <div class="col-lg-offset-4 col-lg-4 well well-sm col-lg-offset-4">

          
      <!-- formlaire peremettant la modification d'un club ne particulier --> 
    <?php
    $resultatacc=PdoFFF::$monPdo->query('SELECT * FROM CLUB WHERE IDCLUB ="'.(int)$_SESSION['clubamodif'].'"');
    $accmodif = $resultatacc->fetch();
    ?> 

    <table class =' tablecent table-borderless table-condensed table-hover'>
      <div class ='text-center'><h5><div class ='well well-sm back'>Modification</h5></div></div>
      </tr>
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES); ?>" method="post">
        <tr>
          <td>Nom : </td> 
          <td><input type = 'text' name='mnomClub' value ="<?php echo $accmodif['NOMCLUB'];?>"> </td>
        </tr>
        <tr>
          <td>Ville : </td>
          <td><input type = 'text' name='mvilleClub' value ="<?php echo $accmodif['VILLECLUB'];?>"> </td>
        </tr>
        <tr>
          <td>Pays : </td>
          <td><input type = 'text' name='mpaysClub' value ="<?php echo $accmodif['PAYSCLUB'];?>"> </td>
        </tr>
        <tr>
          <td></td>
          <td><button class='centreb btn btn-default' type='submit' name='modifClub' value='Modifier le Club'><span class="glyphicon glyphicon-edit"> </span> Modifier le Club</button></td>
        </tr>
      </form>
  </table>
