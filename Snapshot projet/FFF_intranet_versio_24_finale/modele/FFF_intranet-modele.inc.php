<?php
/** 
* Fichier FFF_intranet-modele.inc.php qui contient la classe et toutes les methodes de FFF_intranet localisé à la racine
* de FFF_intranet
*
*/

/**
* Fichier de modele contenant les classes métiers et les methodes necessaire au fonctionnement de FFF_intranet
*
* @author Lucas Cuoco (lucas@cuoco.fr)
* @copyright cuoco.fr
*/
class PdoFFF{          
        private static $serveur='mysql:host=localhost:8889';
        private static $bdd='dbname=FFF2';         
        private static $user='root' ;           
        private static $mdp='root' ;    
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
     
     * Appel : $instancePdoFFF = PdoFFF::getPdoFFF();
     
     * @return l'unique objet de la classe PdoFFF
     */
    public  static function getPdoFFF(){
        if(PdoFFF::$monPdoFFF==null){
            PdoFFF::$monPdoFFF= new PdoFFF();
        }
        return PdoFFF::$monPdoFFF;  
    }
    /**
    * LA méthode  connectiondir attend en parametre deux chaines de cractere et permet de comparer les informations entré par l'utilisateur et celle contnu dans la base de donnée afin d'authentifier l'utilisateur
    *
    * @param $idToCheck = id de connexion récupéré dans le formulaire de connexion
    * @param $pwdToCheck = mot de passe récupérer dans le formulaire de connexion 
    * @return void
    */
    function connectiondir($idToCheck, $pwdToCheck)
    {
        
    	$reponse = PdoFFF::$monPdo->query('SELECT * FROM DIRECTEUR WHERE IDCOUSER = "'.$idToCheck.'"');
        $requete = $reponse->fetch();
        $idligue = $requete['IDLIGUE'];
        $_SESSION['idligueco'] = $idligue;
        $idbdd = $requete['IDCOUSER'];
        $mdpbdd = $requete['MDPUSERLIGUE'];

        //on teste l'authenticitée
        if($idbdd == $idToCheck && $pwdToCheck == $mdpbdd){
        session_start();
        $_SESSION['idUser'] = $requete['IDCOUSER'];
        $_SESSION['etat'] = 'co';
        $_SESSION['action'] = '';
        echo"<script>document.location.href='index.php';</script>";
        }
        else{
            echo("<script> alert('Identifiant ou mot de passe éronnées!')</script>"); 

          }
    }

    /**
    * La methode getNomjoueur permet de recuperer le nom d'un joueur en fonction de son id
    *
    * @param $idjoueur = id du joueur dont on souhaite connaitre le nom
    * @return $nom = le nom du joueur demandé
    */
    function getNomjoueur($idjoueur)
    {
       $reqnom=PdoFFF::$monPdo->prepare('SELECT NOMJOUEUR FROM JOUEUR WHERE IDJOUEUR = :idjoueur');
       $reqnom->bindParam(':idjoueur',$idjoueur,PDO::PARAM_INT);
       $reqnom->execute();
       $nom = $reqnom->fetch();
       return $nom;

    }

    /**
    * La methode getInfojoueur permet de recuperer le info d'un joueur en fonction de son id
    *
    * @param $idjoueur = id du joueur dont on souhaite connaitre les infos
    * @return $info = les infos du joueur demandé
    */
    function getInfojoueur($idjoueur)
    {
       $reqinfo=PdoFFF::$monPdo->prepare('SELECT * FROM JOUEUR WHERE IDJOUEUR = :idjoueur');
       $reqinfo->bindParam(':idjoueur',$idjoueur,PDO::PARAM_INT);
       $reqinfo->execute();
       $info = $reqinfo->fetch();
       return $info;

    }


    /**
    * La methode getNomCateg permet de recuperer le nom de la catgegorie d'un joueur en fonction de son id
    *
    * @param $idcateg = id de la categorie a troiver
    * @return $categ['nomCategorie'] = le nom de la categorie
    */
    function getNomCateg($idcateg = NULL)
    {

       $reqNomCateg=PdoFFF::$monPdo->prepare('SELECT * FROM CATEGORIE WHERE IDCATEGORIE = :idcateg');
       $reqNomCateg->bindParam(':idcateg',$idcateg,PDO::PARAM_INT);
       $reqNomCateg->execute();
       $categ = $reqNomCateg->fetch();
       return $categ['nomCategorie'];

    }

