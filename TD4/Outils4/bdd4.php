<?php
require_once ("utils.php");
class Database {

    public static function connect() {
        $dsn = 'mysql:dbname=td3;host=127.0.0.1';
        $user = 'root';
        $password = '';
        try {
            $dbh = new PDO($dsn, $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connexion échouée : ' . $e->getMessage();
            exit(0);
        }
        return $dbh;
    }

}

function affichetout($dbh) {
    $query = "SELECT * FROM `utilisateurs` ORDER BY `prenom`";
    $sth = $dbh->prepare($query);
    $request_succeeded = $sth->execute();
    while ($courant = $sth->fetch(PDO::FETCH_ASSOC)) {
        echo $courant['prenom'] . ' ' . $courant['nom'] . ' est né le ' . $courant['naissance'] . '. Son login est : "' . $courant['login'] . '". Son email est : "' . $courant['email'] . '"';
        echo '<br>';
    }
}

class Utilisateur {

    public $login;
    public $mdp;
    public $nom;
    public $prenom;
    public $promotion;
    public $naissance;
    public $email;
    public $feuille;

    public function __toString() {
        $s = "[$this->login] $this->prenom $this->nom, né le $this->naissance";
        if ($this->promotion != null) {
            return $s . ", promotion X$this->promotion, $this->email";
        } else {
            return $s . ", non X, $this->email";
        }
    }

    public static function getUtilisateur($dbh, $login) {
        $query = "SELECT * FROM `utilisateurs` WHERE `login` = ?";
        $sth = $dbh->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
        $sth->execute(array($login));
        if ($sth->rowCount() == 1) {
            $user = $sth->fetch();
            return $user;
        } else {
            return "La fonction getUtilisateur n'a pas renvoyé de résultat.";
        }
    }
    
    public static function creecompte($dbh, $login,$mdp,$nom,$prenom,$promotion,$naissance,$email,$feuille) {
        $query = "INSERT INTO `utilisateurs` (`login`, `mdp`, `nom`, `prenom`, `promotion`, `naissance`, `email`, `feuille`) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
        $sth = $dbh->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
        $sth->execute(array($login,$mdp,$nom,$prenom,$promotion,$naissance,$email,$feuille));
        
    }
    
    public static function existe_login($dbh, $login) {
        $sth = $dbh->prepare("SELECT * FROM `utilisateurs` WHERE `login` = ?");
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
        $sth->execute(array($login));
        return ($sth->rowCount() == 1);
    }
    
    

    public static function insererUtilisateur($dbh, $login, $mdp, $nom, $prenom, $naissance, $promotion, $email, $feuille) {
        $sth = $dbh->prepare("SELECT * FROM `utilisateurs` WHERE `login` = ?");
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
        $sth->execute(array($login));
        if ($sth->rowCount() == 0) {   // On teste si le login est déjà utilisé
            $sth = $dbh->prepare("INSERT INTO `utilisateurs` (`login`, `mdp`, `nom`, `prenom`, `promotion`, `naissance`, `email`, `feuille`) VALUES(?,SHA1(?),?,?,?,?,?,?)");
            $sth->execute(array($login, $mdp, $nom, $prenom, $naissance, $promotion, $email, $feuille));
        }
        else {echo "Attention le login est déjà utilisé. La base de données n'a pas été modifiée.";}
    }

    public static function testerMdp($dbh, $login, $mdp) {
        $sth = $dbh->prepare("SELECT * FROM `utilisateurs` WHERE `login` = ? AND `mdp` = ?");
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
        $sth->execute(array($login,SHA1($mdp)));
        if ($sth->rowCount()==0){return False;}
        else {return True;}
    }
    
    public function nbAmis($dbh,$login){
        $sth = $dbh->prepare("SELECT nom, prenom FROM `utilisateurs` JOIN `amis` ON `login1`=`login` WHERE `login2`=?");
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
        $sth->execute(array($login));
        return $sth->rowCount();
    }
    
    public static function pren($dbh,$login){ //renvoie le prénom de l'utilisateur de login $login
        $sth = $dbh->prepare("SELECT `prenom` FROM `utilisateurs`  WHERE `login`=?");
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
        $sth->execute(array($login));
        return $sth->fetch()->prenom;
    }
    
    public static function no($dbh,$login){
        $sth = $dbh->prepare("SELECT `nom` FROM `utilisateurs`  WHERE `login`=?");
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
        $sth->execute(array($login));
        return $sth->fetch()->nom;
    }
    
    public function getAmis($dbh,$login){
        $sth = $dbh->prepare("SELECT * FROM `utilisateurs` JOIN `amis` ON `login1`=`login` WHERE `login2`=?");
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
        
        $sth->execute(array($login));
        return $sth->fetchAll();    
    }
    
    public function afficheliste($tab){
        echo "<ul>";
        foreach ($tab as $user){
            echo "<li>";
            echo($user);
            echo "</li>";
        }
        echo "</ul>";
        
    }

}