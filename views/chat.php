

<?php

   include('bd/connexionDB.php');
   include './config/tchatAjax.php';

if(!isset($_SESSION['username'])){
   return   header('Location: index.php?page=connexion');
}

   ?>



<article class='main-article-chat article'>
         <div class="container" > 
              <h1>Bonjour <?php echo $_SESSION['username']?> </h1>
               <div id="tchat">  </div>
          </div>
             <div id="tchatForm">
                <form action="" method='post'>
                   <label for="message">message </label> <textarea name="content" id="sendMessage" class="form-control form-control-chat-message"></textarea>
                   <input type="hidden" id="userName" value=<?php echo $_SESSION['username']?> name="pseudo" />
                   <input type="submit" id='tr'name='submit' class="btn btn-dark btnSub" value='envoyer'/>
                   
                 </form>
             </div>

     </article>  
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
<script src="../assets/app.min.js"></script>
<script src="../assets/ajax.min.js"></script>