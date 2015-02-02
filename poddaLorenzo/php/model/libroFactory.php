<?php

include_once 'libro.php';
include_once 'genere.php';
include_once 'autore.php';

/**
 * Classe per la creazione dei libri
 
 */
class UserFactory {

    private static $singleton;

    private function __constructor() {
        
    }

    /**
     * Restiuisce un singleton per creare libri
     * @return \UserFactory
     */
    public static function instance() {
        if (!isset(self::$singleton)) {
            self::$singleton = new libroFactory();
        }

        return self::$singleton;
    }



	/**
     * Restituisce un array con i libri presenti nel sistema
     * @return array
     */
    public function &getListaLibri() {
        $docenti = array();
        $query = "select titolo, annoUscita, numeroCopie, prezzo, autore, nomeGenere from 
		negozio_online.genere join negozio_online.libro on codGenere=codGen 
		join negozio_online.autore on codAutore=c0dAut"; 
               
        $mysqli = Db::getInstance()->connectDb();
        if (!isset($mysqli)) {
            error_log("[getListaLibri] impossibile inizializzare il database");
            $mysqli->close();
            return $libri;
        }
        $result = $mysqli->query($query);
        if ($mysqli->errno > 0) {
            error_log("[getListaLibri] impossibile eseguire la query");
            $mysqli->close();
            return $libri;
        }

        while ($row = $result->fetch_array()) {
            $libri[] = self::creaLibriDaArray($row);
        }

        $mysqli->close();
        return $libri;
    }

    

    /**
     * Carica un libro dal genere
     * @param int $genere il genere da cercare
     * @return Libro un oggetto Libro nel caso sia stato trovato,
     * NULL altrimenti
     */
    public function caricaLibriPerGenere($genere) {


        $intval = filter_var($genere, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);
        if (!isset($intval)) {
            return null;
        }

        $mysqli = Db::getInstance()->connectDb();
        if (!isset($mysqli)) {
            error_log("[cercaLibriPerGenere] impossibile inizializzare il database");
            $mysqli->close();
            return null;
        }

        $query = "select titolo, annoUscita, numeroCopie, prezzo, autore, nomeGenere from 
	negozio_online.genere join negozio_online.libro on codGenere=codGen 
	join negozio_online.autore on codAutore=c0dAut where
	nomeGenere="$genere"";
        $stmt = $mysqli->stmt_init();
        $stmt->prepare($query);
        if (!$stmt) {
            error_log("[cercaLibriPerGenere] impossibile" .
                    " inizializzare il prepared statement");
            $mysqli->close();
            return null;
        }

        if (!$stmt->bind_param('i', $intval)) {
            error_log("[cercaLibriPerGenere] impossibile" .
                    " effettuare il binding in input");
            $mysqli->close();
            return null;
        }

        $toRet =  self::caricaLibriPerGenere($stmt);
        $mysqli->close();
        return $toRet;
    }

	/**
     * Carica un libro dall'autore
     * @param int $autore il genere da cercare
     * @return Libro un oggetto Libro nel caso sia stato trovato,
     * NULL altrimenti
     */
    public function caricaLibriPerAutore($genere) {


        $intval = filter_var($autore, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);
        if (!isset($intval)) {
            return null;
        }

        $mysqli = Db::getInstance()->connectDb();
        if (!isset($mysqli)) {
            error_log("[cercaLibriPerAutore] impossibile inizializzare il database");
            $mysqli->close();
            return null;
        }

        $query = "select titolo, annoUscita, numeroCopie, prezzo, autore, nomeGenere from 
	negozio_online.genere join negozio_online.libro on codGenere=codGen 
	join negozio_online.autore on codAutore=c0dAut where
	nomeAutore="$autore"";
        $stmt = $mysqli->stmt_init();
        $stmt->prepare($query);
        if (!$stmt) {
            error_log("[cercaLibriPerAutore] impossibile" .
                    " inizializzare il prepared statement");
            $mysqli->close();
            return null;
        }

        if (!$stmt->bind_param('i', $intval)) {
            error_log("[cercaLibriPerAutore] impossibile" .
                    " effettuare il binding in input");
            $mysqli->close();
            return null;
        }

        $toRet =  self::caricaLibriPerAutore($stmt);
        $mysqli->close();
        return $toRet;
    }


}

?>




