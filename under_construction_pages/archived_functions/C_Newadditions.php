<?php

	require_once("Dbconnect.php");

	class C_Newadditions {
		const picture = ("assets/img/Art_Images/images/artworks/square-medium/");

		public function getImage($id){
			// Vorprüfung, ob die Bilddatei vorhanden ist, falls nicht, erfolgt die Nutzung eines Standardbildes
			if (file_exists(self::picture.$id.'.jpg')){
				echo '<a href="neu.php?id='.$id.'"><img src="'.self::picture.$id.'.jpg" style="width:40%"></a>';
			} else {
				echo '<a href="neu.php?id='.$id.'"><img src="'.self::picture.'default.jpg" style="width:30%"></a>';
			}
		}

		public function artworklist(){
			$db = new Dbconnect;
			$db -> connect();

			$sql = ("SELECT aw.ArtWorkID, aw.Title, a.FirstName, a.LastName
							FROM artworks aw, artists a
							ORDER BY aw.ArtWorkID DESC
						") or die ($db -> error);

			$result = $db -> prepareStatement($sql);
			$result -> execute();
			$this -> data = $result -> fetchAll();

			foreach ($this -> data as $row){
				$title   = $row['Title'];
				$firstName = $row['FirstName'];
				$lastName = $row['LastName'];
				$artworkID = $row['ArtWorkID'];

				echo '<div class="col-md-3">';
				echo '<div class="thumbnail">';
				$this -> getImage($artworkID);
				echo '<div class="caption">';
				echo '<a href="neu.php?id='.$artworkID.'">'.$title.'</a><br>';
				echo '<a href="neu.php?id='.$artworkID.'">'.$firstName.'</a>';
				echo '<a href="neu.php?id='.$artworkID.'">'.$lastName.'</a><br>';
				echo '</div></div></div>';
			}

			$db -> close();
		}

	}