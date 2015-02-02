<?php
/**
 * Classe che rappresenta un Genere
 */
class Genere {

    /**
     * Il nome del genere
     * @var string 
     */
    private $nome;
    /**
     * L'identificatore del genere
     * @var int
     */
    private $id;

    
    /**
     * Costrutture di un genere
     */
    public function __construct() {
        
    }

    /**
     * Imposta il nome di un genere
     * @param string $nome il nuovo nome per il genere
     */
    public function setNome($nome){
        $this->nome = $nome;
    }
    
    /**
     * Restituisce il nome di un genere
     * @return string
     */
    public function getNome() {
        return $this->nome;
    }

    /**
     * Restituisce l'identificatore del genere
     * @return int
     */
    public function getId() {
        return $this->id;
    }
    
    /**
     * Imposta un nuovo identificatore per il genere
     * @param int $id
     */
    public function setId($id){
        $this->id = $id;
    }

    /**
     * Verifica se due oggetti genere sono logicamente uguali
     * @param Genere $other l'oggetto con cui confrontare $this
     * @return boolean true se i due oggetti sono logicamente uguali, false 
     * altrimenti
     */
    public function equals(Dipartimento $other) {
        return $other->id == $this->id;
    }
    
    

}

?>
