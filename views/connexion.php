
<?php require './config/auth.php';
$error= null;
?>


<article class="connexion article">

  <form method="post">
   <div class="mb-3">
     <label for="pseudo" class="form-label">Votre pseudo</label>
      <input type="text" class="form-control" autocomplete='off' name='login' id="pseudoConnexion" >
   </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
    <div class="erreur btn-alert"><?php echo $error?></div>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</article>
<script src="/assets/mainApp.min.js"></script>