    /**
    * La methode getCategDeroulante permet de recuperer tous les nom et id des categorie excepté celle entrée en parametre
    *
    * @param $idcateg = id de la cotegorie que l'on veut enlever du listing
    * @return $categ = table contenant et id et nom categorie
    */
    function getCategDeroulante($idcateg = NULL)
    {
        if(empty($idcateg))
        {
        $reqCateg=PdoFFF::$monPdo->prepare('SELECT * FROM CATEGORIE WHERE IDCATEGORIE');
       $reqCateg->execute();
       $categ = $reqCateg->fetchAll();
       return $categ;
        }
        else
        {
        $reqCateg=PdoFFF::$monPdo->prepare('SELECT * FROM CATEGORIE WHERE IDCATEGORIE <> :idcateg');
       $reqCateg->bindParam(':idcateg',$idcateg,PDO::PARAM_INT);
       $reqCateg->execute();
       $categ = $reqCateg->fetchAll();
       return $categ;
        }
       

    }

    /**
    * La methode getNbCategDeroulante permet de recupererle nombre de categorie moins celle entrée en parametre
    *
    * @param $idcateg = id de la cotegorie que l'on veut enlever du listing
    * @return $categ[0] = nombre de categ
    */
    function getNbCategDeroulante($idcateg = NULL)
    {
        if(empty($idcateg))
        {
       $reqCateg=PdoFFF::$monPdo->prepare('SELECT COUNT(*) FROM CATEGORIE WHERE IDCATEGORIE');
       $reqCateg->bindParam(':idcateg',$idcateg,PDO::PARAM_INT);
       $reqCateg->execute();
       $nbcateg = $reqCateg->fetch();
       return $nbcateg[0];
        }
        else
        {
        $reqCateg=PdoFFF::$monPdo->prepare('SELECT COUNT(*) FROM CATEGORIE WHERE IDCATEGORIE <> :idcateg');
       $reqCateg->bindParam(':idcateg',$idcateg,PDO::PARAM_INT);
       $reqCateg->execute();
       $nbcateg = $reqCateg->fetch();
       return $nbcateg[0];
        }

    }


    /**
    * La methode AffichJoueurs qui peremt de recuperer un tableau contenant toutes les informations relatives aux joueurs
    *
    * @return $reponse = un tableau contenants les données relatives au joueurs
    */
    function AffichJoueurs()
         {
            // On veut tout d'abord recuperer uniquement les données des joueurs relative a la ligue du directeur authentifié
            $repligue=PdoFFF::$monPdo->prepare('SELECT * FROM DIRECTEUR WHERE IDCOUSER = :iduser');
            $repligue->bindParam(':iduser',$_SESSION['idUser'],PDO::PARAM_INT);
            $repligue->execute();
            $ligue = $repligue->fetch();
            $nbligue = $ligue['IDLIGUE'];

            //On recupere ensuite les joueurs de la ligue selectionné
            $resultats=PdoFFF::$monPdo->prepare('SELECT * FROM JOUEUR NATURAL JOIN CLUB NATURAL JOIN INSCRIPTION WHERE IDLIGUE = :nbligue ORDER BY IDCATEGORIE');
            //On recupere ensuite le nombre de joueur à affichés
            $nbj = PdoFFF::$monPdo->prepare('SELECT COUNT(IDJOUEUR) FROM JOUEUR NATURAL JOIN CLUB NATURAL JOIN INSCRIPTION WHERE IDLIGUE = :nbligue');
            $resultats->bindParam(':nbligue', $nbligue, PDO::PARAM_INT);
            $nbj->bindParam(':nbligue', $nbligue, PDO::PARAM_INT);
            $resultats->execute();
            $nbj->execute();
            $nb = $nbj->fetch();
            // On range toutes les données dans un tableau
            $reponse = $resultats->fetchAll( PDO::FETCH_ASSOC );
            //On retourne enfin le tableau
            return $reponse;    
         }
      
