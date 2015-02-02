<?php

include_once 'genere.php';
include_once 'utente.php';
include_once 'libro.php';
include_once 'acquista.php';
include_once 'autore.php';

/**
 * Classe per la creazione degli acquisti del sistema
 */
class acquistiFactory {

    private static $singleton;

    private function __constructor() {
        
    }

    /**
     * Restiuisce un singleton per creare gli acquisti
     * @return \UserFactory
     */
    public static function instance() {
        if (!isset(self::$singleton)) {
            self::$singleton = new acquistiFactory();
        }

        return self::$singleton;
    }

 /**
     * Restituisce tutti gli acquisti esistenti
     */
    public function &getAcquisti() {
        $mysqli = Db::getInstance()->connectDb();
        if (!isset($mysqli)) {
            error_log("[getAcquisti] impossibile inizializzare il database");
            return array();
        }

        $query = "select nTransazione, titolo, prezzo, nome, cognome from
	negozio_online.utente join negozio_online.acquista on codiceUtente=codU 
	join negozio_online.libro on codLibro=codL";
        $stmt = $mysqli->stmt_init();
        $stmt->prepare($query);
        if (!$stmt) {
            error_log("[getAcquisti] impossibile" .
                    " inizializzare il prepared statement");
            $mysqli->close();
            return array();
        } 
        
        $toRet =  self::inizializzaListaAcquisti($stmt);
        $mysqli->close();
        return $toRet;
    }

}

?>
