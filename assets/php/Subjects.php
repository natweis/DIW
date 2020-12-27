<?php

	error_reporting(E_ALL);
	ini_set('display_errors', 'On');

	require_once("Dbconnect.php");

	class Subjects {
		private $picture = ("assets/img/Art_Images/images/subjects/square-medium/");
		private $data;
		private $name;
		private $subjectID;

		public function getImage($id){
			// Vorprüfung ob die Bilddatei vorhanden ist, falls nicht erfolgt die Nutzung eines Standardbildes
			if (file_exists($this -> picture.$id.'.jpg')){
				echo '<a href="singlesubject.php?id='.$id.'"><img src="'.$this -> picture.$id.'.jpg" style="width:40%"></a>';
			} else {
				echo '<a href="singlesubject.php?id='.$id.'"><img src="'.$this -> picture.'default.jpg" style="width:30%"></a>';
			}
		}

		public function subjectlist(){
			$db = new Dbconnect;
			$db -> connect();

			$sql = ("SELECT * FROM `subjects` ORDER BY `subjects`.`SubjectName` ASC 
					") or die ($db -> error);

			$result = $db -> prepareStatement($sql);
			$result -> execute();
			$this -> data = $result -> fetchAll();

			foreach ($this -> data as $row){
				$this -> name      = $row['SubjectName'];
				$this -> subjectID = $row['SubjectID'];

				echo '<div class="col-md-3">';
				echo '<div class="thumbnail">';
				$this -> getImage($this -> subjectID);
				echo '<div class="caption">';
				echo '<a href="singlesubject.php?id='.$this -> subjectID.'">'.$this -> name.'</a><br>';
				echo '</div></div></div>';
			}
			$db -> close();
		}
	}