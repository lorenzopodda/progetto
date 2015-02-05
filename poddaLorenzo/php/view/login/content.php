<?php
switch ($vd->getSottoPagina()) {
    case 'login':
        include_once 'login.php';
        break;

    case 'registrazione':
        include_once 'registrazione.php';
        break;

    default:
}      
?>
			
		
	   

