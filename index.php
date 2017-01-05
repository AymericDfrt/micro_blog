<?php
include('includes/connexion.inc.php');
include('includes/haut.inc.php');
$message = "";
$action = "Envoyer";
$id = 0;      
$messages_par_page = 5;
$nb_de_pages = 0;
$page_num = 1;

if(isset($_GET['p'])){
    $page_num = $_GET['p'];
}
                if($connect){
                    if (isset($_GET['id']) && !empty($_GET['id'])) {
                        $id = $_GET['id'];
                        $query = "SELECT * FROM messages WHERE id='" .$_GET['id']. "'";
                        $stmt = $pdo->query($query);
                          if ($data = $stmt->fetch()) {
                             $message =  $data['texte'];
                             $action = "Modifier";
                         }else{
                            header("Location: index.php");
                         }
                     }else{
                        echo "<input type='hidden' name='idmess' value='0'>";
                     }
                }
?>

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

    $query = "SELECT count(*) FROM messages";
    $prep = $pdo->prepare($query);
    $prep->execute();
    $data = $prep->fetch();
    $nb_de_pages = ceil ($data['count(*)'] / $messages_par_page);


    $indexP = ($messages_par_page * $page_num) - $messages_par_page;
    $limit_mess = $indexP + $messages_par_page;

    $query = "SELECT * FROM messages LIMIT ?,?";
    $prep = $pdo->prepare($query);
    $prep->bindValue(1, $indexP, PDO::PARAM_INT);
    $prep->bindValue(2, $limit_mess, PDO::PARAM_INT);
    $prep->execute();

    while ($data = $prep->fetch()) {
    ?>
        <blockquote>
            <?= $data['texte'] ?><br>
            <?php  
                if ($connect) {
            ?>
            <?php echo "<a href='index.php?id=" .$data['id']. "'><button type='button' class='btn btn-warning'>Modifier</button></a>" ?>
            <?php echo "<a href='message_sup.php?id=" .$data['id']. "'><button type='button' class='btn btn-danger'>Supprimer</button></a><br>";
                }
             ?>
            <?php echo "<u>créé le :</u> " . date("d-m-Y à H:i:s", $data['dateCreation']) . "<br>" ?>
            <?php 
             if($data['dateModification'] != 0){
                echo "<u>Modifié le :</u> " . date("d-m-Y à H:i:s", $data['dateModification']);
             }

             ?>
 
        </blockquote>
    <?php } 
    ?>
    
 

<?php include('includes/bas.inc.php'); ?>