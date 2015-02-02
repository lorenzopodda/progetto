<?php

include_once 'User.php';

/**
 * Classe che rappresenta un utente

 */
class Utente extends User {

    /**
     * Il credito dell'utente 
     */
    private $dipartimento;
 
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
}
?>
