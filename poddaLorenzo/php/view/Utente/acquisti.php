<div id="acquisti">
	<p>Acquista!!!</p>
	<br/>
		<div id="prodotto">
			<?php if (count($libri) > 0) { ?>
    <table>
        <thead>
            <tr>
                <th class="libro-col-small">IdLibro</th>
                <th class="libro-col-large">Titolo</th>
                <th class="libro-col-large">nomeAutore</th>
                <th class="libro-col-large">cognomeAutore</th>
                <th class="libro-col-small">Genere</th>
                <th class="libro-col-small">Prezzo</th>
                <th class="libro-col-large">Acquista</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;

            foreach ($libri as $libro) {
                ?>
                <tr <?= $i % 2 == 0 ? 'class="alt-row"' : '' ?>>
                    <td><?= $libro->getListaLibri()->getIdLibro() ?></td>
                    <td><?= $libro->getListaLibri()->getTitoloLibro() ?></td>
                    <td><?= $libro->getListaLibri()-> getNomeAutore() ?></td>
                    <td><?= $libro->getListaLibri()->getCognomeAutore() ?></td>
                    <td><?= $libro->getListaLibri()->getGenere()?></td>
                    <td><?= $libro->getListaLibri()->getPrezzo() ?></td>
                    <td>
                       <button type="submit" method="post">Acquista</button> 
                    </td>
                </tr>
                <?php
                $i++;
            }
            ?>
        </tbody>
    </table>
<?php } else { ?>
    <p> Nessun libro inserito </p>
<?php } ?>
		</div>
</div>	
<div id="genere">
	<p>ricerca per genere/p>
            <form action="" method="">
				<label for="user">Inserisci genere da gercare</label>
				<input type="text" name="user" id="user" value=""/>
                                <br />
				<button type="submit">Cerca</button>
				
				</form>
</div>	
