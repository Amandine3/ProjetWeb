<?php

class AccueilManager extends Accueil {
    private $_db;
    private $_accueilArray=array();
    
    public function __construct($db) {
        $this->_db = $db;
    }
    
    //catalogue des fleurs
    public function getTexte() {
        try
        {
             echo "try " ; 
            
	    $query="SELECT nom,prenom FROM fournisseur";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
            echo " fin try " ; 
        } 
        catch(PDOException $e)
        {
            print $e->getMessage();
        }
        
        while($data = $resultset->fetch())
        {            
            try
            {
                $_accueilArray[] = new Accueil($data);

            } 
            catch(PDOException $e)
            {
                
                print $e->getMessage();
            }            
        }
        if(empty($_accueilArray))
        {
            echo 'Array VIDE !';
        }
 else { echo 'Array pas vide ';}
        return $_accueilArray;        
    }
 }

?>
