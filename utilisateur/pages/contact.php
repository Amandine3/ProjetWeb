<h2 id="titre_page"> Formulaire de contact </h2>
<h3> Afin de nous contacter, veuillez répondre à ce formulaire et notre équipe vous joindra par e-mail </h3>

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
    <form id="form_contact" action="<?php print $_SERVER['PHP_SELF'];?>" method="get">
        <fieldset id="Client">
        <legend class="txtMauv txtGras">Renseignements personnel : </legend>
        <table>
            
            <tr>
                <td>Monsieur <input type="radio" name="type" id="typeH" value="homme" />
                &nbsp;&nbsp;&nbsp;Madame <input type="radio" name="type" id="typeF" value="femme" />
                </td>
            </tr>
          
            <tr>
                <td>Nom : </td>
                <td><input type="text" name="nom_client" id="nom_client" /></td>
            </tr>
            
            <tr>
                <td>Prénom :  </td>
                <td><input type="text" name="pren_client" id="pren_client" /></td>
            </tr>
            
            <tr>
                <td> Commentaire :  </td>
                <td><textarea name="comm_client" id="comm_client" rows="5" cols="22"></textarea></td>
            </tr>
            
            <tr>
                <td>Email : </td>
                <td><input type="email" name="em_client" id="em_client" /></td>									
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

