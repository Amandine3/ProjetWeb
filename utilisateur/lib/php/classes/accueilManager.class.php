<?php
print 'Dans AccueilManager';
class AccueilManager extends Accueil {
    private $_db;
    private $_accueilArray = array();
    
    public function __construct($db) {
        $this->_db = $db;
    }
    
    
}
