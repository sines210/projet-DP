<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

session_start();

   include ('../bd/connexionDB.php');

//    $see_tchat = $db->query("SELECT user.pseudo , tchat_messages, tchat_content.id  
//    FROM tchat_content
//    LEFT JOIN user ON tchat_content.id = user.tchat_content_id
//    ORDER BY tchat_content.id ASC
//    LIMIT 100");

// $see_tchat = $see_tchat->fetchAll();

//d va représenter les data que je fetch en ajax
$d = [];

if(!isset($_SESSION['pseudo'])|| empty($_SESSION['pseudo']) || !isset($_POST["action"])){
    $d["erreur"]="vous devez être conncecté pour chatter";
}
else{
    // ajoute les messages
    if($_POST['action'] == "addMessage"){
        $content = htmlspecialchars($_POST['content']);
         $pseudo = $_SESSION['pseudo'];
        $sql= 'INSERT INTO tchat_content (content) VALUES (:content)';
        $newMessage = $db->prepare($sql);
        $newMessage->bindValue(":content", $content, PDO::PARAM_STR);
        $newMessage->execute();

        $sql= 'INSERT INTO user (pseudo) VALUES (:pseudo)';
        $newPseudo = $db->prepare($sql);
        $newPseudo->bindValue(":pseudo", $pseudo, PDO::PARAM_STR);
        $newPseudo->execute();
        
        $d["erreur"] = 'ok';
    }



    //affiche les derniers messages
    if($_POST['action'] == "getMessage" ){
       
        $sql = "SELECT pseudo , content FROM tchat_content LEFT JOIN user ON tchat_content.id = user.tchat_content_id 
         WHERE pseudo = :pseudo AND content = :content  ORDER BY tchat_content.id ASC" ;
        $getMessage = $db->prepare($sql);
        $getMessage->bindValue(":pseudo", "pseudo", PDO::PARAM_STR);
        $getMessage->bindValue(":content", "content", PDO::PARAM_STR);
        $getMessage->execute();
        
        //au lieu de fetchAll tte la table je récupère les data ligne par ligne et je les ajoute en bouclant 
        while($data = $getMessage->fetch(PDO::FETCH_ASSOC)){
        $d['result'] .= "<br><span class='pseudo'><strong>".$data['pseudo']."</strong> : </span>" . "<span class='content'>". htmlentities($data["content"])."</span>"; }    
        $d["erreur"] = 'ok';
    }
}

echo json_encode($d);

?>