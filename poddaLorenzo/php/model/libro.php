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
	private $titolo;


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
    public function setTitolo($titolo){
        $this->titolo = $titolo;
    }
    
    /**
     * Restituisce il titolo del libro
     * @return string
     */
    public function getTitolo() {
        return $this->titolo;
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
     * @param libro $other l'oggetto con cui confrontare $this
     * @return boolean true se i due oggetti sono logicamente uguali, false 
     * altrimenti
     */
    public function equals(Libro $other) {
        return $other->id == $this->id;
    }
    
    

}
?>

