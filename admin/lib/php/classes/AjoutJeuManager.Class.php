<?php

class AjoutJeuManager extends AjoutJeu
{
    private $_db;
    private $_IdDeveloppeur=array();
    private $_IdCategorie=array();
    private $_Categorie=array();

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
                $_IdCategorie[] = new ajoutjeu($data);

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
                $_Categorie[] = new ajoutjeu($data);

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
                $_IdDeveloppeur[] = new ajoutjeu($data);

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
             $_Developpeur[] = new ajoutjeu($data);

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
             $_IdPlateforme[] = new ajoutjeu($data);

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
            
	    $query="SELECT nomplateForme FROM plateforme";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } 
        catch(PDOException $e){
            print $e->getMessage();
        }
        
        while($data = $resultset->fetch()){     
            try
            {
                $_Plateforme[] = new ajoutjeu($data);

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

