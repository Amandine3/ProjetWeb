<h2>SmartGames vous souhaite la bienvenue ! </h2>
<?php
//accueil.php est contenu dans l'index, qui contient une
//instance de db
$accueilManager = new AccueilManager($db);
$texteAcc = $accueilManager->getTexteAcc();
echo 'le print r donne : ';
    print_r($texteAcc);
echo'apres print_r';


if(count($texteAcc) == 0)
{
    echo "vide";
}
else
    {

    for($i = 0; $i<count($texteAcc);$i++)
    {

    echo $texteAcc[$i]->gettexte();
}
}



?>
<img src="../admin/images/Jeux-video.jpg" alt="Jeux video" />
&nbsp;
<div id="texte" class="up txtMauv">
    <?php print 'ici' ?>
    <?php print $texteAcc[0]->texte;?>
    <?php  echo $texteAcc[0]->texte;?>
    <?php echo $texteAcc; ?>
    <?php print 'la' ?>
</div>



<!---->

<p><span class="txtGras"> Ceci est un text d'une balise SPAN </span>
</p>
<?php
    //$accueilManager->faireQqch();
?>
<!--
<section id="avertisst">    
    Toute r&eacute;servation ...
    <input type="button" id="cacher" value="Cacher"/>
</section>
-->
<section id="avertisst">    
    Attention : Nous n'échangeons ni ne reprenons les articles soldés !<br />
    Veuillez donc faire attention avant de commander !   
</section>
 <input type="button" id="cacher" value="Cacher l'avertissement"/>
 
 <!--<section id="no-js" class="txtRed txtGras">
     Pour plus de confort d'utilisation, veuillez activer javascript!
 </section>