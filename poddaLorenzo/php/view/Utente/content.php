<?php
switch ($vd->getContentFile()) {
    case 'acquisti':
        include 'acquisti.php';
        break;
?>
   <?php default: ?>
        
        
        <h2>Pannello di Controllo</h2>
        <p>
            Benvenuto, <?= $user->getNome() ?>
        </p>
        <p>
            Scegli una fra le seguenti sezioni:
        </p>
        <ul>  
            <li><a href="Utente/acquisti<?= '?'.$vd->scriviToken()?>">
                    Acquista
                </a>
            </li>
            
        </ul>
        <?php
        break;
}   
?>
