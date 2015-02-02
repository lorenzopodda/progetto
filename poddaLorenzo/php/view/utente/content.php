<?php
switch ($vd->getSottoPagina()) {
    case 'acquisti':
        include_once 'acquisti.php';
        break;

    case 'carrello':
        include_once 'elementi?carrello.php';
        break;

    default:
        
?>
