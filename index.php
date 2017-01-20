<?php
include('includes/connexion.inc.php');
include('includes/haut.inc.php');

//Initialisation de variables
$message = "";
$action = "Envoyer";
$id = 0;      
$messages_par_page = 5;


  //Affichage du message à modifier
  if($connect){
      if (isset($_GET['id']) && !empty($_GET['id'])) {
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
  }
?>

<!--Formulaire d'ajout ou de modification de messages-->
<!--/!\ Affichage pour les utilisateurs connectés ($connect)-->
<div class="row">     
        <?php if($connect){?>         
    <form method="post" action="message.php">
        <div class="col-sm-10">  

            <div class="form-group">
                <textarea id="message" name="message" class="form-control" placeholder="message"><?=$message?></textarea>
                <?= "<input type='hidden' name='idmess' value='" .$id. "'>" ?>
                
            </div>
        </div>
        <div class="col-sm-2">
            <button type="submit" class="btn btn-success btn-lg"><?= $action ?></button>
        </div>                        
    </form>
     <?php } ?>   
</div>

<?php
  /********PAGINATION && MESSAGES*********/
  //Récupération du numero de la page si le paramètre GET existe
  if(isset($_GET['p'])){
      $page_num = $_GET['p'];
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
  $query = "SELECT *, mess.id AS mess_id FROM messages AS mess INNER JOIN utilisateurs AS users ON mess.utilisateur_id = users.id ORDER BY dateCreation DESC LIMIT ?,?";
    $prep = $pdo->prepare($query);
    $prep->bindValue(1, $indexLimit, PDO::PARAM_INT);
    $prep->bindValue(2, $messages_par_page, PDO::PARAM_INT);
    $prep->execute();

  //Affichage des messages tout juste selectionnés 
    while ($data = $prep->fetch()) {
    ?>
        <blockquote>
              <?php  
               echo $data['texte']."<br>";

              if($connect) { //Affichage des boutons aux membres connectés 
                 echo "<a href='index.php?id=" .$data['mess_id']. "'><button type='button' class='btn btn-warning'>Modifier</button></a>";
                 echo "<a href='message_sup.php?id=" .$data['mess_id']. "'><button type='button' class='btn btn-danger'>Supprimer</button></a><br>";
              }

              echo "<b><u>Envoyé par :</u></b> " . $data['pseudo'] . "<br>";
              echo "<b><u>créé le :</u></b> " . date("d-m-Y à H:i:s", $data['dateCreation']) . "<br>";

             if($data['dateModification'] != 0){ //Si le message a été modifié
                echo "<b><u>Modifié le :</u></b> " . date("d-m-Y à H:i:s", $data['dateModification']);
             }
             ?>
        </blockquote>
    <?php } ?>
    
    <!--Navigateur de la pagination-->
    <ul class="pagination">
    <li>
      <?= "<a href='?p=".($page_num-1)."' aria-label='Previous'>" ?>
       <span aria-hidden="true">&laquo;</span>
      </a>
    </li>

    <?php
    //Affichage du nombre de page calculé plus tôt
         for ($i=1; $i <= $nb_de_pages ; $i++) { 
                echo "<li><a href=?p=" .$i.">".$i."</a></li>";
         }
    ?>
    
    <li>
    <?= "<a href='?p=".($page_num+1)."' aria-label='Next'>" ?>
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>


<?php include('includes/bas.inc.php'); ?>