<!DOCTYPE html>
<?php 
if (isset ($_POST["prenom"])){$prenom=$_POST["prenom"];}else {$prenom="";} 
if (isset ($_POST["nom"])){$nom=$_POST["nom"];}else {$nom="";}
if (isset ($_POST["email"])){$email=$_POST["email"];}else {$email="";}
if (isset ($_POST["naissance"])){$naissance=$_POST["naissance"];}else {$naissance="";}
if (isset ($_POST["promotion"])){$promotion=$_POST["promotion"];}else {$promotion="";}

?>

<div class="container-fluid"><div class="row"><div class="col-md-6 col-md-offset-3">
            <div class="pourselogger">Veuillez remplir le formulaire ci-dessous
                <p><br></p>
                <form action="register.php" method=post
                    oninput="mdp2.setCustomValidity(mdp2.value != mdp.value ? 'Les mots de passe diffèrent.' : '')">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" class="form-control" name=nom placeholder="Nom" <?php echo "value=\"$nom\"";?>>
                        <input type="text" class="form-control" name=prenom placeholder="Prénom" <?php echo "value=\"$prenom\"";?>>
                        <input type="email" class="form-control" name=email placeholder="Adresse mail" <?php echo "value=\"$email\"";?>>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        <input type="date" class="form-control" name=naissance placeholder="Date de naissance" <?php echo "value=\"$naissance\"";?>>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-folder-close"></i></span>
                        <input type="number" class="form-control" name=promotion placeholder="Promotion" <?php echo "value=\"$promotion\"";?>>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" class="form-control" name=login placeholder="Login">
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input  type="password" class="form-control" name=mdp placeholder="Mot de passe" required>
                        <input  type="password" class="form-control" name=mdp2 placeholder="Confirmez votre mot de passe" required>
                    </div>
                    <input type=submit value="Créer mon compte">
                </form>
            </div>
        </div>
    </div>
</div>
