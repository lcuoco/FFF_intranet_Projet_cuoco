
<?php
// Le modele permet de gerer toutes les methodes appelés dans le controlleur

class PdoFFF{          
        private static $serveur='mysql:host=localhost:8889';
        private static $bdd='dbname=FFF2';         
        private static $user='DirecteurFFF' ;           
        private static $mdp='fedefr' ;    
        public static $monPdo;
        private static $monPdoFFF=null;
/**
 * Constructeur public, crée l'instance de PDO qui sera sollicitée
 * pour toutes les méthodes de la classe et en dehors
 */             
    public function __construct(){
        PdoFFF::$monPdo = new PDO(PdoFFF::$serveur.';'.PdoFFF::$bdd, PdoFFF::$user, PdoFFF::$mdp); 
        PdoFFF::$monPdo->query("SET CHARACTER SET utf8");
    }
    public function _destruct(){
        PdoFFF::$monPdo = null;
    }
/**
 * Fonction statique qui crée l'unique instance de la classe
 
 * Appel : $instancePdoGsb = PdoGsb::getPdoGsb();
 
 * @return l'unique objet de la classe PdoGsb
 */
    public  static function getPdoFFF(){
        if(PdoFFF::$monPdoFFF==null){
            PdoFFF::$monPdoFFF= new PdoFFF();
        }
        return PdoFFF::$monPdoFFF;  
    }
//la fonction connctiondir attend en parametre deux chaines de cractere et permet de comparer les informations entré par l'utilisateur et celle contnu dans la base de donnée afin d'authentifier l'utilisateur
function connectiondir($idToCheck, $pwdToCheck)
{

	$reponse = PdoFFF::$monPdo->query('SELECT * FROM DIRECTEUR WHERE IDCOUSER = "'.$idToCheck.'"');
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

function getNomjoueur($idjoueur)
{
   $reqnom=PdoFFF::$monPdo->query('SELECT NOMJOUEUR FROM JOUEUR WHERE IDJOUEUR = "'.$idjoueur.'"');
   $nom = $reqnom->fetch();
   return $nom;

}

// la fonction AffichJoeurs permet d'afficher un tableau contenant la liste des joueurs en fonction du directeur de ligue connecté et ordonné par categorie ainsi qu'un bouton permettant de modifier le joueur concerné
function AffichJoueurs()
     {
        $repligue=PdoFFF::$monPdo->prepare('SELECT * FROM DIRECTEUR WHERE IDCOUSER = :iduser');
        $repligue->bindParam(':iduser',$_SESSION['idUser'],PDO::PARAM_INT);
        $repligue->execute();
        $ligue = $repligue->fetch();
        $nbligue = $ligue['IDLIGUE'];
        $resultats=PdoFFF::$monPdo->prepare('SELECT * FROM JOUEUR NATURAL JOIN CLUB NATURAL JOIN INSCRIPTION WHERE IDLIGUE = :nbligue ORDER BY IDCATEGORIE');
        $nbj = PdoFFF::$monPdo->prepare('SELECT COUNT(IDJOUEUR) FROM JOUEUR NATURAL JOIN CLUB NATURAL JOIN INSCRIPTION WHERE IDLIGUE = :nbligue');
        $resultats->bindParam(':nbligue', $nbligue, PDO::PARAM_INT);
        $nbj->bindParam(':nbligue', $nbligue, PDO::PARAM_INT);
        $resultats->execute();
        $nbj->execute();
        $nb = $nbj->fetch();
        $idfnc = array();
        $i=0;
        $reponse = $resultats->fetchAll( PDO::FETCH_ASSOC );
        return $reponse;    
  }
  

  function getLongJoueur()
  {
    $reqprep = PdoFFF::$monPdo->prepare('SELECT COUNT(*) FROM JOUEUR NATURAL JOIN CLUB NATURAL JOIN INSCRIPTION WHERE IDLIGUE = :ligue');
    $reqprep->bindParam(':ligue', $_SESSION['idligueco'], PDO::PARAM_INT);
    $reqprep->execute();
    $longjj = $reqprep->fetch(); 
    return $longjj[0];
  }

  

  function getCategJoueur($idJoueur)
  {
    $repcat = PdoFFF::$monPdo->query('SELECT * FROM CATEGORIE WHERE IDCATEGORIE = "'.$idJoueur.'"');
    $afficatnom = $repcat->fetch();
    $categjoeur = $afficatnom['nomCategorie'];
    return $categjoeur;
  }
  function getClubJoueur($idJoueur)
  {
    $resultatsc=PdoFFF::$monPdo->query('SELECT * FROM INSCRIPTION WHERE IDJOUEUR = "'.$idJoueur.'" ORDER BY DATEINSCRIPTION DESC LIMIT 1');
    $idclub= $resultatsc->fetch();
    $repclub = PdoFFF::$monPdo->query('SELECT * FROM CLUB WHERE IDCLUB = "'.$idclub['IDCLUB'].'"');
    $afficlubnom = $repclub->fetch();
    $club = $afficlubnom['NOMCLUB'];
    return $club;
  }
  function getNbClub()
  {
    $longc = PdoFFF::$monPdo->query('SELECT COUNT(*) FROM CLUB WHERE IDLIGUE = "'.$_SESSION['idligueco'].'"');
    $longcc = $longc->fetch(); 
    return $longcc[0];
  }
  //la fonction CreaJoueurs recoit en parametre des chaines de caractere corespondant a ce que l'utilisateur à rentré elle permet de crée un joueur et de le referencier dans la base de donnée
  function CreaJoueurs($jcateg, $jnom, $jprenom, $jadresse = NULL, $jcp = NULL, $jville = NULL, $jpays = NULL, $jemail = NULL, $jtel = null, $jclub)
      {
        $date = date('d-m-Y');
        if(empty($jcateg) || empty($jnom) || empty($jprenom) || empty($jclub)){
            echo("<script> alert('Un Des champs obligatoires est vide !')</script>");
            echo"<script>document.location.href='index.php';</script>";
        }
        else
        {
            $numlic = $jcateg.$jnom.$jprenom.$jclub.$date;
            
            PdoFFF::$monPdo->exec('INSERT INTO JOUEUR(IDCATEGORIE, NOMJOUEUR, PRENOMJOUEUR, ADRESSEJOUEUR, CPJOUEUR, VILLEJOUEUR, PAYSJOUEUR, EMAILJOUEUR, TELEPHONEJOUEUR, IDINSCRIPTION) VALUES("'.(int)$jcateg.'","'.$jnom.'","'.$jprenom.'","'.$jadresse.'","'.$jcp.'","'.$jville.'","'.$jpays.'","'.$jemail.'","'.$jtel.'",1)');
            echo("<script> alert('Joueur ajouté !')</script>");
            PdoFFF::$monPdo->exec('INSERT INTO LICENCE(NUMEROSLICENCE) VALUES("'.$numlic.'")');
            $resj = PdoFFF::$monPdo->query('SELECT IDJOUEUR FROM JOUEUR WHERE NOMJOUEUR = "'.$jnom.'" AND PRENOMJOUEUR = "'.$jprenom.'"');
            $tabj = $resj->fetch();
            $reslic = PdoFFF::$monPdo->query('SELECT IDLICENCE FROM LICENCE WHERE NUMEROSLICENCE = "'.$numlic.'"');
            $tablic = $reslic->fetch();
            PdoFFF::$monPdo->exec('INSERT INTO INSCRIPTION(IDJOUEUR, IDLICENCE, DATEINSCRIPTION, IDCLUB) VALUES("'.(int)$tabj['IDJOUEUR'].'","'.(int)$tablic['IDLICENCE'].'", NOW(),"'.(int)$jclub.'")');
            $resmodlic = PdoFFF::$monPdo->query('SELECT IDINSCRIPTION FROM INSCRIPTION WHERE IDJOUEUR ="'.(int)$tabj['IDJOUEUR'].'"');
            $resmodtab = $resmodlic->fetch();
            PdoFFF::$monPdo->exec('UPDATE JOUEUR SET IDINSCRIPTION = "'.$resmodtab['IDINSCRIPTION'].'" WHERE IDJOUEUR ="'.(int)$tabj['IDJOUEUR'].'"');
        echo"<script>document.location.href='index.php';</script>";
        }
        

      }
      //La fonction AffichClubs permet d'afficher un tableau contenant la liste tous les clubs d'une ligue aisni qu'un bouton permettant de modifier le club souhaité 
      function AffichClubs()
     {
        $repligue=PdoFFF::$monPdo->query('SELECT * FROM DIRECTEUR WHERE IDCOUSER = "'.$_SESSION['idUser'].'"');
        $ligue = $repligue->fetch();
        $nbligue = $ligue['IDLIGUE'];
        $_SESSION['ligue'] = $ligue['IDLIGUE'];
        $resultats=PdoFFF::$monPdo->query('SELECT * FROM CLUB WHERE IDLIGUE = "'.$nbligue.'"');
        $reponse = $resultats->fetchAll( PDO::FETCH_ASSOC );
        return $reponse;


    }
  //la fonction CreaJoueurs recoit en parametre des chaines de caractere corespondant a ce que l'utilisateur à rentré elle permet de crée une equipe et de le referencier dans la base de donnée
    function CreaClub($cnom, $cville, $cpays)
      {
        $jcateg = $_SESSION['ligue']; 
         
        if(empty($cnom) || empty($cville) || empty($cpays)){
            echo("<script> alert('Un Des champs obligatoires est vide !')</script>");
        }
        else
        {
            PdoFFF::$monPdo->query('INSERT INTO CLUB(IDLIGUE, NOMCLUB, VILLECLUB, PAYSCLUB) VALUES("'.(int)$jcateg.'","'.$cnom.'","'.$cville.'","'.$cpays.'")');
            echo("<script> alert('Club ajouté !')</script>");
        }
    }
//la fonction Modif Joueur permet de modifier un joueur deja existant dans la base de donnée
    function ModifJoueur($jmodif, $jcateg = NULL, $jnom = NULL, $jprenom = NULL, $jadresse = NULL, $jcp = NULL, $jville = NULL, $jpays = NULL, $jemail = NULL, $jtel = NULL){

        $resultats=PdoFFF::$monPdo->query('SELECT * FROM JOUEUR WHERE IDJOUEUR = "'.$jmodif.'"');
                while($reponse = $resultats->fetch()){
            $jnombdd = $reponse['NOMJOUEUR'];
            $jprenombdd = $reponse['PRENOMJOUEUR'];
            $jcategbdd = $reponse['IDCATEGORIE'];
            $jaddrbdd = $reponse['ADRESSEJOUEUR'];
            $jcpbdd = $reponse['CPJOUEUR'];
            $jvillebdd = $reponse['VILLEJOUEUR'];
            $jpaysbdd = $reponse['PAYSJOUEUR'];
            $jemailbdd = $reponse['EMAILJOUEUR'];
            $jtelbdd = $reponse['TELEPHONEJOUEUR'];        }
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
        PdoFFF::$monPdo->exec('UPDATE JOUEUR SET IDCATEGORIE = "'.(int)$jcateg.'", NOMJOUEUR = "'.$jnom.'", PRENOMJOUEUR = "'.$jprenom.'", ADRESSEJOUEUR = "'.$jadresse.'", CPJOUEUR = "'.$jcp.'", VILLEJOUEUR = "'.$jville.'", PAYSJOUEUR = "'.$jpays.'", EMAILJOUEUR = "'.$jemail.'", TELEPHONEJOUEUR = "'.$jtel.'" WHERE IDJOUEUR ="'.$jmodif.'"');
        echo("<script> alert('Joueur modifié !')</script>");
    }
    //la fonction Modif Club permet de modifier un club deja existant dans la base de donnée
        function modifClub($cmodif,$cnom = NULL, $cville = NULL, $cpays = NULL)
        {
        $resultats=PdoFFF::$monPdo->query('SELECT * FROM CLUB WHERE IDCLUB = "'.$cmodif.'"');
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
        
        PdoFFF::$monPdo->query('UPDATE CLUB SET NOMCLUB = "'.$cnom.'", VILLECLUB = "'.$cville.'", PAYSCLUB = "'.$cpays.'" WHERE IDCLUB ="'.$cmodif.'"' );
        echo("<script> alert('Club modifié !')</script>");   
        }
        //la fonction Modif Club permet de supprimer un club uniquement si aucun joueur n'appartient à ce club
        function SuppClub($csupp)
        {
        
            PdoFFF::$monPdo->query('DELETE FROM CLUB WHERE IDCLUB = "'.$csupp.'"');
            echo("<script> alert('Club Supprimé !')</script>"); 

        }
        //cette fonction permet de tranferer un joueur d'un club à un autre tout en grdant un historique de ce changement grace a la creation d'une inscriptiuon et d'une licence differnet a chaque transfert
        function modifclubjoueur($joueur, $club)
        {
            $date = date('d-m-Y');
            $reqclub = PdoFFF::$monPdo->query('SELECT IDCLUB FROM INSCRIPTION WHERE IDJOUEUR = "'.$joueur.'"ORDER BY DATEINSCRIPTION DESC LIMIT 1' );
            $checkclub = $reqclub->fetch();
            if ($club == $checkclub['IDCLUB'])
            {
                echo("<script> alert('Ce joueur fait deja partie de ce club !')</script>");
            }
            else
            {
            $resultats=PdoFFF::$monPdo->query('SELECT * FROM JOUEUR NATURAL JOIN INSCRIPTION WHERE IDJOUEUR = "'.$joueur.'"');
                while($reponse = $resultats->fetch()){
            $jnombdd = $reponse['NOMJOUEUR'];
            $jprenombdd = $reponse['PRENOMJOUEUR'];
            $jcategbdd = $reponse['IDCATEGORIE'];
            $jclubbdd = $reponse['IDCLUB'];}
            $numlic = $jcategbdd.$jnombdd.$jprenombdd.$jclubbdd.$date;
            PdoFFF::$monPdo->exec('INSERT INTO LICENCE(NUMEROSLICENCE) VALUES("'.$numlic.'")');
            $resj = PdoFFF::$monPdo->query('SELECT IDJOUEUR FROM JOUEUR WHERE NOMJOUEUR = "'.$jnombdd.'" AND PRENOMJOUEUR = "'.$jprenombdd.'"');
            $tabj = $resj->fetch();
            $reslic = PdoFFF::$monPdo->query('SELECT IDLICENCE FROM LICENCE WHERE NUMEROSLICENCE = "'.$numlic.'"');
            $tablic = $reslic->fetch();
            PdoFFF::$monPdo->exec('INSERT INTO INSCRIPTION(IDJOUEUR, IDLICENCE, DATEINSCRIPTION, IDCLUB) VALUES("'.(int)$tabj['IDJOUEUR'].'","'.(int)$tablic['IDLICENCE'].'", NOW(),"'.(int)$club.'")');
            $resmodlic = PdoFFF::$monPdo->query('SELECT IDINSCRIPTION FROM INSCRIPTION WHERE IDJOUEUR ="'.(int)$tabj['IDJOUEUR'].'"');
            $resmodtab = $resmodlic->fetch();
            PdoFFF::$monPdo->exec('UPDATE JOUEUR SET IDINSCRIPTION = "'.$resmodtab['IDINSCRIPTION'].'" WHERE IDJOUEUR ="'.(int)$tabj['IDJOUEUR'].'"');
            }
        }
        //cette fonction permet d'afficher l'historique de transfert d'un joueur 
        function AffichHisto($jhisto = NULL, $hidden = NULL)
        {

            $repjou = PdoFFF::$monPdo->query('SELECT * FROM INSCRIPTION NATURAL JOIN LICENCE NATURAL JOIN CLUB WHERE IDJOUEUR = "'.$jhisto.'"');
            $affijou = $repjou->fetchAll( PDO::FETCH_ASSOC );
            return $affijou;
  }
}
        