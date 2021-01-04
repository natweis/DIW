<?php

	use assets\php\Dbconnect;

	error_reporting(E_ALL);
	ini_set('display_errors', 'On');

	require_once("Dbconnect.php");
	require_once("I_classDefault.php");
	require_once("I_ART.php");

	class Singleartwork implements iClassDefault, iART {
		const picture    = ("assets/img/Art_Images/images/works/medium/");

		const bigpicture = ("assets/img/Art_Images/images/works/large/");

		private $data;
		// Variablen zum Einzelabruf
		private $artworkID;
		private $title;
		private $desc;
		private $fileName;
		private $firstName;
		private $lastName;
		private $artistID;
		// Variablen für Tabelle
		private $location;
		private $year;
		private $medium;
		private $size;
		private $sub;
		private $gen;
		private $subID;
		private $genID;
		private $genUA;
		private $subUA;
		private $lat;
		private $long;
		private $gname;
		private $gcity;
		private $gcountry;
		private $gweb;

		function __construct($id){
			$db = new Dbconnect();
			$db -> connect();

			$sql = ("SELECT DISTINCT 
								artists.FirstName, artists.LastName, 
								artworks.*, 
								subjects.SubjectName, subjects.SubjectID,
								genres.GenreName, genres.GenreID,
								galleries.*
				FROM artists, artworks, subjects, genres, artworkgenres, artworksubjects, galleries
				WHERE artworks.ArtWorkID = '$id'
				AND artists.ArtistID = artworks.ArtistID
				AND artworksubjects.ArtWorkID ='$id' 
                AND artworkgenres.ArtWorkID ='$id' 
                AND subjects.SubjectId = artworksubjects.SubjectID 
                AND genres.GenreID = artworkgenres.GenreID
				AND galleries.GalleryID = artworks.GalleryID
				") or die ($db -> error);

			$result = $db -> prepareStatement($sql);
			$result -> execute();
			$this -> data = $result -> fetchAll();

			//einmalige Initialisierung der Klassenvariablen bei Konstuktoraufruf
			foreach ($this -> data as $row){
				$this -> artworkID = $row['ArtWorkID'];
				$this -> title     = $row['Title'];
				$this -> desc      = $row['Description'];
				$this -> fileName  = $row['ImageFileName'];
				$this -> firstName = $row['FirstName'];
				$this -> lastName  = $row['LastName'];
				$this -> artistID  = $row['ArtistID'];

				$this -> year     = $row['YearOfWork'];
				$this -> location = $row['OriginalHome'];
				$this -> medium   = $row['Medium'];
				$this -> size     = $row['Height'].'cm x '.$row['Width'].'cm';
				$this -> sub[]    = $row['SubjectName'];
				$this -> gen[]    = $row['GenreName'];
				$this -> subID[]  = $row['SubjectID'];
				$this -> genID[]  = $row['GenreID'];
				$this -> lat      = $row['Latitude'];
				$this -> long     = $row['Longitude'];
				$this -> gname    = $row['GalleryName'];
				$this -> gcity    = $row['GalleryCity'];
				$this -> gcountry = $row['GalleryCountry'];
				$this -> gweb     = $row['GalleryWebSite'];

			}
			// Eliminieren von Dopplungen durch Nutzung von UNIQUE-Arrays

			$this -> genUA = array_unique($this -> gen);
			$this -> subUA = array_unique($this -> sub);

			$db -> close();
		}

		// Methoden

		public function getTitle(){
			return $this -> title;
		}

		public function getArtist()
		:string{
			return 'By: '.'<a href="singleartist.php?id='.$this -> artistID.'">'.$this -> firstName.' '.$this -> lastName.'</a>';
		}

		public function getImage(){
			// Vorprüfung ob die Bilddatei vorhanden ist, falls nicht erfolgt die Nutzung eines Standardbildes
			if (file_exists(self::picture.$this -> fileName.'.jpg')){
				echo self::picture.$this -> fileName.'.jpg';
			} else {
				echo self::picture.'default.jpg';
			}
		}

		public function getBigImage()
		:void{
			// Vorprüfung ob die Bilddatei vorhanden ist, falls nicht erfolgt die Nutzung eines Standardbildes
			if (file_exists(self::bigpicture.$this -> fileName.'.jpg')){
				echo self::bigpicture.$this -> fileName.'.jpg';
			} else {
				echo self::bigpicture.'default.jpg';
			}
		}

		public function getDescription(){
			// Vorprüfung, ob ein Beschreibungstext vorhanden ist, falls nicht, erfolgt die Nutzung eines Standardtextes
			if ($this -> desc == null){
				echo 'Keine Beschreibung in der Datenbak vorhanden.'.'<br>';
				echo '<br>';
				echo "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.";
				echo "At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.";
				echo "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.";
				echo "At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.";
			} else {
				echo $this -> desc;
			}

		}

		public function fillTable(){
			// Tabellenreihe Jahr
			echo '<tr><td class="text-left"><strong>Jahr:</strong></td>';
			echo '<td class="text-left"><i>'.$this -> year.'</i></td></tr>';
			// Tabellenreihe Medium
			echo '<tr><td class="text-left"><strong>Medium:</strong></td>';
			echo '<td class="text-left"><i>'.$this -> medium.'</i></td></tr>';
			// Tabellenreihe Abmessungen
			echo '<tr><td class="text-left"><strong>Abmessungen (H x B):</strong></td>';
			echo '<td class="text-left"><i>'.$this -> size.'</i></td></tr>';

			// Tabellenreihe Genres
			echo '<tr><td class="text-left"><strong>Genres:</strong></td>';
			echo '<td class="text-left">';

			//speichert den ArrayIndex in der Variable $genindex, somit ist die Position des Datensatzes im Array eindeutig identifizierbar
			$genindex = sizeof($this -> genID) - 1;
			foreach ($this -> genUA as $element){
				//reduziert den ArrayIndex um 1
				if ($genindex >= 1){
					$genindex -= 1;
				}
				echo '<i><a href="singlegenre.php?id='.$this -> genID[$genindex].'">'.$element.'</a></i><br>';
			}
			echo '</td></tr>';

			// Tabellenreihe Subjects/Themen
			echo '<tr><td class="text-left"><strong>Themen:</strong></td>';
			echo '<td class="text-left">';

			$subindex = sizeof($this -> subID) - 1;
			foreach ($this -> subUA as $element){
				if ($subindex >= 1){
					$subindex -= 1;
				}
				echo '<i><a href="singlesubject.php?id='.$this -> subID[$subindex].'">'.$element.'</a></i><br>';
			}
			echo '</td></tr>';
			// Tabellenreihe Standort
			echo '<tr data-toggle="collapse" data-target="#accordion" class="clickable">';
			echo '<td class="text-left"><strong>Standort:</strong></td>';
			echo '<td class="text-left"><i><a href="#map">'.$this -> location.'</a></i></td></tr>';
			echo '<tr><td colspan="3">';
			echo '<div id="accordion" class="collapse">';
			echo '<iframe src="https://maps.google.com/maps?q='.$this -> lat.', '.$this -> long;
			echo '&z=15&output=embed" width="420" height="270" frameborder="0" id="map"></iframe>';
			echo '<p>'.$this -> gcity.' ('.$this -> gcountry.')';
			echo '<br><a href="'.$this -> gweb.'">'.$this -> gname.'</a>';
			echo '</div>';
			echo '</td>	</tr>';
		}

		public function querycheck($id){
			$db = new Dbconnect;
			$db -> connect();

			$sql = ("SELECT * FROM artworks WHERE ArtWorkID='$id'") or die ($db -> error);

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

		public function get_avg_rating($id)
		:void{
			$db = new Dbconnect;
			$db -> connect();

			$sql = ("SELECT AVG(Rating) FROM reviews WHERE ArtWorkID = '$id'") or die ($db -> error);

			$result = $db -> prepareStatement($sql);
			$result -> execute();
			$db -> close();
			$result = $result -> fetchAll();

			foreach ($result as $row){
				$avg = $row['AVG(Rating)'];
			}

			switch ($avg){
				case 1:
					echo '<img class="yelp_star" src="assets/img/star-01.png">';
					echo '<img class="yelp_star" src="assets/img/star_empty-01.png">';
					echo '<img class="yelp_star" src="assets/img/star_empty-01.png">';
					echo '<img class="yelp_star" src="assets/img/star_empty-01.png">';
					echo '<img class="yelp_star" src="assets/img/star_empty-01.png">';
					break;

				case 2:
					echo '<img class="yelp_star" src="assets/img/star-01.png">';
					echo '<img class="yelp_star" src="assets/img/star-01.png">';
					echo '<img class="yelp_star" src="assets/img/star_empty-01.png">';
					echo '<img class="yelp_star" src="assets/img/star_empty-01.png">';
					echo '<img class="yelp_star" src="assets/img/star_empty-01.png">';
					break;

				case "3":
					echo '<img class="yelp_star" src="assets/img/star-01.png">';
					echo '<img class="yelp_star" src="assets/img/star-01.png">';
					echo '<img class="yelp_star" src="assets/img/star-01.png">';
					echo '<img class="yelp_star" src="assets/img/star_empty-01.png">';
					echo '<img class="yelp_star" src="assets/img/star_empty-01.png">';
					break;

				case 4:
					echo '<img class="yelp_star" src="assets/img/star-01.png">';
					echo '<img class="yelp_star" src="assets/img/star-01.png">';
					echo '<img class="yelp_star" src="assets/img/star-01.png">';
					echo '<img class="yelp_star" src="assets/img/star-01.png">';
					echo '<img class="yelp_star" src="assets/img/star_empty-01.png">';
					break;

				case 5:
					echo '<img class="yelp_star" src="assets/img/star-01.png">';
					echo '<img class="yelp_star" src="assets/img/star-01.png">';
					echo '<img class="yelp_star" src="assets/img/star-01.png">';
					echo '<img class="yelp_star" src="assets/img/star-01.png">';
					echo '<img class="yelp_star" src="assets/img/star-01.png">';
					break;

				default:
					echo '<img class="yelp_star" src="assets/img/star_empty-01.png">';
					echo '<img class="yelp_star" src="assets/img/star_empty-01.png">';
					echo '<img class="yelp_star" src="assets/img/star_empty-01.png">';
					echo '<img class="yelp_star" src="assets/img/star_empty-01.png">';
					echo '<img class="yelp_star" src="assets/img/star_empty-01.png">';
			}
		}

		public static function reviews($id)
		:void{
			$db = new Dbconnect;
			$db -> connect();

			$sql = ("SELECT customers.FirstName, customers.City, customers.Country, reviews.Rating, reviews.Comment
					FROM customers, reviews 
					WHERE reviews.ArtWorkId = '$id'
					AND customers.CustomerID = reviews.CustomerId
					ORDER BY reviews.ReviewDate 
					DESC
					LIMIT 0, 2
				") or die ($db -> error);

			$result = $db -> prepareStatement($sql);
			$result -> execute();
			$data = $result -> fetchAll();

			if (sizeof($data) > 0){
				foreach ($data as $row){
					$review  = $row['Comment'];
					$city    = $row['City'];
					$country = $row['Country'];
					$name    = $row['FirstName'];
					$rate    = $row['Rating'];

					echo '<div class="col-md-3 col-lg-5">';
					echo '<div class="yelp_basic">';
					echo '<div class="yelp_first">';
					echo '<h3>'.substr($name, 0, 1).'.</h3>';
					echo '<h4>&lt; '.$city.' ('.$country.')'.' &gt;</h4>';
					echo '</div>';
					echo '<div class="yelp_first">';

					switch ($rate){
						case 1:
							echo '<img class="yelp_star" src="assets/img/star-01.png">';
							echo '<img class="yelp_star" src="assets/img/star_empty-01.png">';
							echo '<img class="yelp_star" src="assets/img/star_empty-01.png">';
							echo '<img class="yelp_star" src="assets/img/star_empty-01.png">';
							echo '<img class="yelp_star" src="assets/img/star_empty-01.png">';
							break;

						case 2:
							echo '<img class="yelp_star" src="assets/img/star-01.png">';
							echo '<img class="yelp_star" src="assets/img/star-01.png">';
							echo '<img class="yelp_star" src="assets/img/star_empty-01.png">';
							echo '<img class="yelp_star" src="assets/img/star_empty-01.png">';
							echo '<img class="yelp_star" src="assets/img/star_empty-01.png">';
							break;

						case 3:
							echo '<img class="yelp_star" src="assets/img/star-01.png">';
							echo '<img class="yelp_star" src="assets/img/star-01.png">';
							echo '<img class="yelp_star" src="assets/img/star-01.png">';
							echo '<img class="yelp_star" src="assets/img/star_empty-01.png">';
							echo '<img class="yelp_star" src="assets/img/star_empty-01.png">';
							break;

						case 4:
							echo '<img class="yelp_star" src="assets/img/star-01.png">';
							echo '<img class="yelp_star" src="assets/img/star-01.png">';
							echo '<img class="yelp_star" src="assets/img/star-01.png">';
							echo '<img class="yelp_star" src="assets/img/star-01.png">';
							echo '<img class="yelp_star" src="assets/img/star_empty-01.png">';
							break;

						case 5:
							echo '<img class="yelp_star" src="assets/img/star-01.png">';
							echo '<img class="yelp_star" src="assets/img/star-01.png">';
							echo '<img class="yelp_star" src="assets/img/star-01.png">';
							echo '<img class="yelp_star" src="assets/img/star-01.png">';
							echo '<img class="yelp_star" src="assets/img/star-01.png">';
							break;

						default:
							echo '<img class="yelp_star" src="assets/img/star_empty-01.png">';
							echo '<img class="yelp_star" src="assets/img/star_empty-01.png">';
							echo '<img class="yelp_star" src="assets/img/star_empty-01.png">';
							echo '<img class="yelp_star" src="assets/img/star_empty-01.png">';
							echo '<img class="yelp_star" src="assets/img/star_empty-01.png">';

					}


					echo '<p>'.substr($review, 0, 150).'...<br></p>';
					echo '</div></div>';
					echo '</div>';
				}
			} else {
				for ($i = 0; $i < 2; $i++){
					echo '<div class="col-md-3 col-lg-5">';
					echo '<div class="yelp_basic">';
					echo '<div class="yelp_first">';
					echo '<h3>Anonym</h3>';
					echo '<h4>&lt;kommt aus&gt;</h4>';
					echo '</div>';
					echo '<div class="yelp_first">';
					echo '<img class="yelp_star" src="assets/img/star_empty-01.png">';
					echo '<img class="yelp_star" src="assets/img/star_empty-01.png">';
					echo '<img class="yelp_star" src="assets/img/star_empty-01.png">';
					echo '<img class="yelp_star" src="assets/img/star_empty-01.png">';
					echo '<img class="yelp_star" src="assets/img/star_empty-01.png">';
					echo '</div><br></div>';
					echo '<p>Leider noch keine Bewertung vorhanden. Seien Sie doch der/die Erste.<br></p>';
					echo '</div>';
				}
			}

			$db -> close();
		}
	}