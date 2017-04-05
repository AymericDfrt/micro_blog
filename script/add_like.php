<?php
include('../model/connexion_sql.php');
	if (isset($_GET['id_mess']) && !empty($_GET['id_mess'])) {
			$select_nb_votes = "SELECT votes FROM messages WHERE id = ?";
			$prep = $pdo->prepare($select_nb_votes);
			$prep->bindValue(1, $_GET['id_mess']);
			$prep->execute();
			 if($data = $prep->fetch()){
			 	$inc_nb_votes = $data['votes'] + 1;
			 	$query = "UPDATE messages SET votes = ? WHERE id = ?";
				$prep = $pdo->prepare($query);
				$prep->bindValue(1, $inc_nb_votes);
				$prep->bindValue(2, $_GET['id_mess']);
				$prep->execute();
					echo "1";
			}else{
				echo "0";
			}
		}else{
			echo "0";
		}
?>