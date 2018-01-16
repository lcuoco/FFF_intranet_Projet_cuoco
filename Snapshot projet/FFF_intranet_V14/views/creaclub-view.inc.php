 
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="connexion-index.css">
		<link rel="icon" type="image/png" href="balle.png" />
		<title>Portail de Gestion de la FFF</title>
	</head>
	<body>
			<div class ="fluid-container">
			 <div class="row">
  				<div class="col-lg-4">
  					<div class =" well well-sm" style ="margin-left: 10px;">
     	<!-- On appel la fonction Affich club qui renoie le tableau des clubs -->
  		<?php	AffichClubs(); 
          try
        {   
            $bdd = new PDO('mysql:host=localhost:8889;dbname=FFF', 'root', 'root');
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }?>
    </div>
</div>
					<!-- On a ici le formulaire permettant de crée un club -->
					<div class="col-lg-4">
  					<div class =" well well-sm" >
					<div class ='text-center'><h5>Création</h5></div><small><h6> <form method='post'><table class = 'table '>
						<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES); ?>" method="post">
							<tr>
								<td class ='libeletable'>Nom : </td> 
								<td><input type = 'text' name='nomClub'> (Champ Obligatoire)</td>
							</tr>
							<tr>
								<td class ='libeletable'>Ville : </td>
								<td><input type = 'text' name='villeClub'> (Champ Obligatoire)</td>
							</tr>
							<tr>
								<td class ='libeletable'>Pays : </td>
								<td><input type = 'text' name='paysClub'> (Champ Obligatoire)</td>
							</tr>
								<td></td>
								<td><button type='submit' name='creeClub' value='Crée le Club' class='centreb btn btn-default'> <span class="glyphicon glyphicon-plus"></span> Crée le Club</button></td>
							</tr>
						</form>
					</table></div></div>
					<!-- On a ici le formulaire permettant de supprimer un club -->
					<div class="col-lg-4">
  					<div class =" well well-sm" style ="margin-right: 10px;">
					<div class ='text-center'><h5>Supression</h5></div><small><h6> <form method='post'><table class = 'table '>
						<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES); ?>" method="post">
							<tr>
								<td>
								<div class ="text-center"><h6><br>Nom : </h6>
							<select  class ='centreb btn btn-default' name="clubsupp" id="clubsupp" class='buttonsub' >
								<?php
								$repligue=$bdd->query('SELECT * FROM DIRECTEUR WHERE IDCOUSER = "'.$_SESSION['idUser'].'"');
        						$ligue = $repligue->fetch();
        						$nbligue = $ligue['IDLIGUE'];
        						$resultats=$bdd->query('SELECT * FROM CLUB WHERE IDLIGUE = "'.$nbligue.'"');
        						while($reponse = $resultats->fetch()){?>
        						<option value="<?php echo $reponse['IDCLUB']; ?>"> <?php echo $reponse['NOMCLUB'] ?></option>
								<?php } ?>
								</select><br><br>
								<input type='submit' name='suppClub' value='Supprimer le Club' class='centreb btn btn-default'> <br><br>
								<div class ="text-center"> (Un Club ne sera pas supprimé si des<br> joueurs sont encore à l'interieur)</div>
							</div></td>
						</form>
					</table>
				</div>
			</div>
	</body>
</html>


