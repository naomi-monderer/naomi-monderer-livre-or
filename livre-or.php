<?php
session_start();
require('header.php');

$bdd=mysqli_connect('localhost','root','root','livreor');
mysqli_set_charset($bdd,'utf8');
?>


<?php
// echo "<div class = 'container'>
// <h1> LIVRE D'OR </h1>
// </div>";
$login= $_SESSION['user']['login'];
$compteur=0;

    $requete = mysqli_query($bdd,
    "SELECT u.id, u.login,c.commentaire,c.date
    FROM `commentaires` AS c 	
    INNER JOIN `utilisateurs` AS u
    ON u.id = c.id_utilisateurs
    
    ORDER BY c.date DESC");
    $lignesTab = mysqli_fetch_all($requete,MYSQLI_ASSOC);
    echo '<pre>';
    var_dump($lignesTab);
    echo '</pre>';

    for($compteur=0;isset($lignesTab[$compteur]);$compteur++)
    {
      echo 
            "</br>" . $lignesTab[$compteur]['login'] . ":" . $lignesTab[$compteur]['commentaire'];
      echo "<p>Posté le:</p>". $lignesTab[$compteur]['date'] . "</br>";
      
    }

   
  
   


?>


