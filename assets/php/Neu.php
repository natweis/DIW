<?php

	error_reporting(E_ALL);
	ini_set('display_errors', 'On');

	require_once("Dbconnect.php");

	class Neu {

		private $picture = ("assets/img/Art_Images/images/works/square-medium/");
		private $data;
		private $title;
		private $artworkID;
		private $fileName;


		public function getImage($artworkID)
		:void{
			// Vorprüfung, ob die Bilddatei vorhanden ist, falls nicht, erfolgt die Nutzung eines Standardbildes
			if (file_exists($this -> picture.$artworkID.'.jpg')){
				echo '<a href="singleartwork.php?id='.$artworkID.'"><img src="'.$this -> picture.$artworkID.'.jpg" style="width:40%"></a>';
			} else {
				echo '<a href="singleartwork.php?id='.$artworkID.'"><img src="'.$this -> picture.'default.jpg" style="width:30%"></a>';
			}
		}


		public function artworklist(){
			$db = new Dbconnect;
			$db -> connect();

			$sql = ("SELECT * FROM artworks ORDER BY ArtWorkID DESC
					") or die ($db -> error);

			$result = $db -> prepareStatement($sql);
			$result -> execute();
			$this -> data = $result -> fetchAll();

			foreach ($this -> data as $row){
				$this -> title     = $row['Title'];
				$this -> artworkID = $row['ArtWorkID'];

				echo '<div class="col-md-3">';
				echo '<div class="thumbnail">';
				$this -> getImage($this -> artworkID);
				echo '<div class="caption">';
				echo '<a href="singleartwork.php?id='.$this -> artworkID.'">'.$this -> title.'</a><br>';
				echo '</div></div></div>';
			}
			$db -> close();
		}
	}