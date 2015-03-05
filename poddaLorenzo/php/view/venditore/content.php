<?php
switch ($vd->getSottoPagina()) {
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
         <h2>Pannello di Controllo</h2>
        <p>
            Benvenuto, <?= $user->getNome() ?>
        </p>
        <p>
            Scegli una fra le seguenti sezioni:
        </p>
        <ul>
            
            <li><a href="venditore/venditore">home_venditore</a></li>
            <li><a href="venditore/inserisci">Inserisci</a></li>
            <li><a href="venditore/cancella">Cancella</a></li>
        </ul>
        <?php
        break;
        
}     
?>	
	   

