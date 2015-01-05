<?php
require './lib/php/verifier_connexion.php'; 
?>
<h2>Ajouter un jeu</h2>

<?php

if(isset($_GET['submit_reserv'])) {
    echo '1111dans IFSSET CONTACT.php';
    extract($_GET,EXTR_OVERWRITE);
    echo '222dans IFSSET CONTACT.php';
    if(trim($type)!='' && trim($nom_client)!='' && trim($pren_client)!='' && trim($comm_client)!='' && trim($email)!='') {
        echo 'IF TRIM dans contact.php';
        $mg2 = new contactManager($db);
        echo 'avant addContact dans contact.php';
        $retour = $mg2->addContact($_GET);
        echo 'apres addContact dans contact.php';
        if($retour==1){
            $texte="<span class='txtGras'>Votre demande a bien été enregistrée.<br />Nous vous contacterons dans les meilleurs délais.</span>";
        }
        else if ($retour==2) {
            $texte="<span class='txtGras'>Déjà dans la base de données</span>";
        }    
        if(isset($_SESSION['form'])) {unset($_SESSION['form']);}                
    }
    else {
        $texte="Complétez tous les champs.";
        if(trim($type)!='') {$_SESSION['form']['type']=$type;}
        if(trim($nom_client)!='') {$_SESSION['form']['nom_client']=$nom_client;}
        if(trim($pren_client)!='') {$_SESSION['form']['pren_client']=$pren_client;}
        if(trim($comm_client)!='') {$_SESSION['form']['comm_client']=$comm_client;}
        if(trim($email)!='') {$_SESSION['form']['email']=$email;}
    }
}
?>
<!--creer une table contact afin de mettre ces données dans la DB ?-->
<section id="leform">
    <form id="form_ajout_jeu" action="<?php print $_SERVER['PHP_SELF'];?>" method="get">
        <fieldset id="Client">
        <legend class="txtMauv txtGras">Renseignements sur le jeu : </legend>
        <table>
            
            <tr>
                <td>Titre : </td><td><input type="text" name="Titre_jeu" id="Titre_jeu"/></td>
            </tr>
          
            <tr>
                <td>Prix : </td>
                <td><input type="number" name="Prix_jeu" id="Prix_jeu" /></td>
            </tr>
            
            <tr>
                <td>Nombre de joueur :  </td>
                <td><input type="number" name="Joueur_jeu" id="Joueur_jeu" /></td>
            </tr>
            <?php
                $aj=new AjoutJeuManager($db);
                $iddev=$aj->getDevId();
                $dev=$aj->getDeveloppeur();
                $idcat=$aj->getCategId();
                $cat=$aj->getCateg();
                $idpl=$aj->getPlateformeId();
                $pl=$aj->getPlateforme();
            ?>
            <tr>
                <td>D&eacuteveloppeur :  </td>
                <td><select name="Developpeur_jeu">
                        <?php
                            for($i=0;$i<count($iddev);$i++)
                            {
                                echo "<option value={$iddev[$i]}>{$dev[$i]}</option>";
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
                                echo "<option value={$idcat[$i]}>{$cat[$i]}</option>";
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
                                echo "<option value={$idpl[$i]}>{$pl[$i]}</option>";
                            }
                        ?>
                    <!--rajouter les PLateforme de la base de donnee-->
                    </select></td>									
            </tr>	
            
            <tr>
                <td colspan="2">
                <input type="submit" name="submit_reserv" id="submit_reserv" value="Cliquez ici pour nous contacter" />
                &nbsp;&nbsp;&nbsp;
                <input type="reset" id="reset" value="R&eacute;initialiser le formulaire" />
                </td>
            </tr>
        </table>
        </fieldset>
    </form>
</section>
