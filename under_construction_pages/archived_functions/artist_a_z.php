<?php
	
	require_once("sqlverbindung.php");
	
	function artist_begin_with($letter)
	{
		// Database Verbindung
		$db = new Dbconnect;   
        $db->connect(); 
		
		// Parameterverarbeitung
		$searchvalue = $letter;	
		$search = "{$searchvalue}%";
		
		$sql = ("SELECT *
				FROM artists 
				WHERE LastName LIKE '$search' ")
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
			foreach($data AS $row)
			{
				echo '<li><a href="singleartist.php?id=' .$row['ArtistID'] .'">' . $row['LastName'] .', '. $row['FirstName'] . '</a></i>';
			}
		}
				
		// Database Verbindung beenden
		$db->close();
	}
	
?>