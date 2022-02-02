<?php
require 'deconnexion.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/layout.css">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/module.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mochiy+Pop+P+One&family=Mulish:wght@800&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Mochiy+Pop+P+One&family=Mulish:wght@200&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Mochiy+Pop+P+One&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title><?= $title ?? 'LIVRE D\'OR'?></title>
</head>
<body>
    <div class="page">

    <header class="l-header">
       <div class="inner">
            <a href ="index.php" class="header-title">JIMMY CLIFF</a>
            
        <ul class="header-nav">
            <li class="nav-list">
                <?php if(isset($_SESSION['user']) || !isset($_SESSION['user']))
                        {
                            echo   '<a href="livre-or.php" class="list-link">LIVRE D\'OR</a>';
                        }
                    ?>
            </li>
            <li class="nav-list">
                    <?php if(isset($_SESSION['user']))
                        {
                            echo   '<a href="commentaire.php" class="list-link">COMMENTAIRES</a>';
                        }
                    ?>
            </li>
            <li class="nav-list">
                <?php if (isset($_SESSION['user']))
                {
                    echo '<a href="profil.php" class="list-link">PROFIL</a>';
                }
                ?>
            </li>
            <li  class="nav-list">
                <?php

                    if(isset($_SESSION['user']) && $_SESSION['user']['id'] == 1)
                    {

                        echo '<a href="admin.php" class="list-link">GESTION ADMIN</a>';
                    }
                ?>
            </li> 
            <li class="nav-list">
    
                <?php 

                if(isset($_SESSION['user']))
                {
                    echo '<form action="" method="post">
                        
                        <input class="butt-deco" type="submit" name="deco" value="DECONNEXION">
                    </form>';
                }
                    
                ?>
            </li>
            <li class="nav-list">
                <?php if(!isset($_SESSION['user']))
                {
                echo '<a href="connexion.php" class="list-link">LOG IN </a>';
                }
            
                ?>
            </li>
            <li class="nav-list">
             <?php 
            //  if(!isset($_SESSION['user']))
            //     {
            //     echo '<a href="inscription.php" class="list-link">SIGN UP</a>';
            //     }
            ?>
            </li>
        </ul>
    </div>
  </header>
            

    
