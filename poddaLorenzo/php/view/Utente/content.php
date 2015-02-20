<?php
switch ($vd->getContentFile()) {
    case 'acquisti':
        include 'acquisti.php';
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
            <li><a href="utente/acquisti<?= $vd->scriviToken('?')?>" id="pnl-acquista">
                    Acquista
                </a>
            </li>
            
        </ul>
        <?php
        break;
}   
?>
