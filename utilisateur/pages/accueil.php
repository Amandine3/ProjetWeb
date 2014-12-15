<h2>SmartGames vous souhaite la bienvenue ! </h2>
<?php
//accueil.php est contenu dans l'index, qui contient une
//instance de db
$accueilManager = new AccueilManager($db);
$texte = $accueilManager->getTexteAccueil();
?>
<img src="../admin/images/Jeux-video.jpg" alt="Jeux video" />
&nbsp;
<section id="texte_accueil" class="up txtBlue">
    <?php print $texte[0]->texte_accueil;?>
</section>
