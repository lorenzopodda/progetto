<?php

/**
 * Struttura dati per popolare la vista generica master.php
 *
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
     * @var string
     */
    private $titolo;


    /**
     * File che include la definizione HTML dei tab della pagina (parte dello header)
     * @var string 
     */
 
    private $content_file;

    /**
     * Messaggio di errore da mostrare dopo un input (nascosto se nullo)
     * @var string 
     */
    private $messaggioErrore;

    /**
     * Messaggio di conferma da mostrare dopo un input (nascosto se nullo)
     * @var string 
     */
    private $messaggioConferma;
    
    /**
     * Pagina della vista corrente 
     * (le funzionalita' sono divise in tre categorie: 
     * amministratore, studente e docente, corrispondenti alle sottocartelle 
     * di view nel progetto)
     * @var string 
     */
    private $pagina;
    /**
     * Sottopagina della vista corrente (una per funzionalita' da supportare)
     * (le funzionalita' sono divise in tre categorie: 
     * amministratore, studente e docente, corrispondenti alle sottocartelle 
     * di view nel progetto)
     * @var string 
     */
     
    private $impToken;

    /**
     * lista di script javascript da aggiungere alla pagina
     * @var array
     */
    private $js;
    
    /**
     * flag per dati json (non scrive html)
     * @var boolean
     */
    private $json;
    
    /**
     * Costruttore
     */
    public function __construct() {
        $this->js = array();
        $this->json = false;
    }

    /**
     * Restituisce il titolo della scheda del browser
     * @return string
     */
    public function getTitolo() {
        return $this->titolo;
    }

    /**
     * Imposta il titolo della scheda del browser
     * @param string $titolo il titolo della scheda del browser
     */
    public function setTitolo($titolo) {
        $this->titolo = $titolo;
    }

    

 /**
     * Imposta il file che include la definizione HTML del contenuto principale
     * @return string
     */
    public function setContentFile($contentFile) {
        $this->content_file = $contentFile;
    }

    /**
     * Restituisce il path al file che contiene il contenuto principale
     * @return string
     */
    public function getContentFile() {
        return $this->content_file;
    }


    
    /**
     * Restituisce il testo del messaggio di errore
     * @return string
     */
    public function getMessaggioErrore() {
        return $this->messaggioErrore;
    }

      /**
     * Imposta un messaggio di errore
     * @return string
     */
    public function setMessaggioErrore($msg) {
        $this->messaggioErrore = $msg;
    }


    /**
     * Restituisce il contenuto del messaggio di conferma
     * @return string
     */
    public function getMessaggioConferma() {
        return $this->messaggioConferma;
    }

    /**
     * Imposta il contenuto del messaggio di conferma
     * @param string $msg
     */
    public function setMessaggioConferma($msg) {
        $this->messaggioConferma = $msg;
    }

    /**
     * Restituisce il nome della pagina corrente
     * @return string
     */
    public function getPagina() {
        return $this->pagina;
    }

    /**
     * Imposta il nome della pagina corrente
     * @param string $pagina
     */
    public function setPagina($pagina) {
        $this->pagina = $pagina;
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
    
    /**
     * True se si devono scrivere dati json, false altrimenti
     * @return Boolean
     */
    public function isJson(){
        return $this->json;
    }
    
    /**
     * Da chiamare se la risposta contiene dati json
     */
    public function toggleJson(){
        $this->json = true;
    }
}
?>