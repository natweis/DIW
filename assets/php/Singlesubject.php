<?php

	use assets\php\Dbconnect;

	error_reporting(E_ALL);
	ini_set('display_errors', 'On');

	require_once("Dbconnect.php");

	class Singlesubject {
		private $picture = ("assets/img/Art_Images/images/works/square-medium/");
		private $data;
		// Variablen zum Einzelabruf
		private $subjectName;
		private $subjectID;
		// Variablen für Tabellenausgabe
		private $filename;
		private $artistID;
		private $firstname;
		private $lastname;
		private $title;
		private $artworkID;
		private $hits;


		function __construct($id){
			$db = new Dbconnect;
			$db -> connect();

			$sql = ("SELECT DISTINCT 	
									artworks.ImageFileName,artworks.ArtWorkID,artworks.Title,
									artists.ArtistID,artists.FirstName,artists.LastName,
									subjects.*
				FROM artworks,artists,artworksubjects,subjects 
				WHERE subjects.SubjectID = '$id'
				AND artworksubjects.ArtWorkID = artworks.ArtWorkID
				AND artworksubjects.SubjectID = subjects.SubjectId
				AND artworks.ArtistID = artists.ArtistID 
				ORDER BY artists.LastName ASC
				") or die ($db -> error);

			$result = $db -> prepareStatement($sql);
			$result -> execute();
			$this -> data = $result -> fetchAll();

			//einmalige Initialisierung der Klassenvariablen bei Konstuktoraufruf
			foreach ($this -> data as $row){
				$this -> subjectName = $row['SubjectName'];
				$this -> subjectID   = $row['SubjectID'];
			}

			$this -> hits = $result -> rowCount();

			$db -> close();
		}

		// Methoden

		public function getSubjectName(){
			return $this -> subjectName;
		}

		//Methode zur Ausgabe der Bilddateien
		public function getImages(){
			if ($this -> hits == 0){
				echo "<p>Keine Suchtreffer </p>";
			} else {
				echo '<h3>Wir haben '.$this -> hits.' Kunstwerke aus dem Themengebiet '.$this -> subjectName.'</h3>';
			}

			foreach ($this -> data as $row){
				$this -> filename  = $row['ImageFileName'];
				$this -> artistID  = $row['ArtistID'];
				$this -> fistname  = $row['FirstName'];
				$this -> lastname  = $row['LastName'];
				$this -> title     = $row['Title'];
				$this -> artworkID = $row['ArtWorkID'];

				echo '<tr>';
				// Hier wird peprüft, ob das benötigte Bild existiert, falls nicht, wird es durch ein Default-Bild ersetzt
				if (file_exists($this -> picture.$this -> filename.'.jpg')){
					echo '<td><img src="'.$this -> picture.$this -> filename.'.jpg"  alt="';
					echo $this -> title.'" title="'.$this -> title.'"></img></td>';
				} else {
					echo '<td><img src="'.$this -> picture.'default.jpg" alt="default_picture" title="default_picture"></img></td>';
				}

				echo '<td><a href="singleartist.php?id='.$this -> artistID.'">'.$this -> lastname.', '.$this -> fistname.'</a></td>';
				echo '<td><a href="singleartwork.php?id='.$this -> artworkID.'"> '.$this -> title.'</a></td>';
				echo '</tr>';

			}

		}

		//Prüfung der URL auf fehlende oder falsche id
		public function querycheck($id){
			$db = new Dbconnect;
			$db -> connect();

			$sql = ("SELECT * FROM `subjects` WHERE SubjectID='$id'") or die ($db -> error);

			$result = $db -> prepareStatement($sql);
			$result -> execute();
			$idcheck = $result -> rowCount();
			if ($idcheck == 1){
				return true;
			} else {
				return false;
			}

			$db -> close();
		}
	}
