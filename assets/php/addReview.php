<?php

	if (isset($_SESSION['userName']) && !empty($_POST["review"]) && !empty($_POST["id"])){
		require_once("Review.php");
		$review = new Review();


		$reviewResult = $review -> getReviewByArtworkForUser($_POST["id"], $customerID);

		if (!empty($reviewResult)){
			$review -> updateReview($_POST["rating"], $reviewResult[0]["id"]);
		} else {
			$review -> addReview($_POST["id"], $_POST["rating"], $customerID);
		}

		$postRating = $review -> getReviewsForArtwork($_POST["id"]);

		if (!empty($postRating[0]["rating_total"])){
			$average = round(($postRating[0]["rating_total"] / $postRating[0]["rating_count"]), 1);
			echo "Average Star Rating is ".$average." from the Total ".$postRating[0]["rating_count"]." Ratings";
		} else {
			echo "No Ratings";
		}
	}
