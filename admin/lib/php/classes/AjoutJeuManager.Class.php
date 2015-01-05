<?php

class AjoutJeuManager extends AjoutJeu {
    private $_db;
    private $_IdCategorie=array();
    private $_Categorie=array();
    private $_IdDeveloppeur=array();
    private $_Developpeur=array();
    private $_IdPlateforme=array();
    private $_Plateforme=array();
    
    public function __construct($db) {
        $this->_db = $db;
    }
    
    //Renvoie les id des categories
    public function getCategId() {
        try
        {
            
	    $query="SELECT idcat FROM categorie";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } 
        catch(PDOException $e){
            print $e->getMessage();
        }
        
        while($data = $resultset->fetch()){     
            try
            {
                $_IdCategorie[] = new Accueil($data);

            } 
            catch(PDOException $e)
            {
                
                print $e->getMessage();
            }            
        }
        return $_IdCategorie;        
    }
    public function getCateg() {
        try
        {
            
	    $query="SELECT genre FROM categorie";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } 
        catch(PDOException $e){
            print $e->getMessage();
        }
        
        while($data = $resultset->fetch()){     
            try
            {
                $_Categorie[] = new Accueil($data);

            } 
            catch(PDOException $e)
            {
                
                print $e->getMessage();
            }            
        }
        return $_Categorie;        
    }
    
    public function getDevId() {
        try
        {
            
	    $query="SELECT iddev FROM developpeur";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } 
        catch(PDOException $e){
            print $e->getMessage();
        }
        
        while($data = $resultset->fetch()){     
            try
            {
                $_IdDeveloppeur[] = new Accueil($data);

            } 
            catch(PDOException $e)
            {
                
                print $e->getMessage();
            }            
        }
        return $_IdDeveloppeur;        
    }
    public function getDeveloppeur() {
     try
     {

         $query="SELECT nomdev FROM developpeur";
         $resultset = $this->_db->prepare($query);
         $resultset->execute();
     } 
     catch(PDOException $e){
         print $e->getMessage();
     }

     while($data = $resultset->fetch()){     
         try
         {
             $_Developpeur[] = new Accueil($data);

         } 
         catch(PDOException $e)
         {

             print $e->getMessage();
         }            
     }
     return $_Developpeur;        
 }
    public function getPlateformeId() {
     try
     {

         $query="SELECT idplateforme FROM plateforme";
         $resultset = $this->_db->prepare($query);
         $resultset->execute();
     } 
     catch(PDOException $e){
         print $e->getMessage();
     }

     while($data = $resultset->fetch()){     
         try
         {
             $_IdPlateforme[] = new Accueil($data);

         } 
         catch(PDOException $e)
         {

             print $e->getMessage();
         }            
     }
     return $_IdPlateforme;        
 }
    public function getPLateform() {
        try
        {
            
	    $query="SELECT nomPlateForme FROM plateforme";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } 
        catch(PDOException $e){
            print $e->getMessage();
        }
        
        while($data = $resultset->fetch()){     
            try
            {
                $_Plateforme[] = new Accueil($data);

            } 
            catch(PDOException $e)
            {
                
                print $e->getMessage();
            }            
        }
        return $_Plateforme;        
    }
 }

?>

