<?php



/* Si le formulaire est envoyé alors on fait les traitements */



//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\OAuth;



if (isset($_POST['submit_contact']))
{
//Load Composer's autoloader
require 'vendor/autoload.php';

//Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);


    /* Récupération des valeurs des champs du formulaire */
  
      $contact_name	= htmlspecialchars($_POST['contact_name']) ;
      $contact_first_name = htmlspecialchars($_POST['contact_first_name']) ;
      $expediteur = htmlspecialchars($_POST['contact_email']) ;
      $sujet = htmlspecialchars($_POST['contact_subject']) ;
      $contact_message = htmlspecialchars( $_POST['contact_message']);
      


// Connexion serveur 

$mail_host = $_ENV['MAIL_HOST'];
$mail_username = $_ENV['MAIL_USERNAME'];
$mail_password = $_ENV['MAIL_PASSWORD'];
$mail_port = $_ENV['MAIL_PORT'];


try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = $mail_host;                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = $mail_username;                     //SMTP username
    $mail->Password   = $mail_password;                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = $mail_port;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom($mail_username, 'mailer');
    $mail->addAddress($mail_username, 'Admin');     //Add a recipient
 


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject =   $sujet;
    $mail->Body    = 'Message from'. '  ' . $contact_first_name . " " . $contact_name . nl2br(":\n  $contact_message ");

    $mail->send();
    // echo 'Message has been sent';
    //peut être faire une page pour dire que le mail a bien été envoyé
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}




}














/* Si le formulaire est envoyé alors on fait les traitements */
// if (isset($_POST['submit_contact']))
// {
//     /* Récupération des valeurs des champs du formulaire */
  
//       $contact_name	= trim(htmlspecialchars($_POST['contact_name']) );
//       $contact_first_name = trim(htmlspecialchars($_POST['contact_first_name']) );
//       $expediteur = trim(htmlspecialchars($_POST['contact_email']) );
//       $sujet = trim(htmlspecialchars($_POST['contact_subject']) );
//       $contact_message = trim(htmlspecialchars( $_POST['contact_message']));
    
 
//     /* Expression régulière permettant de vérifier si le 
//     * format d'une adresse e-mail est correct */
    // $regex_mail = '/^[-+.\w]{1,64}@[-.\w]{1,64}\.[-.\w]{2,6}$/i';
 
//     /* Expression régulière permettant de vérifier qu'aucun 
//     * en-tête n'est inséré dans nos champs */
//     $regex_head = '/[\n\r]/';
 
//     /* Si le formulaire n'est pas posté de notre site on renvoie 
//     * vers la page d'accueil */
//     // if($_SERVER['HTTP_REFERER'] != 'http://www.monsite.com/send_email.php')
//     // {
//     //   header('Location: http://www.monsite.com/');
//     // }A AJOUTER APRES HEBERGEMENT
    /* On vérifie que tous les champs sont remplis */
//     if (empty($contact_name) 
//            || empty($contact_first_name) 
//            || empty($expediteur) 
//            || empty($sujet) 
//            || empty($contact_message))
//     {
//       $alert = 'Tous les champs doivent être renseignés';
//     }
//     /* On vérifie que le format de l'e-mail est correct */
//     elseif (!preg_match($regex_mail, $expediteur))
//     {
//       $alert = 'L\'adresse '.$expediteur.' n\'est pas valide';
//     }
//     /* On vérifie qu'il n'y a aucun header dans les champs */
//     elseif (preg_match($regex_head, $expediteur) 
//             || preg_match($regex_head, $contact_name) 
//             || preg_match($regex_head, $contact_first_name) 
//             || preg_match($regex_head, $contact_message) 
//             || preg_match($regex_head, $sujet)
//             )
//     {
//         $alert = 'En-têtes interdites dans les champs du formulaire';
//     }
//     /* Si aucun problème et aucun cookie créé, on construit le message et on envoie l'e-mail */
//     else if (!isset($_COOKIE['submit_contact']))
//     {
//         /* Destinataire (votre adresse e-mail) */
//         $to = $_ENV['MAIL_USERNAME'];
 
//         /* Construction du message */
//         $msg  = 'Bonjour,'."\r\n\r\n";
//         $msg .= 'Ce mail a été envoyé depuis covid@rt.com par '.$contact_name.' '.$contact_first_name."\r\n\r\n";
//         $msg .= 'Voici le message qui vous est adressé :'."\r\n";
//         $msg .= '***************************'."\r\n";
//         $msg .= $contact_message."\r\n";
//         $msg .= '***************************'."\r\n";
 
//         /* En-têtes de l'e-mail */
//         $headers = 'From: '.$contact_name.' '. $contact_first_name.' <'.$expediteur.'>'."\r\n\r\n";

//         mail($to, $sujet, $msg, $headers);
 
//         /* Envoi de l'e-mail */
//         if (mail($to, $sujet, $msg, $headers))
//         {
//             $alert = 'E-mail envoyé avec succès';
 
//             /* On créé un cookie de courte durée (ici 120 secondes) pour éviter de 
//             * renvoyer un mail en rafraichissant la page */
//             setcookie("sent", "1", time() + 120);
 
//             /* On détruit la variable $_POST */
//             unset($_POST);
//         }
//         else
//         {
//             $alert = 'Erreur d\'envoi de l\'e-mail';
//         }
 
//     }
//     /* Cas où le cookie est créé et que la page est rafraichie, on détruit la variable $_POST */
//     else
//     {
//         unset($_POST);
//     }
// }
?>


