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
            
            from libreria.utente 
            
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

        $utente = self::caricaUtenteDaStmt($stmt);
        if (isset($utente)) {
            // ho trovato un utente
            $mysqli->close();
            return $utente;
        }

	

        // ora cerco un venditore
        $query = "select *
               
               from libreria.venditore 
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

        $venditore = self::caricaVenditoreDaStmt($stmt);
        if (isset($venditore)) {
            // ho trovato venditore
            $mysqli->close();
            return $venditore;
        }
    }


}

?>
