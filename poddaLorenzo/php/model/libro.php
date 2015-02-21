<?php

/**
 * Classe che rappresenta un libro
 */


class Libro {
	/**
     * id del libro
     */
    private $idLibro;

	/**
	* titolo del libro
	*/
	private $titoloLibro;


	/**
	* prezzo del libro
	**/
	private $prezzo;

	
	
	/**
	*nome autore del libro
	*/
	private $nomeAutore;
        
        /**
	*Cognome autore del libro
	*/
	private $cognomeAutore;
	
	/**
	*genere del libro
	*/
	private $genere;

	/**
     * Costrutture di un libro
     */
    public function __construct() {
        
    }

    /**
     * Imposta il titolo di un libro
     
     */
    public function setTitoloLibro($titoloLibro){
        $this->titoloLibro = $titoloLibro;
    }
    
    /**
     * Restituisce il titolo del libro
     * @return string
     */
    public function getTitoloLibro() {
        return $this->titoloLibro;
    }
	
	
	/**
     * Impostail prezzo di un libro
     
     */
    public function setprezzo($prezzo){
        $this->prezzo = $prezzo;
    }
    
    /**
     * Restituisce il prezzo del libro
     
     */
    public function getPrezzo() {
        return $this->prezzo;
    }
	

	/**
     * Restituisce il nome dell'autore del libro
     * @return Autore
     */
    public function getNomeAutore() {
        return $this->nomeAutore;
    }

    /**
     * Imposta un nuovo autore
     */
    public function setNomeAutore( $nomeAutore) {
        $this->nomeAutore = $nomeAutore;
    }
    
    /**
     * Restituisce il nome dell'autore del libro
     * @return Autore
     */
    public function getCognomeAutore() {
        return $this->nomeAutore;
    }

    /**
     * Imposta un nuovo autore
     */
    public function setCognomeAutore( $cognomeAutore) {
        $this->cognomeAutore = $cognomeAutore;
    }

	/**
     * Restituisce il genere del libro
     * @return Dipartimento
     */
    public function getGenere() {
        return $this->genere;
    }

    /**
     * Imposta un nuovo genere per il libro
     
     */
    public function setgenere( $genere) {
        $this->genere = $genere;
    }

	/**
     * Restituisce l'identificatore del libro
     * @return int
     */
    public function getIdLIbro() {
        return $this->idLibro;
    }
    
    /**
     * Imposta un nuovo identificatore per il libro
     * @param int $id
     */
    public function setIdLibro($idLibro){
        $this->idLibro = $idLibro;
    }

    /**
     * Verifica se due oggetti Libro sono logicamente uguali
     */
    public function equals(Libro $other) {
        return $other->idLibro == $this->idLibro;
    }
    
    

}
?>

