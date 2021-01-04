<?php


	use assets\php\Dbconnect;

	error_reporting(E_ALL);
	ini_set('display_errors', 'On');

	require_once("Dbconnect.php");
	require_once("I_classDefault.php");

	class Singlegenre implements iClassDefault {
		const picture = ("assets/img/Art_Images/images/works/square-medium/");

		private $data;
		// Variablen zum Einzelabruf
		private $genreName;
		private $desc;
		private $wikilink;
		private $genreID;
		private $eraNr;
		// Variablen für Tabellenausgabe
		private $filename;
		private $artistID;
		private $firstname;
		private $lastname;
		private $title;
		private $artworkID;
		private $hits;


		function __construct($id){
			$db = new Dbconnect();
			$db -> connect();

			$sql = ("SELECT DISTINCT 	
									artworks.ImageFileName,artworks.ArtWorkID,artworks.Title,
									artists.ArtistID,artists.FirstName,artists.LastName,
									genres.*
				FROM artworks,artists,artworkgenres,genres 
				WHERE genres.GenreID = '$id'
				AND artworkgenres.ArtWorkID = artworks.ArtWorkID
				AND artworkgenres.GenreID = genres.GenreID
				AND artworks.ArtistID = artists.ArtistID
				ORDER BY artists.LastName;
				") or die ($db -> error);

			$result = $db -> prepareStatement($sql);
			$result -> execute();
			$this -> data = $result -> fetchAll();

			//einmalige Initialisierung der Klassenvariablen bei Konstuktoraufruf
			foreach ($this -> data as $row){
				$this -> genreName = $row['GenreName'];
				$this -> desc      = $row['Description'];
				$this -> wikilink  = $row['Link'];
				$this -> genreID   = $row['GenreID'];
				$this -> eraNr     = $row['Era'];
			}

			$this -> hits = $result -> rowCount();

			$db -> close();
		}

		// Methoden

		public function getGenreName(){
			return $this -> genreName;
		}

		public function getEra(){
			return 'Era: '.$this -> eraNr;
		}

		public function getDesc(){
			// Vorprüfung ob ein Beschreibungstext vorhanden ist, falls nicht erfolgt die Nutzung eines Standardtextes
			if ($this -> desc === null){
				echo 'Keine Beschreibung in der Datenbak vorhanden.'.'<br>';
				echo '<br>';
				echo "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.";
				echo "At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.";
				echo "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.";
				echo "At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.";
			} else {
				echo $this -> desc;
				echo '<br><br><br><a href="'.$this -> wikilink.'">Mehr Informationen zu '.$this -> genreName.' auf Wikipedia.org</a>';
			}

		}

		public function getImage(){
			if ($this -> hits === 0){
				echo "<p>Keine Suchtreffer </p>";
			} else {
				echo '<h3>Wir haben '.$this -> hits.' Kunstwerke aus dem Genre '.$this -> genreName.'</h3>';
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
				if (file_exists(self::picture.$this -> filename.'.jpg')){
					echo '<td><img src="'.self::picture.$this -> filename.'.jpg"  alt="';
					echo $this -> title.'" title="'.$this -> title.'"></img></td>';
				} else {
					echo '<td><img src="'.self::picture.'default.jpg" alt="default_picture" title="default_picture"></img></td>';
				}

				echo '<td><a href="singleartist.php?id='.$this -> artistID.'">'.$this -> lastname.', '.$this -> fistname.'</a></td>';
				echo '<td><a href="singleartwork.php?id='.$this -> artworkID.'"> '.$this -> title.'</a></td>';
				echo '</tr>';

			}

		}

		public function querycheck($id){
			$db = new Dbconnect;
			$db -> connect();

			$sql = ("SELECT * FROM genres WHERE GenreID='$id'") or die ($db -> error);

			$result = $db -> prepareStatement($sql);
			$result -> execute();

			// Prüfung ob zu dieser ID Ergebnisse aus der SQL Abfrage vorliegen
			$idcheck = $result -> rowCount();

			if ($idcheck === 1){
				return true;
			} else {
				return false;
			}

			$db -> close();
		}
	}
