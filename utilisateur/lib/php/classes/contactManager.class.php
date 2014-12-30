<?php

class contactManager extends contact {
    private $_db;
    private $_contactArray = array();
    
    public function __construct($db) {
        $this->_db = $db;
    }
    
    public function addContact(array $data) {
        //var_dump($data);
        $query="select add_reservation (:nom_maitre,:email_maitre,:date_debut,:nombre_jours,:type_animal,:nom_animal,:id_jouet_pet,:regime) as retour" ;
        try {
            $id=null;
            $statement = $this->_db->prepare($query);		
            $statement->bindValue(1, $data['nom_maitre'], PDO::PARAM_STR);
            $statement->bindValue(2, $data['email_maitre'], PDO::PARAM_STR);
            $statement->bindValue(3, $data['date_debut'], PDO::PARAM_STR);
            $statement->bindValue(4, $data['nombre_jours'], PDO::PARAM_INT);
            $statement->bindValue(5, $data['type_animal'], PDO::PARAM_STR);
            $statement->bindValue(6, $data['nom_animal'], PDO::PARAM_STR);
            $statement->bindValue(7, $data['id_jouet_pet'], PDO::PARAM_STR);
            $statement->bindValue(8, $data['regime'], PDO::PARAM_BOOL);
            
            
           
           
            $statement->execute();
            $retour = $statement->fetchColumn(0);
            return $retour;
        } 
        catch(PDOException $e) {
            print "Echec de l'insertion : ".$e;
            $retour=0;
            return $retour;
        }   
    }
    
    private function checkEmpty($data) {
        
        return true;
    }
    
}
