<?php

include_once 'user.php';
/**
 * Classe che rappresenta un Venditore
 */

class Docente extends User {
    
    /**
     * Identificatore dell'utente
     * @var int
     */
    private $idVenditore;

    
    public function __construct() {
        // richiamiamo il costruttore della superclasse
        parent::__construct();
        $this->setRuolo(User::Venditore);
    }
    /**
     * Restituisce un identificatore unico per l'utente
     * @return int
     */
    public function getIdUtente(){
        return $this->idVenditore;
    }
    
    /**
     * Imposta un identificatore unico per l'utente
     * @param int $id
     * @return boolean true se il valore e' stato aggiornato correttamente,
     * false altrimenti
     */
    public function setIdVenditore($idVenditore){
        $intVal = filter_var($idVenditore, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);
        if(!isset($intVal)){
            return false;
        }
        $this->idVenditore = $intVal;
    }
}
?> 
