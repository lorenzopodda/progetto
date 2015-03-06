<?php

include_once 'libro.php';
include_once 'Db.php';

/**
 * Classe per la creazione dei libri
 
 */
class LibroFactory {

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
        $libri = array();
        $query = "select IdLibro, Titolo, Prezzo, NomeAutore, CognomeAutore, Genere from Libro";
               
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

        $query = "SELECT IdLibro, Titolo, Prezzo, NomeAutore, CognomeAutore, Genere
                    FROM Libro
            WHERE Genere = ? ";
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
    
    //inserisci nuovi libri
    public function InserisciLibro() {
        $mysqli = Db::getInstance()->connectDb();
        if (!isset($mysqli)) {
            error_log("[InserisciLibro] impossibile inizializzare il database");
            $mysqli->close();
            return false;
        }
        $stmt = $mysqli->stmt_init();
        

        $insert_libro = "insert into libro  values (default, ?, ?, ?, ?, ?)";
        $stmt->prepare($insert_libro);
        if (!$stmt) {
            error_log("[inserisciLibro] impossibile" .
                    " inizializzare il prepared statement n 1");
            $mysqli->close();
            return false;
        }


        
        }
        //cancella libro
        public function cancellalibro($titoloLibro){
        $query = "delete from libro where titolo = ? ";
         $stmt->prepare($query);
        if (!$stmt) {
            error_log("[inserisciLibro] impossibile" .
                    " inizializzare il prepared statement n 1");
            $mysqli->close();
            return false;
        }
    }
	


}

?>




