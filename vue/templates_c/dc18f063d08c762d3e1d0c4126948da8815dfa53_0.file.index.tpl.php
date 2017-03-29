<?php
/* Smarty version 3.1.30, created on 2017-03-29 13:45:02
  from "C:\xampp\htdocs\micro_blog_mvc\vue\templates\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58db9e3e37d330_49523401',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dc18f063d08c762d3e1d0c4126948da8815dfa53' => 
    array (
      0 => 'C:\\xampp\\htdocs\\micro_blog_mvc\\vue\\templates\\index.tpl',
      1 => 1490787900,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:includes/haut.inc.tpl' => 1,
    'file:includes/bas.inc.tpl' => 1,
  ),
),false)) {
function content_58db9e3e37d330_49523401 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'C:\\xampp\\htdocs\\micro_blog_mvc\\vendor\\smarty\\plugins\\modifier.date_format.php';
$_smarty_tpl->_subTemplateRender("file:includes/haut.inc.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<!--Formulaire d'ajout ou de modification de messages-->
<!--/!\ Affichage pour les utilisateurs connectés ($connect)-->
<div class="row">    
<?php ob_start();
echo $_smarty_tpl->tpl_vars['connexion']->value;
$_prefixVariable1=ob_get_clean();
if ($_prefixVariable1) {?>        
    <form method="post" action="?p=ajout_message">
        <div class="col-sm-10">  
            <div class="form-group">
                <textarea id="message" name="message" class="form-control" placeholder="message"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</textarea>
                <input type='hidden' name='idmess' value="<?php echo $_smarty_tpl->tpl_vars['id_mess']->value;?>
">
            </div>
        </div>
        <div class="col-sm-2">
            <button type="submit" class="btn btn-success btn-lg"><?php echo $_smarty_tpl->tpl_vars['action_btn']->value;?>
</button>
        </div>                        
    </form>
    <?php }?>
</div>


<blockquote>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['messages']->value, 'mess');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['mess']->value) {
echo $_smarty_tpl->tpl_vars['mess']->value['texte'];?>
 <br>
<?php ob_start();
echo $_smarty_tpl->tpl_vars['connexion']->value;
$_prefixVariable2=ob_get_clean();
if ($_prefixVariable2) {?>
<a href="index.php?id=<?php echo $_smarty_tpl->tpl_vars['mess']->value['mess_id'];?>
"><button type='button' class='btn btn-warning'>Modifier</button></a>
<a href="index.php?p=supprimer_message&id=<?php echo $_smarty_tpl->tpl_vars['mess']->value['mess_id'];?>
"><button type='button' class='btn btn-danger'>Supprimer</button></a><br>
<?php }?>
<b><u>Envoyé par :</u></b><?php echo $_smarty_tpl->tpl_vars['mess']->value['pseudo'];?>
<br>
<b><u>créé le :</u></b> <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['mess']->value['dateCreation'],"%D à %H:%M:%S");?>
<br>
 <?php if ($_smarty_tpl->tpl_vars['mess']->value['dateModification'] != 0) {?>
    <b><u>Modifié le :</u></b> <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['mess']->value['dateModification'],"%D à %H:%M:%S");?>
<br>
 <?php }?>
<br>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


</blockquote>

    
<!--Navigateur de la pagination-->

<?php if ($_smarty_tpl->tpl_vars['recherche']->value == '') {?>
<ul class="pagination">
<li>
   <a href="?p_article=<?php echo $_smarty_tpl->tpl_vars['num_page']->value-1;?>
" aria-label='Previous'>
   <span aria-hidden="true">&laquo;</span>
  </a>
</li>
<?php ob_start();
echo $_smarty_tpl->tpl_vars['nb_de_pages_article']->value;
$_prefixVariable3=ob_get_clean();
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_prefixVariable3+1 - (1) : 1-($_prefixVariable3)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
     <li><a href="index.php?p_article=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a></li>
<?php }
}
?>

<li>
  <a href="?p_article=<?php echo $_smarty_tpl->tpl_vars['num_page']->value+1;?>
" aria-label='Next'>
      <span aria-hidden="true">&raquo;</span>
    </a>
</li>
</ul>

<?php } elseif ($_smarty_tpl->tpl_vars['recherche']->value != '') {?>
<ul class="pagination">
<li>
   <a href="?p_article=<?php echo $_smarty_tpl->tpl_vars['num_page']->value-1;?>
&recherche=<?php echo $_smarty_tpl->tpl_vars['recherche']->value;?>
" aria-label='Previous'>
   <span aria-hidden="true">&laquo;</span>
  </a>
</li>

<?php ob_start();
echo $_smarty_tpl->tpl_vars['nb_de_pages_article']->value;
$_prefixVariable4=ob_get_clean();
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_prefixVariable4+1 - (1) : 1-($_prefixVariable4)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
         <li><a href="index.php?p_article=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
&recherche=<?php echo $_smarty_tpl->tpl_vars['recherche']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a></li>
<?php }
}
?>

<li>
  <a href="?p_article=<?php echo $_smarty_tpl->tpl_vars['num_page']->value+1;?>
&recherche=<?php echo $_smarty_tpl->tpl_vars['recherche']->value;?>
" aria-label='Next'>
      <span aria-hidden="true">&raquo;</span>
    </a>
</li>
</ul>
<?php }?>



<?php $_smarty_tpl->_subTemplateRender("file:includes/bas.inc.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
