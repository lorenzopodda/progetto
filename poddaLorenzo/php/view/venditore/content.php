<?php
switch ($vd->getPagina()) {
    case 'venditore':
        include_once 'venditore.php';
        break;

    case 'inserisci':
        include_once 'inserisci.php';
        break;

    case 'cancella':
        include_once 'cancella.php';
        break;
    
    default:
        
}     
?>	
	   

