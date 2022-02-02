
<?php
session_start();


$title = "Accueil";
require('header.php');


$bdd = mysqli_connect('localhost','root','root','livreor');
mysqli_set_charset($bdd,'utf8');

// echo '<pre>';
// var_dump($_SESSION);
// echo '</pre>';


?>

    <main class="l-main-index"> 

        <div class="content-index">
           
                <div class="content-index-img">
                
                    <img class="the-harder-they-come" src="images/cover.webp" alt="affiche de the harder they come">
                    
                </div>
       
                  
                    <div class="texte">
                        <h1 class="titre-index">THE HARDER THEY COME</h1>
                        <p class="text-presentation">Tout, tout de suite (titre original : The Harder They Come) est un film policier jamaïcain
                            réalisé par Perry Henzell et sorti en 1972 au festival du film de Venise et le 8 février 1973 aux États-Unis.
                            Le film met en vedette le chanteur de reggae Jimmy Cliff, qui joue Ivanhoe Martin,un personnage basé sur 
                            Rhyging (en), un criminel jamaïcain réel qui s'est rendu célèbre dans les années 1940. </p>
                    </div>
            </div>
        </div>  
    </main>

<?php
require('footer.php');
?>
<style>
