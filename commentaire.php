
<?php
session_start();
require('header.php');

$bdd=mysqli_connect('localhost','root','root','livreor');
mysqli_set_charset($bdd,'utf8');

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
               
               
              
            }
            else
            {
                $error = 'votre message ne peut pas dépasser 100 caractères';
            }
                
        }
    }
}


// if(isset($_SESSION["user"]))
// {
//     echo '<h1> Bienvenue '. $_SESSION["user"]["login"] . '</h1>';
// }
?>

<main>
   <div class="content-com"> 
        <h2>Laissez une trace de votre passage :</h2>
        <form action="commentaire.php" method="post">
            <textarea class="textArea" name="message" type="text" placeholder="Message" <?php echo $error ?>></textarea></br>
            <?php echo $error ?></br>

            <input class="butt" type="submit" name="submit" value="Envoyer">
        </form>
    </div>
</main>

<?php
require('footer.php');
?>
