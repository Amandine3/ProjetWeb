<?php

class SeConnecter
{

    private $_db;
    
    public function __construct($db)
    {
        $this->_db = $db;
    }
    
    function estAdmin($login,$password)
    {
        $ret=array();
        try {
            $query="select verifier_connexion(:nomadmin,:mpadmin) as ret";
            $sql = $this->_db->prepare($query);
            $sql->bindValue(':nomadmin',$_POST['login']);
            $sql->bindValue(':mpadmin',md5($_POST['password']));  
            $sql->execute();
            //2 manières et 2 récup. différentes de la valeur
            //$retour[] = $sql->fetchAll(PDO::FETCH_ASSOC); // récupérer : print $auth[0][0]['verifier_connexion'];  
            $ret = $sql->fetchColumn(0);                     
        } catch(PDOException $e) {
            print "Echec de la requ&ecirc;te.".$e;
        }
        return $ret;
    }
}
?>
