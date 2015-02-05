<?php
/**include_once 'ViewDescriptor.php';
include_once basename(__DIR__) . '/../Settings.php';**/

//if (!$vd->isJson()) {
    ?>
    <!DOCTYPE html>
    <!-- 
         pagina master, contiene tutto il layout della applicazione 
         le varie pagine vengono caricate a "pezzi" a seconda della zona
         del layout:
         - logo (header)
         - menu (i tab)
         - leftBar (sidebar sinistra)
         - content (la parte centrale con il contenuto)
         - rightBar (sidebar destra)
         - footer (footer)

          Queste informazioni sono manentute in una struttura dati, chiamata ViewDescriptor
          la classe contiene anche le stringhe per i messaggi di feedback per 
          l'utente (errori e conferme delle operazioni)
    -->
    <html>
        <head>
            <meta http-equiv="content-type" content="text/html; charset=utf-8" />
            <title><?= $vd->getTitolo() ?></title>
           
            <meta name="keywords" content="AMM esami docente" />
            <meta name="description" content="Una pagina per gestire le funzioni dei docenti" />
            <link href="../css/stile.css" rel="stylesheet" type="text/css" media="screen" />
            <?php
            foreach ($vd->getScripts() as $script) {
                ?>
                <script type="text/javascript" src="<?= $script ?>"></script>
                <?php
            }
            ?>
        </head>
        <body>
            <div id="pagina">
                <?php
                        $titolo = $vd->getTitoloFile();
                        require "$titolo";
                ?>
		    
             </div>

                <!-- contenuto -->
                <div id="content">
                    <?php
                        $content = $vd->getContentFile();
                        require "$content";
                ?> 

                </div>

                <div class="clear">
                </div>
		<!--  footer -->
		<div id=footer>
			<p>Libreria online, via Flumendosa 14 Cagliari</p>
			<p> Tel 0485/525255 Fax 0485/525256 </p>
			<div class="validator">
                        <p>
                            <a href="http://validator.w3.org/check/referer" class="xhtml" title="Questa pagina contiene HTML valido">
                                <abbr title="eXtensible HyperText Markup Language">HTML</abbr> Valido</a>
                            <a href="http://jigsaw.w3.org/css-validator/check/referer" class="css" title="Questa pagina ha CSS validi">
                                <abbr title="Cascading Style Sheets">CSS</abbr> Valido</a>
                        </p>
                    </div>
		</div>
            </div>
        </body>
    </html>
    <?php
/**} else {

    header('Cache-Control: no-cache, must-revalidate');
    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
    header('Content-type: application/json');
    
    $content = $vd->getContentFile();
    require "$content";
}**/
?>





