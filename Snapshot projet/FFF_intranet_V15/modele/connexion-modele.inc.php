
<?php
// Le modele permet de gerer toutes les methodes appelés dans le controlleur
//la fonction connctiondir attend en parametre deux chaines de cractere et permet de comparer les informations entré par l'utilisateur et celle contnu dans la base de donnée afin d'authentifier l'utilisateur
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
    echo"<script>document.location.href='index.php';</script>";
    }
    else{
        echo("<script> alert('Identifiant ou mot de passe éronnées!')</script>"); 

      }
}
// la fonction AffichJoeurs permet d'afficher un tableau contenant la liste des joueurs en fonction du directeur de ligue connecté et ordonné par categorie ainsi qu'un bouton permettant de modifier le joueur concerné
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
        echo("<div class ='text-center '><div class ='well well-sm back'><h5>Liste des Joueur</h5></div></div><div class ='tableov'><small><h6> <form method='post'><table class = 'tableov table table-bordered table-striped table-hover '>
            <tr class ='text-center'>
            <th class = 'col-md-1'> Nom</th>
            <th class = 'col-md-1'> Prenom</th>
            <th class = 'col-md-1'> Categorie </th>
            <th class = 'col-md-1'> Adresse </th>
            <th class = 'col-md-1'> Code Postal</th>
            <th class = 'col-md-1'> Ville </th>
            <th class = 'col-md-1'> Pays </th>
            <th class = 'col-md-1'> Adresse Mail</th>
            <th class = 'col-md-1'> Numeros de Telephone</th>
            <th class = 'col-md-1'> Club de foot</th>
            <th class = 'col-md-1'> Action à réaliser</th>
            </tr>");
        while($reponse = $resultats->fetch()){
            echo("<tr><td class = 'col-md-1'>".$reponse['NOMJOUEUR'].'</td>');
            echo("<td class = 'col-md-1'>".$reponse['PRENOMJOUEUR'].'</td>');
            $repcat = $bdd->query('SELECT * FROM CATEGORIE WHERE IDCATEGORIE = "'.$reponse['IDCATEGORIE'].'"');
            $afficatnom = $repcat->fetch();
            echo("<td class = 'col-md-1'>".$afficatnom['nomCategorie'].'</td>');
            echo("<td class = 'col-md-1'>".$reponse['ADRESSEJOUEUR'].'</td>');
            echo("<td class = 'col-md-1'>".$reponse['CPJOUEUR'].'</td>');
            echo("<td class = 'col-md-1'>".$reponse['VILLEJOUEUR'].'</td>');
            echo("<td class = 'col-md-1'>".$reponse['PAYSJOUEUR'].'</td>');
            echo("<td class = 'col-md-1'>".$reponse['EMAILJOUEUR'].'</td>');
            echo("<td class = 'col-md-1'>".$reponse['TELEPHONEJOUEUR'].'</td>');
            $repclub = $bdd->query('SELECT * FROM CLUB WHERE IDCLUB = "'.$reponse['IDCLUB'].'"');
            $afficlubnom = $repclub->fetch();
            $idfnc[$i] = $reponse['IDJOUEUR'];
            echo("<td class = 'tablejoueurc'>".$afficlubnom['NOMCLUB'].'</td>');
            echo('<td class = "tablejoueurc"><input type="submit" name="modfier'.$i.'" value="Modifier" /></td></tr>');
            $i = $i+1;

      }
      echo('</small></h6></table></form></div>');
      $_SESSION['tab'] = $idfnc;     
  }

  //la fonction CreaJoueurs recoit en parametre des chaines de caractere corespondant a ce que l'utilisateur à rentré elle permet de crée un joueur et de le referencier dans la base de donnée
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
      //La fonction AffichClubs permet d'afficher un tableau contenant la liste tous les clubs d'une ligue aisni qu'un bouton permettant de modifier le club souhaité 
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
        echo("<form method='post'>
            <div class ='text-center'><div class ='well well-sm back'><h5>Liste des Clubs</h5></div></div><div class ='tableov'><small><h6> <form method='post'><table class = 'tableov table table-bordered table-striped table-hover hiddens' style ='width:100%;'>
            <tr class ='text-center'>
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
      echo('</small></h6></table></form></div>');
      $_SESSION['tabclub'] = $idclub;  
    }
  //la fonction CreaJoueurs recoit en parametre des chaines de caractere corespondant a ce que l'utilisateur à rentré elle permet de crée une equipe et de le referencier dans la base de donnée
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
//la fonction Modif Joueur permet de modifier un joueur deja existant dans la base de donnée
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
    //la fonction Modif Club permet de modifier un club deja existant dans la base de donnée
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
        //la fonction Modif Club permet de supprimer un club uniquement si aucun joueur n'appartient à ce club
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
        //cette fonction permet de tranferer un joueur d'un club à un autre tout en grdant un historique de ce changement grace a la creation d'une inscriptiuon et d'une licence differnet a chaque transfert
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
        //cette fonction permet d'afficher l'historique de transfert d'un joueur 
        function AffichHisto($jhisto = NULL, $hidden = NULL)
        {
            $_SESSION['a'] ='';
         try
        {   
            $bdd = new PDO('mysql:host=localhost:8889;dbname=FFF', 'root', 'root');
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
        $repjoueur=$bdd->query('SELECT * FROM INSCRIPTION WHERE IDJOUEUR = "'.$jhisto.'"');
        $a =("<div class ='col-lg-4'><table class = 'table table-bordered table-striped table-hover '".$hidden."'>
            <tr class = 'tablejoueurc'>
            <th class = 'tablejoueurc'> Nom</th>
            <th class = 'tablejoueurc'> Club</th>
            <th class = 'tablejoueurc'> Date D'INSCRIPTION</th>
            <th class = 'tablejoueurc'> Numeros de la licence</th>
            </tr>");
        
        while($reponse = $repjoueur->fetch()){
            $repjou = $bdd->query('SELECT * FROM JOUEUR WHERE IDJOUEUR = "'.$jhisto.'"');
            $affijou = $repjou->fetch();
            $a =$a.("<td class = 'tablejoueurc'>".$affijou['NOMJOUEUR'].'</td>');
            $repclub = $bdd->query('SELECT * FROM CLUB WHERE IDCLUB = "'.$reponse['IDCLUB'].'"');
            $afficlubnom = $repclub->fetch();
            $a =$a.("<td class = 'tablejoueurc'>".$afficlubnom['NOMCLUB'].'</td>');
            $a =$a.("<td class = 'tablejoueurc'>".$reponse['DATEINSCRIPTION'].'</td>');
            $replic = $bdd->query('SELECT * FROM LICENCE WHERE IDLICENCE = "'.$reponse['IDLICENCE'].'"');
            $affilicnum = $replic->fetch();
            $a =$a.("<td class = 'tablejoueurc'>".$affilicnum['NUMEROSLICENCE'].'</td></tr>');


      }
      $a =$a.('</table></div>');
      $_SESSION['a'] = $a;
  }
        