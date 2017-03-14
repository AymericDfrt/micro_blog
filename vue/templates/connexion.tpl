{include file='includes/haut.inc.tpl'}

<form class="form-horizontal" action="?p=connexion" method="post">
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
      <button type="submit" class="btn btn-default" name="submit">Se connecter</button>
    </div>
  </div>
</form>
{include file='includes/bas.inc.tpl'}

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
    $('#notif').html("Veuillez entrer votre identifiant et votre mot de passe de connexion");
    $('#notif').slideDown('fast');
    return false;
  }
  else{
    return true;
  }
});

});

</script>

