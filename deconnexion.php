<?php
include('includes/connexion.inc.php');
include('includes/haut.inc.php');

setcookie("sid", "", -1);

header("Location: index.php");
?>