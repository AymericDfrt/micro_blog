<?php
if($connect){
	var_export("test decoct");
	//Suppression de l'identifiant de session utilisateur dans le cookie
	setcookie("sid", "", -1);
}

header("Location: index.php?p=home");
exit();
?>