<?php

	use assets\php\Dbconnect;

	error_reporting(E_ALL);
	ini_set('display_errors', 'On');

require_once("Dbconnect.php");
require_once("I_classDefault.php");
require_once("I_ART.php");

class Singleartist implements iClassDefault, iART
{
    const picture = ("assets/img/Art_Images/images/artists/medium/");
	const smallpicture = ("assets/img/Art_Images/images/works/square-medium/");
	
    private $data;
	private $id;
	// Variablen zum Einzelabruf
	private $firstName;
	private $lastName;
	private $desc;
	// Variablen für Tabelle
	private $yearOfBirth;
	private $yearOfDeath;
	private $nationality;
	private $moreinfo;
    	
	function __construct($id)
	{
		$db = new Dbconnect;
		$db->connect();
		
		$sql = ("SELECT DISTINCT * 
					FROM artists
					WHERE ArtistID = '$id'
				")
				or die ($db->error);
		
		$result = $db->prepareStatement($sql);
		$result->execute();
		$this->data = $result->fetchAll();
		
		//einmalige Initialisierung der Klassenvariablen bei Konstuktoraufruf
		foreach($this->data as $artist)
		{
			$this->firstName = $artist['FirstName'];
			$this->lastName = $artist['LastName'];
			$this->nationality =$artist['Nationality'];
			$this->yearOfBirth =$artist['YearOfBirth'];
			$this->yearOfDeath =$artist['YearOfDeath'];
			$this->desc = $artist['Details'];
			$this->moreinfo = $artist['ArtistLink'];
			$this->id = $artist['ArtistID'];
		}
				
		$db->close();
	}
	
	// Methoden
	
	public function getFullName() 
	{
		echo $this->firstName.' '.$this->lastName;
	}
	
	public function getImage()
	{
		// Vorprüfung ob die Bilddatei vorhanden ist, falls nicht erfolgt die Nutzung eines Standardbildes
		if(file_exists(self::picture.$this->id.'.jpg'))
			{
				echo self::picture.$this->id.'.jpg';
			}
			else
			{
				echo self::picture.'default.jpg';
			}
	}
	
	public function getSmallImage($file,$id)
	{
		// Vorprüfung ob die Bilddatei vorhanden ist, falls nicht erfolgt die Nutzung eines Standardbildes
		if(file_exists(self::smallpicture.$file.'.jpg'))
			{
				echo '<a href="singleartwork.php?id='.$id.'"><img src="' .self::smallpicture.$file.'.jpg" style="width:40%"></a>';
			}
			else
			{
				echo '<a href="singleartwork.php?id='.$id.'"><img src="' .self::smallpicture.'default.jpg" style="width:30%"></a>';
			}
	}
	
	public function getDescription()
	{
		// Vorprüfung ob ein Beschreibungstext vorhanden ist, falls nicht erfolgt die Nutzung eines Standardtextes
		if($this->desc == NULL)
		{
			echo 'Keine Beschreibung in der Datenbank vorhanden.'.'<br>';
			echo '<br>';
			echo "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.";
			echo "At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.";
			echo "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.";
			echo "At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.";
		}
		else
		{
			echo $this->desc;
		}
			
	}
	
	public function fillTable()
	{
		// Tabellenreihe Jahr
		echo '<tr><td class="text-left"><strong>Datum:</strong></td>';
		echo '<td class="text-left"><i>'.$this->yearOfBirth.' - '.$this->yearOfDeath .'</i></td></tr>';
		// Tabellenreihe Medium
		echo '<tr><td class="text-left"><strong>Nationalität:</strong></td>';
		echo '<td class="text-left"><i>'.$this->nationality.'</i></td></tr>';
		// Tabellenreihe Abmessungen
		echo '<tr><td class="text-left"><strong>Weitere Infos:</strong></td>';
		echo '<td class="text-left"><i><a href="'.$this->moreinfo.'">Mehr erfahren auf Wikipedia.org</a></i></td></tr>';
	}
	
	public function thumb()
	{
		$db = new Dbconnect;   
		$db->connect();
		
		$sql = ("SELECT * 
					FROM artworks
					WHERE ArtistID = '$this->id'
				")
				or die ($db->error);
		
		$result = $db->prepareStatement($sql);
		$result->execute();
		$this->data = $result->fetchAll();
		
		
		foreach($this->data as $row)
		{
			$file = $row['ImageFileName'];
			$year = $row['YearOfWork'];
			$title = $row['Title'];
			$workID = $row['ArtWorkID'];
			
			echo '<div class="col-md-3">';
			echo '<div class="thumbnail">';
			$this->getSmallImage($file,$workID);
			echo '<div class="caption">';
			echo '<a href="singleartwork.php?id='.$workID.'">'.$title.', '.$year.'</a><br>';
			echo '<button class="btn btn-primary" type="button"><i class="fa fa-heart"></i>Auf die Wunschliste</button>';
			echo '<button class="btn btn-primary" type="button"><i class="fa fa-eye"></i><a href="singleartwork.php?id='.$workID.'">Anzeigen</a></button>';
			echo '</div></div></div>';
		}
				
		$db->close();
	}
	
	public function querycheck($id)
    {
        $db = new Dbconnect;   
        $db->connect();
        
        $sql = ("SELECT * FROM artists WHERE ArtistID='$id'")
                or die ($db->error);
        
        $result = $db->prepareStatement($sql);
        $result->execute();
		
		// Prüfung ob zu dieser ID Ergebnisse aus der SQL Abfrage vorliegen
        $idcheck=$result->rowCount();
		
        if($idcheck === 1)
        {
            return true;
        }
		else
		{
            return false;
        }      
        
        $db->close();
    }
	
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
		
		if(count($data)===0)
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
	
}
