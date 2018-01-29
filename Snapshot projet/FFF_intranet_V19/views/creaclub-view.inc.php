 
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="connexion-index.css">
		<link rel="icon" type="image/png" href="balle.png" />
		<title>Portail de Gestion de la FFF</title>
	</head>
	<body>
			<div class ="fluid-container">
			 <div class="row">
  				<div class="col-lg-offset-1 col-lg-5">
  					<div class =" well well-sm" style ="margin-left: 10px;">
     	<!-- On appel la fonction Affich club qui renoie le tableau des clubs -->
  		<?php	$pdo->AffichClubs(); 
          try
        {   
            $bdd = new PDO('mysql:host='.$_SESSION['host'].';dbname='.$_SESSION['db'].'',''.$_SESSION['user'].'',''.$_SESSION['mdp'].'');
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }?>
    </div>
</div>
					<!-- On a ici le formulaire permettant de crée un club -->
					<div class="col-lg-5" style ="margin-right: 10px;">
  					<div class =" well well-sm" >
					<div class ='text-center'><div class ='well well-sm back'><h5>Création</h5></div></div><small><h6> <form method='post'><table class = 'table '>
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
								<td><button type='submit' name='creeClub' value='Crée le Club' class='centreb btn btn-default'> <span class="glyphicon glyphicon-plus"></span> Créer le Club</button></td>
							</tr>
						</form>
					</table></div></div>

				</div>
			</div>
		</form>
	</h6>
	</small>
</div>
</div>
</div>
</div>
</body>



