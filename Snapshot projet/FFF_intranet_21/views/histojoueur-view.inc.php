						<div class="col-lg-offset-4 col-lg-4 col-lg-offset-4">
							<div class="well well-sm crea">
								<div class ="text-center well well-sm back"><h5>Créer un Joueur</h5>
								</div>
									<table class ='table table-borderless table-condensed table-hover'>
										<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES); ?>" method="post">
											<tr>
												<td class = 'libeletable' >Nom : *</td> 
												<td><input type = 'text' name='nomJoueur'></td>
											</tr>
											<tr>
												<td class = 'libeletable' >Prenom : *</td>
												<td><input type = 'text' name='prenomJoueur'></td>
											</tr>
											<tr>
												<td class = 'libeletable' >Categorie : </td>
												<td><select name='categJoueur' id = 'categJoueur'>
        										<?php $resultats=PdoFFF::$monPdo->query('SELECT * FROM CATEGORIE');
        										while($reponse = $resultats->fetch()){?>
       											<option value="<?php echo $reponse['IDCATEGORIE']; ?>"><?php echo $reponse['nomCategorie']; ?></option>
       											<?php }?>
       											</td>
											</tr>
											<tr>
												<td class = 'libeletable' >Adresse : </td>
												<td><input type = 'text' name='adresseJoueur'></td>
											</tr>
											<tr>
												<td class = 'libeletable' >Code Postal : </td>
												<td><input type = 'text' name='cpJoueur'></td>
											</tr>
											<tr>
												<td class = 'libeletable' >Ville : </td>
												<td><input type = 'text' name='villeJoueur'></td>
											</tr>
											<tr>
												<td class = 'libeletable' >Pays : </td>
												<td><input type = 'text' name='paysJoueur'></td>
											</tr>
											<tr>
												<td class = 'libeletable' >Email : </td>
												<td><input type = 'text' name='emailJoueur'></td>
											</tr>
											<tr>
												<td class = 'libeletable' >Téléphone : </td>
												<td><input type = 'text' name='telephoneJoueur'></td>
											</tr>
											<tr>
												<td class = 'libeletable' >Club : </td>
												<td><select name='clubJoueur' id ='clubJoueur'>
												<?php $resultats=PdoFFF::$monPdo->query('SELECT * FROM CLUB WHERE IDLIGUE = "'.$_SESSION['idligueco'].'"');
        										while($reponse = $resultats->fetch()){?>
       											<option value="<?php echo $reponse['IDCLUB']; ?>"><?php echo $reponse['NOMCLUB']; ?></option>
       											<?php }?>
       											</select>
												</td>
											</tr>
											<tr>
												<td>(*Champs Obligatoires)</td>
												<td><button class ='btn btn-default' type='submit' name='creeJoueur' value='Crée le joueur'> <span class="glyphicon glyphicon-plus"></span> Créer le joueur</button></td>