<?php 
session_start();
require ("Outils/utils.php");
generateHTMLHeader("Résultat", "css/Stylesboot"); 
echo "Bonjour ".$_POST["prenom"];
if ($_POST["genre"]=="f"){echo ", es tu contente ?<br>";}
elseif ($_POST["genre"]=="m"){echo ", es tu content ?<br>";}
?>
<br>
<a href="formulaire1.php">Retour au formulaire 1</a>
<br>
<a href="index.php">Retour à l'index</a>
<?php
generateHTMLFooter();

