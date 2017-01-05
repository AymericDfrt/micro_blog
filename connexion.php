<?php
include('includes/connexion.inc.php');
include('includes/haut.inc.php');
include('includes/connexion.inc.php');

if (isset($_POST['email']) && isset($_POST['pwd'])) {
                    $query = "SELECT email, mdp FROM utilisateurs WHERE email = ? AND mdp = ?";
                    $prep = $pdo->prepare($query);
                    $prep->bindValue(1, $_POST['email']);
                    $prep->bindValue(2, $_POST['pwd']);
                    $prep->execute();

                    if ($prep->rowCount() == 1) {

                    $sid = md5($_POST['email'] . time());
                    setcookie("sid", $sid, time()+3600);

                    $query = "UPDATE utilisateurs SET sid = ? WHERE email = ?";
                    $prep = $pdo->prepare($query);
                    $prep->bindValue(1, $sid);
                    $prep->bindValue(2, $_POST['email']);
                    $prep->execute();
                    header("Location: index.php");
                    exit();
                    }else{

                    }
   /* if (!empty($data['email']) && !empty(data['pwd'])) {
            header("Location: success.php");
    }
    else{
         header("Location: echec.php");
    }*/
}
?>

<form class="form-horizontal" action="connexion.php" method="post">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Mot de passe</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="pwd">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input type="checkbox"> Remember me
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Se connecter</button>
    </div>
  </div>
</form>


<?php
include('includes/bas.inc.php'); 
?>