<?php
switch ($vd->getSottoPagina()) {
    case 'amministratore':
        include_once 'amministratore.php.php';
        break;

    case 'inserisci':
        include_once 'inserisci.php';
        break;

    case 'cancella':
        include_once 'cancella.php';
        break;
    case 'ordini':
        include_once 'ordini.php';
        break;
    default:
        
        ?>	
	   

