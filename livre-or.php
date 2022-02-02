<?php
session_start();
require('header.php');
$title = 'Livre d\'or';
$bdd=mysqli_connect('localhost','root','root','livreor');
mysqli_set_charset($bdd,'utf8');
?>

<?php
$compteur=0;




    $requete = 
    "SELECT u.id, u.login,c.commentaire,c.date
    FROM `commentaires` AS c 	
    INNER JOIN `utilisateurs` AS u
    ON u.id = c.id_utilisateurs
    ORDER BY c.date DESC";
    
    $var = mysqli_query($bdd,$requete);
    $lignesTab = mysqli_fetch_all($var,MYSQLI_ASSOC);

      // echo '<pre>';
      // var_dump($lignesTab);
      // echo '</pre>';
?>
<main>
<div class="box-livre-or">
<?php            

  for($compteur=0;isset($lignesTab[$compteur]);$compteur++)
    {
      echo 
            "<div class='content-livre-or'>
                  
                        <div class ='echo-livre-or'>
                              </br><p class='login-com'>" . $lignesTab[$compteur]['login'] . "</p><p class='com'> " . $lignesTab[$compteur]['commentaire'] . "</p>";
                  echo "      <p class='post-com'><b>Posté le :</b></p><p class='date-com'><i>". $lignesTab[$compteur]['date'] . "</i></p></br>
                        </div>
                  
            </div>";
      }
?>
</div>
</main>
<?php
require('footer.php');
?>
