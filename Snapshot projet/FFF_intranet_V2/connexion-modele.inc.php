<?php
function cobdd()
    {
        try
        {   
            $bdd = new PDO('mysql:host=localhost:8889;dbname=FFF', 'root', 'root');
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
    }
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
        echo("<h1> Joueurs de votre ligue : </h1><table class = 'tablejoueur'>
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
  function CreaJoueurs($jcateg, $jnom, $jprenom, $jadresse = NULL, $jcp = NULL, $jville = NULL, $jpays = NULL, $jemail = NULL, $jtel = null, $jclub, $jligue)
      {
            try
        {   
            $bdd = new PDO('mysql:host=localhost:8889;dbname=FFF', 'root', 'root');
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
        if(empty($jcateg) || empty($jnom) || empty($jprenom) || empty($jclub) || empty($jligue)){
            echo("<script> alert('Un Des champs obligatoires est vide !')</script>");
        }
        else
        {
            $bdd->exec('INSERT INTO JOUEUR(IDCATEGORIE, NOMJOUEUR, PRENOMJOUEUR, ADRESSEJOUEUR, CPJOUEUR, VILLEJOUEUR, PAYSJOUEUR, EMAILJOUEUR, TELEPHONEJOUEUR, IDCLUB, IDLIGUE) VALUES("'.(int)$jcateg.'","'.$jnom.'","'.$jprenom.'","'.$jadresse.'","'.$jcp.'","'.$jville.'","'.$jpays.'","'.$jemail.'","'.$jtel.'","'.(int)$jclub.'","'.(int)$jligue.'")');
            echo("<script> alert('Joueur ajouté !')</script>");
        }
        

      }
      function AffichClubs()
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
        $_SESSION['ligue'] = $ligue['IDLIGUE'];
        $resultats=$bdd->query('SELECT * FROM CLUB WHERE IDLIGUE = "'.$nbligue.'"');
        echo("<h1> Liste des Clubs</h1><table class = 'tablejoueur'>
            <tr class = 'tablejoueur'>
            <th class = 'tablejoueur'> Nom</th>
            <th class = 'tablejoueur'> Ville</th>
            <th class = 'tablejoueur'> Pays </th>
            </tr>");
        while($reponse = $resultats->fetch()){
            echo("<tr><td class = 'tablejoueur'>".$reponse['NOMCLUB'].'</td>');
            echo("<td class = 'tablejoueur'>".$reponse['VILLECLUB'].'</td>');
            echo("<td class = 'tablejoueur'>".$reponse['PAYSCLUB'].'</td></tr>');

      }
  }
    function CreaClub($cnom, $cville, $cpays)
      {
        $jcateg = $_SESSION['ligue'];
            try
        {   
            $bdd = new PDO('mysql:host=localhost:8889;dbname=FFF', 'root', 'root');
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
        if(empty($cnom) || empty($cville) || empty($cpays)){
            echo("<script> alert('Un Des champs obligatoires est vide !')</script>");
        }
        else
        {
            $bdd->exec('INSERT INTO CLUB(IDLIGUE, NOMCLUB, VILLECLUB, PAYSCLUB) VALUES("'.(int)$jcateg.'","'.$cnom.'","'.$cville.'","'.$cpays.'")');
            echo("<script> alert('Club ajouté !')</script>");
        }
    }

    function ModifJoueur($jmodif, $jcateg = NULL, $jnom = NULL, $jprenom = NULL, $jadresse = NULL, $jcp = NULL, $jville = NULL, $jpays = NULL, $jemail = NULL, $jtel = NULL, $jclub =NULL, $jligue =NULL){
        try
        {   
            $bdd = new PDO('mysql:host=localhost:8889;dbname=FFF', 'root', 'root');
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
        $resultats=$bdd->query('SELECT * FROM JOUEUR WHERE IDJOUEUR = "'.$jmodif.'"');
                while($reponse = $resultats->fetch()){
            $jnombdd = $reponse['NOMJOUEUR'];
            $jprenombdd = $reponse['PRENOMJOUEUR'];
            $jcategbdd = $reponse['IDCATEGORIE'];
            $jaddrbdd = $reponse['ADRESSEJOUEUR'];
            $jcpbdd = $reponse['CPJOUEUR'];
            $jvillebdd = $reponse['VILLEJOUEUR'];
            $jpaysbdd = $reponse['PAYSJOUEUR'];
            $jemailbdd = $reponse['EMAILJOUEUR'];
            $jtelbdd = $reponse['TELEPHONEJOUEUR'];
            $jclubbdd = $reponse['IDCLUB'];
            $jliguebdd = $reponse['IDLIGUE'];
        }
        if(empty($jnom))
        {
            $jnom = $jnombdd;
        }
        if(empty($jprenom))
        {
            $jprenom = $jprenombdd;
        }
        if(empty($jcateg))
        {
            $jcateg = $jcategbdd;
        }
        if(empty($jadresse))
        {
            $jadresse = $jaddrbdd;
        }
        if(empty($jcp))
        {
            $jcp = $jcpbdd;
        }
        if(empty($jville))
        {
            $jville = $jvillebdd;
        }
        if(empty($jpays))
        {
            $jpays = $jpaysbdd;
        }
        if(empty($jemail))
        {
            $jemail = $jemailbdd;
        }
        if(empty($jtel))
        {
            $jtel = $jtelbdd;
        }
        if(empty($jclub))
        {
            $jclub = $jclubbdd;
        }
        if(empty($jligue))
        {
            $jligue = $jliguebdd;
        }
        $bdd->exec('UPDATE JOUEUR SET IDCATEGORIE = "'.(int)$jcateg.'", NOMJOUEUR = "'.$jnom.'", PRENOMJOUEUR = "'.$jprenom.'", ADRESSEJOUEUR = "'.$jadresse.'", CPJOUEUR = "'.$jcp.'", VILLEJOUEUR = "'.$jville.'", PAYSJOUEUR = "'.$jpays.'", EMAILJOUEUR = "'.$jemail.'", TELEPHONEJOUEUR = "'.$jtel.'", IDCLUB = "'.(int)$jclub.'", IDLIGUE = "'.(int)$jligue.'" WHERE IDJOUEUR ="'.$jmodif.'"');
        echo("<script> alert('Joueur modifié !')</script>");
    }

        function modifClub($cmodif,$cnom = NULL, $cville = NULL, $cpays = NULL)
        {

        try
        {   
            $bdd = new PDO('mysql:host=localhost:8889;dbname=FFF', 'root', 'root');
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
        $resultats=$bdd->query('SELECT * FROM CLUB WHERE IDCLUB = "'.$cmodif.'"');
            while($reponse = $resultats->fetch()){
            $cnombdd = $reponse['NOMCLUB'];
            $cvillebdd = $reponse['VILLECLUB'];
            $cpaysbdd = $reponse['PAYSCLUB'];
        }
        if(empty($cnom))
        {
            $cnom = $cnombdd;
        }
        if(empty($cville))
        {
            $cville= $cvillebdd;
        }
        if(empty($cpays))
        {
            $cpays = $cpaysbdd;
        }
        
        $bdd->exec('UPDATE CLUB SET NOMCLUB = "'.$cnom.'", VILLECLUB = "'.$cville.'", PAYSCLUB = "'.$cpays.'" WHERE IDCLUB ="'.$cmodif.'"' );
        echo("<script> alert('Club modifié !')</script>");   
        }
