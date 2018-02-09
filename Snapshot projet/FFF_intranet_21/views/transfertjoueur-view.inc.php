	<div class="well well-sm col-lg-offset-4 col-lg-4 col-lg-offset-4">
	       <table class ='table table-borderless table-condensed table-hover'>
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES); ?>" method="post">
				<div class ="text-center"><div class ='well well-sm back'> <h5>Transfert</h5></div> 
					<select class ='centrea btn btn-default' name="clubint" id="clubint">
					<?php
        				$repligue=PdoFFF::$monPdo->query('SELECT * FROM DIRECTEUR WHERE IDCOUSER = "'.$_SESSION['idUser'].'"');
        				$ligue = $repligue->fetch();
        				$nbligue = $ligue['IDLIGUE'];
        				$resultats=PdoFFF::$monPdo->query('SELECT * FROM CLUB WHERE IDLIGUE = "'.$nbligue.'"');
        				while($reponse = $resultats->fetch()){?>
        				<option value="<?php echo $reponse['IDCLUB']; ?>"> <?php echo $reponse['NOMCLUB'] ?></option>
        				<?php } ?>
        				</select><br><br>
        			<br><input class ='centrea btn btn-default' type='submit' name='modifjoueurclub' value='Faire le changement'></div>
			</form>
		</table>
        </div>