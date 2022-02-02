<?php
session_start();
ob_start();
require_once ('header.php');
$bdd=mysqli_connect('localhost','root','root','livreor');
mysqli_set_charset($bdd,'utf8');

$DataUtilisateurs = mysqli_query ($bdd,"SELECT * FROM utilisateurs");
$infoUsers = mysqli_fetch_all($DataUtilisateurs, MYSQLI_ASSOC);


$error = "";


if(isset($_GET['modifier']))
    {
        echo 'yeah';

        if(!empty($_GET['login']) && !empty($_GET['password']) && !empty($_GET['confirmPassword']))
        {   
            $login = $_GET['login'];
            $password = $_GET['password'];
            $confirmPassword = $_GET['confirmPassword'];

                    
            echo "yeah2";
            $verifyLogin = mysqli_query($bdd,"SELECT login FROM utilisateurs WHERE login='$login'");
            $resultLogin = mysqli_fetch_all($verifyLogin,MYSQLI_ASSOC);
            
            if (count($resultLogin)==0)
            {   echo "yeah3";

                

                if ($password == $confirmPassword)
                {     echo "yeah4";
                    $password = password_hash($_GET['password'],PASSWORD_BCRYPT);
                  
                    $id = $_GET['id'];
                    $updateUser = "UPDATE utilisateurs SET login ='$login', password ='$password' WHERE id = '$id'";
                    $queryUpdate =mysqli_query($bdd,$updateUser);


                    header('Location: admin.php');
                    // $resultUpdate = mysqli_fetch_all($queryUpdate,MYSQLI_ASSOC);
                    
                    echo '<pre>';
                    var_dump($updateUser);
                    echo '</pre>';
               
                }
                else {
                    echo "les mdp doivent être identiques";
                }
            }
        else
        {
            echo "le login est déjà utilisé";
        }
        
        }  else
        {
            echo "les champs doivent être remplis";
        }
    }
    ob_end_flush();

if (isset($_GET['id']))
{
    $id = $_GET['id'];
   echo '
        <p> Souhaitez-vous supprimer l\'utilisateur? </p>
        <form action="admin.php" method="get">
        <input type="hidden" name='.$id.'value='.$id.'>
        <a href="admin.php?id='.$id.'&valider=valider">Valider</a>
        <input type="submit" name="Annuler" value="Annuler">
        </form>';

    if (isset($_GET['valider'],$_GET['id'] ))
    {

        $userDelete = "DELETE FROM utilisateurs WHERE id = '$id'";
        $queryDelete = mysqli_query($bdd,$userDelete);
        header("Location: admin.php");
    
    }
    else if (isset($_GET['Annuler']))
    {
        header("Location: admin.php");
    }
}
?>

<table>
    <thead>
        <th>ID</th>
        <th>Login</th>
        <th>Password</th>
        <th>Confirmez Password</th>
        <th>MODIFIER</th>
        <th>SUPPRIMER</th>
    </thead>
    <tbody>

<?php
    foreach($infoUsers as $infoUser)
    {
        echo '<form action="" method="get">

                <tr>
                    <td>'. $infoUser['id'] . '<input type="hidden" name="id" value="'.$infoUser['id'].'"></td>
                    <td><input type="text" name="login" placeholder="login" value="'. $infoUser['login'] .'"></td>
                    <td><input type="password" name="password" placeholder="password" value="'. $infoUser['password'] .'"></td>
                    <td><input type="password" name="confirmPassword" placeholder="password" value="'.$infoUser['password']. '"></td>    
                
                
                
                    
                    <td><button type="submit" name="modifier" value="modifier">MODIFIER</button></td>
                    <td><a href="admin.php?id='.$infoUser['id'].'"> Supprimer </a> </td>
                    
                </tr>
            </form>';
    
        //<button type="submit" name="supprimer" value="supprimer">SUPPRIMER</button>
    }
?>

    </tbody>
</table>
<?php
 require('footer.php');
?>