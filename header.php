<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="layout.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title><?= $title ?? 'mon site'?></title>
</head>
<body>
<?php    
// if(isset($_SESSION['user']))
// {


    echo '<a href = "index.php">Accueil </a>';

    echo "<a href = 'livre-or.php'>Livre d'or </a>";
    
    echo '<a href = "commentaire.php">Commentaires </a>';

    echo '<a href = "profil.php">Votre Profil </a>';

    echo '<a href = "connexion.php">Connexion </a>';

    echo '<a href = "inscription.php">Inscription </a>';

    echo '<a href = "admin.php">Admin </a>';


    echo '<form action="deconnexion.php" method="post">
        <button class="boutton-deco" type="submit" name="deconnecter" value="deco">deco
        </button></form>';

  
// }


?>
    
