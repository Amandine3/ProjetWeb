
<?php
include ('./lib/php/Jliste_include.php');
$db = connexion::getInstance($dsn,$user,$pass);
session_start();
?>
<html>
    <head>
        <title> Smart games - Jeux videos </title>
        <meta charset="UTF-8"/>
        
        <link rel="stylesheet" type="text/css" href="../utilisateur/lib/css/utcss.css" />
        <link rel="stylesheet" type="text/css" href="../admin/lib/css/style_pc.css" />
        <link rel="stylesheet" type="text/css" href="../admin/lib/css/mediaqueries.css" />

    </head>
<body>
    <section id="all_all">
        <header>
            <img src="../admin/images/sonic-banniere - Copie.png" alt="SmartGames Banniere" />
        </header>
        <section id="exemple">
            <div class="exemple" id="ex2">
            <ul class="nav">
                <?php
                if(file_exists('./lib/php/Jmenu.php')){
                    include ('./lib/php/Jmenu.php');
                }
                ?>
            </ul >
            </div>
        </section>
        <section id="all">
            <div class="exemple" id="ex2">
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
                     <div id="login">
                <form action="connexion.php" method="post">
         
         <table>
            
            <tr>
               
               <td><label for="login"><strong>Nom de compte</strong></label></td>
               <td><input type="text" name="login" id="login"/></td>
               
            </tr>
            
            <tr>
               
               <td><label for="pass"><strong>Mot de passe</strong></label></td>
               <td><input type="password" name="pass" id="pass"/></td>
               
            </tr>
            
         </table>
         
         <input type="submit" name="connexion" value="Se connecter"/>
      
      </form>
            </div>
        
    </section> 

        
           
    <footer>
        Copyright 2014 Smart Games - smartgames@condorcet.be
    </footer>
    </body>
</html>
