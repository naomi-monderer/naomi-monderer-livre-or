<?php
// sur la page profil j'affiche en texte mon login actuel, 
// j'affiche mes 3 champs 
// je fais une première requete si jamais je veux changer mon login, je dois qd meme retaper les mdp ( dans ma requete jenvoie les champs nouveau login et password)
// une deuxième requête si jamais je veux changer uniquement les mdp. ( dans ma deuxième requete je dois envoyer le password)
session_start();
require('header.php');
$errorlog='';

$bdd = mysqli_connect('localhost', 'root', 'root', 'livreor');
mysqli_set_charset($bdd, 'utf8');

$idUser = $_SESSION['user']['id'];
$req = mysqli_query($bdd, "SELECT * FROM utilisateurs WHERE id = '$idUser'");
$infoUsers = mysqli_fetch_assoc($req);

// echo "<pre>";
// var_dump($infoUsers);
// echo "</pre>";

if (isset($_POST['submit']))
{
    echo 'yes';
    $login = $_POST['login'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $confirmPassword = $_POST['confirmPassword'];
    // $password1 = $_POST['password'];
    // $password2 = $_POST['confirmPassword'];

    $req = "SELECT * FROM utilisateurs WHERE login = '$login'";
    $verifyLogin= mysqli_query($bdd, $req);
    $resultVerifyLogin = mysqli_fetch_all($verifyLogin);
    

    // var_dump($resultVerifyLogin);
  

    if(count($resultVerifyLogin) == 0 )

    {   
        
        if(!empty($_POST['password']) && !empty($_POST['confirmPassword']))
        {
            $password = ($_POST['password']);
            $confirmPassword = $_POST['confirmPassword'];

            if ($password == $confirmPassword) 
            {
                echo 'yes3';
                $login =  $_POST['login'];
                $passwordHash = password_hash($password,PASSWORD_BCRYPT);
                
                $req= mysqli_query($bdd, "UPDATE utilisateurs SET login='$login', password='$passwordHash' WHERE id='$idUser'");
                session_destroy();
                header('location: connexion.php');
                
            }
            else
            {
                $errorlog = "<p class='error'>Les mots de passent doivent être identiques.</p>";
            }
        }
        else
        {
            $errorlog = "<p class='error'>veuillez remplir tous les champs.</p>";
        }
    }
    else
    {
        $errorlog = "<p class='error'>Ce login est déjà utilisé.</p>";
    }

}    
?>
<main class="l-main-profil">
    <div class="form-profil">
        <h1 class="form-titre">MODIFIER  VOTRE PROFIL</h1>
            <div class=" form-section">
                <form action="" method="post">
                    <!-- <label for="login">Login:</label><br/> -->
                    <input class="form-input-profil" type="text" name="login" placeholder=" Your Login" value=<?php echo " ". $infoUsers['login'];?>>

                    <!-- <label for="password">Password:</label></br> -->
                    <input class="form-input-profil" type="password" name="password" placeholder=" Your Password">

                    <!-- <label for="confirmPassword">Confirm your password:</label></br> -->
                    <input class="form-input-profil" type="password" name="confirmPassword" placeholder=" Confirm Your Password" ><br/>
                    <?php echo $errorlog ?>

                    <input class="form-butt" type="submit" name="submit" value="submit">
                </form>
            </div>    
        </div>    
    </div>    
</main>
<?php
require('footer.php');
?>