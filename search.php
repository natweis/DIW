<!DOCTYPE html>
<html lang="de">

<head>
    <title>Arthouse - Über Uns</title>
	
	<!-- Import CSS Datein-->
	<?php include 'elemente/css-import.php'; ?>
	<link rel="stylesheet" href="assets/css/search-styles.css">
	
</head>

<body>

	<!-- Import NAVBAR Datein-->
    <?php include 'elemente/newnavbar.php'; ?>
	
	<!-- CONTENT-BEREICH -->
	
    <div class="bg-search">
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col-5 col-lg-5 offset-4">
                        <h3>&gt;&gt; einfache Suche</h3>
                        <form>
							<input class="form-control float-left" type="search" placeholder="Suchtext hier eingeben...">
						</form>
						<button class="btn" type="submit">Suche starten</button>
                        <ul class="list-unstyled">
                            <li class="text-left">&gt;&gt; Suchbegriff im Feld oben eingeben.</li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5 col-lg-5 offset-4">
                    <form id="advancedsearch" method="post">
                        <h3>&gt;&gt; Detailsuche</h3>
                        <div class="custom-control custom-switch">
							<label class="float-left" id="and">Kunstwerk</label>
							<input class="custom-control-input" type="checkbox" id="formCheck-1">
							<label class="custom-control-label" id="or" for="formCheck-1">Künstler</label>
						</div>
                        <ul class="list-unstyled">
							<input class="form-control" type="search" placeholder="Name des Künstlers/Kunstwerk ...">
							<li class="text-left">&gt;&gt; In welchem Zeitraum?</li>
                            <label class="text-left">von <input type="number" min="1" max="2020" step="1" value="1266"></label>
                            <label class="text-left">bis <input type="number" min="1" max="2020" step="1" value="2020"></label>
                            <select name='Rolle' required>
                                <option selected > $this->state</option>
                                <option >Admin</option>
                                <option >gesperrt</option>
                                <option value='gelöscht'>Löschen!</option>
                                </select>
                            </ul>
                        <button class="btn" type="submit" name="submitadvancedsearch">Detailsuche starten</button>
                            <ul class="list-unstyled">
                                <li class="text-left">&gt;&gt; Wählen Sie zwischen AND &amp; OR Suche</li>
                                <li class="text-left small">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; AND = alle eingegebenen Suchbegriffe treffen zu</li>
                                <li class="text-left small">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; OR&nbsp; &nbsp; = mindestens einer der eingegebenen Suchbegriffe trifft zu</li>
                                <li class="text-left">&gt;&gt; Suchbegriff(e) in den Feldern oben eingeben.</li>
                                <li>&gt;&gt; Suche durch drücken des Buttons starten.&nbsp;</li>
                                <li>&gt;&gt; Sie werden zu passenden Suchergebnissen weitergeleitet.</li>
                            </ul></form>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
	<!-- Import FOOTER Datein-->
    <?php include 'elemente/footer.php';	?>
	
	<!-- Import SCRIPT Datein-->
    <?php include 'elemente/script-import.php'; ?>
	
</body>
</html>