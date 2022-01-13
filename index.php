<?php
session_start();
$title = "Accueil";
require('header.php');


$bdd = mysqli_connect('localhost','root','root','livreor');
mysqli_set_charset($bdd,'utf8');

echo '<pre>';
var_dump($_SESSION);
echo '</pre>';

// if(isset($_SESSION['user']))
// {
//  echo "Bonjour ". $_SESSION['user']['login']." !";
// }
// require_once 'class/Message.php';  
// if(isset($_POST['username'], $_POST['message']))
// {
// $message = new Message ($_POST['username'], $_POST['message'])
// }
       
?>
<body>
    <main>
        <h1>PRESENTATION DE L'ARTISTE</h1>
        <div class="page-bg"></div>

        <div class="animation-wrapper">
        <div class="particle particle-1"></div>
        <div class="particle particle-2"></div>
        <div class="particle particle-3"></div>
        <div class="particle particle-4"></div>
        </div>

        <div class="page-wrapper"> 
        <h4>CSS Particles</h4>
        </div>
    </main>
</body>


