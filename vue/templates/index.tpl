{include file='includes/haut.inc.tpl'}

<!--Formulaire d'ajout ou de modification de messages-->
<!--/!\ Affichage pour les utilisateurs connectés ($connect)-->

<script type="text/javascript">
{literal}
$(document).ready(function(){
  $("#message").keyup(function(event){
    var message =  $("#message").val();
        $.ajax({
        method: "POST",
        url: "script/message_preview.php",
        data: {message: message},
        dataType: 'text',
        success: function(data){
        $("#prevu").html(data);
      }
    });
  });
});
$(document).on("click",".like", function(){
          var idmess = $(this).attr('data-mess_id');
          console.log(idmess);
          /*
        $.ajax({
            method: "GET",
            url: "../web_services/index.php?callback=secure&action=remove",
            data: {id: idT},
            success: function(data){
            $(idtab).remove();
            $("#notif").css("color", "green");
            $("#notif").text("Tâche supprimé avec succès");
          }
        })*/
  });

{/literal}
</script>
<div class="row">    
{if {$connexion}}        
    <form method="post" action="?p=ajout_message">
        <div class="col-sm-10">  
            <div class="form-group">
                <textarea id="message" name="message" class="form-control" placeholder="message">{$message}</textarea>
               <p id="prevu"></p>
                <input type='hidden' name='idmess' value="{$id_mess}">
            </div>
        </div>
        <div class="col-sm-2">
            <button type="submit" class="btn btn-success btn-lg">{$action_btn}</button>
        </div>                        
    </form>
    {/if}
</div>



<blockquote>
{foreach $messages as $mess}
{$mess.texte} <br>

{if {$connexion}}
<a href="index.php?id={$mess.mess_id}"><button type='button' class='btn btn-warning'>Modifier</button></a>
<a href="index.php?p=supprimer_message&id={$mess.mess_id}"><button type='button' class='btn btn-danger'>Supprimer</button></a><br>

{/if}
<b><u>Envoyé par :</u></b>{$mess.pseudo}<br>
<b><u>créé le :</u></b> {$mess.dateCreation|date_format:"%D à %H:%M:%S"}<br>
 {if $mess.dateModification != 0}
    <b><u>Modifié le :</u></b> {$mess.dateModification|date_format:"%D à %H:%M:%S"}<br>
 {/if}
 <button type='button' class='like' data-mess_id="{$mess.mess_id}"><img src='./img/like.png'></button>
<br><br>
{/foreach}


</blockquote>

    
<!--Navigateur de la pagination-->

{if $recherche == ""}
<ul class="pagination">
<li>
   <a href="?p_article={$num_page -1}" aria-label='Previous'>
   <span aria-hidden="true">&laquo;</span>
  </a>
</li>
{for $i=1 to {$nb_de_pages_article}}
     <li><a href="index.php?p_article={$i}">{$i}</a></li>
{/for}
<li>
  <a href="?p_article={$num_page +1}" aria-label='Next'>
      <span aria-hidden="true">&raquo;</span>
    </a>
</li>
</ul>

{elseif $recherche != ""}
<ul class="pagination">
<li>
   <a href="?p_article={$num_page -1}&recherche={$recherche}" aria-label='Previous'>
   <span aria-hidden="true">&laquo;</span>
  </a>
</li>

{for $i=1 to {$nb_de_pages_article}}
         <li><a href="index.php?p_article={$i}&recherche={$recherche}">{$i}</a></li>
{/for}
<li>
  <a href="?p_article={$num_page +1}&recherche={$recherche}" aria-label='Next'>
      <span aria-hidden="true">&raquo;</span>
    </a>
</li>
</ul>
{/if}



{include file='includes/bas.inc.tpl'}