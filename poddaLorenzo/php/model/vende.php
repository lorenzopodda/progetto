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
	private $venditore;

	/**
	*libro della vendita
	*/
	private $libro;
	
	
	

	/**
     * Costrutture della messa in vendita
     */
    public function __construct() {
        $this->vende = array();
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
