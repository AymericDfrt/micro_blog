<?php
/* Smarty version 3.1.30, created on 2017-02-28 13:36:54
  from "C:\xampp\htdocs\micro_blog_mvc\vue\templates\inscription.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58b56ee6161656_57851075',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0c21b8da5709b1eb5722a58be949bf89596d3918' => 
    array (
      0 => 'C:\\xampp\\htdocs\\micro_blog_mvc\\vue\\templates\\inscription.tpl',
      1 => 1488285370,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:includes/haut.inc.tpl' => 1,
    'file:includes/bas.inc.tpl' => 1,
  ),
),false)) {
function content_58b56ee6161656_57851075 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:includes/haut.inc.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<?php ob_start();
echo !empty($_smarty_tpl->tpl_vars['message_erreur']->value);
$_prefixVariable1=ob_get_clean();
if ($_prefixVariable1) {?>
<div class='alert alert-danger'>
<strong>Oups..</strong><?php echo $_smarty_tpl->tpl_vars['message_erreur']->value;?>

 <?php }?>
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


<?php $_smarty_tpl->_subTemplateRender("file:includes/bas.inc.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
