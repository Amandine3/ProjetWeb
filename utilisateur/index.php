<!doctype html>
<?php
include ('./lib/php/Jliste_include.php');
$db = connexion::getInstance($dsn,$user,$pass);
session_start();
?>
<html>
    <head>
        <title> Smart games - Jeux videos </title>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" type="text/css" href="../admin/lib/css/style_pc.css" />
        <link rel="stylesheet" type="text/css" href="../admin/lib/css/mediaqueries.css" />
    </head>
<body>
    <section id="page">
        <header>
            <img src="../admin/images/sonic-banniere - Copie.png" alt="SmartGames Banniere" />
        </header>
        <section id="colGauche">
            <nav>
                <?php
                if(file_exists('./lib/php/Jmenu.php')){
                    include ('./lib/php/Jmenu.php');
                }
                ?>
            </nav>
        </section>
        <section id="contenu">
            <div id="main">
                <?php
                    //quand on arrive sur le site 
                    if(!isset($_SESSION['page']))
                    {
                        $_SESSION['page']="accueil";
                    }  //si on a cliqué sur un lien du menu
                    if(isset($_GET['page']))
                    {
                         $_SESSION['page']=$_GET['page'];
                    }
                    $_SESSION['page']='./pages/'.$_SESSION['page'].'.php';
                    if(file_exists($_SESSION['page']))
                    {
                        include ($_SESSION['page']);
                    }     
                ?>
            </div>
        </section>
        
    </section> 
    <footer>
        Copyright 2014 Smart Games - smartgames@condorcet.be
    </footer>
</body>
    
</html>