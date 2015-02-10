<?php

include_once 'user.php';

/**
 * Classe che rappresenta un utente

 */
class Utente extends User {
     

    /**
     * Il credito dell'utente 
     */
    private $credito;
    
     /**
     * Via dell'abitazione dell'utente
     * @var string
     */
    private $indirizzo;
 
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
     * Restituisce l'indirizzo dell'utente
     * @return string
     */
    public function getIndirizzo() {
        return $this->indirizzo;
    }
    /**
     * Imposta l'indirizzo dell'utente
     * @param string $indirizzo
     * @return boolean true se l'indirizzo e' stato impostato correttamente,
     * false altrimenti
     */
    public function setIndirizzo($indirizzo) {
        $this->indirizzo = $indirizzo;
        return true;
    }  
}
?>
