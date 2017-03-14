<?php

//Par sécurité, si une personne mal intentionné accède au script, on vérifie qu'elle est connecté 
if($connect){
	//Si le champ message existe et n'est pas vide
	if (isset($_POST['message']) && !empty($_POST['message'])) {
		//S'il y a un identifiant de message cela signifie que l'utilisateur veut modifier un message
		if (isset($_POST['idmess']) && !empty($_POST['idmess'])) {
			$query = "UPDATE messages SET texte = ?, dateModification = UNIX_TIMESTAMP() WHERE id = ?";
			$prep = $pdo->prepare($query);
			$prep->bindValue(1, $_POST['message']);
			$prep->bindValue(2, $_POST['idmess']);
		//Sinon cela veut dire qu'il en créé un nouveau
		}else{
			//Selection de l'id utilisateur pour l'associer au nouveau message
	        $query = "SELECT id from utilisateurs where sid='" .$cook. "'";
	        $stmt = $pdo->query($query);

	        if($data = $stmt->fetch()){
	        	//Insertion du nouveau message avec l'id utilisateur selectionné précèdement
	            $query = "INSERT INTO messages (dateCreation, texte, utilisateur_id) VALUES (UNIX_TIMESTAMP(), ?, ?)";
				$prep = $pdo->prepare($query);
				$prep->bindValue(1, $_POST['message']);		
				$prep->bindValue(2, $data['id']);		
	        }		
		}
		$prep->execute();
	}
}
	//Dans tout les cas, on redirige l'utilisateur vers la page d'accueil
	header("Location: index.php");
	exit();
?>