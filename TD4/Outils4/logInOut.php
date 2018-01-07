<?php
session_start();
require ("Outils4/bdd4.php");

function logIn($dbh) {
    if (isset($_POST["loogin"]) && isset($_POST["mdp"]) && Utilisateur::existe_login($dbh, $_POST["loogin"]) && (Utilisateur::testerMdp($dbh, $_POST["loogin"], $_POST["mdp"]))) {
        $_SESSION["loogin"] = $_POST["loogin"];
        $_SESSION["mdp"] = $_POST["mdp"];
        $_SESSION["loggedIn"]=TRUE;
        $prenom = Utilisateur::pren($dbh, $_POST["loogin"]);
        $nom = Utilisateur::no($dbh, $_POST["loogin"]);
        echo "<div class=\"pourselogger\">";
        echo "<p>Bonjour, " . $prenom . " " . $nom . ", ton login est " . $_POST["loogin"];
        echo ".<br>Tu es bien loggé ! :)";
        echo "</div>";
    } else {
        printLoginForm();
        
}}

