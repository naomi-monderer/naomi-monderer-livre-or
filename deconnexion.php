<?php

if(isset($_POST['deco']))
{
    session_destroy();
    header('Location: connexion.php');
}

?>