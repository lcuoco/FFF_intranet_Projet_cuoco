<div class = 'container'>
      <div class = 'row'>
            <form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES); ?>" method="post">
            <button type="submit" class="btn btn-danger" name="retour" value="Retourner" style='margin-bottom: 10px; margin-left: 10px;'><span class="glyphicon glyphicon-circle-arrow-left"></span> Retour</button></form>
<div class =' well well-sm ' style ='margin-left: 10px;'><div class ='well well-sm back'><div class ='text-center '> <h5>Historique du joueur</h5></div></div><table class = 'table table-bordered table-striped table-hover '>
            <tr class = 'tablejoueurc'>
            <th class = 'tablejoueurc'> Nom</th>
            <th class = 'tablejoueurc'> Club</th>
            <th class = 'tablejoueurc'> Date d'inscription</th>
            <th class = 'tablejoueurc'> Numero de la licence</th>
            </tr>

            <?php 
            $i = 0;

            while( $i != count($affijou))
            {
            echo("<td class = 'tablejoueurc'>".$nomjoueur['NOMJOUEUR'].'</td>');
            echo("<td class = 'tablejoueurc'>".$affijou[$i]['NOMCLUB'].'</td>');
            echo("<td class = 'tablejoueurc'>".$affijou[$i]['DATEINSCRIPTION'].'</td>');
            echo("<td class = 'tablejoueurc'>".$affijou[$i]['NUMEROSLICENCE'].'</td></tr>');
            $i++;
        	}
?>
</table>
</div>
</div>