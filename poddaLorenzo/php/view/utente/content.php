<?php
switch ($vd->getContentFile()) {
    case 'acquisti':
        include_once 'acquisti.php';
        break;

    default:
        
        ?>
        <h2 class="icon-title" id="h-home">Pannello di Controllo</h2>
        <p>
            Benvenuto, <?= $user->getNome() ?>
        </p>
        <p>
            Scegli una fra le seguenti sezioni:
        </p>
        <ul class="panel">
            <li><a href="utente/acquista<?= $vd->scriviToken('?')?>" id="pnl-acquista">
                    Acquista
                </a>
            </li>
            
        </ul>
        <?php
        break;
}   
?>
