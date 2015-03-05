<div id="sezioni">
	<li class=" <?= strpos($vd->getPagina(),'venditore') !== false || $vd->getContentFile() == null ? 'current_page_item' : ''?>"><a href="../php/view/Venditore/venditore.php">Venditore</a></li>
	<li><a href="#">Inserisci</a></li>
	<li class=" <?= strpos($vd->getPagina(),'cancella') !== false || $vd->getContentFile() == null ? 'current_page_item' : ''?>"> <a href="../php/view/Venditore/cancella.php">Cancella</a></li>
	
</div>
<div id="sezione">
	<p>Inserisci nuovo libro</p>
	<br/>
	<form action="venditore/inserisci<?= $vd->scriviToken('?')?>" method="post">
                                <label for="user">Titolo</label>
				<input type="text" name="titolo" id="titolo" value=""/>
				<br />
				<label for="user">Prezzo</label>
				<input type="number" name="prezzo" id="prezzo" value=""/>
				<br />
				<label for="user">NomeAutore</label>
				<input type="text" name="nomeAutore" id="nomeAutore" value=""/>
				<br />
				<label for="user">CognomeAutore</label>
				<input type="text" name="cognomeAutore" id="cognomeAutore" value=""/>
				<br />
				<label for="user">Genere</label>
				<input type="text" name="genere" id="genere" value=""/>
				<button type="submit" name="cmd" value="inserisci">Inserisci</button>
				
	</form>
</div>
