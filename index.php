
<?php session_start();?>


<!Doctype HTML>
<html lang="fr">
<head>
    <meta charset="utf-8">

    <meta name="description" content="Covid-@rt - Partage de photos, idées...">
    <meta name="robots" content="nofollow" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <!-- <meta http-equiv="Content-Security-Policy" content="default-src 'self';"> -->


    <title>Covid-@rt</title>
    
   
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./assets/css/style.min.css"> 

<?php
header('Cache-Control: max-age=31536000');
//mise en cache pour un an
header("X-XSS-Protection:1; mode=block");
//ce header protège des failles XSS des infos envoyées dans les header http via Internet Explorer, Chrome et Safari, le 1 dit que la protection est active et le bloxk que la réponse soit bloquée si une attaque est détectée
header("X-Frame-Options:SAMEORIGIN"); 
// Potège des attaques de type 'clickjacking' 
//X-Frame-Options:SAMEORIGIN - This means that the page can only be embedded in a frame on a page with the same origin as itself. 
header("X-Content-Type-Options:nosniff");
//parade aux attaques MIME
//attaques MIME => MIME sniffing vulnerabilities can occur when a website allows users to upload data to the server. The vulnerability comes into play when an attacker disguises an HTML file as a different file type (e.g. a JPEG, zip file, etc.). ..
// With the nosniff option, if the server says the content is text/html, the browser will render it as text/html.
header("Strict-Transport-Security:max-age=31536000; includeSubdomains; preload");
// header("Referrer-Policy : no-referrer-when-downgrade");
// header("Content-Securiy-Policy:upgrade-insecure-requests");

@ini_set("session.cookie_httponly", true);
@ini_set("session.cookie_secure", true);
// @ini_set("session.use_only_cookies", true);

?>


</head>


<body>
    <main>
    <?php require "./components/navbar.php";?>

<?php require "router.php";?>
<?php require "./components/footer.php";?>





