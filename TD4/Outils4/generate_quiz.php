
<html>
<body>

Min &spades; is <?php echo $_POST["min_spades"]; ?><br>
Max &spades; is: <?php echo $_POST["max_spades"]; ?><br>
<?php
if (isset($_POST["inlineCheckbox2s"]))
{
    echo "User chose 2s ".$_POST["inlineCheckbox2s"];
} else {
    echo "User didn't choose 2s";
}
?>

</body>
</html>