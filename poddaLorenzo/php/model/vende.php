<?php

include_once 'venditore.php';
include_once 'libro.php';

/**
 * Rappresenta la messa in vendita di un libro da parte di un venditore
 *

 */
class vende {
	
	/**
	*venditore del libro
	*/
	private $venditore

	/**
	*libro della vendita
	*/
	private $libro
	
	/**
	*identificatore messa in vendita
	*/
	private $id
	

	/**
     * Costrutture della messa in vendita
     */
    public function __construct() {
        $this->vende = array();
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
     * Restituisce il libro che è stato messo in vendita
     */
    public function getLibro() {
        return $this->libro;
    }

    /**
     * Imposta il libro della vendita
     
     */
    public function setLibro(libro $libro) {
        $this->libro = $libro;
    }

	/**
     * Restituisce il venditore che ha messo l'oggetto in vendita
     */
    public function getVenditore() {
        return $this->venditore;
    }

    /**
     * Imposta il venditore del libro
     
     */
    public function setVenditore(venditore $venditore) {
        $this->venditore = $venditore;
    }

	

}

?>