         /** 
         * La methode getLongJoueur permet de recuprer le nombre de joueurs dans le tabeau en fonction de la ligue
         *
         * @return $longjj[0] = qui est le nombre de joueur présents dans le tableau 
         */
        function getLongJoueur()
        {
            $reqprep = PdoFFF::$monPdo->prepare('SELECT COUNT(*) FROM JOUEUR NATURAL JOIN CLUB NATURAL JOIN INSCRIPTION WHERE IDLIGUE = :ligue');
            $reqprep->bindParam(':ligue', $_SESSION['idligueco'], PDO::PARAM_INT);
            $reqprep->execute();
            $longjj = $reqprep->fetch(); 
            return $longjj[0];
        }

      
        /**
        *La methode GetCategJoueurs permet de recuperer le nom de la categorie d'un joueur en fonction de son id
        *
        * @param $idJoueur = id du Joueur dont on veut récuperer la catégorie 
        *
        * @return $categjoueur = retourne le nom de la  catégorie du joueur
        */
        function getCategJoueur($idJoueur)
        {
            $repcat = PdoFFF::$monPdo->prepare('SELECT * FROM CATEGORIE WHERE IDCATEGORIE = :joueur');
            $repcat->bindParam(':joueur', $idJoueur, PDO::PARAM_INT);
            $repcat->execute();
            $afficatnom = $repcat->fetch();
            $categjoueur = $afficatnom['nomCategorie'];
            return $categjoueur;
        }

        /**
        *La methode GetClubs permet de recuperer tous les clubs en fonction de laigue de l'utilisateur
        *
        * @return $club = retourne tableu des infos sur les clubs 
        */
        function getClubs()
        {
            $repclub = PdoFFF::$monPdo->prepare('SELECT * FROM CLUB WHERE IDLIGUE = :idligue');
            $repclub->bindParam(':idligue', $_SESSION['idligueco'], PDO::PARAM_INT);
            $repclub->execute();
            $club = $repclub->fetchAll();
            return $club;
        }

        /**
        * La methode getClubJoueur permet de récuperer le nom du club du joueur en focntion de son id 
        *
        * @param $idJoueur = id du joueur dont on veut récuperer le nom du club 
        *
        * @return $club = retourne le nom du club 
        */
        function getClubJoueur($idJoueur)
        {
            $resultatsc=PdoFFF::$monPdo->prepare('SELECT * FROM INSCRIPTION WHERE IDJOUEUR = :idjoueur ORDER BY DATEINSCRIPTION DESC LIMIT 1');
            $resultatsc->bindParam(':idjoueur', $idJoueur, PDO::PARAM_INT);
            $resultatsc->execute();
            $idclub= $resultatsc->fetch();
            $repclub = PdoFFF::$monPdo->prepare('SELECT * FROM CLUB WHERE IDCLUB = :idclub');
            $repclub->bindParam(':idclub', $idclub['IDCLUB'], PDO::PARAM_INT);
            $repclub->execute();
            $afficlubnom = $repclub->fetch();
            $club = $afficlubnom['NOMCLUB'];
            return $club;
        }

        /**
        * La methode getNbClub permet de récupérer le nombre de clubs 
        *
        * @return $longcc[0] retourne le nombre de club dans une ligue precise
        */
        function getNbClub()
        {
            $longc = PdoFFF::$monPdo->prepare('SELECT COUNT(*) FROM CLUB WHERE IDLIGUE = :idligue');
            $longc->bindParam(':idligue', $_SESSION['idligueco'], PDO::PARAM_INT);
            $longc->execute();
            $longcc = $longc->fetch(); 
            return $longcc[0];
        }


