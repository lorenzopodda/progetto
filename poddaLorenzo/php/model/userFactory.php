<?php

include_once 'user.php';
include_once 'venditore.php';
include_once 'utente.php';

/**
 * Classe per la creazione degli utenti del sistema

 */
class UserFactory {

    private static $singleton;

    private function __constructor() {
        
    }

    /**
     * Restiuisce un singleton per creare utenti
     * @return \UserFactory
     */
    public static function instance() {
        if (!isset(self::$singleton)) {
            self::$singleton = new UserFactory();
        }

        return self::$singleton;
    }

/**
     * Carica un utente tramite username e password
     * @param string $username
     * @param string $password
     * @return \venditore|\utente
     */
    public function caricaUtente($username, $password) {


        $mysqli = Db::getInstance()->connectDb();
        if (!isset($mysqli)) {
            error_log("[loadUser] impossibile inizializzare il database");
            $mysqli->close();
            return null;
        }

        // cerco prima nella tabella utente
        $query = "select * 
            
            from negozio_online.utente 
            
            where utente.username = ? and utente.pw = ?";
        $stmt = $mysqli->stmt_init();
        $stmt->prepare($query);
        if (!$stmt) {
            error_log("[loadUser] impossibile" .
                    " inizializzare il prepared statement");
            $mysqli->close();
            return null;
        }

        if (!$stmt->bind_param('ss', $username, $password)) {
            error_log("[loadUser] impossibile" .
                    " effettuare il binding in input");
            $mysqli->close();
            return null;
        }

        $studente = self::caricaStudenteDaStmt($stmt);
        if (isset($studente)) {
            // ho trovato uno studente
            $mysqli->close();
            return $studente;
        }

	}

        // ora cerco un docente
        $query = "select *
               
               from negozio_online.venditore 
               where vendtitore.username = ? and venditore.pw = ?";

        $stmt = $mysqli->stmt_init();
        $stmt->prepare($query);
        if (!$stmt) {
            error_log("[loadUser] impossibile" .
                    " inizializzare il prepared statement");
            $mysqli->close();
            return null;
        }

        if (!$stmt->bind_param('ss', $username, $password)) {
            error_log("[loadUser] impossibile" .
                    " effettuare il binding in input");
            $mysqli->close();
            return null;
        }

        $docente = self::caricaDocenteDaStmt($stmt);
        if (isset($docente)) {
            // ho trovato venditore
            $mysqli->close();
            return $docente;
        }
    }


}

?>
