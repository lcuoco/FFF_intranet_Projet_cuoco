<?php

function connectiondir($idToCheck, $pwdToCheck)
{
	$bdd = new PDO('mysql:host=localhost:8889;dbname=FFF', 'root', 'root');
	$reponse = $bdd->query('SELECT * FROM DIRECTEUR WHERE IDCOUSER = "'.$idToCheck.'"');
    $requete = $reponse->fetch();
    $idbdd = $requete['IDCOUSER'];
    $mdpbdd = $requete['MDPUSERLIGUE']; 
    if($idbdd == $idToCheck && $pwdToCheck == $mdpbdd){
    session_start();
    $_SESSION['idUser'] = $requete['IDCOUSER'];
    $_SESSION['etat'] = 'co';
    echo"<script>document.location.href='connexion.php';</script>";
    }
    else{
       	echo'Mauvais mot de passe';
        echo"<script>document.location.href='connexion.php';</script>";

      }
}

function AffichJoueurs()
     {
        try
        {   
            $bdd = new PDO('mysql:host=localhost:8889;dbname=FFF', 'root', 'root');
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
        $repligue=$bdd->query('SELECT * FROM DIRECTEUR WHERE IDCOUSER = "'.$_SESSION['idUser'].'"');
        $ligue = $repligue->fetch();
        $nbligue = $ligue['IDLIGUE'];
        $resultats=$bdd->query('SELECT * FROM JOUEUR WHERE IDLIGUE = "'.$nbligue.'"');
        echo("<table class = 'tablejoueur'>
            <tr class = 'tablejoueur'>
            <th class = 'tablejoueur'> Nom</th>
            <th class = 'tablejoueur'> Prenom</th>
            <th class = 'tablejoueur'> Categorie </th>
            <th class = 'tablejoueur'> Adresse </th>
            <th class = 'tablejoueur'> Code Postal</th>
            <th class = 'tablejoueur'> Ville </th>
            <th class = 'tablejoueur'> Pays </th>
            <th class = 'tablejoueur'> Adresse Mail</th>
            <th class = 'tablejoueur'> Numeros de Telephone</th>
            <th class = 'tablejoueur'> Club de foot</th>
            <th class = 'tablejoueur'> Ligue</th>
            </tr>");
        while($reponse = $resultats->fetch()){
            echo("<tr><td class = 'tablejoueur'>".$reponse['NOMJOUEUR'].'</td>');
            echo("<td class = 'tablejoueur'>".$reponse['PRENOMJOUEUR'].'</td>');
            echo("<td class = 'tablejoueur'>".$reponse['IDCATEGORIE'].'</td>');
            echo("<td class = 'tablejoueur'>".$reponse['ADRESSEJOUEUR'].'</td>');
            echo("<td class = 'tablejoueur'>".$reponse['CPJOUEUR'].'</td>');
            echo("<td class = 'tablejoueur'>".$reponse['VILLEJOUEUR'].'</td>');
            echo("<td class = 'tablejoueur'>".$reponse['PAYSJOUEUR'].'</td>');
            echo("<td class = 'tablejoueur'>".$reponse['EMAILJOUEUR'].'</td>');
            echo("<td class = 'tablejoueur'>".$reponse['TELEPHONEJOUEUR'].'</td>');
            echo("<td class = 'tablejoueur'>".$reponse['IDCLUB'].'</td>');
            echo("<td class = 'tablejoueur'>".$reponse['IDLIGUE'].'</td></tr>');

      }
  }
?>