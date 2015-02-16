<?php
switch ($vd->getContentFile()) {
    case 'venditore':
        include 'venditore.php';
        break;

    case 'inserisci':
        include 'inserisci.php';
        break;

    case 'cancella':
        include 'cancella.php';
        break;
    ?>
    <?php default: ?>
         <h2 class="icon-title" id="h-home">Pannello di Controllo</h2>
        <p>
            Benvenuto, <?= $user->getNome() ?>
        </p>
        <p>
            Scegli una fra le seguenti sezioni:
        </p>
        <ul class="panel">
            
            <li><a href="venditore/venditore<?= $vd->scriviToken('?')?>" id="pnl-iscrizione">home_venditore</a></li>
            <li><a href="docente/inserisci<?= $vd->scriviToken('?')?>" id="pnl-libretto">Inserisci</a></li>
            <li><a href="docente/cancella<?= $vd->scriviToken('?')?>" id="pnl-cerca">Cancella</a></li>
        </ul>
        <?php
        break;
        
}     
?>	
	   

