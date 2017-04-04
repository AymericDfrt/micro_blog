<?php

if(isset($_POST['message'])){


$message_preview = $_POST['message'];

//Hashtag
if(preg_match_all("/#([A-Za-z0-9]+)/", $message_preview, $matchs, PREG_SET_ORDER)){

  foreach ($matchs as $value) {
     $hashtag = "<a href='?recherche=".$value[1]."'>".$value[0]."</a>";
    $message_preview  = preg_replace("/".$value[0]."/", $hashtag, $message_preview);
  }
}

//mail
if(preg_match_all("/[a-z0-9\-\.]+@[a-z0-9\-\.]+\.[a-z]+/", $message_preview, $matchs, PREG_SET_ORDER)){
     $mail = "<a href='mailto:".$matchs[0][0]."'>".$matchs[0][0]."</a>";
    $message_preview = preg_replace("/".$matchs[0][0]."/", $mail, $message_preview);
}

//Url
if(preg_match_all("/(?:http|https):\/\/((?:[\w-]+)(?:\.[\w-]+)+)(?:[\w.,@?^=%&amp;:\/~+#-]*[\w@?^=%&amp;\/~+#-])?/", $message_preview, $matchs, PREG_SET_ORDER)){
     $url = "<a href='".$matchs[0][0]."'>".$matchs[0][0]."</a>";
     $message_preview = preg_replace("`".$matchs[0][0]."`", $url, $message_preview);
}

echo $message_preview;
}

?>