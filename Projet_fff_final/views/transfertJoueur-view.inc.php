	   <!--
Fichier transfertJoueur-view.inc.php qui contient la vue transfert des joueurs vers des clubs et localisé dans le dossier views
de FFF_intranet

Cette vue permet notement de faire des transferts.
-->

       <form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES); ?>" method="post">
            <button type="submit" class="btn btn-danger" name="retour" value="Retourner" style='margin-bottom: 10px; margin-left: 10px;'><span class="glyphicon glyphicon-circle-arrow-left"></span> Retour</button></form>
                <div class="well well-sm col-lg-offset-4 col-lg-4 col-lg-offset-4">
	               <table class ='table table-borderless table-condensed table-hover'>
			         <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES); ?>" method="post">
				        <div class ="text-center"><div class ='well well-sm back'> <h5>Transfert</h5></div> 
					       <select class ='centrea btn btn-default' name="clubint" id="clubint">
					       <?php
                            // on recupere ici toutes les donées a mettre dans les liste deroulantes
                            $clubs = $pdo->getClubs();
                            $nbclub = $pdo->getNbClub();
                            $compteurClub = 0;
                            while($compteurClub != $nbclub){?>
                            <option value="<?php echo $clubs[$compteurClub ]['IDCLUB']; ?>"><?php echo $clubs[$compteurClub ]['NOMCLUB']; ?></option>
                            <?php $compteurClub++; }?>
            				</select><br><br>
        			         <br><input class ='centrea btn btn-default' type='submit' name='modifjoueurclub' value='Faire le changement'></div>
			         </form>
		          </table>
             </div>