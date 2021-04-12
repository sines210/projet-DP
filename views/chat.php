

<?php

   include('bd/connexionDB.php');


   $see_tchat = $db->query("SELECT user.pseudo , content, tchat_content.id  
   FROM tchat_content
   LEFT JOIN user ON tchat_content.id = user.tchat_content_id
   ORDER BY tchat_content.id ASC
   LIMIT 100");

$see_tchat = $see_tchat->fetchAll();
   


   ?>



<article class='main-article-chat'>
         <div class="container" > 
              <!-- <h1>Bonjour <?php echo $_SESSION['pseudo']?> </h1> -->
               <div id="tchat">  </div>
          </div>
             <div id="tchatForm">
                <form action="" method='post'>
                   <label for="message">message </label> <textarea name="content" class="form-control form-control-chat-message"></textarea>
                   <input type="submit" id='tr'name='submit' class="btn btn-dark btnSub" value='envoyer'/>
                 </form>
             </div>

     </article>  
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
<script src="../assets/app.js"></script>
<script src="../assets/ajax.js"></script>