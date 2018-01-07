<?php
session_start();
require ("Outils4/logInOut.php");
require_once ("Outils4/printForms.php");
require_once ("Outils4/utils.php");
if (!isset($dbh)) {
    $dbh = Database::connect();
}


if (!isset($_SESSION['initiated'])) {
    session_regenerate_id();
    $_SESSION['initiated'] = true;
}

if (isset($_GET["todo"]) && $_GET["todo"] == "logout") {
    $_SESSION["loggedIn"] = False;
}

generateHTMLHeader("Formulaire", "css4/serieux.css");
echo "<link href=\"css4/bootstrap.css\" rel=\"stylesheet\">";
echo '<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>';
echo '<script type="text/javascript" src="js/code.js"></script>';

$param = recupereParametre($_GET, "page", $pages, "welcome");
$pageexistante = $param["existe"];
$askedpage = $param["valeur"];
$authorized = (checkpage($askedpage) and $pageexistante);

if ($authorized) {
    $pageTitle = getPageTitle($askedpage);
} else {
    $pageTitle = "Erreur ! Accès interdit !";
}


if ((!(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'])) && isset($_GET["todo"]) && $_GET["todo"] == "login") {
    logIn($dbh);
}
?>
<div class="container-fluid">
    <div class="navbar navbar-default ">
        <div class="navbar-header">
            <a class="navbar-brand" href="#"><img alt="Cartes" src="bridge.jpg" width="50px"</a>
        </div>

        <div class="container">

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <ul class="nav navbar-nav navbar-left">
                        <?php foreach ($pages as $p) {
                            //affpagemenu($p, $askedpage);
                            affpagemenu($p);
                        } ?>
                                  <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Quiz<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Créer un quiz</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Quiz existant</a></li>
          </ul>
        </li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <button type="button" href="index_LogIn.php" class="btn btn-default navbar-btn">Connexion</button>
                    <li> 
<?php
affichemoncompte($dbh);
?>

                    </li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>

    </div>




    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3">Bridge Training!</h1>
            <p><a class="btn btn-primary btn-lg" href="#" role="button">En savoir plus »</a></p>
            <p>Structure de base du site...</p>
<?php
echo "Authorized vaut ";
var_dump($authorized);
echo "S_SESSION vaut";
var_dump($_SESSION);
$session_existante = (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"]);
if ($session_existante) {
    echo "Youpi, déjà loggé !";
}
?>
        </div>
    </div>



    <div id="content">
        <div>
<?php
echo "<h1 style=\"text-align : center; color: red\";>";
echo $pageTitle . "</h1>";
if (!$pageexistante) {
    //echo "Attention, la page que vos demandez n'existe pas ou ne vous est pas accessible.";
}
require("Contenus/content_$askedpage.php");
?>
        </div>

    </div>
    <footer class="container"> 
    <p>©Drakkès</p> </footer>
    



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.js"></script>

</body>
</html>