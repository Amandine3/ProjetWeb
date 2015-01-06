<?php
require './lib/php/verifier_connexion.php'; 
?>
<h2>Ajouter un jeu</h2>

<?php

if(isset($_GET['submit_jeu'])) {
    extract($_GET,EXTR_OVERWRITE);
    if(trim($Titre_jeu)!='' && trim($Prix_jeu)!='' && trim($Joueur_jeu)!='') {
        $mg2 = new AjoutJeuManager($db);
        $retour = $mg2->addjeu($_GET);
        if($retour==1){
            $texte="<span class='txtGras'>Votre demande a bien été enregistrée.<br /></span>";
        }
        else if ($retour==2) {
            $texte="<span class='txtGras'>Déjà dans la base de données</span>";
        }    
        if(isset($_SESSION['form'])) {unset($_SESSION['form']);}                
    }
    else {
        $texte="Complétez tous les champs.";
        if(trim($Titre_jeu)!='') {$_SESSION['form']['Titre_jeu']=$Titre_jeu;}
        if(trim($Prix_jeu)!='') {$_SESSION['form']['Prix_jeu']=$Prix_jeu;}
        if(trim($Joueur_jeu)!='') {$_SESSION['form']['Joueur_jeu']=$Joueur_jeu;}
    }
}
?>
<img src="../admin/images/jeux.jpg" alt="Image de jeux" />
&nbsp;
<!--creer une table contact afin de mettre ces données dans la DB ?-->
<section id="leform">
    <form id="form_ajout_jeu" action="<?php print $_SERVER['PHP_SELF'];?>" method="get">
        <fieldset id="Client">
        <legend class="txtMauv txtGras">Renseignements sur le jeu : </legend>
        <table>
            
           <tr>
                <td>Titre : </td>
                <td>
                    <?php if(isset($_SESSION['form']['Titre_jeu'])) { ?>
                    <input type="text" name="Titre_jeu" id="Titre_jeu" value="<?php print $_SESSION['form']['nom_client'];?>"/>
                    <?php
                    }
                    else{
                         ?>
                        <input type="text" name="Titre_jeu" id="Titre_jeu" placeholder="Titre du jeu" required/>
                        <?php
                    }
                    ?> <div id="error"></div>
                </td>
            </tr>
          
            <tr>
                <td>Prix : </td>
                <td>
                     <?php if(isset($_SESSION['form']['Prix_jeu'])) { ?>
                    <input type="number" step="0.01" min="0" name="Prix_jeu" id="Prix_jeu" value="<?php print $_SESSION['form']['Prix_jeu'];?>"/>
                     <?php
                    }
                    else{
                         ?>
                        <input type="number" step="0.01" min="0" name="Prix_jeu" id="Prix_jeu" placeholder="Prix du jeu" required/>
                        <?php
                    }
                    ?> <div id="error"></div>
                </td>
            </tr>
            
            <tr>
                <td>Nombre de joueur :  </td>
                <td><?php if(isset($_SESSION['form']['Joueur_jeu'])) { ?>
                    <input type="number" name="Joueur_jeu" id="Joueur_jeu" value="<?php print $_SESSION['form']['Joueur_jeu'];?>" />
                    <?php
                    }
                    else{
                         ?>
                        <input type="number" name="Joueur_jeu" id="Joueur_jeu" placeholder="Nombre de joueur du jeu" required/>
                        <?php
                    }
                    ?> <div id="error"></div>
                </td>
            </tr>
            <?php
                $aj=new AjoutJeuManager($db);
                $iddev=$aj->getDevId();
                $dev=$aj->getDeveloppeur();
                $idcat=$aj->getCategId();
                $cat=$aj->getCateg();
                $idpl=$aj->getPlateformeId();
                $pl=$aj->getPLateform();
            ?>
            <tr>
                <td>D&eacuteveloppeur :  </td>
                <td><select name="Developpeur_jeu">
                        <?php
                            for($i=0;$i<count($iddev);$i++)
                            {
                                $var = $iddev[$i]->iddev;
                                $var2 = $dev[$i]->nomdev;
                                print "<option value={$var}>{$var2}</option>";
                            }
                        ?>
                    <!--rajouter les developpeur de la base de donnee-->
                    </select></td>
            </tr>
            
            <tr>
                <td>Cat&eacutegorie : </td>
                <td><select name="Categorie_jeu">
                        <?php
                            for($i=0;$i<count($idcat);$i++)
                            {
                                $var = $idcat[$i]->idcat;
                                $var2 = $cat[$i]->genre;  
                                echo "<option value={$var}>{$var2}</option>";
                            }
                        ?>
                    <!--rajouter les Categorie de la base de donnee-->
                    </select></td>									
            </tr>				

             <tr>
                <td>Plateforme : </td>
                <td><select name="Plateforme_jeu">
                        <?php
                            for($i=0;$i<count($idpl);$i++)
                            {
                                $var=$idpl[$i]->idplateforme;
                                $var2=$pl[$i]->nomplateforme;
                                echo "<option value={$var}>{$var2}</option>";
                            }
                        ?>
                    <!--rajouter les PLateforme de la base de donnee-->
                    </select></td>									
            </tr>	
            
            <tr>
                <td colspan="2">
                <input type="submit" name="submit_jeu" id="submit_jeu" value="Cliquez ici pour ajouter un jeu" />
                &nbsp;&nbsp;&nbsp;
                <input type="reset" id="reset" value="R&eacute;initialiser le formulaire" />
                </td>
            </tr>
        </table>
        </fieldset>
    </form>
</section>
