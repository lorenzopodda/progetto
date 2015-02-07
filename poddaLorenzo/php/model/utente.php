<?php

include_once 'user.php';

/**
 * Classe che rappresenta un utente

 */
class Utente extends User {
     /**
     * Identificatore dell'utente
     * @var int
     */
    private $idUtente;

    /**
     * Il credito dell'utente 
     */
    private $credito;
 
     public function __construct() {
        // richiamiamo il costruttore della superclasse
        parent::__construct();
        $this->setRuolo(User::Utente);
    }

    /**
     * Restituisce il credito dell'utente
     */
    public function getCredito() {
        return $this->credito;
    }

    /**
     * Imposta un nuovo credito per l'utente
     * @param credito $credito il nuovo credito dell'utente
     */
    public function setCredito(Credito $credito) {
        $this->credito = $credito;
	}
        
        /**
     * Restituisce un identificatore unico per l'utente
     * @return int
     */
    public function getIdUtente(){
        return $this->idUtente;
    }
    
    /**
     * Imposta un identificatore unico per l'utente
     * @param int $id
     * @return boolean true se il valore e' stato aggiornato correttamente,
     * false altrimenti
     */
    public function setIdUtente($idUtente){
        $intVal = filter_var($idUtente, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);
        if(!isset($intVal)){
            return false;
        }
        $this->idUtente = $intVal;
    }
}
?>
