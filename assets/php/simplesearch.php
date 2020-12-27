<?php

	error_reporting(E_ALL);
	ini_set('display_errors', 'On');
	
	require_once("Dbconnect.php");
	
	// Aufruf der Funktion über search_for($_POST["suchbegriff"])
	
	function search_for()
	{
		if(isset($_GET["suchfeld"]))
        {  
			// Database Verbindung
			$db = new Dbconnect;   
			$db->connect(); 
			
			// Parameterverarbeitung
			$picture = ("assets/img/Art_Images/images/works/square-medium/");
			$searchvalue = $_GET["suchfeld"];	
			$search = "{$searchvalue}%";
			
			$sql = ("SELECT *
					FROM artists,artworks 
					WHERE artists.ArtistID = artworks.ArtistID
					AND LastName LIKE '$search'
					OR Title LIKE '$search'
					
					ORDER BY LastName")
					or die ($db->error);
			
			$result = $db->prepareStatement($sql);
			$result->execute();
			
			// Ergebnisverarbeitung
			$data = $result->fetchAll();
			
			if(count($data)==0)
			{
				echo "<p>Keine Suchtreffer </p>";
			}
			else
			{
				echo '<h3>Ihre Suche ergab '.count($data).' Treffer</h3>';
				foreach($data AS $row)
				{
					echo '<tr>';
					// Hier wird peprüft, ob das benötigte Bild existiert, falls nicht, wird es durch ein Default-Bild ersetzt
					//Offline funktioniert es, muss am NAS liegen
					if(file_exists($picture.$row['ImageFileName'].'.jpg'))
					{
						echo '<td><img src="'.$picture.$row['ImageFileName'].'.jpg" alt="' .$row['Title'] .'" title="' .$row['Title'] .'"></img></td>';
					}
					else
					{
						echo '<td><img src="'.$picture .'default.jpg" alt="default_picture" title="default_picture"></img></td>';
					}
						
						echo '<td><a href="singleartist.php?id=' .$row['ArtistID'] .'">' . $row['LastName'] .', '. $row['FirstName'] . '</a></td>'; 
						echo '<td><a href="singleartwork.php?id=' . $row['ArtWorkID'] .'"> '. $row['Title'] . '</a></td>';
						echo '<td>'.$row['YearOfWork'].'</td>';
						echo '<td>'.$row['MSRP'].'</td>';
					echo '</tr>';
				}
				
				echo '</tbody>';
			}
					
			// Database Verbindung beenden
			$db->close();
		}else{
			echo "Bitte Suchbegriff eingeben";
		}
	}
	
?>