<?php
include('includes/connexion.inc.php');

if($connect){
	if (isset($_POST['message']) && !empty($_POST['message'])) {
				if (isset($_POST['idmess']) && !empty($_POST['idmess'])) {

					$query = "UPDATE messages SET texte = ?, dateModification = UNIX_TIMESTAMP() WHERE id = ?";
					$prep = $pdo->prepare($query);
					$prep->bindValue(1, $_POST['message']);
					$prep->bindValue(2, $_POST['idmess']);
				}else{
                $query = "SELECT id from utilisateurs where sid='" .$cook. "'";
                $stmt = $pdo->query($query);
                if($data = $stmt->fetch()){
                    $query = "INSERT INTO messages (dateCreation, texte, utilisateur_id) VALUES (UNIX_TIMESTAMP(), ?, ?)";
					$prep = $pdo->prepare($query);
					$prep->bindValue(1, $_POST['message']);		
					$prep->bindValue(2, $data['id']);		
                }
					
		}
		$prep->execute();
	}
}

	header("Location: index.php");
	exit();
?>