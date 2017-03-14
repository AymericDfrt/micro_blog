<?php

$message = "";
    if (isset($_POST['email']) && isset($_POST['mdp'])) {
        //Selection de l'utilisateur avec les informations saisie
        $query = "SELECT email, mdp FROM utilisateurs WHERE email = ? AND mdp = ?";
        $prep = $pdo->prepare($query);
        $prep->bindValue(1, $_POST['email']);
        $prep->bindValue(2, $_POST['mdp']);
        $prep->execute();          

          //Si l'utilisateur existe
          if ($prep->rowCount() == 1) {
          //Creation du cookie identifiant de session
            $sid = md5($_POST['email'] . time());
            setcookie("sid", $sid, time()+3600);

          //Mise à jour de la ligne de l'utilisateur connecté avec l'identifiant de session généré précèdement
            $query = "UPDATE utilisateurs SET sid = ? WHERE email = ?";
            $prep = $pdo->prepare($query);
            $prep->bindValue(1, $sid);
            $prep->bindValue(2, $_POST['email']);
            $prep->execute();

            header("Location: index.php");
            exit(); 
            }else{
                $message = "Vérifiez vos informations de connexion";
            }

    }else{
        $message = "Il faut renseigner votre identifiant et votre mot de passe";
    }
    
$smarty->assign('message_erreur', $message);
$smarty->display('connexion.tpl');
?>
