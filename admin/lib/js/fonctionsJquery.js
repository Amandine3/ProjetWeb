
$(document).ready(function() {
   //LISTE DEROULANTE SANS VALIDATION
  //cacher le bouton Go du form. liste déroulante ds réservation
  $('#submit_search_td').remove();
  
  $('#choix_liste_deroulante').change(function() {   
    // trouver le nom de l'attribut
     var attribut=$(this).attr('name');
     //récupérer la valeur du select 
     var val = $(this).val();  
     //construire la chaîne d'url
     var refresh = 'index.php?'+attribut+'='+val;
     //alert(refresh);
     window.location.href = refresh;
  });
   
  //VERIFIER FORMULAIRE AVEC REGEX --> privilégier validate.js
  //www.sitepoint.com/jquery-basic-regex-selector-examples/ 
  $('input#nom_client').blur(function() {
     var regex= new RegExp(/[0-9\?!\.,;]/);
     var ch = $(this).val();
     if(regex.test(ch)){   
         $('input#nom_client').val('');
         $('div#error').css({
             'color':'red',
             'font-size' : '70%',
             'font-weight':'bold'
         }),
         $('div#error').html("Veuillez n'entrer que des lettres"),
         $('input#nom_client').focus(function() {
             $('div#error').fadeOut();
         })         
     }     
  });

  //ENVOYER FORMULAIRE CONTACT PAR AJAX
  
   $('input#submit_reserv').on ('click',function(event) {
      
      event.preventDefault();// ou return false à la fin
      //alert("arrivé");
      var type;
      var nom_client = $('input#nom_client').val();
      var pren_client = $('input#pren_client').val();
      var comm_client = document.getElementById('comm_client').value;
      var email=$('input#email').val();
      if($('input#Homme').is(':checked')){
          type=0;
      }
      if($('input#Femme').is(':checked')){
          type=1;
      }
      
      if((type==1 || type==0) && $.trim(nom_client)!='' && $.trim(pren_client)!='' && $.trim(comm_client)!='' && $.trim(email)!='') {
          var data_form=$('form#form_contact').serialize();
          //alert(data_form);
          $.ajax({               
            type : 'GET',            
            data : data_form,
            dataType : "json",//type du retour des données par le php
            url : '../admin/lib/php/ajax/AjaxContact_submit.php',
            //callback exécuté en cas de succès uniquement :
            success : function(data){ //data : ce qui est retourné par le fichier php 
                //effacer les valeurs
                $('form').find('input[type=text]').val('');
                $('form').find('input[type=email]').val('');
                //$('form').find('input[type=date]').val('');
                $('input[name="type"]').prop('checked', false);
                //$('input[name="regime"]').prop('checked', false); // rinitialise la valeur de la propriété (property)
                //$("select#id_jouet_pet").val("");
                //$("select#nombre_jours").val('2'); 
                if(data.retour == 1) {  //stricte égalité type compris (sinon valeurs peuvent être de types != et rester =
                    $('section#resultat').css({
                        
                        'color':'red',
                        'font-weight':'bold'
                    }),
                    $('section#resultat').html("Votre demande a bien été envoyée ! ");
                }
                else if(data.retour == 2){    
                    $('section#resultat').css({
                        'color':'red',
                        'font-weight':'bold'
                    }),
                    $('section#resultat').html("Déjà dans la base de données...");
                }
                else {  
                    $('section#resultat').css({
                        'color':'red',
                        'font-weight':'bold'
                    }),
                    $('section#resultat').html("Echec.");
                }
               // $('form#form_reservation').reset(); // ne fonctionne pas
            },
          //callback en cas d'échec
            fail : function() {
                document.write("Planté");
              alert("échec url");           
          }
        })//fin $.ajax    
      } //fin if
      //si champs manquants
      else {
         $('section#resultat').css({
                        'color':'red',
                        'font-weight':'bold'
                    }),
          $('section#resultat').html("Remplissez tous les champs !"); 
          
      }
      
    });    
    
    //ENVOYER FORMULAIRE AJOUT JEU PAR AJAX
  
  $('input#submit_jeu').on ('click',function(event) {
      
      event.preventDefault();// ou return false à la fin
      //alert("arrivé");
      
      var Titre_jeu = $('input#Titre_jeu').val();
      var Prix_jeu = $('input#Prix_jeu').val();
      var Joueur_jeu = $('input#Joueur_jeu').val();//document.getElementById('comm_client').value;
      var Developpeur_jeu=$('input#Developpeur_jeu').val();
      var Categorie_jeu=$('input#Categorie_jeu').val();
      var Plateforme_jeu=$('input#Plateforme_jeu').val();
      
           
      if($.trim(Titre_jeu)!='' && $.trim(Prix_jeu)!='' && $.trim(Joueur_jeu)!='' && $.trim(Developpeur_jeu)!='' && $.trim(Categorie_jeu)!='' && $.trim(Plateforme_jeu)!='' ) {
          var data_form=$('form#form_ajout_jeu').serialize();
          //alert(data_form);
          $.ajax({               
            type : 'GET',            
            data : data_form,
            dataType : "json",//type du retour des données par le php
            url : '../admin/lib/php/ajax/AjaxJeu_submit.php',
            //callback exécuté en cas de succès uniquement :
            success : function(data){ //data : ce qui est retourné par le fichier php 
                //effacer les valeurs
                $('form').find('input[type=text]').val('');
                $('form').find('input[type=email]').val('');
                //$('form').find('input[type=date]').val('');
                $('input[name="type"]').prop('checked', false);
                //$('input[name="regime"]').prop('checked', false); // rinitialise la valeur de la propriété (property)
                //$("select#id_jouet_pet").val("");
                //$("select#nombre_jours").val('2'); 
                if(data.retour == 1) {  //stricte égalité type compris (sinon valeurs peuvent être de types != et rester =
                    $('section#resultat').css({
                        
                        'color':'red',
                        'font-weight':'bold'
                    }),
                    $('section#resultat').html("Votre demande a bien été envoyée ! ");
                }
                else if(data.retour == 2){    
                    $('section#resultat').css({
                        'color':'red',
                        'font-weight':'bold'
                    }),
                    $('section#resultat').html("Déjà dans la base de données...");
                }
                else {  
                    $('section#resultat').css({
                        'color':'red',
                        'font-weight':'bold'
                    }),
                    $('section#resultat').html("Echec.");
                }
               // $('form#form_reservation').reset(); // ne fonctionne pas
            },
          //callback en cas d'échec
            fail : function() {
                document.write("Planté");
              alert("échec url");           
          }
        })//fin $.ajax    
      } //fin if
      //si champs manquants
      else {
         $('section#resultat').css({
                        'color':'red',
                        'font-weight':'bold'
                    }),
          $('section#resultat').html("Remplissez tous les champs !"); 
          
      }
      
    });    
        
  //cacher ou afficher une div  
  $('#cacher').click(function(){
    $('#avertisst').toggle();
    if($('#avertisst').is(':visible')){
        $(this).val('Cacher le conseil');
    }
    else {
        $(this).val('Afficher le conseil');
    }
  });
  /*
  $('<strong>Avant</strong>').prependTo('#avertisst');
  $('<strong>Après</strong>').appendTo('#avertisst');
  */
 
 //ne pas afficher div quand javascript est déjà actif.
  $('#no-js').remove();
  
  //vérifier les champs d'un formulaire
  $('#form_reservation').on('submit', function(event) { // on idem que bind
    $('[type=text]').each(function() {
       
      if(!$(this).val().length) {	
	    event.preventDefault();
        $(this).css('border', 'px solid red');
      }
    });
  });
  
  
 //JUSTE UN TEST : 
    $('#form_reservation').submit(function(){
        //alert("Formulaire envoyé !");
    });
});