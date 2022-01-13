<?php
require('header.php');

$bdd=mysqli_connect('localhost','root','root','livreor');
mysqli_set_charset($bdd,'utf8');
$requete= mysqli_query($bdd, "SELECT * FROM utilisateurs");
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
                            echo "Ce login est déjà utilisé";
                        }
            }
            else
            {
                echo "Les mots de passe doivent être identiques";
            }
        }
        else
        {
            echo "tout les champs doivent être remplis";
        }
}  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2 align="center">INSCRIPTION</h2>
    <form action="inscription.php" method="post" enctype="multipart/form-data">
        <table>

            <tr>
                <td align="right">
                    <label for="login">Pseudo:</label>
                </td>
                <td>
                    <input type="text" name="login" placeholder="Saisissez votre login">
                </td>
            </tr>
            <tr>
                <td align="right">
                    <label for="password">Mot de passe:</label>
                </td>
                <td>
                    <input type="text" name="password" placeholder="********">   
                </td>
            </tr>
            <tr>
                <td align="right">
                    <label for="confirmPassword">Confirmation de mot de passe:</label>
                </td>
                <td>
                    <input type="text" name="confirmPassword" placeholder="********">
                </td>
            </tr><tr>
                <td align="right">
                    <input type="submit" name="submit" value="je m'inscris">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>