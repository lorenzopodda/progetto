<div id="sezioni">
	<li class=" <?= strpos($vd->getContentFile(),'venditore') !== false || $vd->getContentFile() == null ? 'current_page_item' : ''?>"><a href="../php/view/venditore/venditore.php">Venditore</a></li>
	<li class=" <?= strpos($vd->getContentFile(),'inserisci') !== false || $vd->getContentFile() == null ? 'current_page_item' : ''?>"><a href="../php/view/venditore/inserisci.php">Inserisci</a></li>
	<li><a href="#">Cancella</a></li>
	
</div>
<div id="sezione">
	<p>Cancella libro</p>
	<br/>
	<form action="" method="">
	<label for="user">Titolo</label>
	<input type="text" name="user" id="user" value=""/>
	<br />
	<button type="submit">Cancella</button>
				
	</form>
</div>
