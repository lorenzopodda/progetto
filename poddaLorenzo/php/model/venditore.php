<?php

include_once 'user.php';
/**
 * Classe che rappresenta un Venditore
 */

class Venditore extends User {
    
    

    
    public function __construct() {
        // richiamiamo il costruttore della superclasse
        parent::__construct();
        $this->setRuolo(User::Venditore);
    }
    
}
?> 
