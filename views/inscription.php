
<?php require './config/sign_up.php' ?>


<article class="inscription article">

    <form class="login-form" method="POST" >
  
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Adresse e-mail</label>
            <input type="text" class="form-control" autocomplete='off' id="exampleInputEmail1" name="mail">
        </div>
        <div class="mb-3">
            <label for="pseudo" class="form-label">Votre pseudo</label>
           <input type="text" class="form-control" autocomplete='off' name='pseudo' id="pseudoConnexion" >
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
            <input type="password" class="form-control"  name="password" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="checkPassword" class="form-label">Vérifier mot de passe</label>
            <input type="password" class="form-control" name="checkPassword" id="checkPassword">
        </div>   
        <button type="submit" class="btn btn-primary btn-login">Submit</button>
    </form>
</article>


  <script src="/assets/mainApp.min.js"></script>