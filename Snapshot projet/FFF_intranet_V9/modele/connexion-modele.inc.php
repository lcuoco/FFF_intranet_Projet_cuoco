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
    $idligue = $requete['IDLIGUE'];
    $_SESSION['idligueco'] = $idligue;
    $idbdd = $requete['IDCOUSER'];
    $mdpbdd = $requete['MDPUSERLIGUE'];
    if($idbdd == $idToCheck && $pwdToCheck == $mdpbdd){
    session_start();
    $_SESSION['idUser'] = $requete['IDCOUSER'];
    $_SESSION['etat'] = 'co';
    echo"<script>document.location.href='connexion.php';</script>";
    }
    else{
        echo("<script> alert('Identifiant ou mot de passe éronnées!')</script>"); 

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
        $resultats=$bdd->query('SELECT * FROM JOUEUR WHERE IDLIGUE = "'.$nbligue.'" ORDER BY IDCATEGORIE');
        $idfnc = array();
        $i=0;
        echo("<form method='post'><table class = 'tablejoueur'>
            <tr><td colspan='10' ><h2> Joueurs de votre ligue : </h2></td></tr>
            <tr class = 'tablejoueurc'>
            <th class = 'tablejoueurc'> Nom</th>
            <th class = 'tablejoueurc'> Prenom</th>
            <th class = 'tablejoueurc'> Categorie </th>
            <th class = 'tablejoueurc'> Adresse </th>
            <th class = 'tablejoueurc'> Code Postal</th>
            <th class = 'tablejoueurc'> Ville </th>
            <th class = 'tablejoueurc'> Pays </th>
            <th class = 'tablejoueurc'> Adresse Mail</th>
            <th class = 'tablejoueurc'> Numeros de Telephone</th>
            <th class = 'tablejoueurc'> Club de foot</th>
            <th class = 'tablejoueurc'> Action à réaliser</th>
            </tr>");
        while($reponse = $resultats->fetch()){
            echo("<tr><td class = 'tablejoueurc'>".$reponse['NOMJOUEUR'].'</td>');
            echo("<td class = 'tablejoueurc'>".$reponse['PRENOMJOUEUR'].'</td>');
            echo("<td class = 'tablejoueurc'>".$reponse['IDCATEGORIE'].'</td>');
            echo("<td class = 'tablejoueurc'>".$reponse['ADRESSEJOUEUR'].'</td>');
            echo("<td class = 'tablejoueurc'>".$reponse['CPJOUEUR'].'</td>');
            echo("<td class = 'tablejoueurc'>".$reponse['VILLEJOUEUR'].'</td>');
            echo("<td class = 'tablejoueurc'>".$reponse['PAYSJOUEUR'].'</td>');
            echo("<td class = 'tablejoueurc'>".$reponse['EMAILJOUEUR'].'</td>');
            echo("<td class = 'tablejoueurc'>".$reponse['TELEPHONEJOUEUR'].'</td>');
            $repclub = $bdd->query('SELECT * FROM CLUB WHERE IDCLUB = "'.$reponse['IDCLUB'].'"');
            $afficlubnom = $repclub->fetch();
            $idfnc[$i] = $reponse['IDJOUEUR'];
            echo("<td class = 'tablejoueurc'>".$afficlubnom['NOMCLUB'].'</td>');
            echo('<td class = "tablejoueurc"><input type="submit" name="modfier'.$i.'" value="Modifier" /></td></tr>');
            $i = $i+1;

      }
      echo('</table></form>');
      $_SESSION['tab'] = $idfnc;     
  }
  function recoit($id)
  {

  }
  function CreaJoueurs($jcateg, $jnom, $jprenom, $jadresse = NULL, $jcp = NULL, $jville = NULL, $jpays = NULL, $jemail = NULL, $jtel = null, $jclub)
      {
        $date = date('d-m-Y');
            try
        {   
            $bdd = new PDO('mysql:host=localhost:8889;dbname=FFF', 'root', 'root');
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
        if(empty($jcateg) || empty($jnom) || empty($jprenom) || empty($jclub)){
            echo("<script> alert('Un Des champs obligatoires est vide !')</script>");
        }
        else
        {
            $numlic = $jcateg.$jnom.$jprenom.$jclub.$date;
            
            $bdd->exec('INSERT INTO JOUEUR(IDCATEGORIE, NOMJOUEUR, PRENOMJOUEUR, ADRESSEJOUEUR, CPJOUEUR, VILLEJOUEUR, PAYSJOUEUR, EMAILJOUEUR, TELEPHONEJOUEUR, IDCLUB, IDLIGUE, IDINSCRIPTION) VALUES("'.(int)$jcateg.'","'.$jnom.'","'.$jprenom.'","'.$jadresse.'","'.$jcp.'","'.$jville.'","'.$jpays.'","'.$jemail.'","'.$jtel.'","'.(int)$jclub.'","'.(int)$_SESSION['idligueco'].'", 1)');
            echo("<script> alert('Joueur ajouté !')</script>");
            $bdd->exec('INSERT INTO LICENCE(NUMEROSLICENCE) VALUES("'.$numlic.'")');
            $resj = $bdd->query('SELECT IDJOUEUR FROM JOUEUR WHERE NOMJOUEUR = "'.$jnom.'" AND PRENOMJOUEUR = "'.$jprenom.'"');
            $tabj = $resj->fetch();
            $reslic = $bdd->query('SELECT IDLICENCE FROM LICENCE WHERE NUMEROSLICENCE = "'.$numlic.'"');
            $tablic = $reslic->fetch();
            $bdd->exec('INSERT INTO INSCRIPTION(IDJOUEUR, IDLICENCE, DATEINSCRIPTION, IDCLUB) VALUES("'.(int)$tabj['IDJOUEUR'].'","'.(int)$tablic['IDLICENCE'].'", NOW(),"'.(int)$jclub.'")');
            $resmodlic = $bdd->query('SELECT IDINSCRIPTION FROM INSCRIPTION WHERE IDJOUEUR ="'.(int)$tabj['IDJOUEUR'].'"');
            $resmodtab = $resmodlic->fetch();
            $bdd->exec('UPDATE JOUEUR SET IDINSCRIPTION = "'.$resmodtab['IDINSCRIPTION'].'" WHERE IDJOUEUR ="'.(int)$tabj['IDJOUEUR'].'"');
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
        $idclub = array();
        $i=0;
        $repligue=$bdd->query('SELECT * FROM DIRECTEUR WHERE IDCOUSER = "'.$_SESSION['idUser'].'"');
        $ligue = $repligue->fetch();
        $nbligue = $ligue['IDLIGUE'];
        $_SESSION['ligue'] = $ligue['IDLIGUE'];
        $resultats=$bdd->query('SELECT * FROM CLUB WHERE IDLIGUE = "'.$nbligue.'"');
        echo("<table class = 'tablejoueur'><form method='post'>
            <tr><td colspan ='4'><h2> Liste des Clubs</h2></td></tr>
            <tr class = 'tablejoueurc'>
            <th class = 'tablejoueurc'> Nom</th>
            <th class = 'tablejoueurc'> Ville</th>
            <th class = 'tablejoueurc'> Pays </th>
            <th class = 'tablejoueurc'> Action à réaliser</th>
            </tr>");
        while($reponse = $resultats->fetch()){
            echo("<tr><td class = 'tablejoueurc'>".$reponse['NOMCLUB'].'</td>');
            echo("<td class = 'tablejoueurc'>".$reponse['VILLECLUB'].'</td>');
            echo("<td class = 'tablejoueurc'>".$reponse['PAYSCLUB'].'</td>');
            $idclub[$i] = $reponse['IDCLUB'];
            echo('<td class = "tablejoueurc"><input type="submit" name="modfier'.$i.'" value="Modifier" /></td></tr>');
            $i = $i+1;

      }
      echo('</form></table>');
      $_SESSION['tabclub'] = $idclub;  
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

    function ModifJoueur($jmodif, $jcateg = NULL, $jnom = NULL, $jprenom = NULL, $jadresse = NULL, $jcp = NULL, $jville = NULL, $jpays = NULL, $jemail = NULL, $jtel = NULL){
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
        if(empty($jligue))
        {
            $jligue = $jliguebdd;
        }
        $bdd->exec('UPDATE JOUEUR SET IDCATEGORIE = "'.(int)$jcateg.'", NOMJOUEUR = "'.$jnom.'", PRENOMJOUEUR = "'.$jprenom.'", ADRESSEJOUEUR = "'.$jadresse.'", CPJOUEUR = "'.$jcp.'", VILLEJOUEUR = "'.$jville.'", PAYSJOUEUR = "'.$jpays.'", EMAILJOUEUR = "'.$jemail.'", TELEPHONEJOUEUR = "'.$jtel.'", IDLIGUE = "'.(int)$_SESSION['idligueco'].'" WHERE IDJOUEUR ="'.$jmodif.'"');
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
        function SuppClub($csupp)
        {
            try
            {   
                $bdd = new PDO('mysql:host=localhost:8889;dbname=FFF', 'root', 'root');
            }
            catch (Exception $e)
            {
                die('Erreur : ' . $e->getMessage());
            }
            $bdd->exec('DELETE FROM CLUB WHERE IDCLUB = "'.$csupp.'"');
            echo("<script> alert('Club Supprimé !')</script>"); 

        }
        function modifclubjoueur($joueur, $club)
        {
            $date = date('d-m-Y');
            try
            {   
                $bdd = new PDO('mysql:host=localhost:8889;dbname=FFF', 'root', 'root');
            }
            catch (Exception $e)
            {
                die('Erreur : ' . $e->getMessage());
            }
            $reqclub = $bdd->query('SELECT * FROM JOUEUR WHERE IDJOUEUR = "'.$joueur.'"');
            $checkclub = $reqclub->fetch();
            if ($club == $checkclub['IDCLUB'])
            {
                echo("<script> alert('Ce joueur fait deja partie de ce club !')</script>");
            }
            else
            {
            $bdd->exec('UPDATE JOUEUR SET IDCLUB = "'.$club.'" WHERE IDJOUEUR ="'.$joueur.'"' );
            $resultats=$bdd->query('SELECT * FROM JOUEUR WHERE IDJOUEUR = "'.$joueur.'"');
                while($reponse = $resultats->fetch()){
            $jnombdd = $reponse['NOMJOUEUR'];
            $jprenombdd = $reponse['PRENOMJOUEUR'];
            $jcategbdd = $reponse['IDCATEGORIE'];
            $jclubbdd = $reponse['IDCLUB'];}
            $numlic = $jcategbdd.$jnombdd.$jprenombdd.$jclubbdd.$date;
            $bdd->exec('INSERT INTO LICENCE(NUMEROSLICENCE) VALUES("'.$numlic.'")');
            $resj = $bdd->query('SELECT IDJOUEUR FROM JOUEUR WHERE NOMJOUEUR = "'.$jnombdd.'" AND PRENOMJOUEUR = "'.$jprenombdd.'"');
            $tabj = $resj->fetch();
            $reslic = $bdd->query('SELECT IDLICENCE FROM LICENCE WHERE NUMEROSLICENCE = "'.$numlic.'"');
            $tablic = $reslic->fetch();
            $bdd->exec('INSERT INTO INSCRIPTION(IDJOUEUR, IDLICENCE, DATEINSCRIPTION, IDCLUB) VALUES("'.(int)$tabj['IDJOUEUR'].'","'.(int)$tablic['IDLICENCE'].'", NOW(),"'.(int)$club.'")');
            $resmodlic = $bdd->query('SELECT IDINSCRIPTION FROM INSCRIPTION WHERE IDJOUEUR ="'.(int)$tabj['IDJOUEUR'].'"');
            $resmodtab = $resmodlic->fetch();
            $bdd->exec('UPDATE JOUEUR SET IDINSCRIPTION = "'.$resmodtab['IDINSCRIPTION'].'" WHERE IDJOUEUR ="'.(int)$tabj['IDJOUEUR'].'"');
            }
        }
        function AffichHisto($jhisto)
        {
         try
        {   
            $bdd = new PDO('mysql:host=localhost:8889;dbname=FFF', 'root', 'root');
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
        $repjoueur=$bdd->query('SELECT * FROM INSCRIPTION WHERE IDJOUEUR = "'.$jhisto.'"');
        echo("<td class ='cellule4'><table class = 'affichjoueurhisto'>
            <tr><td colspan ='4' class ='titretable'><h2> Historique du joueur</h2></td></tr>
            <tr class = 'tablejoueurc'>
            <th class = 'tablejoueurc'> Nom</th>
            <th class = 'tablejoueurc'> Club</th>
            <th class = 'tablejoueurc'> Date D'INSCRIPTION</th>
            <th class = 'tablejoueurc'> Numeros de la licence</th>
            </tr>");
        while($reponse = $repjoueur->fetch()){
            $repjou = $bdd->query('SELECT * FROM JOUEUR WHERE IDJOUEUR = "'.$jhisto.'"');
            $affijou = $repjou->fetch();
            echo("<td class = 'tablejoueurc'>".$affijou['NOMJOUEUR'].'</td>');
            $repclub = $bdd->query('SELECT * FROM CLUB WHERE IDCLUB = "'.$reponse['IDCLUB'].'"');
            $afficlubnom = $repclub->fetch();
            echo("<td class = 'tablejoueurc'>".$afficlubnom['NOMCLUB'].'</td>');
            echo("<td class = 'tablejoueurc'>".$reponse['DATEINSCRIPTION'].'</td>');
            $replic = $bdd->query('SELECT * FROM LICENCE WHERE IDLICENCE = "'.$reponse['IDLICENCE'].'"');
            $affilicnum = $replic->fetch();
            echo("<td class = 'tablejoueurc'>".$affilicnum['NUMEROSLICENCE'].'</td></tr>');


      }
      echo('</table></td></tr></table>');
  }
        