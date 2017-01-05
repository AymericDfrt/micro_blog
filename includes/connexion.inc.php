<?php
$pdo = new PDO('mysql:host=localhost;dbname=micro_blog', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 $connect=false;

  if(isset($_COOKIE['sid']))
  {

    $cook=$_COOKIE['sid'];
    //var_dump($cook);
    $query = "Select * from utilisateurs where sid=?";
    $prep = $pdo->prepare($query);
    $prep->bindValue(1, $cook);
    $prep->execute();

    if($data=$prep->fetch()){
      $connect=true;
    }
  }
?>