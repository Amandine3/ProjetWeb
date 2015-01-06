<h2 id="titre_page"> Catalogue </h2>
<?php
if(isset($_POST['achat'])) {
    $tabachat=$_POST['achat'];
	foreach($tabachat as $ac){
        $mg2 = new achatManager($db);
        $retour = $mg2->addachat($ac);                
    }
	echo '<p> Votre demande a bien &eacutet&eacute enregistr&eacutee</p>'
}
$cm=new catalogueManager($db);
$cat=$cm->getCatalogue();
?>
<form id="formachat" action="<?
<table>
<td><tr>Titre</tr><tr>Prix</tr><tr>Nombre de joueurs</tr><tr>Genre</tr><tr>Developpeurs</tr><tr>Plateforme</tr><tr>Commander</tr></td>
<?php
    for($i=0;$i<count($cat);$i++){
        print '<td><tr>{$cat[$i]->titre}</tr><tr>{$cat[$i]->prix}</tr><tr>{$cat[$i]->nj}</tr><tr>{$cat[$i]->cat}</tr><tr>{$cat[$i]->dev}</tr><tr>{$cat[$i]->pl}</tr><tr><input type="checkbox" name="achat[]" value="{$cat[$i]->idjeux}/></tr></td>"'
    }
?>
</table>
<input type="submit" name="submitcatalogue" id="submitcatalogue" value="Acheter"/>
</form>
