<?php
require_once ("utils.php");
class Database {

    public static function connect() {
        $dsn = 'mysql:dbname=dbbridge;host=127.0.0.1';
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
    $query = "SELECT * FROM `User` ORDER BY `name`";
    $sth = $dbh->prepare($query);
    $request_succeeded = $sth->execute();
    while ($courant = $sth->fetch(PDO::FETCH_ASSOC)) {
        echo $courant['name'] . ' ' . $courant['surname'] . '. Son login est : "' . $courant['login'] . '". Son email est : "' . $courant['email'] . '"';
        echo '<br>';
    }
}

class User {

    public $login;
    public $password;
    public $name;
    public $surname;
    public $email;
    public $user_id;

    public function __toString() {
        $s = "[$this->login] $this->surname $this->name $this->email";
    }

    public static function getUser($dbh, $login) {
        $query = "SELECT * FROM `User` WHERE `login` = ?";
        $sth = $dbh->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS, 'User');
        $sth->execute(array($login));
        if ($sth->rowCount() == 1) {
            $user = $sth->fetch();
            return $user;
        } else {
            return "La fonction getUser n'a pas renvoyé de résultat.";
        }
    }
    
    public static function creecompte($dbh, $login, $name, $surname, $password, $email) {
        $query = "INSERT INTO `User` (`login`, `name`, `surname`, `password`, `email`) VALUES (?, ?, ?, ?, ?);";
        $sth = $dbh->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS, 'User');
        $sth->execute(array($login,$name,$surname,$password,$email));
        
    }
    
    public static function existe_login($dbh, $login) {
        $sth = $dbh->prepare("SELECT * FROM `User` WHERE `login` = ?");
        $sth->setFetchMode(PDO::FETCH_CLASS, 'User');
        $sth->execute(array($login));
        return ($sth->rowCount() == 1);
    }
    
    

    public static function insererUser($dbh, $login, $name, $surname, $password, $email) {
        $sth = $dbh->prepare("SELECT * FROM `User` WHERE `login` = ?");
        $sth->setFetchMode(PDO::FETCH_CLASS, 'User');
        $sth->execute(array($login));
        if ($sth->rowCount() == 0) {   // On teste si le login est déjà utilisé
            $sth = $dbh->prepare("INSERT INTO `User` (`login`, `name`, `surname`, `password`, `email`) VALUES (?, ?, ?, ?, ?) VALUES(?,?,?,SHA1(?),?)");
            $sth->execute(array($login,$name,$surname,$password,$email));
        }
        else {echo "Attention le login est déjà utilisé. La base de données n'a pas été modifiée.";}
    }

    public static function testerPassword($dbh, $login, $password) {
        $sth = $dbh->prepare("SELECT * FROM `User` WHERE `login` = ? AND `password` = ?");
        $sth->setFetchMode(PDO::FETCH_CLASS, 'User');
        $sth->execute(array($login,SHA1($password)));
        if ($sth->rowCount()==0){return False;}
        else {return True;}
    }
    
    //public function nbAmis($dbh,$login){
    //    $sth = $dbh->prepare("SELECT name, surname FROM `User` JOIN `amis` ON `login1`=`login` WHERE `login2`=?");
    //    $sth->setFetchMode(PDO::FETCH_CLASS, 'User');
    //    $sth->execute(array($login));
    //    return $sth->rowCount();
    //}
    
    public static function surname($dbh,$login){ //renvoie le préname de l'utilisateur de login $login
        $sth = $dbh->prepare("SELECT `surname` FROM `User`  WHERE `login`=?");
        $sth->setFetchMode(PDO::FETCH_CLASS, 'User');
        $sth->execute(array($login));
        return $sth->fetch()->surname;
    }
    
    public static function name($dbh,$login){
        $sth = $dbh->prepare("SELECT `name` FROM `User`  WHERE `login`=?");
        $sth->setFetchMode(PDO::FETCH_CLASS, 'User');
        $sth->execute(array($login));
        return $sth->fetch()->name;
    }
    
    //public function getAmis($dbh,$login){
    //    $sth = $dbh->prepare("SELECT * FROM `User` JOIN `amis` ON `login1`=`login` WHERE `login2`=?");
    //    $sth->setFetchMode(PDO::FETCH_CLASS, 'User');
    //    
    //    $sth->execute(array($login));
    //    return $sth->fetchAll();    
    //}
    
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