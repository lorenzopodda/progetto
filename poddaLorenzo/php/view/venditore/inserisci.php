<div id="sezioni">
	<li class=" <?= strpos($vd->getContentFile(),'venditore') !== false || $vd->getContentFile() == null ? 'current_page_item' : ''?>"><a href="../php/view/venditore/venditore.php">Venditore</a></li>
	<li><a href="#">Inserisci</a></li>
	<li class=" <?= strpos($vd->getContentFile(),'cancella') !== false || $vd->getContentFile() == null ? 'current_page_item' : ''?>"> <a href="../php/view/venditore/cancella.php">Cancella</a></li>
	
</div>
<div id="sezione">
	<p>Inserisci nuovo libro</p>
	<br/>
	<form action="post" method="venditore/inserisci<?= $vd->scriviToken('?')?>">
                                <label for="user">Titolo</label>
				<input type="text" name="user" id="titolo" value=""/>
				<br />
				<label for="user">Prezzo</label>
				<input type="number" name="user" id="prezzo" value=""/>
				<br />
				<label for="user">NomeAutore</label>
				<input type="text" name="user" id="nomeAutore" value=""/>
				<br />
				<label for="user">CognomeAutore</label>
				<input type="text" name="user" id="cognomeAutore" value=""/>
				<br />
				<label for="user">Genere</label>
				<input type="text" name="user" id="genere" value=""/>
				<button type="submit" name="cmd" value="inserisci">Inserisci</button>
				
	</form>
</div>
