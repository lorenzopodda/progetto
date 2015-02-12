<?php

include_once 'utente.php';
include_once 'libro.php';

/**
 * Rappresenta un acquisto di un libro da parte di un utente
 */
class Acquista {
	
	/**
	*utente dell'acquisto
	*/
	private $utente;

	/**
	*libro dell'acquisto
	*/
	private $libro;

	/**
	*numero dell'acquisto
	*/
	private $numeroAcquisto;

	/**
     * Costrutture dell'acquisto
     */
    public function __construct() {
        $this->acquista = array();
    }
	

	/**
     * Restituisce l'indentificatore dell'acquisto
     
     */
    public function getNumeroAcquisto() {
        return $this->numeroAcquisto;
    }

    /**
     * Modifica il valore dell'identificatore 
     */
    public function setNumeroAcquisto($numeroAcquisto) {
        $intVal = filter_var($numeroAcquisto, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);
        if (!isset($intVal)) {
            return false;
        }
        $this->numeroAcquisto = $intVal;
        return true;
    }

	/**
     * Restituisce il libro dell'acquisto
     */
    public function getLibro() {
        return $this->libro;
    }

    /**
     * Imposta il libro dell'acquisto
     
     */
    public function setLibro(libro $libro) {
        $this->libro = $libro;
    }

	/**
     * Restituisce l'utenre dell'acquisto
     */
    public function getUtente() {
        return $this->utente;
    }

    /**
     * Imposta l'utente dell'acquisto
     
     */
    public function setUtente(utente $utente) {
        $this->utente = $utente;
    }

}

?>
