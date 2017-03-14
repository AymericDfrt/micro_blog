<?php

  $message = "";
  $inscription = true;
if(isset($_POST['soumission'])){

  if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['pseudo'])
   && !empty($_POST['email']) && !empty($_POST['mdp']) && !empty($_POST['mdpverif'])){
    if (strlen($_POST['pseudo']) < 4 || strlen($_POST['pseudo'])  > 20) {
      //A faire : vérification des pseudos dans la BDD pour qu'il y ai des pseudos uniques
      $message = "Veuillez choisir un autre pseudo !";
      $inscription = false;
    }
    if (strlen($_POST['prenom']) < 2 || strlen($_POST['prenom'])  > 20) {
      $message="Veuillez renseigner un prenom correcte !";
      $inscription = false;
    }
     if (strlen($_POST['nom']) < 2 || strlen($_POST['nom'])  > 20) {
      $message="Veuillez enseigner un nom correcte !";
      $inscription = false;
    }
     if (strlen($_POST['mdp'])  < 7) {
      $message=" Veuillez choisir un mot de passe avec un minimum de 7 caractères !";
      $inscription = false;
    }
     if ($_POST['mdp'] != $_POST['mdpverif']) {
      $message="Erreur lors de la vérification du mot de passe !";
      $inscription = false;
    }
  }else{
    $message=" Il faut renseigner tout les champs !!!";
    $inscription = false;
  } 

  if($inscription) {
    //Création du cookie pour connecter directement l'utilisateur après l'inscription
    $sid = md5($_POST['email'] . time());
    setcookie("sid", $sid, time()+3600);

   $query = "INSERT INTO utilisateurs (prenom, nom, pseudo, email, mdp, sid) VALUES (?,?,?,?,?,?)";
   $prep = $pdo->prepare($query);
   $prep->bindValue(1, $_POST['prenom']);   
   $prep->bindValue(2, $_POST['nom']);
   $prep->bindValue(3, $_POST['pseudo']);   
   $prep->bindValue(4, $_POST['email']);
   $prep->bindValue(5, $_POST['mdp']);   
   $prep->bindValue(6, $sid);
   $prep->execute();

     header("Location: index.php");
     exit(); 
  }
}
  $smarty->assign('message_erreur', $message);
  $smarty->display('inscription.tpl');
?>
