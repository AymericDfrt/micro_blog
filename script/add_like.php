<?php
include('../model/connexion_sql.php');

	if (isset($_GET['id_mess']) && !empty($_GET['id_mess'])) {

			$adresse_ip = $_SERVER['REMOTE_ADDR'];
			$select_nb_votes = "SELECT votes, adresse_ip FROM messages WHERE id = ?";
			$prep = $pdo->prepare($select_nb_votes);
			$prep->bindValue(1, $_GET['id_mess']);
			$prep->execute();

			 if($data = $prep->fetch()){
			 	$inc_nb_votes = $data['votes'] + 1;
			 		$query = "UPDATE messages SET votes = ?, adresse_ip = ? WHERE id = ?";
					$prep = $pdo->prepare($query);
					$prep->bindValue(1, $inc_nb_votes);
					$prep->bindValue(2, $adresse_ip);
					$prep->bindValue(3, $_GET['id_mess']);
					$prep->execute();
			 	}
			}
		}else{
			echo "0";
		}
?>