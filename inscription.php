<?php
include('includes/connexion.inc.php');
include('includes/haut.inc.php');

?>


<form class="form-horizontal" action="connexion.php" method="post">
<div class="form-group">
  <div id="notif" class="hidden"></div>
    <label for="inputEmail3" class="col-sm-1 control-label">Nom</label>
    <div class="col-sm-5">
      <input type="texte" class="form-control" id="inputEmail3" placeholder="Nom" name="email">
    </div>
    <label for="inputEmail3" class="col-sm-1 control-label">Prenom</label>
    <div class="col-sm-5">
      <input type="texte" class="form-control" id="inputEmail3" placeholder="Prenom" name="email">
    </div>
  </div>
<div class="form-group">
  <div id="notif" class="hidden"></div>
    <label for="inputEmail3" class="col-sm-1 control-label">Pseudo</label>
    <div class="col-sm-11">
      <input type="texte" class="form-control" id="inputEmail3" placeholder="Pseudo" name="email">
    </div>
  </div>

  <div class="form-group">
  <div id="notif" class="hidden"></div>
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
      <input type="password" class="form-control" id="inputPassword3" placeholder="Confirmation du mot de passe" name="mdp">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-1 col-sm-1">
      <button type="submit" class="btn btn-default">S'inscrire</button>
    </div>
  </div>
</form>


<?php
include('includes/bas.inc.php'); 
?>