<?php
//if (session_status() == PHP_SESSION_NONE) {
    session_start();
//}
require_once 'Outils4/utils.php';
require_once 'Outils4/printForms.php';
require_once 'Outils4/bdd4.php';
if (!isset($dbh)){$dbh = Database::connect();}
generateHTMLHeader("S'enregistrer", "css4/serieux.css");

echo '<link href="css4/bootstrap.css" rel="stylesheet">';

if (!isset($_SESSION['initiated'])) {
    session_regenerate_id();
    $_SESSION['initiated'] = true;
}

$form_values_valid = False;
$login = recupereParametre($_POST, "login", 1, "")["valeur"];
$password = recupereParametre($_POST, "password", 1, "")["valeur"];
$surname = recupereParametre($_POST, "surname", 1, "")["valeur"];
$name = recupereParametre($_POST, "name", 1, "")["valeur"];
$email= recupereParametre($_POST, "email", 1, "")["valeur"];

if (isset($_POST["login"]) && $_POST["login"] != "") {// && isset($_POST["email"]) && $_POST["email"] != "") {
    if (!(User::existe_login($dbh, $_POST["login"]))) {// || User::existe_email($dbh, $_POST["login"]))) {
        $form_values_valid = True;
        echo "<div class=\"superstyle4\">Bonjour $name $surname, vous êtes bien enregistré :) Votre login est :<br> $login <a href=\"fauxindex.php\">Retour à l'accueil</a></div>";
        User::creecompte($dbh, $login, $name, $surname, $password, $email);
        $_SESSION["loggedIn"]=True;
        $_SESSION["loogin"]=$login;
    } else { echo "<div class=\"superstyle4\">Ce login est déjà utilisé :( </div>";}
}
//what is that?
if (!$form_values_valid) { affiche_formulaire($surname, $name, $email);} 
generateHTMLFooter();
