<?php
/* Smarty version 3.1.30, created on 2017-02-28 13:47:35
  from "C:\xampp\htdocs\micro_blog_mvc\vue\templates\connexion.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58b57167e69488_91672697',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '567ac778f9d84513980bd73b2d6d1d04b785bf74' => 
    array (
      0 => 'C:\\xampp\\htdocs\\micro_blog_mvc\\vue\\templates\\connexion.tpl',
      1 => 1488286050,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:includes/haut.inc.tpl' => 1,
    'file:includes/bas.inc.tpl' => 1,
  ),
),false)) {
function content_58b57167e69488_91672697 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:includes/haut.inc.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


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
<?php $_smarty_tpl->_subTemplateRender("file:includes/bas.inc.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<?php echo '<script'; ?>
>
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

<?php echo '</script'; ?>
>

<?php }
}
