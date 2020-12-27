<?php

	error_reporting(E_ALL);
	ini_set('display_errors', 'On');

	require_once("Dbconnect.php");

	class Genres {
		const picture = ("assets/img/Art_Images/images/genres/square-medium/");

		public function getImage($id){
			// Vorprüfung, ob die Bilddatei vorhanden ist, falls nicht, erfolgt die Nutzung eines Standardbildes
			if (file_exists(self::picture.$id.'.jpg')){
				echo '<a href="singlegenre.php?id='.$id.'"><img src="'.self::picture.$id.'.jpg" style="width:40%"></a>';
			} else {
				echo '<a href="singlegenre.php?id='.$id.'"><img src="'.self::picture.'default.jpg" style="width:30%"></a>';
			}
		}

		public function genrelist(){
			$db = new Dbconnect;
			$db -> connect();

			$sql = ("SELECT GenreID, GenreName, Era
					FROM genres
					ORDER BY Era, GenreName ASC
				") or die ($db -> error);

			$result = $db -> prepareStatement($sql);
			$result -> execute();
			$this -> data = $result -> fetchAll();

			foreach ($this -> data as $row){
				$name    = $row['GenreName'];
				$genreID = $row['GenreID'];

				echo '<div class="col-md-3">';
				echo '<div class="thumbnail">';
				$this -> getImage($genreID);
				echo '<div class="caption">';
				echo '<a href="singlegenre.php?id='.$genreID.'">'.$name.'</a><br>';
				echo '</div></div></div>';
			}

			$db -> close();
		}
		/*
		public function querycheck($id)
		{
			$db = new Dbconnect;
			$db->connect();

			$sql = ("SELECT * FROM genres WHERE GenreID='$id'")
					or die ($db->error);

			$result = $db->prepareStatement($sql);
			$result->execute();

			// Prüfung ob zu dieser ID Ergebnisse aus der SQL Abfrage vorliegen
			$idcheck=$result->rowCount();

			if($idcheck == 1)
			{
				return true;
			}
			else
			{
				return false;
			}

			$db->close();
		}
		*/
	}