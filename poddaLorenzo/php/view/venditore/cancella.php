<div id="sezioni">
	<li class=" <?= strpos($vd->getPagina(),'venditore') !== false || $vd->getContentFile() == null ? 'current_page_item' : ''?>"><a href="../php/view/venditore/venditore.php">Venditore</a></li>
	<li class=" <?= strpos($vd->getPagina(),'inserisci') !== false || $vd->getContentFile() == null ? 'current_page_item' : ''?>"><a href="../php/view/venditore/inserisci.php">Inserisci</a></li>
	<li><a href="#">Cancella</a></li>
	
</div>
<div id="sezione">
	<p>Cancella libro</p>
	<br/>
	<form action="venditore/cancella<?= $vd->scriviToken('?')?>" method="post">
        <input type="hidden" name="cmd" value="cancella"/>
	<label for="user">Titolo</label>
	<input type="text" name="titolo" id="titolo" value=""/>
	<br />
	<input type="submit" value="Cancella"/>
				
	</form>
</div>
