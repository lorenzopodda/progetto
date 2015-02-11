<?php

include_once 'BaseController.php';
include_once basename(__DIR__) . '/../model/vende.php';
include_once basename(__DIR__) . '/../model/libroFactory.php';


/**
 * Controller che gestisce la modifica dei dati dell'applicazione relativa ai venditori
 */
class VenditoreController extends BaseController {

    const vende = 'vende';

    public function __construct() {
        parent::__construct();
    }

    /**
     * Metodo per gestire l'input dell'utente. 
     * @param type $request la richiesta da gestire
     */
    public function handleInput(&$request) {

        // creo il descrittore della vista
        $vd = new ViewDescriptor();

        // imposto la pagina
        $vd->setPagina($request['page']);

        // imposto il token per impersonare un utente (nel lo stia facendo)
        $this->setImpToken($vd, $request);

        if (!$this->loggedIn()) {
            // utente non autenticato, rimando alla home
            $this->showLoginPage($vd);
        } else {
            // utente autenticato
            $user = userFactory::instance()->cercaUtentePerId(
                    $_SESSION[BaseController::user], $_SESSION[BaseController::role]);

            // verifico quale sia la sottopagina della categoria
            // Docente da servire ed imposto il descrittore 
            // della vista per caricare i "pezzi" delle pagine corretti
            // tutte le variabili che vengono create senza essere utilizzate 
            // direttamente in questo switch, sono quelle che vengono poi lette
            // dalla vista, ed utilizzano le classi del modello
            if (isset($request["subpage"])) {
                switch ($request["subpage"]) {

                    // pagina iniziale sezione venditore
                    case 'venditore':
                        
                        $vd->setPagina('venditore');
                        break;

                    // inserimento nuovi libri
                    case 'inserisci':
                        
                        $vd->setPagina('inserisci');
                        break;
	
		    //cancellare libri
		    case 'cancella':
                        
                        $vd->setPagina('cancella');
                        break;

                    default:
                        $vd->setPagina('home');
                        break;
                }
            }
        }

            // gestione dei comandi inviati dal venditore
            if (isset($request["cmd"])) {

                switch ($request["cmd"]) {

                    // logout
                    case 'logout':
                        $this->logout($vd);
                        break;

                   
                }
}else {
                // nessun comando
                $user = userFactory::instance()->cercaUtentePerId(
                                $_SESSION[BaseController::user], $_SESSION[BaseController::role]);
                $this->showHome($vd);
            }
}
     

        }
    
?>
