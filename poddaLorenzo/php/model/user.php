<?php

/**
 * Classe che rappresenta un generico utente del sistema
 */
class User {

    /**
     * Costante che definisce il ruolo venditore
     */
    const Venditore = 1;
    
    /**
     * Costante che definisce il ruolo utente
     */
    const Utente = 2;
    
    
    //Identificatore dell'utente
     
    private $id;

    
    
     //Username per l'autenticazione
     
    private $username;
    
    
    //Password per l'autenticazione
    
    private $password_;
    
    /*
     * Il ruolo dell'utente nell'applicazione.
     * Lo utilizzo per implementare il controllo degli accessi
     */
    private $ruolo;

    
    // Nome dell'utente
    private $nome;
    
    
    //Cognome dell'utente
     
    private $cognome;
    
     
    //email dell'utente
     
    private $email;
    
    
   
    
   
    

    /**
     * Costruttore
     */
    public function __construct() {
        
    }

    
    //Verifica se l'utente esista per il sistema
     
    public function esiste() {
        
        return isset($this->ruolo);
    }

    /**
     * Restituisce lo username dell'utente
     */
    public function getUsername() {
        return $this->username;
    }

    /**
     * Imposta lo username per l'autenticazione dell'utente. 
     */
    public function setUsername($username) {
        
        if (!filter_var($username, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => '/[a-zA-Z0-9]{5,}/')))) {
            return false;
        }
        $this->username = $username;
        return true;
    }

    /**
     * Restituisce la password per l'utente corrente
     */
    public function getPassword() {
        return $this->password_;
    }

    /**
     * Imposta la password per l'utente corrente
     */
    public function setPassword($password_) {
        $this->password_ = $password_;
        return true;
    }

    /**
     * Restituisce il nome dell'utente
     */
    public function getNome() {
        return $this->nome;
    }

    /*
     * Imposta il nome dell'utente
     */
    public function setNome($nome) {
        $this->nome = $nome;
        return true;
    }

    /*
     * Restituisce il cognome dell'utente
     */
    public function getCognome() {
        return $this->cognome;
    }

    /*
     * Imposta il cognome dell'utente
     */
    public function setCognome($cognome) {
        $this->cognome = $cognome;
        return true;
    }

    /*
     * Restituisce un intero 
     */
    public function getRuolo() {
        return $this->ruolo;
    }

    /**
     * Imposta un ruolo per un dato utente
     */
    public function setRuolo($ruolo) {
        switch ($ruolo) {
            case self::Venditore:
            case self::Utente:
                $this->ruolo = $ruolo;
                return true;
            default:
                return false;
        }
    }

    /**
     * Restituisce l'email dell'utente
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * Imposta una nuova email per l'utente
     */
    public function setEmail($email) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        $this->email = $email;
        return true;
    }

    
    
     /**
     * Restituisce un identificatore unico per l'utente
     */
    public function getId(){
        return $this->id;
    }
    
    /**
     * Imposta un identificatore unico per l'utente
     */
    public function setId($id){
        $intVal = filter_var($id, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);
        if(!isset($intVal)){
            return false;
        }
        $this->id = $intVal;
    }
    
    /**
     * Compara due utenti, verificandone l'uguaglianza logica
     */
    public function equals(User $user) {

        return  $this->id == $user->id &&
                $this->nome == $user->nome &&
                $this->cognome == $user->cognome &&
                $this->ruolo == $user->ruolo;
    }
    
    
    

}

?>
