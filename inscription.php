<?php
require('header.php');


$bdd=mysqli_connect('localhost','root','root','livreor');
mysqli_set_charset($bdd,'utf8');
$requete= mysqli_query($bdd, "SELECT * FROM utilisateurs");
$errorlog ="";
if(isset($_POST["submit"]))
{
        if(!empty($_POST["login"]) && !empty($_POST["password"]) && !empty($_POST["confirmPassword"]))
        {

            $login=$_POST["login"];
            $password=$_POST["password"];
            $confirmPassword=$_POST["confirmPassword"];
           

            $requete3=mysqli_query($bdd,"SELECT login FROM utilisateurs WHERE login='$login'");
            $result3=mysqli_fetch_all($requete3);
                             
            if($password==$confirmPassword)
            {
                $passwordCrypted = password_hash($password,PASSWORD_BCRYPT);
                    if(count($result3)==0)
                        {
                            $requete2 = mysqli_query($bdd ,"INSERT INTO utilisateurs (login,password) Values ('$login','$passwordCrypted')");
                            header('location: connexion.php');  
                        }
                        else
                        {
                            $errorlog = "<p class='error'>Ce login est déjà utilisé ♡</p>";
                        }
            }
            else
            {
                $errorlog = "<p class='error'>Les mots de passes doivent être identiques♡</p>";
            }
        }
        else
        {
            $errorlog = "<p class='error'>Tous les champs doivent être remplis ♡</p>";
        }
}  
?>
<main class="l-main-form">
    <div class="form">
        <h1 class="form-titre">SIGN-UP</h1>
            <div class="form-section">

                <form action="inscription.php" method="post" enctype="multipart/form-data">
                    
                    <input class="form-input" type="text" name="login" placeholder="Saisissez votre login">
                            
                    <input class="form-input" type="password" name="password" placeholder="**************">   
                            
                    <input class="form-input" type="password" name="confirmPassword" placeholder="**************">
                    <?php echo $errorlog ?>
                            
                    <input class="form-butt" type="submit" name="submit" value="REGISTER">
                        
                </form>
            </div>  
        </div>
</main>
<?php
 require('footer.php');
?>