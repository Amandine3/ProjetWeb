<h2 id="titre_page"> Formulaire de contact </h2>
<h3> Afin de nous contacter, veuillez répondre à ce formulaire et notre équipe vous joindra grâce à votre adresse e-mail </h3>

<!--creer une table contact afin de mettre ces données dans la DB ?-->
<section id="leform">
    <form id="form_contact" action="<?php print $_SERVER['PHP_SELF'];?>" method="get">
        <fieldset id="Client">
        <legend class="txtRoseLogo txtGras">Renseignements personnel : </legend>
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
                <td><input type="text" name="comm_client" id="comm_client" /></td>
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

