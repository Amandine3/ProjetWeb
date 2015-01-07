<h2 id="titre_page"> Rechercher un jeu 45</h2>

<?php

if(isset($_GET['submit_rech'])) {
    echo 'dans le get appui bouton';
    extract($_GET,EXTR_OVERWRITE);
	if(trim($titre)!='' || trim($genre)!='' || trim($dev)!=''){
		$q="select * from jeuxcat where";
		if(trim($titre)!='') {
			$q=$q & " titre ={$titre}";
			if(trim($genre)!=''){
				$q=$q & " and cat={$genre}";
			}
			if(trim($dev)!=''){
				$q=$q & " and dev={$dev}";
			}
			
		}
		else if (trim($genre)!=''){
			$q=$q & " cat={$genre}";
			if(trim($dev)!=''){
				$q=$q & " and dev={$dev}";
			}
		}
		else{
			$q= $q & " dev={$dev}";
		}
                echo '<p>{$q}</p>';
		$cat = $bdd->query(q) or die(print_r($bdd->errorInfo()));
                echo "passe";
	}
}
?><?php
if(isset($_GET['submitcatalogue'])) {
    extract($_GET,EXTR_OVERWRITE);
      if(trim($id_client)!='')
	  {	  
            $mg2 = new achatManager($db);
            $retour = $mg2->getAchat($_GET);  
            if($retour==1)
            {
                $texte="<span class='txtGras'>Votre demande a bien été enregistrée</span>";
            }
			if(isset($_SESSION['form'])) {unset($_SESSION['form']);}
            else
            {
                $texte="Complétez tous les champs.";
                if(trim($id_client)!='') {$_SESSION['form']['id_client']=$id_client;}
                
            }
        }
    }

if(isset($cat)){ ?>
<form id="formachat" action="<?php print $_SERVER['PHP_SELF'];?>" method="get">
<table>
     <tr>
                <td>Votre ID : </td>
                <td>
                    <?php if(isset($_SESSION['form']['id_client'])) { ?>
                        <input type="text" name="id_client" id="id_client" value="<?php print $_SESSION['form']['id_client'];?>"/>
                    <?php
                    }
                    else {
                        ?>
                        <input type="text" name="id_client" id="id_client" placeholder="Votre identifiant" required/>
                        <?php
                    }
                    ?>
                        <div id="error"></div>
                </td>
            </tr>
<tr><td>Titre</td><td>Prix</td><td>Nombre de joueurs</td><td>Genre</td><td>Developpeurs</td><td>Plateforme</td><td>Commander</td></tr>
<?php
    for($i=0;$i<count($cat);$i++)
    {
        $titre=$cat[$i]->titre;
        $prix=$cat[$i]->prix;
        $nj=$cat[$i]->nj;
        $cat2=$cat[$i]->cat;
        $dev=$cat[$i]->dev;
        $pl=$cat[$i]->pl;
        $idj=$cat[$i]->idjeux;
        $nom="achat";
        $id="cc";
        $ty="radio";
        print "<tr><td>{$titre}</td><td>{$prix}</td><td>{$nj}</td><td>{$cat2}</td><td>{$dev}</td><td>{$pl}</td><td><input type={$ty} name={$nom} id={$id} value={$idj}/></td></tr>";
    }
?>
<tr> 
    <td></td><td></td><td></td><td></td><td></td><td></td>  <td colspan="2">
                    
<input type="submit" name="submitcatalogue" id="submitcatalogue" value="Acheter"/>
<!--<input type="hidden" name="hd" id="hd" value="hd"/>-->
                &nbsp;&nbsp;&nbsp;
                </td>
            </tr>

</table>
</form>
<?php } ?>
<?php if (!isset($cat)){ ?>
    <form id="form_rech" action="<?php print $_SERVER['PHP_SELF'];?>" method="get">
        <fieldset id="recherche">
        <legend class="txtMauv txtGras">Rechercher par: </legend>
        <table>
		    <tr>
                <td>Titre: </td>
                <td><?php if(isset($_SESSION['form']['titre'])) { ?>
                        <input type="text" name="titre" id="titre" value="<?php print $_SESSION['form']['titre'];?>"/>
                    <?php
                    }
                    else {
                        ?>
                        <input type="text" name="titre" id="titre" placeholder="Titre"/>
                        <?php
                    }
                    ?>
                        <div id="error"></div>
					</td>
            </tr>
            <tr>
            <tr>
                <td>Genre: </td>
                <td>
                    <?php if(isset($_SESSION['form']['genre'])) { ?>
                        <input type="text" name="genre" id="genre" value="<?php print $_SESSION['form']['genre'];?>"/>
                    <?php
                    }
                    else {
                        ?>
                        <input type="text" name="genre" id="genre" placeholder="Genre"/>
                        <?php
                    }
                    ?>
                        <div id="error"></div>
                </td>
            </tr>
			<tr>
                <td>D&eacuteveloppeurs : </td>
                <td>
                    <?php if(isset($_SESSION['form']['dev'])) { ?>
                        <input type="text" name="dev" id="dev" value="<?php print $_SESSION['form']['dev'];?>"/>
                    <?php
                    }
                    else {
                        ?>
                        <input type="text" name="dev" id="dev" placeholder="Developpeurs"/>
                        <?php
                    }
                    ?>
                        <div id="error"></div>
                </td>
            </tr>
            </tr>

            <tr>
                <td colspan="2">
                <input type="submit" name="submit_rech" id="submit_rech" value="Envoyer la demande" />
                &nbsp;&nbsp;&nbsp;
                <input type="reset" id="reset" value="R&eacute;initialiser le formulaire" />
                </td>
            </tr>
            
        </table>
        </fieldset>
    </form>
<?php } ?>
