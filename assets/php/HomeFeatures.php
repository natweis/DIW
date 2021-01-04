<?php

	use assets\php\Dbconnect;

	error_reporting(E_ALL);
	ini_set('display_errors', 'On');

	require_once("Dbconnect.php");

	class Homefeatures {
		const picture    = ("assets/img/Art_Images/images/works/medium/");

		const bigpicture = ("assets/img/Art_Images/images/works/large/");

		//private $data;

		public function newart(){
			$db = new Dbconnect;
			$db -> connect();

			$sql = ("SELECT DISTINCT ArtWorkID 
					FROM artworks
					ORDER BY ArtWorkID
					DESC
				") or die ($db -> error);

			$result = $db -> prepareStatement($sql);
			$result -> execute();
			$data = $result -> fetchAll();

			//Auslesen der ersten beiden Array Felder
			for ($i = 0; $i < 2; $i++){
				$data[$i];
			}

			$db -> close();
		}

		public function newreviews(){
			$db = new Dbconnect;
			$db -> connect();

			$sql = ("SELECT customers.FirstName, customers.City, customers.Country, reviews.Comment, reviews.Rating, reviews.ArtWorkId
					FROM customers, reviews 
					WHERE customers.CustomerID = reviews.CustomerId
					ORDER BY reviews.ReviewDate 
					DESC
					LIMIT 0, 2
				") or die ($db -> error);

			$result = $db -> prepareStatement($sql);
			$result -> execute();
			$data = $result -> fetchAll();

			if (sizeof($data) > 0){
				foreach ($data as $row){
					$review = $row['Comment'];
					$city   = $row['City'];
					$country   = $row['Country'];
					$name   = $row['FirstName'];
					$id     = $row['ArtWorkId'];
					$rate   = $row['Rating'];

					echo '<div class="col-md-3 col-lg-4">';
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
					echo '<p><a href="singleartwork.php?id='.$id.'">'.substr($review, 0, 150).'...</a></p>';
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
					echo '<img class="yelp_star" src="assets/img/star-01.png">';
					echo '<img class="yelp_star" src="assets/img/star-01.png">';
					echo '<img class="yelp_star" src="assets/img/star-01.png">';
					echo '<img class="yelp_star" src="assets/img/star-01.png">';
					echo '<img class="yelp_star" src="assets/img/star_empty-01.png">';
					echo '<p>Leider noch keine Bewertung vorhanden. Seien Sie doch der/die Erste.<br></p>';
					echo '</div><br></div>';
					echo '</div>';
				}
			}

			$db -> close();
		}
	}

