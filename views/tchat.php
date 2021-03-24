<?php
   session_start();
 
   include('bd/connexionDB.php');
 
   $see_tchat = $db->query("SELECT t.*, u.pseudo 
      FROM tchat t
      LEFT JOIN user u ON u.id = t.id_pseudo
      ORDER BY date_message
      LIMIT 100");
 
   $see_tchat = $see_tchat->fetchAll();
?>


<div class="container" style="height:100vh; margin-top:30vh">      
         <div class="row"><div class="col-xs-12 col-sm-12 col-md-12"><div style="background: white; border-radius: 10px; box-shadow: 0 0 15px rgba(0, 0, 0, 0.1); padding: 10px">
 
                  <div style="font-size: 24px; font-weight: bold">Tchat</div>
 
                  <div id="msg" style="border: 1px solid #cccccc; padding: 10px 0; border-radius: 5px;overflow: scroll;height: 400px;margin: 10px 0; background: white"><?php   
 
                        foreach($see_tchat as $st){    
 
                           $date_message = date_create($st['date_message']);
                           $date_message = date_format($date_message, 'd M Y à H:i:s');
 
                           if(isset($_SESSION['id']) && $st['id_pseudo'] == $_SESSION['id']){
                        ?><div style="float: right;width: auto; max-width: 80%; margin-right: 26px;position: relative;padding: 7px 20px;color: #fff;background: #0B93F6;border-radius: 5px;margin-bottom: 15px; clear: both">
 
                              <span id="<?= $st['id'] ?>"><?= nl2br($st['message']) ?></span>
 
                              <div style="font-size: 10px; text-align: right; margin-top: 10px">Par <?= $st['pseudo'] ?>, le <?= $date_message ?></div></div><?php
                           }else{
                        ?><div style="position: relative;padding: 7px 20px;background: #E5E5EA;border-radius: 5px;color: #000;float: left;width: auto; max-width: 80%; margin-left: 10px;margin-bottom: 15px; clear: both">
 
                              <span id="<?= $st['id'] ?>"><?= nl2br($st['message']) ?></span>
 
                              <div style="font-size: 10px; text-align: right; margin-top: 10px">Par <?= $st['pseudo'] ?>, le <?= $date_message ?></div></div><?php
                           }
                        }   
                     ?><div id="message_recept"></div>                  
                  </div>
                  <?php if(isset($_SESSION['id'])){   
                  ?><div style="border: 1px solid #cccccc; border-radius: 5px; position: relative; padding-top: 5px; background: white"><form method="post">
 
                              <textarea class="autoExpand" rows="1" data-min-rows="1" name="texte" id="message" class="msg" placeholder="Envoyer votre message" style="border: none;overflow: none; resize: none; width: 90%; outline: none; padding: 0 5px"></textarea>
 
                              <div style="position: absolute;top: -5px;right: 2px;font-size: 28px;"><input id="envoi" type="submit" class="fa fa-arrow-circle-up" value="" style="border: none; background: transparent; outline: none"/></div>      
                          </form>   
                       </div><?php
                      }       
                   ?></div></div></div></div>
 
 
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script><script src="https://code.jquery.com/jquery-1.12.4.js"></script><script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script><script src="js/bootstrap.min.js"></script><script type="text/javascript">         
         var isopen = false;
 
         function openNav(x) {
 
            if(!isopen){
               isopen = !isopen;
               document.getElementById("myNav").style.height = "100%";
               x.classList.toggle("change");
            }else{
               isopen = !isopen;
               document.getElementById("myNav").style.height = "0%";
               x.classList.toggle("change");
            }
 
}

document.getElementById('msg').scrollTop = document.getElementById('msg').scrollHeight;      

$('#envoi').click(function(e){
   e.preventDefault();

   var message = encodeURIComponent($('#message').val());

   message = message.trim();

   $('#message').val(null);

   if(message != ""){
       $.ajax({
          url : 'config/send_mess.php?message=' + message,
         type : 'GET',
         dataType : "html",
         success : function(data){
              $("#message_recept").append(data);
         }
       });
    }
         });
 
         setInterval(load_mess, 1000);
 
           function load_mess(){  
 
              var lastID = $('#msg span:last').attr('id');
 
              if(lastID > 0){          
               $.ajax({
                  url : 'config/load_mess.php?id=' + lastID,
                  type : 'GET',
                  dataType : "html",
                  success : function(data){
                     $("#message_recept").append(data);
                  },
                  error : function(){
                     //alert("Oops une erreur est survenue lors du chargement du message !");
                  }
               });
            }
         };

         $(document).one('focus.autoExpand', 'textarea.autoExpand', function(){
             var savedValue = this.value;
             this.value = '';
             this.baseScrollHeight = this.scrollHeight;
             this.value = savedValue;
 
         }).on('input.autoExpand', 'textarea.autoExpand', function(){
             var minRows = this.getAttribute('data-min-rows')|0, rows;
             this.rows = minRows;
             rows = Math.ceil((this.scrollHeight - this.baseScrollHeight) / 20);
             this.rows = minRows + rows;
         });
      </script>