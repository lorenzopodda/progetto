<?php

/**
 * Struttura dati per popolare la vista generica master.php
 */
class ViewDescriptor {
    /**
     * GET http
     */

    const get = 'get';
    /**
     * Post HTTP
     */
    const post = 'post';

    /**
     * Titolo della finestra del browser
     */
    private $titolo;
    
    /**
     * File che include la definizione HTML dei tab della pagina (parte dello header)
     */
    private $titolo_file;


    /**
     * File che include la definizione HTML dei tab della pagina (parte principale)
     */
 
    private $content_file;

    /**
     * Messaggio di errore da mostrare dopo un input 
     */
    private $messaggioErrore;

    /**
     * Messaggio di conferma da mostrare dopo un input (
     */
    private $messaggioConferma;
    
    /**
     * Pagina della vista corrente 
     * (le funzionalita' sono divise in due categorie: 
     * utente e venditore, corrispondenti alle sottocartelle 
     * di view nel progetto)
     */
    private $pagina;
    
    
    private $sottoPagina;
    
     
    private $impToken;
    
    /**
     * lista di script javascript da aggiungere alla pagina
     * @var array
     */
    private $js;

    
    /**
     * Costruttore
     */
    public function __construct() {
        $this->js = array();
        
    }

    /**
     * Restituisce il titolo della scheda del browser
     */
    public function getTitolo() {
        return $this->titolo;
    }

    /**
     * Imposta il titolo della scheda del browser
     */
    public function setTitolo($titolo) {
        $this->titolo = $titolo;
    }

    /**
     * Imposta il file che include la definizione HTML del titolo
     */
    
    public function setTitoloFile($titoloFile) {
        $this->titolo_file = $titoloFile;
    }

    /**
     * Restituisce il path al file che contiene il titolo
     */
    public function getTitoloFile() {
        return $this->titolo_file;
    }

 /**
     * Imposta il file che include la definizione HTML del contenuto principale
     */
    public function setContentFile($contentFile) {
        $this->content_file = $contentFile;
    }

    /**
     * Restituisce il path al file che contiene il contenuto principale
     */
    public function getContentFile() {
        return $this->content_file;
    }


    
    /**
     * Restituisce il testo del messaggio di errore
     */
    public function getMessaggioErrore() {
        return $this->messaggioErrore;
    }

      /**
     * Imposta un messaggio di errore
     */
    public function setMessaggioErrore($msg) {
        $this->messaggioErrore = $msg;
    }


    /**
     * Restituisce il contenuto del messaggio di conferma
     */
    public function getMessaggioConferma() {
        return $this->messaggioConferma;
    }

    /**
     * Imposta il contenuto del messaggio di conferma
     */
    public function setMessaggioConferma($msg) {
        $this->messaggioConferma = $msg;
    }

    /**
     * Restituisce il nome della pagina corrente
     */
    public function getPagina() {
        return $this->pagina;
    }

    /**
     * Imposta il nome della pagina corrente
     */
    public function setPagina($pagina) {
        $this->pagina = $pagina;
    }
    
    public function getSottoPagina() {
        return $this->sottoPagina;
    }

    
    public function setSottoPagina($sottoPagina) {
        $this->sottoPagina = $sottoPagina;
    }
    /**
     * Aggiunge uno script alla pagina
     * @param String $nome
     */
    public function addScript($nome){
        $this->js[] = $nome;
    }
    
    /**
     * Restituisce la lista di script
     * @return array
     */
    public function &getScripts(){
        return $this->js;
    }
    public function scriviToken($pre = '', $method = self::get) {
        $imp = BaseController::impersonato;
        switch ($method) {
            case self::get:
                if (isset($this->impToken)) {
                    // nel caso della 
                    return $pre . "$imp=$this->impToken";
                }
                break;

            case self::post:
                if (isset($this->impToken)) {
                    return "<input type=\"hidden\" name=\"$imp\" value=\"$this->impToken\"/>";
                }
                break;
        }

        return '';
    }
    
    
    
    
}
?>