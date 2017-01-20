<?php
include('includes/connexion.inc.php');
include('includes/haut.inc.php');

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
        }

    header("Location: index.php");
    exit(); 
}
?>

<form class="form-horizontal" action="connexion.php" method="post">
  <div class="form-group">
  <div id="notif" class="hidden"></div>
    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Mot de passe</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="mdp">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Se connecter</button>
    </div>
  </div>
</form>

<script>
//Affichage d'une notification d'erreur en cas de mauvaise saisie du formulaire
$(function(){

$('form').submit(function(){
  $('.hidden').show();

  var email = $("input[name='email']").val();
  var mdp = $("input[name='mdp']").val();

  if (!email || !mdp) {
    $('#notif').removeClass();
    $('#notif').addClass("alert alert-danger");
    $('#notif').html("Veuillez vérifier vos identifiants de connexion !");
    $('#notif').slideDown('fast');
    return false;
  }else{
    return true;
  }
});

});

</script>


<?php
include('includes/bas.inc.php'); 
?>