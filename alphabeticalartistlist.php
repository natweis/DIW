<?php require_once("assets/php/Singleartist.php"); $temp = new Singleartist(0); ?>
<!DOCTYPE html>
<html lang="de">

<head>
    <title>Arthouse - Künstler A-Z</title>
	
	<!-- Import CSS Datein-->
	<?php include 'elemente/css-import.php'; ?>
	<link rel="stylesheet" href="assets/css/alphabet-styles.css">
	
</head>

<body>

	<!-- Import NAVBAR Datein-->
    <?php include 'elemente/newnavbar.php'; ?>
	
	<!-- CONTENT-BEREICH -->
    <div style="background: #444f51;">
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col-lg-8 offset-2">
                        <h2 class="text-center">Künstler A - Z</h2>
                        <p class="text-center">Hier finden Sie alle Künstler von denen wir aktuell Werke im Angebot haben in alphabetischer Reihenfolge. Schauen Sie doch einmal nach ob Ihr Lieblingskünstler dabei ist.</p>
                        <div class="row">
                            <div class="col">
                                <ul class="list-inline text-center">
								<!-- Dynamische Ausgabe der Linkliste A bis Z -->
								<?php 
									for($i = 0;$i < 26;$i++)
									{
										$letter = "A";
										//ord() -- gibt den Int Wert von $letter gemäß ASCII wieder
										$letter = ord($letter) + $i;
										// hier wird mittels der funktion chr() auf die entsprechende id der Div Elemente ab Zeile 49 verlinkt
										echo '<li class="list-inline-item"><a href="#'.$i.'">'.chr($letter).'</a></li>';
	
									}
								?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
				<!-- Dynamische Ausgabe der Ergebnistabelle inkl. Methodenaufruf -->
				<?php
					for($i = 0;$i < 26;$i++)
					{
						$letter = "A";
						//ord() -- gibt den Int Wert von $letter gemäß ASCII wieder
						$letter = ord($letter) + $i;
						
						echo '<div class="row text-center d-flex" id="'.$i.'">'."\n";
						echo '<div class="col-lg-11 col-xl-8 offset-2 offset-lg-2 d-flex">'."\n";
						echo '<div style="min-width:100%;" id="search-results-'.($i+1).'">'."\n";
							//chr() -- gibt das Zeichen zum Int-Wert, gemäß ASCII, wieder.
							echo '<h3 class="text-left">'.chr($letter).'</h3>'."\n";	
							echo '<ul class="list-unstyled text-left" >'."\n";
								echo $temp->artist_begin_with(chr($letter))."\n";
						echo '</ul>'."\n";
						echo '</div>'."\n";
						echo '</div>'."\n";
						echo '</div>'."\n";
					}
				?>

            </div>
        </div>
    </div>
	
	<!-- Import FOOTER Datein-->
    <?php include 'elemente/footer.php';	?>
	
	<!-- Import SCRIPT Datein-->
    <?php include 'elemente/script-import.php'; ?>
	
</body>
</html>