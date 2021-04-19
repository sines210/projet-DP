<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

include '../bd/connexionDB.php';



$d = [];
// $pseudo = $_SESSION['username'];
// var_dump($pseudo); die; 


// if(!isset($_SESSION['username'])|| empty($_SESSION['username']) || !isset($_POST["action"])){
//     $d["erreur"]="vous devez être conncecté pour chatter";
// }
// else{
    // ajoute les messages
   

    if($_POST['action'] == "addMessage"){
        try{


            $content = htmlspecialchars($_POST['content']);
            $userName = htmlentities($_POST['pseudo']);

           $sql= 'INSERT INTO tchat_content (content, username) VALUES (:content, :username)';
           $newMessage = $db->prepare($sql);
           $newMessage->bindValue(":content", $content, PDO::PARAM_STR);
           $newMessage->bindValue(":username", $userName, PDO::PARAM_STR);
           $newMessage->execute();
           
           $d["erreur"] = 'ok';
        }
        catch (PDOException $e) {
            echo $e->getMessage();
        }
      
    }



    //affiche les derniers messages
    if($_POST['action'] == "getMessages" ){

        $sql = "SELECT username, content, date_message FROM tchat_content ORDER BY id ASC" ;
        $getMessage = $db->prepare($sql);
        $getMessage->execute();

        // au lieu de fetchAll tte la table je récupère les data ligne par ligne et je les ajoute en bouclant 
        while( $data = $getMessage->fetch(PDO::FETCH_ASSOC)){
       $d['result'] .= "<div class = messageBox><div class='user'><strong>" . $data['username'] . " </strong>, le <span class='date'>" . htmlentities($data["date_message"]) . "</span></div>" . "<div class='mess'><strong>" . nl2br(htmlentities($data['content'])) . "</strong></div></div>"; 
        $d["erreur"] = 'ok';
    }
    }
echo json_encode($d);

?>