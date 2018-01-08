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

// Utile pour débogguer

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
        $sth->execute(array($login,$name,$surname,SHA1($password),$email));
        
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


class Quiz {

    public $quiz_id;
    public $name;
    public $number_of_hands;
    public $average_rating;

    public function __toString() {
        $s = "[$this->quiz_id] $this->name $this->humber_of_hands $this->average_rating";
    }

    public static function getQuiz($dbh, $quiz_id) {
        $query = "SELECT * FROM `Quiz` WHERE `quiz_id` = ?";
        $sth = $dbh->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Quiz');
        $sth->execute(array($quiz_id));
        if ($sth->rowCount() == 1) {
            $quiz = $sth->fetch();
            return $quiz;
        } else {
            return "La fonction getQuiz n'a pas renvoyé de résultat.";
        }
    }
    
    public static function createQuiz($dbh, $name, $number_of_hands) {
        $query = "INSERT INTO `Quiz` (`name`, `number_of_hands`) VALUES (?, ?);";
        $sth = $dbh->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Quiz');
        $sth->execute(array($name,$number_of_hands));
        $this->quiz_id = $dbh->lastInsertId();
        
    }
    
    /*public static function insertQuiz($dbh, $name, $number_of_hands) {
        $sth = $dbh->prepare("SELECT * FROM `Quiz` WHERE `name` = ?");
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Quiz');
        $sth->execute(array($name));
        if ($sth->rowCount() == 0) {   // On teste si le login est déjà utilisé
            $sth = $dbh->prepare("INSERT INTO `Quiz` (`name`, `number_of_hands`) VALUES (?, ?) VALUES(?, ?)");
            $sth->execute(array($name, $number_of_hands));
        }
        else {echo "Attention le nom est déjà utilisé. La base de données n'a pas été modifiée.";}
    }*/

    public static function name($dbh,$quiz_id){
        $sth = $dbh->prepare("SELECT `name` FROM `Quiz` WHERE `quiz_id`=?");
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Quiz');
        $sth->execute(array($quiz_id));
        return $sth->fetch()->name;
    }

    public function afficheliste($tab){
        echo "<ul>";
        foreach ($tab as $quiz){
            echo "<li>";
            echo($quiz);
            echo "</li>";
        }
        echo "</ul>";
        
    }

}

class Hand {

    public $hand_id;
    public $quiz_id;
    public $question;

    public function __toString() {
        $s = "[$this->quiz_id] $this->hand_id $this->question";
    }

    public static function getHand($dbh, $hand_id) {
        $query = "SELECT * FROM `Hand` WHERE `hand_id` = ?";
        $sth = $dbh->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Hand');
        $sth->execute(array($hand_id));
        if ($sth->rowCount() == 1) {
            $hand = $sth->fetch();
            return $hand;
        } else {
            return "La fonction getHand n'a pas renvoyé de résultat.";
        }
    }
    
    public static function createHand($dbh, $quiz_id, $question) {
        $query = "INSERT INTO `Hand` (`quiz_id`, `question`) VALUES (?, ?);";
        $sth = $dbh->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Hand');
        $sth->execute(array($quiz_id,$question));
        
    }
    /*
    public static function insertHand($dbh, $quiz_id, $question) {
        $sth = $dbh->prepare("SELECT * FROM `Hand` WHERE `quiz_id` = ?");
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Hand');
        $sth->execute(array($quiz_id));
        //if ($sth->rowCount() == 0) {   // On teste si le login est déjà utilisé
            $sth = $dbh->prepare("INSERT INTO `Hand` (`quiz_id`, `question`) VALUES (?, ?) VALUES(?, ?)");
            $sth->execute(array($name, $number_of_hands));
        //}
        //else {echo "Attention le nom est déjà utilisé. La base de données n'a pas été modifiée.";}
    }
*/

    public function afficheliste($tab){
        echo "<ul>";
        foreach ($tab as $hand){
            echo "<li>";
            echo($hand);
            echo "</li>";
        }
        echo "</ul>";
        
    }

}

class Hand_Card {

    public $hand_id;
    public $card_id;

    public function __toString() {
        $s = "[$this->hand_id] $this->card_id";
    }

    public static function getHand_Card($dbh, $hand_id) {
        $query = "SELECT * FROM `Hand_Card` WHERE `hand_id` = ?";
        $sth = $dbh->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Hand_Card');
        $sth->execute(array($hand_id));
        if ($sth->rowCount() == 13) {
            $hand = $sth->fetch();
            return $hand;
        } else {
            return "La fonction getHand_Card n'a pas renvoyé de résultat.";
        }
    }
    
    //?????????? ptet ya moyen de faire mieux
    public static function createHand_Card($dbh, $hand_id, $array_card_id) {
        $query = "INSERT INTO `Hand` (`quiz_id`, `question`) VALUES (?, ?), (?, ?), (?, ?), (?, ?), (?, ?), (?, ?), (?, ?), (?, ?), (?, ?), (?, ?), (?, ?), (?, ?), (?, ?);";
        $sth = $dbh->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Hand_Card');
        $sth->execute(array($hand_id,$array_card_id[0],$hand_id,$array_card_id[1],$hand_id,$array_card_id[2],$hand_id,$array_card_id[3],$hand_id,$array_card_id[4],$hand_id,$array_card_id[5],$hand_id,$array_card_id[6],$hand_id,$array_card_id[7],$hand_id,$array_card_id[8],$hand_id,$array_card_id[9],$hand_id,$array_card_id[10],$hand_id,$array_card_id[11],$hand_id,$array_card_id[12],$hand_id,$array_card_id[13]));       
    }
    
