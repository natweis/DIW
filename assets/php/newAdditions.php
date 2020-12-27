<?php

	//Neuzugänge = alle Kunstwerke nach Id absteigend sortiert -> neueste zuerst
	function getAllArtWorks(){
		$sql = "SELECT a.title, ar.FirstName, ar.LastName, a.medium, a.cost, r.ReviewDate, r.Rating, r.Comment, c.Country, c.City
  FROM artworks a, reviews r, customers c, artists ar
  WHERE a.ArtWorkID = r.ArtWorkId 
    and r.CustomerId = c.CustomerId
    and a.ArtistID = ar.ArtistID
    group by a.ArtWorkID, a.title, ar.FirstName, ar.LastName, a.medium, a.cost, r.ReviewDate, r.Rating, r.Comment, c.Country, c.City
    order by a.ArtWorkID desc";

		$result = connect() -> query($sql);
		if (!$result){
			return [];
		}

		while ($row = $result -> fetch()){
			yield $row;
		}

	}