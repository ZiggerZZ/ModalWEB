<?php
function printLoginForm(){
    echo "<div class=\"container-fluid\">";
    echo "<div class=\"row\">";
    echo "<div class=\"col-md-6 col-md-offset-3\">";
    echo "<div class=\"pourselogger\">Veuillez rentrer vos identifiants.";
    echo "<br><form action=\"fauxindex.php?todo=login\" method=\"post\">
            <div class=\"input-group\">
                <span class=\"input-group-addon\"><i class=\"glyphicon glyphicon-user\"></i></span>
                <input type=\"text\" class=\"form-control\" name=\"loogin\" placeholder=\"Login\">
            </div>
            <div class=\"input-group\">
                <span class=\"input-group-addon\"><i class=\"glyphicon glyphicon-lock\"></i></span>
                <input  type=\"password\" class=\"form-control\" name=\"mdp\" placeholder=\"Mot de passe\">
            </div>
            <p><input type=\"submit\" value=\"Valider\" /></p></form>
        </form> ";
    echo '</div></div></div></div>';
   //echo "<div class=\"superstyle4\">Veuillez rentrer vos identifiants.";
   //echo "<form action=\"fauxindex.php?todo=login\" method=\"post\" >";
   //echo "<p>Login : <input type=\"text\" name=\"loogin\" placeholder=\"Username\" required/></p>";
   //echo "<p>Mot de passe : <input type=\"password\" name=\"mdp\" placeholder=\"Password\" required/></p>";
   //echo " <p><input type=\"submit\" value=\"Valider\" /></p></form>";
   //echo '</div>';
   
}
function affiche_formulaire(){
    require 'Outils4/formulaireinscription.php';
}
?>
    