<?php

include_once 'BaseController.php';
include_once basename(__DIR__) . '/../model/acquista.php';
include_once basename(__DIR__) . '/../model/libroFactory.php';


 // Controller che gestisce la modifica dei dati dell'applicazione relativa agli utenti

class utenteController extends BaseController {

    const acquista = 'acquista';

   
     //Costruttore
     
    public function __construct() {
        parent::__construct();
    }

    
     //Metodo per gestire l'input dell'utente.  
    public function handleInput(&$request) {

        // creo il descrittore della vista
        $vd = new ViewDescriptor();


        // imposto la pagina
        $vd->setPagina($request['page']);

        // imposto il token per impersonare un utente 
        $this->setImpToken($vd, $request);

        // gestion dei comandi
        // tutte le variabili che vengono create senza essere utilizzate 
        // direttamente in questo switch, sono quelle che vengono poi lette
        // dalla vista, ed utilizzano le classi del modello

        if (!$this->loggedIn()) {
            // utente non autenticato, rimando alla home
            $this->showLoginPage($vd);
        } else {
            // utente autenticato
            $user = userFactory::instance()->cercaUtentePerId(
                            $_SESSION[BaseController::user], $_SESSION[BaseController::role]);


            // verifico quale sia la pagina della categoria utente
           
            if (isset($request["subpage"])) {
                switch ($request["subpage"]) {

                    // visualizza libri disponibili all'acquisto
                    case 'acquisti':
                        $libro = libroFactory::instance()->getListaLibri($user);
                        $vd->setContentFile('acquisti');
                        break;

                    /**visualizzazione contenuto carrello
                    case 'ricerca':
                        
                        $vd->setContentFile('ricerca');
                        break;**/

                    
                    default:

                        $vd->setContentFile('home');
                        break;
                }
            }



            // gestione dei comandi inviati dall'utente
            if (isset($request["cmd"])) {
                // abbiamo ricevuto un comando
                switch ($request["cmd"]) {

                    // logout
                    case 'logout':
                        $this->logout($vd);
                        break;

                    
                }
            } else {
                // nessun comando
                $user = userFactory::instance()->cercaUtentePerId(
                                $_SESSION[BaseController::user], $_SESSION[BaseController::role]);
                $this->showHome($vd);
            }
        }

        // includo la vista
        require basename(__DIR__) . '/../view/master.php';
    }

    }
    

?>
