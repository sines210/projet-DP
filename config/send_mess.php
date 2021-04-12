<?php
   session_start();
 
   include ('../bd/connexionDB.php');

 
   // $DB = new connexionDB();
 
   if(isset($_SESSION['pseudo'])){ 

 
      $mess = htmlspecialchars(trim($_GET['message']));
 
      if(isset($mess) && !empty($mess)){
 
         $verif_user = $db->query("SELECT id FROM user WHERE id = ?",
            array($_SESSION['pseudo']));
 
         $verif_user = $verif_user->fetch();
 
         if(isset($verif_user['pseudo'])){
 
            $date_message = date('Y-m-d H:i:s');
            // $db->insert("INSERT INTO tchat (id_pseudo, message, date_message) VALUES (?, ?, ?)",
            // array($_SESSION['pseudo'], $mess, $date_message));
            $sql = 'INSERT INTO tchat (id_pseudo, message, date_message) VALUES (:pseudo, :message, :date_message)';
            $newUser = $db->prepare($sql);
            $newUser->bindValue(":pseudo", $log, PDO::PARAM_STR);
            $newUser->bindValue(":message", $password, PDO::PARAM_STR);
            $newUser->bindValue(":date_message", $date_message);
            $response = $newUser->execute();
            

         $lastID = $db->query("SELECT id FROM tchat WHERE id_pseudo = ? ORDER BY date_message DESC LIMIT 1", 
            array($_SESSION['id']));

         $lastID = $lastID->fetch();

         $date_message = date_create($date_message);
         $date_message = date_format($date_message, 'd M Y à H:i:s');

         ?><div style="float: right;width: auto; max-width: 80%; margin-right: 26px;position: relative;padding: 7px 20px;color: #fff;background: #0B93F6;border-radius: 5px;margin-bottom: 15px; clear: both"><span id="<?= $lastID['id'] ?>"><?= nl2br($mess) ?></span>               
               <div style="font-size: 10px; text-align: right; margin-top: 10px">Par <?= $_SESSION['pseudo'] ?>, le <?= $date_message ?></div></div>

            <script>document.getElementById('msg').scrollTop = document.getElementById('msg').scrollHeight;
            </script><?php

      }
   }      
}
?>