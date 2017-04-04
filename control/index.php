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

 

if($connect){
$query = "Select pseudo from utilisateurs where sid='" .$cook. "'";
$stmt = $pdo->query($query);
if($data = $stmt->fetch()) $pseudo = $data['pseudo'];
}

$recherche =""; 
if (isset($_GET['recherche'])) {
  $recherche = $_GET['recherche'];
  $rechercheParam = '%'.$recherche.'%';
  
   //Calcul du nombre de pages
  //Nombre total de message
  $query = "SELECT count(*) AS nbrmessages FROM messages AS mess WHERE mess.texte LIKE ?";
  $prep = $pdo->prepare($query);
  $prep->bindValue(1,$rechercheParam);
  $prep->execute();
  $data = $prep->fetch();

}else{
    $rechercheParam = '%'.$recherche.'%';
  
   //Calcul du nombre de pages
  //Nombre total de message
  $query = "SELECT count(*) AS nbrmessages FROM messages";
  $prep = $pdo->prepare($query);
  $prep->execute();
  $data = $prep->fetch();

  
}

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

   $query = "SELECT *, mess.id AS mess_id FROM messages AS mess INNER JOIN utilisateurs AS users ON mess.utilisateur_id = users.id WHERE mess.texte LIKE ? ORDER BY dateCreation DESC LIMIT ?,?";
    $messages = $pdo->prepare($query);
    $messages->bindValue(1, $rechercheParam);
    $messages->bindValue(2, $indexLimit, PDO::PARAM_INT);
    $messages->bindValue(3, $messages_par_page, PDO::PARAM_INT);

    $messages->execute();
    $messages_tab = array();

foreach ($messages as $mess) {

//Hashtag
if(preg_match_all("/#([A-Za-z0-9]+)/", $mess['texte'], $matchs, PREG_SET_ORDER)){
  foreach ($matchs as $value) {
     $hashtag = "<a href='?recherche=".$value[1]."'>".$value[0]."</a>";
    $mess['texte'] = preg_replace("/".$value[0]."/", $hashtag, $mess['texte']);
  }
}

//mail
if(preg_match_all("/[a-z0-9\-\.]+@[a-z0-9\-\.]+\.[a-z]+/", $mess['texte'], $matchs, PREG_SET_ORDER)){
     $mail = "<a href='mailto:".$matchs[0][0]."'>".$matchs[0][0]."</a>";
    $mess['texte'] = preg_replace("/".$matchs[0][0]."/", $mail, $mess['texte']);
}

//Url
if(preg_match_all("/(?:http|https):\/\/((?:[\w-]+)(?:\.[\w-]+)+)(?:[\w.,@?^=%&amp;:\/~+#-]*[\w@?^=%&amp;\/~+#-])?/", $mess['texte'], $matchs, PREG_SET_ORDER)){
     $url = "<a href='".$matchs[0][0]."'>".$matchs[0][0]."</a>";
     $mess['texte'] = preg_replace("`".$matchs[0][0]."`", $url, $mess['texte']);
}

  array_push($messages_tab, array(
    'mess_id' => $mess['mess_id'],
    'texte' => $mess['texte'],
    'pseudo' => $mess['pseudo'],
    'dateCreation' => $mess['dateCreation'], 
    'dateModification' => $mess['dateModification']
    ));
}

$smarty->assign('recherche', $recherche);
$smarty->assign('action_btn', $action);
$smarty->assign('id_mess', $id);
$smarty->assign('message', $message);
$smarty->assign('messages', $messages_tab);
$smarty->assign('nb_de_pages_article', $nb_de_pages);
$smarty->assign('num_page', $page_num);
$smarty->assign('pseudo', $pseudo);

$smarty->display('index.tpl');
?>