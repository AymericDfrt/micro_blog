<?php
include_once 'model/connexion_sql.php';

//Bibliothèque lié au moteur de template smarty
require_once('./vendor/smarty/Smarty.class.php');
$smarty = new Smarty();

$smarty->template_dir = './vue/templates/';
$smarty->compile_dir = './vue/templates_c/';
$smarty->config_dir = './configs/';
$smarty->cache_dir = './cache/';

$smarty->assign('connexion', $connect);

if (isset($_GET['p'])){
	$p = $_GET['p'];
}
else{
	$p='home';
}

if($p === 'home'){
	include_once('control/index.php');
	} elseif($p === 'connexion'){
	include_once('control/connexion.php');
	}
	elseif($p === 'inscription'){
	include_once('control/inscription.php');
	}
	elseif($p === 'deconnexion'){
	include_once('control/deconnexion.php');
	}
	elseif($p === 'ajout_message'){
	include_once('control/message.php');
	}
	elseif($p === 'supprimer_message'){
	include_once('control/message_sup.php');
	}
	elseif($p === 'message_preview'){
	include_once('control/message_preview.php');
	}
	else{
		include_once('control/index.php');
	}



?>