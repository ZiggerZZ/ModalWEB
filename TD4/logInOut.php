<?php

//if (session_status() == PHP_SESSION_NONE) {
    session_start();
//}

require ("Outils4/bdd4.php");

function logIn($dbh) {
    if (isset($_POST["loogin"]) && isset($_POST["password"]) && User::existe_login($dbh, $_POST["loogin"]) && (User::testerPassword($dbh, $_POST["loogin"], $_POST["password"]))) {
        echo "did it work ?";
        $_SESSION["loogin"] = $_POST["loogin"];
        $_SESSION["password"] = $_POST["password"];
        $_SESSION["loggedIn"]=TRUE;
        $name = User::name($dbh, $_POST["loogin"]);
        $surname = User::surname($dbh, $_POST["loogin"]);
        echo "<div class=\"pourselogger\">";
        echo "<p>Bonjour, " . $name . " " . $surname . ", ton login est " . $_POST["loogin"];
        echo ".<br>Connexion réussie !";
        echo "</div>";
    } else {
        printLoginForm();
        
}}

function logOut() {
    unset($_SESSION['loggedIn']);
    session_unset();
    session_destroy();
}

