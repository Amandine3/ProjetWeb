<?php
header('Content-Type: application/json');
//indique que le retour doit $etre traité en json
require './liste_include_ajax.php';
require '../classes/connexion.class.php';
require '../classes/contact.class.php';
require '../classes/contactManager.class.php';

$db = Connexion::getInstance($dsn,$user,$pass);

try{
    $mg = new ContactManager($db);
    /*if(!isset($_GET['regime'])) { 'si il coche pas alors l'animal n'a pas de regime special
        $_GET['regime']=FALSE;
    }*/
    $retour=$mg->addContact($_GET);
    print json_encode(array('retour' => $retour)); 
}
catch(PDOException $e){}
?>
