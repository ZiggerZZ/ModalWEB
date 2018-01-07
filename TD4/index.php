<?php
session_start();
session_name("session007");
$_SESSION["loggedIn"]=False;
?>
<!DOCTYPE html>
 
<html>
 
<head>
  <title>Quatrième TD</title>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
  <link href="css4/serieux.css" rel="stylesheet" type="text/css"/>
<!--  <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="js/code.js"></script>-->
</head>
 
<body>
    
    <div class="superstyle4">
        <h1>Index</h1>
    </div>
  <h1>1) Premiers formulaires</h1>
  <ul>
      <li><a href="formulaire1.php">Le premier formulaire, avec deux pages</a></li>
      <li><a href="formulaire2.php">Le deuxième formulaire, tout inclus dans la même page</a></li>
      <li><a href="fauxindex.php?">Le formulaire de connexion</a></li>
      <li><a href="menunav.php">Menu navigation</a></li>
      <li><a href="register.php">Inscription</a></li>
      <li><a href="viewer.php">Viewer</a></li>
  </ul>
  
  
 

