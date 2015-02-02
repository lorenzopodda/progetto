<?php


include_once 'Genere.php';
include_once 'Autore.php';
/**
 * Classe che rappresenta un libro
 */


class Libro {
	/**
     * id del libro
     */
    private $id;

	/**
	* titolo del libro
	*/
	private $titolo

	/**
	* anno di uscita  del libro
	*/
	private $anno_uscita

	/**
	* numero copie del libro
	*/
	private $numero_copie

	/**
	* prezzo del libro
	*/
	private $prezzo

	/**
	* trama del libro
	*/
	private $trama
	
	/**
	*autore del libro
	*/
	private $autore
	
	/**
	*genere del libro
	*/
	private $genere

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
     * Imposta l'anno di uscita di un libro
     
     */
    public function setAnnoUscita($anno_uscita){
        $this->anno_uscita = $anno_uscita;
    }
    
    /**
     * Restituisce l'anno di uscita del libro
     
     */
    public function getAnnoUscita() {
        return $this->anno_uscita;
    }
	
	/**
     * Imposta numero di copie di un libro
     
     */
    public function setNumeroCopie($numero_copie){
        $this->numero_copie = $numero_copie;
    }
    
    /**
     * Restituisce il numero di copie del libro
     
     */
    public function getNumerocopie() {
        return $this->numero_copie;
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
     * Imposta la trama di un libro
     
     */
    public function setTrama($trama){
        $this->trama = $trama;
    }
    
    /**
     * Restituisce la trama del libro
     
     */
    public function getTrama() {
        return $this->trama;
    }

	/**
     * Restituisce l'autore del libro
     * @return Autore
     */
    public function getAutore() {
        return $this->autore;
    }

    /**
     * Imposta un nuovo autore
     */
    public function setAutore(autore $autore) {
        $this->Autore = $autore;
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
    public function setGenere(Genere $genere) {
        $this->genere = $genere;
    }

	/**
     * Restituisce l'identificatore del libro
     * @return int
     */
    public function getId() {
        return $this->id;
    }
    
    /**
     * Imposta un nuovo identificatore per il libro
     * @param int $id
     */
    public function setId($id){
        $this->id = $id;
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

