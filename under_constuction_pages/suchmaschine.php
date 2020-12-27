<!doctype html> 
<html>
<head>
       <title>Suchmaschine PHP</title>
</head>
<BODY BGCOLOR="#FFFFFF" style="font-family: verdana, helvetica, arial" topmargin="0" leftmargin="0" vlink="#0000FF" alink="#0000FF" link="#0000FF">
<form method = "post">
<input type="text" name="suchbegriff">
<input type="submit" name="abgeschickt">
<input type="reset">
</form>
</body>
</html>

<?php

require 'dbconnect.php';
$tabelle = 'artists';							// Auswahl der Tabelle in welcher gesucht werden soll
$suchbegriff = trim($_POST['suchbegriff']);		// speichert Benutzereingabe in der variable $suchbegriff und entfernt alle leerzeichen (weitere Security Features fehlen noch)
$suche = "%{$suchbegriff}%";					// Umwandlung des Suchbegriffes für LIKE Suche und speichern in der Variable $suche
// Suchen

$result=$db->query("SELECT * 
					FROM $tabelle 
					WHERE FirstName LIKE '$suche' 
					OR LastName LIKE '$suche' ")
					or die ($db->error);

// Ergebnisse zählen und Info ausgeben

if($result->num_rows){
		echo "<p>Passende Einträge zu ihrer Suche gefunden: ";
		echo $result->num_rows;
		echo " </p> ";
	}

// Suchergebnisse ausgeben

$datensatz = $result->fetch_all(MYSQLI_ASSOC);

// Ausgabeoption 1 = Nachname, Vorname
foreach($datensatz AS $zeile)
		{
			//echo '<br>';
			echo '<br>' . '<a href="#">' . $zeile['LastName'] .', '. $zeile['FirstName'] . '</a>';
		}
/*
// Ausgabeoption 2 = tabellarische Darstellung (Formatierung voa CSS notwendig)
// Tabellenkopf

echo "<table>";
echo "<tr>";
echo "<th>";
echo "Vorname";
echo "</th><th>";
echo "Nachname";
echo "</th> </tr>";

//Tabelle befüllen
foreach($datensatz AS $zeile)
	{
			echo "<tr>";
			echo '<td>' . $zeile['LastName'];
			echo '</td>';
			echo '<td>' . $zeile['FirstName'];
			echo '</td>';
	}
*/

// Aufräumen

echo "</table>";
$result->free();
$db->close();
?>