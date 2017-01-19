<?php
include('includes/connexion.inc.php');
include('includes/haut.inc.php');

setcookie("sid_aircheck", "", -1);

echo "test";
header("Location: index.php");
exit();
?>