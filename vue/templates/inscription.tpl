{include file='includes/haut.inc.tpl'}

{if {!empty($message_erreur)}}
<div class='alert alert-danger'>
<strong>Oups..</strong>{$message_erreur}
 {/if}
</div>
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


{include file='includes/bas.inc.tpl'}