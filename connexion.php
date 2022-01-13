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
       
        echo " yo";
        $verifyLogin=mysqli_query($bdd, "SELECT * FROM utilisateurs WHERE login='$login'");
        // le select all me permet de recup toute les infos  y compris le password qui va me servir pour decrypter le hash
        //et le where à comparer le login de post et les logins ds ma bdd
         $userExist = mysqli_fetch_all($verifyLogin,MYSQLI_ASSOC);
        //  echo "<pre>";
        // var_dump($userExist);
        // echo "</pre>";
               
            $recupMdp = $userExist[0]["password"];
            //je dois recuperer le mot de passe crypté en bdd et le decripter tel qu'il a été saisi lors de l'inscription par le user
            echo "yo2";
          

        
        
        if(password_verify($password,$recupMdp))
        {echo "yo3";
           
        $_SESSION['user'] = $userExist ;

        $_SESSION['user'][0]['password'] = $password;
        $_SESSION['user'][0]['id'] = $userExist[0]["id"];
        var_dump($_SESSION);
        header('location: index.php');
            
        }
        else
        {
          $errorLog = "Le mot de passe est incorrect";
        }
        
        
    }   
    else
    {
        $errorLog = "tous les champs doivent être remplis";
    }
}




?> 


    <h2>CONNEXION</h2>
    <form action="connexion.php" method="post">
        <table>
            <tr>
                <td align="right">
                    <label for="login">Login:</label>
                </td>
                <td>
                    <input type="text" name="login" placeholder="Votre login">
                </td>
            </tr>
            <tr>
                <td align="right"> 
                    <label for="password">Password:</label>
                </td>
                <td>
                    <input type="text" name="password" placeholder="Votre password">
                </td>
            </tr>
            <tr>
                
                <td>
                    <input type="submit" name="submit" value="Envoyer" >
                </td>
            </tr>
        </table>
    </form>
    <?php
    echo "<p> $errorLog </p>"
    ?>
