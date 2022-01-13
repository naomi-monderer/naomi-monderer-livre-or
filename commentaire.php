<!-- Je dois revoir comment faire le inner join entre utilisateurs et commentaires
//comment j'indique id de la table utilisateur est = à id_utilisateurs?-->
<!-- Je dois réussir à envoyer en base de donnée mes commentaires-->
 <!-- je dois enregistrer la date et l'heure ou le commentaire à été posté -->
<?php
session_start();
require('header.php');

$bdd=mysqli_connect('localhost','root','root','livreor');
mysqli_set_charset($bdd,'utf8');

// $requete1 = mysqli_query($bdd,"SELECT * FROM commentaires");
// $result = mysqli_fetch_assoc($requete1);

$error = "";
$idUser = $_SESSION["user"]["id"];

if(isset($_SESSION['user']))
{
  

    if(isset($_POST['submit']))
    {
        
        if(!empty($_POST['message']))
        {
            $message = $_POST['message'];
            if (strlen($message) <= 100)
            {
               
                 
                $query = "INSERT INTO commentaires (commentaire,id_utilisateurs,date) VALUES ('$message','$idUser',NOW())";
                $requete1= mysqli_query($bdd, $query);
                // echo "<pre>";
                // var_dump($query);
                // echo "</pre>";
            }
            else
            {
                $error = 'votre message ne peut pas dépasser 100 caractères';
            }
                
        }
    }
}

if(isset($_SESSION["user"]))
{
    echo 'hello '. $_SESSION["user"]["login"];
}

?>
<form action="commentaire.php" method="post">
  
  
  
    <label for="message">Commentaires:</label></br>
    
    <textarea name="message" type="text" placeholder="Message" <?php echo $error ?>></textarea></br>
    <?php echo $error ?></br>

  

<input type="submit" name="submit" value="Envoyer">
 
</form>
<?php
// echo "<pre>";
// var_dump($_POST);
// echo "</pre>";
// echo "<pre>";
// var_dump($_SESSION);
// echo "</pre>";


require('footer.php');
?>
