<!DOCTYPE html>



<?php 
if (isset ($_POST["name"])){$name=$_POST["name"];}else {$name="";} 
if (isset ($_POST["surname"])){$surname=$_POST["surname"];}else {$surname="";}
if (isset ($_POST["email"])){$email=$_POST["email"];}else {$email="";}
?>

<div class="container-fluid"><div class="row"><div class="col-md-6 col-md-offset-3">
            <div class="pourselogger">Veuillez remplir le formulaire ci-dessous
                <p><br></p>
                <form action="register.php" method=post
                    oninput="password2.setCustomValidity(password2.value != password.value ? 'Veuillez mettre le même mot de passe.' : '')">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" class="form-control" name=surname placeholder="Nom" <?php echo "value=\"$surname\"";?>>
                        <input type="text" class="form-control" name=name placeholder="Prénom" <?php echo "value=\"$name\"";?>>
                        <input type="email" class="form-control" name=email placeholder="Adresse mail" <?php echo "value=\"$email\"";?>>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" class="form-control" name=login placeholder="Login">
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input  type="password" class="form-control" name=password placeholder="Mot de passe" required>
                        <input  type="password" class="form-control" name=password2 placeholder="Confirmez votre mot de passe" required>
                    </div>
                    <input type=submit value="Créer mon compte">
                </form>
            </div>
        </div>
    </div>
</div>