         /**
         *La methode CreaJoueurs recoit en parametre des chaines de caractere corespondant a ce que l'utilisateur à rentré elle permet de crée un joueur et de le referencier dans la base de donnée ainsi que de lui attribuer une inscription et une licence
         * 
         * @param $jcateg = categorie du joueur choisi
         * @param $jnom =  nom du joueur rentré
         * @param $jprenom = prenom du joueur rentré
         * @param $jadresse = adresse du joueur rentré
         * @param $jcp = code postale du joueur rentré
         * @param $jville = ville du joueur rentré
         * @param $jpays = pays du joueur entré
         * @param $jemail = mail du joueur entré
         * @param $jtel = telephone du joueur entré
         * @param $jclub = club du joueur entré
         *
         * @return void 
         */
        function CreaJoueurs($jcateg, $jnom, $jprenom, $jadresse = NULL, $jcp = NULL, $jville = NULL, $jpays = NULL, $jemail = NULL, $jtel = null, $jclub)
        {
            $date = date('d-m-Y');
            //Si un champ est vide alors on renvoie un message d'erreur
            if(empty($jcateg) || empty($jnom) || empty($jprenom) || empty($jclub))
            {
                echo("<script> alert('Un Des champs obligatoires est vide !')</script>");
                echo"<script>document.location.href='index.php';</script>";
            }
            else
            {
                // Sinon
                // on génere le numeros de licence
                $numlic = $jcateg.$jnom.$jprenom.$jclub.$date;
                
                //on crée le joueur dans la base de donnée
                $ajoutJoueur = PdoFFF::$monPdo->prepare('INSERT INTO JOUEUR(IDCATEGORIE, NOMJOUEUR, PRENOMJOUEUR, ADRESSEJOUEUR, CPJOUEUR, VILLEJOUEUR, PAYSJOUEUR, EMAILJOUEUR, TELEPHONEJOUEUR, IDINSCRIPTION) VALUES(:categorie, :nom, :prenom, :adresse, :cp, :ville, :pays, :email, :tel, 1)');
                $ajoutJoueur->bindParam(':categorie',$jcateg, PDO::PARAM_INT);
                $ajoutJoueur->bindParam(':nom', $jnom, PDO::PARAM_STR);
                $ajoutJoueur->bindParam(':prenom', $jprenom, PDO::PARAM_STR);
                $ajoutJoueur->bindParam(':adresse', $jadresse, PDO::PARAM_STR);
                $ajoutJoueur->bindParam(':cp', $jcp, PDO::PARAM_STR);
                $ajoutJoueur->bindParam(':ville', $jville, PDO::PARAM_STR);
                $ajoutJoueur->bindParam(':pays', $jpays, PDO::PARAM_STR);
                $ajoutJoueur->bindParam(':email', $jemail, PDO::PARAM_STR);
                $ajoutJoueur->bindParam(':tel', $jtel, PDO::PARAM_STR);
                $ajoutJoueur->execute();
                echo("<script> alert('Joueur ajouté !')</script>");

                //on crée sa licence 
                $ajoutLicence = PdoFFF::$monPdo->prepare('INSERT INTO LICENCE(NUMEROSLICENCE) VALUES(:licence)');
                $ajoutLicence->bindParam(':licence', $numlic, PDO::PARAM_STR);
                $ajoutLicence->execute();
                $resj = PdoFFF::$monPdo->prepare('SELECT IDJOUEUR FROM JOUEUR WHERE NOMJOUEUR = :nom AND PRENOMJOUEUR = :prenom');
                $resj->bindParam(':nom',$jnom, PDO::PARAM_STR);
                $resj->bindParam(':prenom', $jprenom, PDO::PARAM_STR);
                $resj->execute();
                $tabj = $resj->fetch();
                $reslic = PdoFFF::$monPdo->prepare('SELECT IDLICENCE FROM LICENCE WHERE NUMEROSLICENCE = :licence');
                $reslic->bindParam(':licence',$numlic, PDO::PARAM_STR);
                $reslic->execute();
                $tablic = $reslic->fetch();

                //on crée son instance d'inscritpion dasn une insatce d'inscription qui n'est jamais utilisé
                $ajoutLicence = PdoFFF::$monPdo->prepare('INSERT INTO INSCRIPTION(IDJOUEUR, IDLICENCE, DATEINSCRIPTION, IDCLUB) VALUES(:idJoueur, :idLicence, NOW(), :club)');
                $ajoutLicence->bindParam(':idJoueur', $tabj['IDJOUEUR'], PDO::PARAM_INT);
                $ajoutLicence->bindParam(':idLicence', $tablic['IDLICENCE'], PDO::PARAM_INT);
                $ajoutLicence->bindParam(':club', $jclub, PDO::PARAM_INT);
                $ajoutLicence->execute();
                $resmodlic = PdoFFF::$monPdo->prepare('SELECT IDINSCRIPTION FROM INSCRIPTION WHERE IDJOUEUR = :id');
                $resmodlic->bindParam(':id', $tabj['IDJOUEUR'], PDO::PARAM_INT);
                $resmodlic->execute();
                $resmodtab = $resmodlic->fetch();

                //on met a jour son inscption pour quel soit comforme a la demande
                $modifInscription = PdoFFF::$monPdo->prepare('UPDATE JOUEUR SET IDINSCRIPTION = :idIsnc WHERE IDJOUEUR = :idJoueur');
                $modifInscription->bindParam(':idIsnc', $resmodtab['IDINSCRIPTION'], PDO::PARAM_INT);
                $modifInscription->bindParam(':idJoueur', $tabj['IDJOUEUR'], PDO::PARAM_INT);
                $modifInscription->execute();

            echo"<script>document.location.href='index.php';</script>";
            }
            

        }
        /**
         * La fonction AffichClubs permet d'afficher un tableau contenant la liste tous les clubs d'une ligue aisni qu'un bouton permettant de modifier le club souhaité 
         * 
         *
         * @return $reponse = tableau contenant les clubs d'une ligue 
         */
        function AffichClubs()
        {

            $repligue=PdoFFF::$monPdo->prepare('SELECT * FROM DIRECTEUR WHERE IDCOUSER =  :idUser');
            $repligue->bindParam(':idUser', $_SESSION['idUser'], PDO::PARAM_INT);
            $repligue->execute();
            $ligue = $repligue->fetch();
            $nbligue = $ligue['IDLIGUE'];
            $_SESSION['ligue'] = $ligue['IDLIGUE'];

            //On recupere ici les info à afficher
            $resultats=PdoFFF::$monPdo->prepare('SELECT * FROM CLUB WHERE IDLIGUE = :idLigue');
            $resultats->bindParam(':idLigue', $nbligue, PDO::PARAM_INT);
            $resultats->execute();
            $reponse = $resultats->fetchAll( PDO::FETCH_ASSOC );
            return $reponse;


        }
      /**
         *La methode CreaClub recoit en parametre des chaines de caractere corespondant a ce que l'utilisateur à rentré elle permet de crée un club et de le referencier dans la base de donnée
         * 
         * @param $cnom = categorie du joueur choisi
         * @param $cville =  nom du joueur rentré
         * @param $cpays = le payes entré
         *
         * @return void 
         */
        function CreaClub($cnom, $cville, $cpays)
          {
            $cligue = $_SESSION['ligue']; 
             //Si un champ est vide alors on renvoie un message d'erreur
            if(empty($cnom) || empty($cville) || empty($cpays)){
                echo("<script> alert('Un Des champs obligatoires est vide !')</script>");
            }
            else
            {
                //Ici on Crée le club dans le Base de donnée
                $ajouterClub = PdoFFF::$monPdo->prepare('INSERT INTO CLUB(IDLIGUE, NOMCLUB, VILLECLUB, PAYSCLUB) VALUES(:idLigue, :nom, :ville, :pays)');
                $ajouterClub->bindParam(':idLigue', $cligue, PDO::PARAM_INT);
                $ajouterClub->bindParam(':nom', $cnom, PDO::PARAM_INT);
                $ajouterClub->bindParam(':ville', $cville, PDO::PARAM_INT);
                $ajouterClub->bindParam(':pays', $cpays, PDO::PARAM_INT);
                $ajouterClub->execute();
                echo("<script> alert('Club ajouté !')</script>");
            }
        }


