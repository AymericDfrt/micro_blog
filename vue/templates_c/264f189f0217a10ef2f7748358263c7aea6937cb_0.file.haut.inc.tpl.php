<?php
/* Smarty version 3.1.30, created on 2017-02-28 15:58:14
  from "C:\xampp\htdocs\micro_blog_mvc\vue\templates\includes\haut.inc.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58b590065342e5_62668279',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '264f189f0217a10ef2f7748358263c7aea6937cb' => 
    array (
      0 => 'C:\\xampp\\htdocs\\micro_blog_mvc\\vue\\templates\\includes\\haut.inc.tpl',
      1 => 1488292290,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58b590065342e5_62668279 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Micro blog</title>

    <!-- Bootstrap Core CSS -->
    <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="./css/freelancer.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"><?php echo '</script'; ?>
>
    <![endif]-->        
    <?php echo '<script'; ?>
 type="text/javascript" src="jquery.min.js"><?php echo '</script'; ?>
>
</head> 

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            

            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.php">Micro blog  </a> 
                
            </div>

            <div class="navbar-header page-scroll">
               
            </div>

           <div class="col-lg-4">
                
                    <span class="input-group-btn">
                    <form method="POST" action="?p=home">
                     <div class="input-group">
                  <input type="text" class="form-control" placeholder="Rechercher..." name="recherche">
                       <span class="input-group-btn">
                        <input class="btn btn-default" type="submit">Go!</input>
                    </form>
                     
                    </span>
                 </div>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">

                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                         <li class="page-scroll">
                        <?php ob_start();
echo $_smarty_tpl->tpl_vars['connexion']->value;
$_prefixVariable4=ob_get_clean();
if ($_prefixVariable4) {?> 
                            <li><a href=''>Bienvenue <?php echo $_smarty_tpl->tpl_vars['pseudo']->value;?>
</a></li><li><a href='?p=deconnexion'>Deconnexion</a></li>
                         <?php } else { ?>
                             <a href='?p=connexion'>Connexion</a> </li><li><a href='?p=inscription'>Inscription</a> </li>
                        <?php }?>

                              
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-text">
                        <span class="name">Le fil</span>
                        <hr class="star-light">
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- About Section -->
    <section>
        <div class="container"><?php }
}
