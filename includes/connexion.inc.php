<?php
$pdo = new PDO('mysql:host=localhost;dbname=micro_blog', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 $connect=false;

/**L'utilisateur est-il déjà connecté ?**/
if(isset($_COOKIE['sid'])){
  $cook=$_COOKIE['sid'];
  //Le SID enregisré coté client correspond t-il à un utilisateur dans la base ?
  $query = "Select * from utilisateurs where sid=?";
  $prep = $pdo->prepare($query);
  $prep->bindValue(1, $cook);
  $prep->execute();
  //Si oui
  if($data=$prep->fetch()){
    $connect=true;
  }
}
?>