<?php
require './lib/php/verifier_connexion.php'; 
?>
<h2>Ajouter un développeur</h2>

<?php

if(isset($_GET['submit_dev'])) {
    
    extract($_GET,EXTR_OVERWRITE);
    if( trim($Nom_dev)!='' && trim($Pays_dev)!='') {
        $mg2 = new AjoutDevManager($db);
        $retour = $mg2->addDev($_GET);
        if($retour==1){
            $texte="<span class='txtGras'>Developpeur bien ajouté !<br /></span>";
        }
        else if ($retour==2) {
            $texte="<span class='txtGras'>Déjà dans la base de données</span>";
        }    
        if(isset($_SESSION['form'])) {unset($_SESSION['form']);}                
    }
    else {
        $texte="Complétez tous les champs.";
        if(trim($Nom_dev)!='') {$_SESSION['form']['Nom_dev']=$Nom_dev;}
        if(trim($Pays_dev)!='') {$_SESSION['form']['Pays_dev']=$Pays_dev;}
    }
}
?>


<img src="../admin/images/developpeurImage.jpg" alt="Image de developpeur" />
&nbsp;
<!--creer une table contact afin de mettre ces données dans la DB ?-->
<section id="leform">
    <form id="form_ajout_dev" action="<?php print $_SERVER['PHP_SELF'];?>" method="get">
        <fieldset id="Dev">
        <legend class="txtMauv txtGras">Renseignements sur le développeur : </legend>
        <table>
            <tr>
                <td>Nom du développeur : </td>
                <td>
                    <?php if(isset($_SESSION['form']['Nom_dev'])) { ?>
                        <input type="text" name="Nom_dev" id="Nom_dev" value="<?php print $_SESSION['form']['Nom_dev'];?>"/>
                    <?php
                    }
                    else {
                        ?>
                        <input type="text" name="Nom_dev" id="Nom_dev" placeholder="Nom du developpeur" required/>
                        <?php
                    }
                    ?>
                        <div id="error"></div>
                </td>
            </tr>
          
            <tr>
                <td>Pays du développeur : </td>
                <td><?php if(isset($_SESSION['form']['Pays_dev'])) { ?>
                        <input type="text" name="Pays_dev" id="Pays_dev" value="<?php print $_SESSION['form']['Pays_dev'];?>"/>
                    <?php
                    }
                    else {
                        ?>
                        <input type="text" name="Pays_dev" id="Pays_dev" placeholder="Pays du developpeur" required/>
                        <?php
                    }
                    ?>
                        <div id="error"></div>
                </td>
            </tr>
            
                       
            <tr>
                <td colspan="2">
                <input type="submit" name="submit_dev" id="submit_reserv" value="Cliquez ici pour ajouter un développeur" />
                &nbsp;&nbsp;&nbsp;
                <input type="reset" id="reset" value="R&eacute;initialiser le formulaire" />
                </td>
            </tr>
        </table>
        </fieldset>
    </form>
</section>