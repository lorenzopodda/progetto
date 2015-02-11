<?php

include_once basename(__DIR__) . '/../view/ViewDescriptor.php';
include_once basename(__DIR__) . '/../model/user.php';
include_once basename(__DIR__) . '/../model/userFactory.php';

/**
 * Controller che gestisce gli utenti non autenticati, 
 * fornendo le funzionalita' comuni anche agli altri controller
 *
 * @author Davide Spano
 */
class BaseController {

    const user = 'user';
    const role = 'role';
    const impersonato = '_imp';

    /**
     * Costruttore
     */
    public function __construct() {
        
    }

    /**
     * Metodo per gestire l'input dell'utente. Le sottoclassi lo sovrascrivono
     * @param type $request la richiesta da gestire
     */
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

        if (isset($request["cmd"])) {
            // abbiamo ricevuto un comando
            switch ($request["cmd"]) {
                case 'login':
                    $username = isset($request['user']) ? $request['user'] : '';
                    $password = isset($request['password']) ? $request['password'] : '';
                    $this->login($vd, $username, $password);
                    // questa variabile viene poi utilizzata dalla vista
                    if ($this->loggedIn())
                        $user = userFactory::instance()->cercaUtentePerId($_SESSION[self::user], $_SESSION[self::role]);
                    break;
                
                default : $this->showLoginPage();
            }
        } else {
            if ($this->loggedIn()) {
                //utente autenticato
                // questa variabile viene poi utilizzata dalla vista
                $user = userFactory::instance()->cercaUtentePerId($_SESSION[self::user], $_SESSION[self::role]);

                $this->showHome($vd);
            } else {
                // utente non autenticato
                $this->showLoginPage($vd);
            }
        }

        // richiamo la vista
        require basename(__DIR__) . '/../view/master.php';
    }

    /**
     * Verifica se l'utente sia correttamente autenticato
     * @return boolean true se l'utente era gia' autenticato, false altrimenti
     */
    protected function loggedIn() {
        return isset($_SESSION) && array_key_exists(self::user, $_SESSION);
    }

    /**
     * Imposta la vista master.php per visualizzare la pagina di login
     * @param ViewDescriptor $vd il descrittore della vista
     */
    protected function showLoginPage($vd) {
        // mostro la pagina di login
        $vd->setTitolo("Libreria-Login");
        $vd->setTitoloFile(basename(__DIR__) . '/../view/login/titolo.php');
        $vd->setContentFile(basename(__DIR__) . '/../view/login/content.php');
    }
    

    /**
     * Imposta la vista master.php per visualizzare la pagina di gestione dell'utente
     * @param ViewDescriptor $vd il descrittore della vista
     */
    protected function showHomeUtente($vd) {
        // mostro la home degli utenti

        $vd->setTitolo("Libreria-utente ");
        $vd->setTitoloFile(basename(__DIR__) . '/../view/utente/titolo.php');
        $vd->setContentFile(basename(__DIR__) . '/../view/utente/content.php');
    }

    /**
     * Imposta la vista master.php per visualizzare la pagina di gestione del venditore
     * @param ViewDescriptor $vd il descrittore della vista
     */
    protected function showHomeVenditore($vd) {
        // mostro la home del venditore
        $vd->setTitolo("Libreria-venditore");
           $vd->setTitoloFile(basename(__DIR__) . '/../view/venditore/titolo.php');
        $vd->setContentFile(basename(__DIR__) . '/../view/venditore/content.php');
    }


    /**
     * Seleziona quale pagina mostrare in base al ruolo dell'utente corrente
     * @param ViewDescriptor $vd il descrittore della vista
     */
    protected function showHome($vd) {
        $user = userFactory::instance()->cercaUtentePerId($_SESSION[self::user], $_SESSION[self::role]);
        switch ($user->getRuolo()) {
            case User::Utente:
                $this->showHomeUtente($vd);
                break;

            case User::Venditore:
                $this->showHomeVenditore($vd);
                break;
        }
    }

    /**
     * Imposta la variabile del descrittore della vista legato 
     * all'utente da impersonare nel caso sia stato specificato nella richiesta
     * @param ViewDescriptor $vd il descrittore della vista
     * @param array $request la richiesta
     */
    protected function setImpToken(ViewDescriptor $vd, &$request) {

        if (array_key_exists('_imp', $request)) {
            $vd->setImpToken($request['_imp']);
        }
    }

    /**
     * Procedura di autenticazione 
     * @param ViewDescriptor $vd descrittore della vista
     * @param string $username lo username specificato
     * @param string $password la password specificata
     */
    protected function login($vd, $username, $password) {
        // carichiamo i dati dell'utente

        $user = userFactory::instance()->caricaUtente($username, $password);
        if (isset($user) && $user->esiste()) {
            // utente autenticato
            $_SESSION[self::user] = $user->getId();
            $_SESSION[self::role] = $user->getRuolo();
            $this->showHome($vd);
        } else {
            $vd->setMessaggioErrore("Utente sconosciuto o password errata");
            $this->showLoginPage($vd);
        }
    }

    /**
     * Procedura di logout dal sistema 
     * @param type $vd il descrittore della pagina
     */
    protected function logout($vd) {
        // reset array $_SESSION
        $_SESSION = array();
        // termino la validita' del cookie di sessione
        if (session_id() != '' || isset($_COOKIE[session_name()])) {
            // imposto il termine di validita' al mese scorso
            setcookie(session_name(), '', time() - 2592000, '/');
        }
        // distruggo il file di sessione
        session_destroy();
        $this->showLoginPage($vd);
    }

   
}
?>
