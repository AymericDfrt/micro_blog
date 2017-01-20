<?php
include('includes/connexion.inc.php');
include('includes/haut.inc.php');

$inscription = true;

if(isset($_POST['soumission'])){
  if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['pseudo'])
   && !empty($_POST['email']) && !empty($_POST['mdp']) && !empty($_POST['mdpverif'])){
    if (strlen($_POST['pseudo']) < 4 || strlen($_POST['pseudo'])  > 20) {
      echo "<div class='alert alert-danger'><strong>Oups..</strong> Veuillez choisir un autre pseudo !</div>";
      //A faire : vérification des pseudos dans la BDD pour qu'il y ai des pseudos uniques
      $inscription = false;
    }
    if (strlen($_POST['prenom']) < 2 || strlen($_POST['prenom'])  > 20) {
      echo "<div class='alert alert-danger'><strong>Oups..</strong> Veuillez renseigner un prenom correcte !</div>";
      $inscription = false;
    }
     if (strlen($_POST['nom']) < 2 || strlen($_POST['nom'])  > 20) {
      echo "<div class='alert alert-danger'><strong>Oups..</strong> Veuillez enseigner un nom correcte !</div>";
      $inscription = false;
    }
     if (strlen($_POST['mdp'])  < 7) {
      echo "<div class='alert alert-danger'><strong>Oups..</strong> Veuillez choisir un mot de passe avec un minimum de 7 caractères !</div>";
      $inscription = false;
    }
     if ($_POST['mdp'] != $_POST['mdpverif']) {
  echo "<div class='alert alert-danger'><strong>Oups..</strong> Erreur lors de la vérification du mot de passe !</div>";
      $inscription = false;
    }
  }else{
    echo "<div class='alert alert-danger'><strong>Oups..</strong> Il faut renseigner tout les champs !</div>";
    $inscription = false;
  } 

  if ($inscription) {
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

?>

<form class="form-horizontal" action="" method="post">
<div class="form-group">
  <div id="notif" class="hidden"></div>
    <label for="inputEmail3" class="col-sm-1 control-label">Nom</label>
    <div class="col-sm-5">
      <input type="texte" class="form-control" id="inputEmail3" placeholder="Nom" name="nom">
    </div>
    <label for="inputEmail3" class="col-sm-1 control-label">Prenom</label>
    <div class="col-sm-5">
      <input type="texte" class="form-control" id="inputEmail3" placeholder="Prenom" name="prenom">
    </div>
  </div>
<div class="form-group">
  <div id="notif" class="hidden"></div>
    <label for="inputEmail3" class="col-sm-1 control-label">Pseudo</label>
    <div class="col-sm-11">
      <input type="texte" class="form-control" id="inputEmail3" placeholder="Pseudo" name="pseudo">
    </div>
  </div>

  <div class="form-group">

    <label for="inputEmail3" class="col-sm-1 control-label">Email</label>
    <div class="col-sm-11">
      <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-1 control-label">Mot de passe</label>
    <div class="col-sm-11">
      <input type="password" class="form-control" id="inputPassword3" placeholder="Mot de passe" name="mdp">
    </div>
  </div>
    <div class="form-group">
    <label for="inputPassword3" class="col-sm-1 control-label">Confirmation</label>
    <div class="col-sm-11">
      <input type="password" class="form-control" id="inputPassword3" placeholder="Confirmation du mot de passe" name="mdpverif">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-1 col-sm-1">
      <input type="submit" class="btn btn-default" value="S'inscrire" name="soumission"></input>
    </div>
  </div>
</form>


<?php
include('includes/bas.inc.php'); 
?>