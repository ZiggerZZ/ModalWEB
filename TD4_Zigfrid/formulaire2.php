<?php session_start();?>
<!DOCTYPE html>
<html>
 
<head>
  <title>Formulaire</title>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
</head>
 
<body>
  <h1>Mon deuxième formulaire !</h1>
 
  <?php
  if(isset($_POST["prenom"]) && $_POST["prenom"] != "" && isset($_POST["genre"]) && isset($_POST["naiss"])) {
    echo "<p>Bonjour, " .$_POST["prenom"].", es tu content".($_POST["genre"] == "f" ? "e" : "");
    echo " ?<br> Quelle chance d'être né".($_POST["genre"] == "f" ? "e" : "")." le ".$_POST["naiss"]." !";
    echo "<br><a href=\"index.php\">Retour à l'index</a><br><a href=\"formulaire2.php\">Retour au formulaire 2, qui est en fait la même page</a>";
  } else {
  ?>
 
  <form action="formulaire2.php" method="post">
    <p>Prénom : <input type="text" name="prenom" required /></p>
    <p>Genre :
      <input name="genre" value="f" type="radio" checked="checked" required />F
      <input name="genre" value="m" type="radio" />M
    </p>
    
    <p>Date de naissance : <input type="date" name="naiss" required /></p>
    <p><input type="submit" value="Valider" /></p>
  </form>
 <br>
  <a href="index.php">Retour à l'index</a>
  <?php
  }
  ?>
</body>
 
</html>


