<?php
session_start();
require('header.php');

$bdd=mysqli_connect('localhost','root','root','livreor');
mysqli_set_charset($bdd,'utf8');

$DataUtilisateurs = mysqli_query ($bdd,"SELECT * FROM utilisateurs");
$infoUsers = mysqli_fetch_all($DataUtilisateurs, MYSQLI_ASSOC);

// echo ('<pre>');
// var_dump($_SESSION["user"]);
// echo ('</pre>');

$error = "";



// if (isset($_SESSION['id']))
if (isset($_POST['submit']))
{
        $login=$_POST['login'];
        $id= $_SESSION['user'][0]['id'];
        $password= password_hash($_POST['password'],PASSWORD_BCRYPT);
        $confirmPassword =$_POST['confirmPassword'];
        $password1 = $_POST['password'];
        $password2 = $_POST['confirmPassword'];

        $verifyLogin = "SELECT login FROM utilisateurs WHERE id != '$id'";
        $query = mysqli_query($bdd,$verifyLogin);
        $result = mysqli_fetch_all($query,MYSQLI_ASSOC);

        $isUserExist = false;
        $listUser = [];
        foreach($result as $value)
        {
            array_push($listUser,$value['login']);
        //          echo "<pre>";
        // var_dump($value['login']);
        // echo "</pre>";   

        }
        echo "<pre>";        
        var_dump($listUser);
        echo "</pre>";  
        foreach($listUser  as $user_login){
                if($user_login == $_POST['login'])
            {
                $isUserExist = true;
            }
}      

        if($isUserExist == true){
            echo "ce login est deja pris";
        }else{
            echo "ce login est ok";
        }
                if($password1 == $password2 && $isUserExist==false){

                        
                    
                    
                //         echo 'verifier que le login n\'est pas dejà pris';
                        $_SESSION['user'][0]['login']= $login;
                        $_SESSION['user'][0]['password']= $password1;
                        $idUser= $_SESSION["user"][0]["id"];
                        $requet1 = mysqli_query($bdd,"UPDATE utilisateurs SET login='$login', password='$password' WHERE id=$idUser");

                }
           

}


?>

<form action="" method="post">

<label for="login">Login:</label>
<input type="text" name="login" value=
<?php if(isset($_SESSION['user'][0]['login'])){echo $_SESSION['user'][0]['login'];}
        // else{
        //     echo $error="ce login est déjà utilisé!";
        //     }
        
?>>

<label for="password">Password:</label>
<input type="password" name="password" value=<?php echo $_SESSION['user'][0]['password'];?>>

<label for="confirmPassword">Confirm your password:</label>
<input type="password" name="confirmPassword" value=<?php echo $_SESSION['user'][0]['password'];?>>

<input type="submit" name="submit" value="submit">

</form>

