<?php
include('includes/connexion.inc.php');

//Par sécurité, si une personne mal intentionné accède au script, on vérifie qu'elle est connecté 
if($connect){
	//Récupération de l'id via l'URL, en effet, le bouton "supprimer" ne fait pas partie d'un formulaire
	if(isset($_GET['id']) && !empty($_GET['id'])){
		$query = "DELETE FROM messages WHERE id = ?";
		$prep = $pdo->prepare($query);
		$prep->bindValue(1, $_GET['id']);
		$prep->execute();
	}
}

//Dans tout les cas, on redirige l'utilisateur vers la page d'accueil
header("Location: index.php");
exit();


?>