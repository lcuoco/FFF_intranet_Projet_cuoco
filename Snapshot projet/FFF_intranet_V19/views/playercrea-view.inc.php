
<html>
	<head>
		<link rel="icon" type="image/png" href="balle.png" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="connexion-index.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
		<title> Portail de Gestion de la FFF  </title>
	</head>
	<body>
		<div class ="fluid-container">
			 <div class="row">
  				<div class="col-lg-12">
  					<div class =" well well-sm " style ="margin-left: 10px; margin-right: 10px;">
					<?php
					$pdo->AffichJoueurs();?>


							</div>
					<div class ="col-lg-offset-1 col-lg-3">
						<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES); ?>" method="post">
						<button class ='btn btn-primary' type='submit' name='creationj' value='Crée un joueur'> <span class="glyphicon glyphicon-plus"></span> Créer un nouveau joueur</button>
					</form>
					</div>
					<div class ="col-lg-7">
								<?php if ($_SESSION['ok'] != 1)
								{$pdo->AffichHisto(null, 'hidden'); } 
								else {echo $_SESSION['a'];}
								$_SESSION['ok'] = 0;
								?>
						</div>
					</div>

											</tr>
										</form>
									</table>
								</div>
							</div>
						</div>




							