        /**
        *la fonction Modif Joueur permet de modifier un joueur deja existant dans la base de donnée
        * 
        * @param $jmodif = joueur à modifier
        * @param $jcateg = categorie du joueur choisi
        * @param $jnom =  nom du joueur rentré
        * @param $jprenom = prenom du joueur rentré
        * @param $jadresse = adresse du joueur rentré
        * @param $jcp = code postale du joueur rentré
        * @param $jville = ville du joueur rentré
        * @param $jpays = pays du joueur entré
        * @param $jemail = mail du joueur entré
        *
        * @return void 
        */
        function ModifJoueur($jmodif, $jcateg = NULL, $jnom = NULL, $jprenom = NULL, $jadresse = NULL, $jcp = NULL, $jville = NULL, $jpays = NULL, $jemail = NULL, $jtel = NULL){

            $resultats=PdoFFF::$monPdo->prepare('SELECT * FROM JOUEUR WHERE IDJOUEUR = :jmodif');
            $resultats->bindParam(':jmodif', $jmodif, PDO::PARAM_INT);
            $resultats->execute();
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
            // On teste si le champ est vide ou non 
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
            // ici on met a jour les donnée dans la base en fonction de ce qui à été etré dans la base
            $modifJoueur = PdoFFF::$monPdo->prepare('UPDATE JOUEUR SET IDCATEGORIE = :categorie, NOMJOUEUR = :nom, PRENOMJOUEUR = :prenom, ADRESSEJOUEUR = :adresse, CPJOUEUR = :cp, VILLEJOUEUR = :ville, PAYSJOUEUR = :pays, EMAILJOUEUR = :email, TELEPHONEJOUEUR = :tel WHERE IDJOUEUR =:jmodif');
            $modifJoueur->bindParam(':categorie',$jcateg, PDO::PARAM_INT);
            $modifJoueur->bindParam(':nom', $jnom, PDO::PARAM_STR);
            $modifJoueur->bindParam(':prenom', $jprenom, PDO::PARAM_STR);
            $modifJoueur->bindParam(':adresse', $jadresse, PDO::PARAM_STR);
            $modifJoueur->bindParam(':cp', $jcp, PDO::PARAM_STR);
            $modifJoueur->bindParam(':ville', $jville, PDO::PARAM_STR);
            $modifJoueur->bindParam(':pays', $jpays, PDO::PARAM_STR);
            $modifJoueur->bindParam(':email', $jemail, PDO::PARAM_STR);
            $modifJoueur->bindParam(':tel', $jtel, PDO::PARAM_STR);
            $modifJoueur->bindParam(':jmodif', $jmodif, PDO::PARAM_INT);
            $modifJoueur->execute();
            echo("<script> alert('Joueur modifié !')</script>");



        }
        /**
         *la fonction Modif Club permet de modifier un club deja existant dans la base de donnée
         * 
         * @param $cnom = categorie du joueur choisi
         * @param $cville =  nom du joueur rentré
         * @param $cpays = le pays entré
         * @param $cmodif = le club à modifier 
         *
         * @return void 
         */
            function modifClub($cmodif,$cnom = NULL, $cville = NULL, $cpays = NULL)
            {
            $resultats=PdoFFF::$monPdo->prepare('SELECT * FROM CLUB WHERE IDCLUB = "'.$cmodif.'"');
            $resultats->bindParam(':club', $cmodif, PDO::PARAM_INT);
            $resultats->execute();
                while($reponse = $resultats->fetch()){
                $cnombdd = $reponse['NOMCLUB'];
                $cvillebdd = $reponse['VILLECLUB'];
                $cpaysbdd = $reponse['PAYSCLUB'];
            }
            // On teste si le champ est vide ou non 
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
            
            $modifClub = PdoFFF::$monPdo->prepare('UPDATE CLUB SET NOMCLUB = :nom, VILLECLUB = :ville, PAYSCLUB = :pays WHERE IDCLUB = :id' );
            $modifClub->bindParam(':nom', $cnom, PDO::PARAM_STR);
            $modifClub->bindParam(':ville', $cville, PDO::PARAM_STR);
            $modifClub->bindParam(':pays', $cpays, PDO::PARAM_STR);
            $modifClub->bindParam(':id', $cmodif, PDO::PARAM_INT);
            $modifClub->execute();
            echo("<script> alert('Club modifié !')</script>");   
            }

