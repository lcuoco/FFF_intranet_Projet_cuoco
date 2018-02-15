<!--
Fichier creationJoueur-view.inc.php qui contient la vue de création des joueurs et localisé dans le dossier views
de FFF_intranet

Cette vue permet notement de créer un joueur dans la base
-->


						<div class="col-lg-offset-4 col-lg-4 col-lg-offset-4">
							<div class="well well-sm crea">
								<div class ="text-center well well-sm back"><h5>Créer un Joueur</h5>
								</div>
									<table class ='table table-borderless table-condensed table-hover'>
										<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES); ?>" method="post">
											<?php 
					        				$lescateg=$pdo->getCategDeroulante();
					        				$nbcateg=$pdo->getNbCategDeroulante();
					        				$clubs = $pdo->getClubs();
					        				$nbclub = $pdo->getNbClub();
					        				$compteurCateg = 0;
					        				$compteurClub = 0;?>
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
        										<?php
												// on recupere ici toutes les donées a mettre dans les liste deroulantes
						        				while($compteurCateg != $nbcateg){?>
						       					<option value="<?php echo $lescateg[$compteurCateg]['IDCATEGORIE']; ?>"> <?php echo $lescateg[$compteurCateg]['nomCategorie']; ?></option>
						       					<?php $compteurCateg++; }?>
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
												<?php 
												// on recupere ici toutes les donées a mettre dans les liste deroulantes
        										while($compteurClub != $nbclub){?>
       											<option value="<?php echo $clubs[$compteurClub ]['IDCLUB']; ?>"><?php echo $clubs[$compteurClub ]['NOMCLUB']; ?></option>
       											<?php $compteurClub++; }?>
       											</select>
												</td>
											</tr>
											<tr>
												<td>(*Champs Obligatoires)</td>
												<td><button class ='btn btn-default' type='submit' name='creeJoueur' value='Crée le joueur'> <span class="glyphicon glyphicon-plus"></span> Créer le joueur</button></td>