<?php
session_start();

require('header.php');

$bdd=mysqli_connect('localhost','root','root','livreor');
mysqli_set_charset($bdd,'utf8');

$errorLog = "";

if(isset($_POST["submit"]))
{
    if(!empty($_POST["login"]) && !empty($_POST["password"]))
    {
        $login = $_POST["login"];
        $password = $_POST["password"];
       
       
        $verifyLogin=mysqli_query($bdd, "SELECT * FROM utilisateurs WHERE login='$login'");
        // le select all me permet de recup toute les infos  y compris le password qui va me servir pour decrypter le hash
        //et le where à comparer le login de post et les logins ds ma bdd
         $userExist = mysqli_fetch_assoc($verifyLogin);

        echo "<pre>";
        // var_dump($userExist);
        echo "</pre>";
               
        $recupMdp = $userExist["password"];
        //je dois recuperer le mot de passe crypté en bdd et le decripter tel qu'il a été saisi lors de l'inscription par le user
           
        if(password_verify($password,$recupMdp))
        {
           
            $_SESSION['user'] = $userExist ;
            // var_dump($_SESSION);
            header('location: index.php');
                
        }
        else
        {
            $errorLog = "<p class='error'>Le login ou le mot de passe est incorrect.</p>";
        }
        
        
    }   
    else
    {
        $errorLog = "<p class='error'>tous les champs doivent être remplis.</p>";
    }
}
?> 
<main class="l-main-form">

    <div class="form">
        <h1 class="form-titre">LOG-IN</h1>
        
         
        <div class="form-section">
        <form  action="connexion.php" method="post">
        <input class="form-input" type="text" name="login" placeholder="Votre login">   
        <input class="form-input" type="password" name="password" placeholder="Votre password">
        <?php echo $errorLog ?>
          
        <input class="form-butt" type="submit" name="submit" value="SUBMIT" >
        <div class="message-index">
        <p class="message-inscription">Vous n'êtes pas inscris?</br> <a class="lien-inscription" href = "inscription.php">Inscrivez-vous ici.</a></p>
        </div>   
        </div>
       
        </form>
    </div>    
</main> 
    <?php
    
    require('footer.php');
    ?>