            /**
            *la fonction SuppClub permet de supprimer un club uniquement si aucun joueur n'appartient à ce club
            *
            * @param $csupp = le club à supprimer
            *
            */
            function SuppClub($csupp)
            {
                $contientClub = PdoFFF::$monPdo->prepare('SELECT IDJOUEUR FROM JOUEUR NATURAL JOIN INSCRIPTION WHERE IDCLUB = :club');
                $contientClub->bindParam(':club', $csupp, PDO::PARAM_INT);
                $contientClub->execute();
                $joueurClub = $contientClub->fetchAll();
                if(!empty($joueurClub))
                {
                    echo("<script> alert('Attention! Ce club contient des joueurs, il ne peut pas être supprimé.')</script>"); 
                }
                else
                {
                    $suppClub = PdoFFF::$monPdo->prepare('DELETE FROM CLUB WHERE IDCLUB = :club');
                    $suppClub->bindParam(':club', $csupp, PDO::PARAM_INT);
                    $suppClub->execute();
                    echo("<script> alert('Club Supprimé !')</script>"); 
                }
                

            }
            /**
            * cette fonction permet de tranferer un joueur d'un club à un autre tout en grdant un historique de ce changement grace a la creation d'une inscriptiuon et d'une licence differnet a chaque transfert
            *
            * @param $joueur = joueur à transférer
            * @param $club = club dans lequel on tranfert le joueur
            *
            * @return void
            */
            function modifclubjoueur($joueur, $club)
            {
                $date = date('d-m-Y');
                $reqclub = PdoFFF::$monPdo->prepare('SELECT IDCLUB FROM INSCRIPTION WHERE IDJOUEUR = : joueur ORDER BY DATEINSCRIPTION DESC LIMIT 1' );
                $reqclub->bindParam(':joueur', $joueur, PDO::PARAM_INT);
                $reqclub->execute();
                $checkclub = $reqclub->fetch();
                // si le joueur est deja dans le club alors on renvoie un erreur
                if ($club == $checkclub['IDCLUB'])
                {
                    echo("<script> alert('Ce joueur fait deja partie de ce club !')</script>");
                }
                else
                {
                $resultats=PdoFFF::$monPdo->prepare('SELECT * FROM JOUEUR NATURAL JOIN INSCRIPTION WHERE IDJOUEUR = :joueur');
                $resultats->bindParam(':joueur', $joueur, PDO::PARAM_INT);
                $resultats->execute();
                    while($reponse = $resultats->fetch()){
                $jnombdd = $reponse['NOMJOUEUR'];
                $jprenombdd = $reponse['PRENOMJOUEUR'];
                $jcategbdd = $reponse['IDCATEGORIE'];
                $jclubbdd = $reponse['IDCLUB'];}
                $numlic = $jcategbdd.$jnombdd.$jprenombdd.$jclubbdd.$date;

                //on re crée une licence
                $ajoutNumLic = PdoFFF::$monPdo->prepare('INSERT INTO LICENCE(NUMEROSLICENCE) VALUES(:licence)');
                $ajoutNumLic->bindParam(':licence', $numlic, PDO::PARAM_STR);
                $ajoutNumLic->execute();
                $resj = PdoFFF::$monPdo->prepare('SELECT IDJOUEUR FROM JOUEUR WHERE NOMJOUEUR = :nomBDD AND PRENOMJOUEUR = :preBDD');
                $resj->bindParam(':nomBDD', $jnombdd, PDO::PARAM_STR);
                $resj->bindParam(':preBDD', $jprenombdd, PDO::PARAM_STR);
                $resj->execute();
                $tabj = $resj->fetch();
                $reslic = PdoFFF::$monPdo->prepare('SELECT IDLICENCE FROM LICENCE WHERE NUMEROSLICENCE = :licence');
                $reslic->bindParam(':licence', $numlic, PDO::PARAM_STR);
                $reslic->execute();
                $tablic = $reslic->fetch();

                // et on re crée une inscription
                $creaInscp = PdoFFF::$monPdo->prepare('INSERT INTO INSCRIPTION(IDJOUEUR, IDLICENCE, DATEINSCRIPTION, IDCLUB) VALUES(:id, :licence, NOW(),:club)');
                $creaInscp->bindParam(':id', $tabj['IDJOUEUR'], PDO::PARAM_INT);
                $creaInscp->bindParam(':licence', $tablic['IDLICENCE'], PDO::PARAM_INT);
                $creaInscp->bindParam(':club', $club, PDO::PARAM_INT);
                $creaInscp->execute();
                
                // On met tout a jour comme demandé
                $resmodlic = PdoFFF::$monPdo->prepare('SELECT IDINSCRIPTION FROM INSCRIPTION WHERE IDJOUEUR = :id');
                $resmodlic->bindParam(':id',$tabj['IDJOUEUR'], PDO::PARAM_INT);
                $resmodlic->execute();
                $resmodtab = $resmodlic->fetch();
                $majIsnc = PdoFFF::$monPdo->prepare('UPDATE JOUEUR SET IDINSCRIPTION = :idIsnc WHERE IDJOUEUR = :idJoueur');
                $majIsnc->bindParam(':idIsnc',$resmodtab['IDINSCRIPTION'], PDO::PARAM_INT);
                $majIsnc->bindParam(':idJoueur',$tabj['IDJOUEUR'], PDO::PARAM_INT);
                $majIsnc->execute();
                
                }
            }
            /**
            * cette fonction permet d'afficher l'historique de transfert d'un joueur 
            *
            * @param $jhisto = joueur à transférer
            *
            * @return affijou = contient toutes les info concerant un joueur
            */
            function AffichHisto($jhisto = NULL)
            {

                $repjou = PdoFFF::$monPdo->prepare('SELECT * FROM INSCRIPTION NATURAL JOIN LICENCE NATURAL JOIN CLUB WHERE IDJOUEUR = :jhisto');
                $repjou->bindParam(':jhisto', $jhisto, PDO::PARAM_INT);
                $repjou->execute();
                $affijou = $repjou->fetchAll( PDO::FETCH_ASSOC );
                return $affijou;
      }
}
        