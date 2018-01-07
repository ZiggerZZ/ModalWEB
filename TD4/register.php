<?php
session_start();
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
$mdp = recupereParametre($_POST, "mdp", 1, "")["valeur"];
$nom = recupereParametre($_POST, "nom", 1, "")["valeur"];
$prenom = recupereParametre($_POST, "prenom", 1, "")["valeur"];
$promotion = recupereParametre($_POST, "promotion", 1, 0)["valeur"];
$naissance = recupereParametre($_POST, "naissance", 1, 2000)["valeur"];
$email= recupereParametre($_POST, "email", 1, "")["valeur"];
$feuille = recupereParametre($_POST, "feuille", 1, "css4/serieux.css")["valeur"];

if (isset($_POST["login"]) && $_POST["login"] != "") {// && isset($_POST["email"]) && $_POST["email"] != "") {
    if (!(Utilisateur::existe_login($dbh, $_POST["login"]))) {// || Utilisateur::existe_email($dbh, $_POST["login"]))) {
        $form_values_valid = True;
        echo "<div class=\"superstyle4\">Bonjour $prenom $nom, vous êtes bien enregistré :) Votre login est :<br> $login <a href=\"fauxindex.php\">Retour à l'accueil</a></div>";
        Utilisateur::creecompte($dbh, $login,$mdp,$nom,$prenom,$promotion,$naissance,$email,$feuille);
        $_SESSION["loggedIn"]=True;
        $_SESSION["loogin"]=$login;
    } else { echo "<div class=\"superstyle4\">Ce login est déjà utilisé :( </div>";}
}
if (!$form_values_valid) { affiche_formulaire($nom, $prenom, $promotion, $naissance, $email);} 
generateHTMLFooter();