    public function afficheliste($tab){
        echo "<ul>";
        foreach ($tab as $hand){
            echo "<li>";
            echo($hand);
            echo "</li>";
        }
        echo "</ul>";
        
    }

}


class Answer {

    public $answer_id;
    public $user_id;
    public $hand_id;
    public $bid_id;
    
    public function __toString() {
        $s = "[$this->answer_id] $this->user_id $this->hand_id $this->bid_id";
    }

    public static function getAnswer($dbh, $answer_id) {
        $query = "SELECT * FROM `Answer` WHERE `answer_id` = ?";
        $sth = $dbh->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Answer');
        $sth->execute(array($answer_id));
        if ($sth->rowCount() == 1) {
            $answer = $sth->fetch();
            return $answer;
        } else {
            return "La fonction getAnswe n'a pas renvoyé de résultat.";
        }
    }
    
    public static function createAnswer($dbh, $user_id, $hand_id, $bid_id) {
        $query = "INSERT INTO `Answer` (`user_id`, `hand_id`, `bid_id`) VALUES (?, ?, ?);";
        $sth = $dbh->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Answer');
        $sth->execute(array($user_id, $hand_id, $bid_id));
        
    }
    
    /*
    public static function insertAnswer($dbh, $user_id, $hand_id, $bid_id) {
        $sth = $dbh->prepare("SELECT * FROM `Answer` WHERE `hand_id` = ?");
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Answer');
        $sth->execute(array($hand_id));
        if ($sth->rowCount() == 0) {   // On teste si le hand_id est déjà utilisé
            $sth = $dbh->prepare("INSERT INTO `Answer` (`user_id`, `hand_id`, `bid_id`) VALUES (?, ?, ?) VALUES(?, ?, ?)");
            $sth->execute(array($user_id, $hand_id, $bid_id));
        }
        else {echo "Attention le nom est déjà utilisé. La base de données n'a pas été modifiée.";}
    }*/


    public function afficheliste($tab){
        echo "<ul>";
        foreach ($tab as $answer){
            echo "<li>";
            echo($answer);
            echo "</li>";
        }
        echo "</ul>";
        
    }

}


class Share {

    public $share_id;
    public $user1_id;
    public $user2_id;
    public $quiz_id;

    public function __toString() {
        $s = "[$this->quiz_id] $this->share_id $this->user1_id $this->user2_id";
    }

    public static function getShare($dbh, $share_id) {
        $query = "SELECT * FROM `Share` WHERE `share_id` = ?";
        $sth = $dbh->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Share');
        $sth->execute(array($share_id));
        if ($sth->rowCount() == 1) {
            $share = $sth->fetch();
            return $share;
        } else {
            return "La fonction getShare n'a pas renvoyé de résultat.";
        }
    }
    
    public static function createShare($dbh, $user1_id, $user2_id, $quiz_id) {
        $query = "INSERT INTO `Quiz` (`user1_id`, `user2_id`, `quiz_id`) VALUES (?, ?, ?);";
        $sth = $dbh->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Share');
        $sth->execute(array($user1_id, $user2_id, $quiz_id));
        
    }
    /*
    public static function insertShare($dbh, $name, $number_of_hands) {
        $sth = $dbh->prepare("SELECT * FROM `Share` WHERE `name` = ?");
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Quiz');
        $sth->execute(array($name));
        if ($sth->rowCount() == 0) {   // On teste si le login est déjà utilisé
            $sth = $dbh->prepare("INSERT INTO `Quiz` (`name`, `number_of_hands`) VALUES (?, ?) VALUES(?, ?)");
            $sth->execute(array($name, $number_of_hands));
        }
        else {echo "Attention le nom est déjà utilisé. La base de données n'a pas été modifiée.";}
    }*/

    public function afficheliste($tab){
        echo "<ul>";
        foreach ($tab as $share){
            echo "<li>";
            echo($share);
            echo "</li>";
        }
        echo "</ul>";
        
    }

}

class Rating {

    public $rating_id;
    public $user_id;
    public $quiz_id;
    public $rating;

    public function __toString() {
        $s = "[$this->rating_id] $this->user_id $this->quiz_id $this->rating_id";
    }

    public static function getRating($dbh, $rating_id) {
        $query = "SELECT * FROM `Rating` WHERE `rating_id` = ?";
        $sth = $dbh->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Rating');
        $sth->execute(array($rating_id));
        if ($sth->rowCount() == 1) {
            $rating = $sth->fetch();
            return $rating;
        } else {
            return "La fonction getRating n'a pas renvoyé de résultat.";
        }
    }
    
    public static function createRating($dbh, $user_id, $quiz_id, $rating) {
        $query = "INSERT INTO `Quiz` (`user_id`, `quiz_id`, `rating`) VALUES (?, ?, ?);";
        $sth = $dbh->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Rating');
        $sth->execute(array($user_id, $quiz_id, $rating));
        
    }
    /*
    public static function insertShare($dbh, $name, $number_of_hands) {
        $sth = $dbh->prepare("SELECT * FROM `Share` WHERE `name` = ?");
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Quiz');
        $sth->execute(array($name));
        if ($sth->rowCount() == 0) {   // On teste si le login est déjà utilisé
            $sth = $dbh->prepare("INSERT INTO `Quiz` (`name`, `number_of_hands`) VALUES (?, ?) VALUES(?, ?)");
            $sth->execute(array($name, $number_of_hands));
        }
        else {echo "Attention le nom est déjà utilisé. La base de données n'a pas été modifiée.";}
    }*/

    public function afficheliste($tab){
        echo "<ul>";
        foreach ($tab as $rating){
            echo "<li>";
            echo($rating);
            echo "</li>";
        }
        echo "</ul>";
        
    }

}
