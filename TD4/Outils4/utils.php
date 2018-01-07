<?php
function generateHTMLHeader($titrepage, $lienCSS) {
    echo "<html>
    <link rel=\"stylesheet\" type=\"text/css\" href=\"$lienCSS\" />

    <head>
        <meta charset=\"UTF-8\"/>
        <meta name=\"author\" content=\"Peter Pan\"/>
        <meta name=\"keywords\" content=\"\"/>
        <meta name=\"description\" content=\"\"/>
        <title>$titrepage</title>
    </head>
    <body>";
}

function generateHTMLFooter() {
    echo "</body></html>";
}



$page_list = [
    array("name" => "welcome",
        "title" => "Page d'accueil",
        "menutitle" => "Accueil"),
    array("name" => "objectifs",
        "title" => "Objectifs",
        "menutitle" => "Objectifs"),
    array("name" => "quiz",
        "title" => "Quiz de bridge",
        "menutitle" => "Quiz"),
    array("name" => "contacts",
        "title" => "Qui sommes nous ?",
        "menutitle" => "Nous contacter")];

$pages = ["welcome", "objectifs", "quiz", "contacts"];


// accès aux pages///

//vérifie si la page demandée dans GET est autorisée

function checkPage($askedpage) {
    global $page_list;
    foreach ($page_list as $tableaupage) {
        if ($askedpage == $tableaupage["name"]) {
            return True;
        }
    }
    return False;
}

//modifier peut être ?
//fonction qui permet ensuite, quand on l'applique, de pouvoir revenir à la page d'accueil
//même quand on propose une mauvaise page page=youpi
//Néanmoins, un messgae "Interdit" s'affiche alors
function recupereParametre($tab, $nom, $listepossibles, $valeurdefaut) { //Renvoie [True, paramètre] ou [False, valeur par défaut]. Si $listepossibles==1, pas de condition d'appartenance du paramètre, sinon le paramètre doit appartenir à $listepossibles, sans quoi il vaudra $valeurdefaut
    if (isset($tab[$nom]) && ($listepossibles == 1 || in_array($tab[$nom], $listepossibles))) {
        $param["existe"] = True;
        $param["valeur"] = $tab[$nom];
    } else {
        $param["existe"] = False;
        $param["valeur"] = $valeurdefaut;
    }
    return $param;
}
// donne le nom du titre de la page qui est demandée. C'est le titre qui s'affiche au milieu.
// Le page sans titre ne sert à rien, puisque si la $askedpage est pas dans la liste des pages existantes,
// le $authorized va transformer le titre en "Interdit". C'est juste pour ne pas rien renvoyer
function getPageTitle($nompage) {
    global $page_list;
    foreach ($page_list as $tableaupage) {
        if ($nompage == $tableaupage["name"]) {
            return $tableaupage["title"];
        }
    }
    return "Page sans titre";
}

// nom et titre de la page

function pageverstitre($nompage) {
    global $page_list;
    foreach ($page_list as $tableaupage) {
        if ($nompage == $tableaupage["name"]) {
            return $tableaupage["menutitle"]; 
        }

    }
    
}
// à partir du nom d'une page, donner son lien dans le menu(construire automatiquement le menu des pages)
//function affpagemenu($nompage, $askedpage) {
//    $aafficher = pageverstitre($nompage);
//    if ($nompage == $askedpage) {
//        echo "<li class=\"active\"><a href=\"fauxindex.php?page=$nompage\">$aafficher <span class=\"sr-only\">(current)</span> </a></li>";
//    } else {
//        echo "<li><a href=\"fauxindex.php?page=$nompage\">$aafficher</a></li>";
//    }
//}

function affpagemenu($nompage) {
    $aafficher = pageverstitre($nompage);
    echo "<li><a href=\"fauxindex.php?page=$nompage\">$aafficher <span class=\"sr-only\">(current)</span> </a></li>";
    }



function affichemoncompte($dbh) {
    if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"]) {
        $prenom = Utilisateur::pren($dbh, $_SESSION["loogin"]);
        $nom = Utilisateur::no($dbh, $_SESSION["loogin"]);
        echo "<li class=\"dropdown\">
                <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Mon compte ($prenom $nom)<b class=\"caret\"></b></a>
                    <ul class=\"dropdown-menu\">
                        <li><a href=\"fauxindex.php?todo=logout\">Se déconnecter</a></li>
                        <li><a href=\"fauxindex.php?todo=changemdp\">Changer de mot de passe</a></li>
                        <li><a href=\"fauxindex.php?todo=supprcompte\">Supprimer mon compte</a></li>
                    </ul>
            </li>";
    } else {
        echo "<li class=\"dropdown\">
                <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Non connecté  <b class=\"caret\"></b></a>
                    <ul class=\"dropdown-menu\">
                        <li><a href=\"fauxindex.php?todo=login\">Connexion</a></li>
                        <li><a href=\"register.php\">Créer un compte</a></li>
                    </ul>
            </li>"; 
    }
}
