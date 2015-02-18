<?php

include_once 'user.php';
include_once 'venditore.php';
include_once 'utente.php';
include_once 'Db.php';
/**
 * Classe per la creazione degli utenti del sistema

 */
class userFactory {

    private static $singleton;

    private function __constructor() {
        
    }

    /**
     * Restiuisce un singleton per creare utenti
     * @return \UserFactory
     */
    public static function instance() {
        if (!isset(self::$singleton)) {
            self::$singleton = new userFactory();
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
        
        $query = "select utente.IdUtente utente_id,
                            utente.Username utente_username,
                            utente.PW utente_password,
                            utente.Nome utente_nome,
                            utente.Cognome utente_cognome,
                            utente.Indirizzo utente_indirizzo,
                            utente.email utente_email,
                            utente.credito utente_credito
            
            from utente 
            
            where utente.Username = ? and utente.PW = ?";
        $stmt = $mysqli->stmt_init();
        $stmt->prepare($query);
        if (!$stmt) {
            error_log("[loadUser] impossibile" .
                    " inizializzare il prepared statement");
            $mysqli->close();
            return null;
        }

       if (!$stmt->bind_param('ss',$username, $password)) {
            error_log("[loadUser] impossibile effettuare il binding in input");
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
        $query = "select venditore.IdVenditore venditore_id,
                         venditore.Username venditore_username,
                         venditore.PW venditore_password,
                         venditore.Nome venditore_nome,
                         venditore.Cognome venditore_cognome,
                         venditore.Email venditore_email
               
               from venditore 
               where vendtitore.Username = ? and venditore.PW = ?";

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
    /**
     * Cerca un utente  per id
     * @param int $id
     * @return utente un oggetto utente nel caso sia stato trovato,
     * NULL altrimenti
     */
    public function cercaUtentePerId($id, $role) {
        $intval = filter_var($id, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);
        if (!isset($intval)) {
            return null;
        }
        $mysqli = Db::getInstance()->connectDb();
        if (!isset($mysqli)) {
            error_log("[cercaUtentePerId] impossibile inizializzare il database");
            $mysqli->close();
            return null;
        }

        switch ($role) {
            case User::Utente:
                $query = "select utente.IdUtente utente_id,
                            utente.Username utente_username,
                            utente.PW utente_password,
                            utente.Nome utente_nome,
                            utente.Cognome utente_cognome,
                            utente.Indirizzo utente_indirizzo,
                            utente.email utente_email,
                            utente.credito utente_credito
                            from utente where utente.IdUtente = ?";
                $stmt = $mysqli->stmt_init();
                $stmt->prepare($query);
                if (!$stmt) {
                    error_log("[cercaUtentePerId] impossibile" .
                            " inizializzare il prepared statement");
                    $mysqli->close();
                    return null;
                }

                if (!$stmt->bind_param('i', $intval)) {
                    error_log("[cercaUtentePerId] impossibile" .
                            " effettuare il binding in input");
                    $mysqli->close();
                    return null;
                }

                return self::caricaUtenteDaStmt($stmt);
                break;

            case User::Venditore:
                $query = "select venditore.IdVenditore venditore_id,
                         venditore.Username venditore_username,
                         venditore.PW venditore_password,
                         venditore.Nome venditore_nome,
                         venditore.Cognome venditore_cognome,
                         venditore.Email venditore_email 
                         from venditore where venditore.IdVenditore = ?";

                $stmt = $mysqli->stmt_init();
                $stmt->prepare($query);
                if (!$stmt) {
                    error_log("[cercaVenditorePerId] impossibile" .
                            " inizializzare il prepared statement");
                    $mysqli->close();
                    return null;
                }

                if (!$stmt->bind_param('i', $intval)) {
                    error_log("[loadUser] impossibile" .
                            " effettuare il binding in input");
                    $mysqli->close();
                    return null;
                }

                $toRet =  self::caricaVenditoreDaStmt($stmt);
                $mysqli->close();
                return $toRet;
                break;

            default: return null;
        }
    }
   
     /**
     * Crea un utente da una riga del db
     * @param type $row
     * @return \Utente
     */
    public function creaUtenteDaArray($row) {
        $utente = new Utente();
        $utente->setId($row['utente_id']);
        $utente->setUsername($row['utente_username']);
        $utente->setPassword($row['utente_password']);
        $utente->setNome($row['utente_nome']);
        $utente->setCognome($row['utente_cognome']);
        $utente->setIndirizzo($row['utente_indirizzo']);
        $utente->setEmail($row['utente_email']);
        $utente->setCredito($row['utente_credito']);
        $utente->setRuolo(User::Utente);
        
        return $utente;
        
    }

    /**
     * Crea un venditore da una riga del db
     * @param type $row
     * @return \Venditore
     */
    public function creaVenditoreDaArray($row) {
        $venditore = new Venditore();
        $venditore ->setId($row['venditore_id']);
        $venditore ->setUsername($row['venditore_username']);
        $venditore ->setPassword($row['venditore_password']);
        $venditore ->setNome($row['venditore_nome']);
        $venditore ->setCognome($row['venditore_cognome']);
        $venditore ->setEmail($row['venditore_email']);
        $venditore ->setRuolo(User::Venditore);
        
        return $venditore ;
    }
    
    /**
     * Carica un venditore eseguendo un prepared statement
     * @param mysqli_stmt $stmt
     * @return null
     */
    private function caricaVenditoreDaStmt(mysqli_stmt $stmt) {

        if (!$stmt->execute()) {
            error_log("[caricaVenditoreDaStmt] impossibile".
                    " eseguire lo statement");
            return null;
        }

        $row = array();
        $bind = $stmt->bind_result(
                $row['venditore_id'], 
                $row['venditore_usename'], 
                $row['venditore_password'], 
                $row['venditore_nome'], 
                $row['venditore_cognome'],
                $row['venditore_email']);
        if (!$bind) {
            error_log("[caricaVenditoreDaStmt] impossibile" .
                    " effettuare il binding in output");
            return null;
        }

        if (!$stmt->fetch()) {
            return null;
        }

        $stmt->close();

        return self::creaVenditoreDaArray($row);
    }
    
    /**
     * Carica uno utente eseguendo un prepared statement
     * @param mysqli_stmt $stmt
     * @return null
     */
    private function caricaUtenteDaStmt(mysqli_stmt $stmt) {

        if (!$stmt->execute()) {
            error_log("[caricaUtenteDaStmt] impossibile" .
                    " eseguire lo statement");
            return null;
        }

        $row = array();
        $bind = $stmt->bind_result(
                $row['utente_id'], 
                $row['utente_username'], 
                $row['utente_password'], 
                $row['utente_nome'], 
                $row['utente_cognome'], 
                $row['utente_indirizzo'], 
                $row['studenti_email'], 
                $row['studenti_credito']);
        if (!$bind) {
            error_log("[caricaUtenteDaStmt] impossibile" .
                    " effettuare il binding in output");
            return null;
        }

        if (!$stmt->fetch()) {
            return null;
        }

        $stmt->close();

        return self::creaUtenteDaArray($row);
    }

}

?>
