<?php
/**
 * Classe che rappresenta un Autore
 */
class Autore {

    /**
     * Il nome dell'autore
     * @var string 
     */
    private $nome;
    /**
     * L'identificatore dell'autore
     * @var int
     */
    private $id;

    
    /**
     * Costrutture di un Autore
     */
    public function __construct() {
        
    }

    /**
     * Imposta il nome di un Autore
     * @param string $nome il nuovo nome per l'autore
     */
    public function setNome($nome){
        $this->nome = $nome;
    }
    
    /**
     * Restituisce il nome di un Autore
     * @return string
     */
    public function getNome() {
        return $this->nome;
    }

    /**
     * Restituisce l'identificatore dell'autore
     * @return int
     */
    public function getId() {
        return $this->id;
    }
    
    /**
     * Imposta un nuovo identificatore per l'autore
     * @param int $id
     */
    public function setId($id){
        $this->id = $id;
    }

    /**
     * Verifica se due oggetti Autore sono logicamente uguali
     * @param Autore $other l'oggetto con cui confrontare $this
     * @return boolean true se i due oggetti sono logicamente uguali, false 
     * altrimenti
     */
    public function equals(Dipartimento $other) {
        return $other->id == $this->id;
    }
    
    

}

?>
