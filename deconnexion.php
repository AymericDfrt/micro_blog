<?php
include('includes/connexion.inc.php');
include('includes/haut.inc.php');

if($connect){
	//Suppression de l'identifiant de session utilisateur dans le cookie
	setcookie("sid", "", -1);
}

header("Location: index.php");
exit();
?>