<?php


include_once 'controller/BaseController.php';
include_once 'controller/utenteController.php';
include_once 'controller/VenditoreController.php';


// punto unico di accesso all'applicazione
FrontController::dispatch($_REQUEST);

/**
 * Classe che controlla il punto unico di accesso all'applicazione
 */
class FrontController {

    /**
     * Gestore delle richieste al punto unico di accesso all'applicazione
     */
    public static function dispatch(&$request) {
        // inizializziamo la sessione 
        session_start();
        if (isset($request["page"])) {

            switch ($request["page"]) {
                case "login":
                    // la pagina di login e' accessibile a tutti,
                    // la facciamo gestire al BaseController
                    $controller = new BaseController();
                    $controller->handleInput($request);
                    break;

                // utente
                case 'Utente':
                    // la pagina degli utenti e' accessibile solo agli utenti
                    
                    // il controllo viene fatto dal controller utente
                    $controller = new utenteController();
                    if (isset($_SESSION[BaseController::role]) &&
                        $_SESSION[BaseController::role] != User::Utente) {
                        self::write403();
                    }
                    $controller->handleInput($request);
                    break;

                // venditore
                case 'Venditore':
                    // la pagina del venditore e' accessibile solo al venditore
                    
                    // il controllo viene fatto dal controller venditore
                    $controller = new VenditoreController();
                    if (isset($_SESSION[BaseController::role]) &&
                        $_SESSION[BaseController::role] != User::Venditore)  {
                        self::write403();
                    }
                    $controller->handleInput($request);
                    break;

                default:
                    self::write404();
                    break;
            }
        } else {
            self::write404();
        }
    }

    /**
     * Crea una pagina di errore quando il path specificato non esiste
     */
    public static function write404() {
        // impostiamo il codice della risposta http a 404 (file not found)
        header('HTTP/1.0 404 Not Found');
        $titolo = "File non trovato!";
        $messaggio = "La pagina che hai richiesto non &egrave; disponibile";
        include_once('error.php');
        exit();
    }

    /**
     * Crea una pagina di errore quando l'utente non ha i privilegi 
     * per accedere alla pagina
     */
    public static function write403() {
        // impostiamo il codice della risposta http a 404 (file not found)
        header('HTTP/1.0 403 Forbidden');
        $titolo = "Accesso negato";
        $messaggio = "Non hai i diritti per accedere a questa pagina";
        $login = true;
        include_once('error.php');
        exit();
    }

}

?>