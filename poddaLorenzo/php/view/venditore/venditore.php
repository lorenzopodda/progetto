<div id="sezioni">
	<li class=" <?= strpos($vd->getPagia(),'inserisci') !== false || $vd->getContentFile() == null ? 'current_page_item' : ''?>"><a href="../php/view/Venditore/inserisci.php">Inserisci</a></li>
	<li class=" <?= strpos($vd->getPagina(),'cancella') !== false || $vd->getContentFile() == null ? 'current_page_item' : ''?>"><a href="../php/view/Venditore/cancella.php">Cancella</a></li>
	
</div>
<div id="sezione">
	<p>In questa sezione sara' possibile inserire nuovi libri, cancellarne e visualizzare lo stato degli ordini</p>
</div>
