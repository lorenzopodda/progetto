<?php

include_once 'utente.php';
include_once 'libro.php';

/**
 * Rappresenta un acquisto di un libro da parte di un utente
 *

 */
class Acquista {
	
	/**
	*utente dell'acquisto
	*/
	private $utente

	/**
	*libro dell'acquisto
	*/
	private $libro

	/**
	*numero dell'acquisto
	*/
	private $id

	/**
     * Costrutture dell'acquisto
     */
    public function __construct() {
        $this->acquista = array();
    }
	

	/**
     * Restituisce l'indentificatore dell'acquisto
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Modifica il valore dell'identificatore 
     * @param int $id il nuovo id per l'acquisto
     * @return boolean true se il valore e' stato modificato, 
     *                 false altrimenti
     */
    public function setId($id) {
        $intVal = filter_var($id, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);
        if (!isset($intVal)) {
            return false;
        }
        $this->id = $intVal;
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
