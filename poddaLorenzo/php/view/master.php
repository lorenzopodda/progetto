<?php
include_once 'ViewDescriptor.php';
include_once basename(__DIR__) . '/../Settings.php';


    ?>
    <!DOCTYPE html>
    <!-- 
         pagina master, contiene tutto il layout della applicazione 
         le varie pagine vengono caricate a "pezzi" a seconda della zona
         del layout:
         - Titolo (header)  
         - content (la parte centrale con il contenuto)
          Queste informazioni sono manentute in una struttura dati, chiamata ViewDescriptor
          la classe contiene anche le stringhe per i messaggi di feedback per 
          l'utente (errori e conferme delle operazioni)
    -->
    <html>
        <head>
            <meta http-equiv="content-type" content="text/html; charset=utf-8" />
            <title><?= $vd->getTitolo() ?></title>
           <base href="<?= Settings::getApplicationPath() ?>php/"/>
            
            <meta name="description" content="Una pagina per l'acquisto di libri" />
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
                <div id="titolo">
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
			
		</div>
            </div>
        </body>
    </html>
    <?php

?>





