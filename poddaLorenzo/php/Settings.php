<?php


class Settings {

    // variabili di accesso per il database
    public static $db_host = 'localhost';
    public static $db_user = 'lorenzoPodda';
    public static $db_password = 'ippopotamo969';
    public static $db_name='amm14_lorenzoPodda';
    
    private static $appPath;

    /**
     * Restituisce il path relativo nel server corrente dell'applicazione
     */
    public static function getApplicationPath() {
        if (!isset(self::$appPath)) {
            // restituisce il server corrente
            switch ($_SERVER['HTTP_HOST']) {
                case 'localhost':
                    // configurazione locale
                    self::$appPath = 'http://' . $_SERVER['HTTP_HOST'] . '/progetto/poddaLorenzo/';
                    break;
                case 'spano.sc.unica.it':
                    // configurazione pubblica
                    self::$appPath = 'http://' . $_SERVER['HTTP_HOST'] . '/amm2014/lorenzoPodda/poddaLorenzo/';
                    break;

                default:
                    self::$appPath = '';
                    break;
            }
        }
        
        return self::$appPath;
    }

}

?>