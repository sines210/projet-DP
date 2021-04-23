
<?php session_start()?>


<!Doctype HTML>
<html lang="fr">
<head>
    <meta charset="utf-8">

    <meta name="description" content="Covid-@rt - Partage de photos, idées...">
    <meta name="robots" content="nofollow" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta http-equiv="Content-Security-Policy" content="default-src 'self';">


    <title>Covid-@rt</title>
    
   
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./assets/css/style.min.css"> 




</head>


<body>
    <main>
    <?php require "./components/navbar.php";?>

<?php require "router.php";?>
<?php require "./components/footer.php";?>





