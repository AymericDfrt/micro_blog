<?php
$message = "";
$action = "Envoyer";
$id = 0;      
$messages_par_page = 4;
$pseudo= "";

  //Affichage du message à modifier
 // if($connect){
      if (isset($_GET['id']) && !empty($_GET['id']) && $_GET['id']!=0) {
          $id = $_GET['id'];
          $query = "SELECT * FROM messages WHERE id='" .$_GET['id']. "'";
          $stmt = $pdo->query($query);
            if ($data = $stmt->fetch()) { //Si une ligne est trouvée
               $message =  $data['texte'];
               $action = "Modifier";
           }else{
              header("Location: index.php");
           }
       }
  //}

  /********PAGINATION && MESSAGES*********/
  //Récupération du numero de la page si le paramètre GET existe

  if(isset($_GET['p_article'])){
      $page_num = $_GET['p_article'];
  }else{
     $page_num = 1;
  }

  //Calcul du nombre de pages
  //Nombre total de message
  $query = "SELECT count(*) AS nbrmessages FROM messages";
  $prep = $pdo->prepare($query);
  $prep->execute();
  $data = $prep->fetch();

  //nbr_de_pages = arrondi supérieur du nombre total de messages divisé par le nombre max de messages par page
  $nb_de_pages = ceil ($data['nbrmessages'] / $messages_par_page);

  //test unitaire afin de limiter l'accès aux pages accessibles
  	if($page_num < 1) $page_num = 1;
  	if($page_num > $nb_de_pages) $page_num = $nb_de_pages;

  ///Calcul pour trouver l'index du premier message à afficher en fonction du numéro de page
  $indexLimit = ($messages_par_page * $page_num) - $messages_par_page;

  /*Requete SQL
   - Selection de la table messages join avec les utilisateurs correspondant
   - Affichage des messages du plus récent au plus ancien
   - Utilisation de la commande LIMIT prenent en paramètre, l'index calculé plus tôt et le nombre de message max par page 
  */
 

if($connect){
$query = "Select pseudo from utilisateurs where sid='" .$cook. "'";
$stmt = $pdo->query($query);
if($data = $stmt->fetch()) $pseudo = $data['pseudo'];
}

$recherche =""; 
if (isset($_POST['recherche'])) {
  $recherche = $_POST['recherche'];
}
  $rechercheParam = '%'.$recherche.'%';

   $query = "SELECT *, mess.id AS mess_id FROM messages AS mess INNER JOIN utilisateurs AS users ON mess.utilisateur_id = users.id WHERE mess.texte LIKE ? ORDER BY dateCreation DESC LIMIT ?,?";
    $messages = $pdo->prepare($query);
    $messages->bindValue(1, $rechercheParam);
    $messages->bindValue(2, $indexLimit, PDO::PARAM_INT);
    $messages->bindValue(3, $messages_par_page, PDO::PARAM_INT);

    $messages->execute();

$smarty->assign('action_btn', $action);
$smarty->assign('id_mess', $id);
$smarty->assign('message', $message);
$smarty->assign('messages', $messages);
$smarty->assign('nb_de_pages_article', $nb_de_pages);
$smarty->assign('num_page', $page_num);
$smarty->assign('pseudo', $pseudo);

$smarty->display('index.tpl');
?>