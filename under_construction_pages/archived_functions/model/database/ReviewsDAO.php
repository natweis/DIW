<?php


	namespace model\database;

	use assets\php\Dbconnect;
	use model\Reviews;
	use PDO;


	class ReviewsDAO {

			//Make Singletonn
		    private static $instance;
		    private $pdo;

		    //Statements defined as constants
		    const ADD_REVIEW_FOR_ARTWORK = "INSERT INTO reviews (ArtWorkID, CustomerID, ReviewDate, Rating, Comment) 
		                        VALUES (?, ?, ?, ?, ?)";

		    const GET_REVIEWS_FOR_ARTWORK = "SELECT reviews.ReviewID, artworks.Title, customers.FirstName, customers.City, customers.Country, 
       											reviews.Rating, reviews.Comment
											FROM customers, reviews, artworks
											WHERE artworks.ArtWorkID = ?
											AND reviews.ArtWorkId = artworks.ArtWorkId
											AND customers.CustomerID = reviews.CustomerId
											ORDER BY reviews.ReviewDate DESC";

		    const REMOVE_REVIEW_FOR_ARTWORK = "DELETE FROM reviews WHERE ReviewID = ?";



		     const ADD_REVIEW_FOR_ARTIST = "INSERT INTO reviews (ArtWorkID, CustomerID, ReviewDate, Rating, Comment) 
		                        VALUES (?, ?, ?, ?, ?)";

		    const GET_REVIEWS_FOR_ARTIST = "SELECT reviews.ReviewID, artists.ArtistID, customers.FirstName, customers.City, customers.Country, 
       											reviews.Rating, reviews.Comment
											FROM customers, reviews, artists, artworks
											WHERE artists.ArtistID = ?
											AND artworks.ArtistID = artists.ArtistID
											AND reviews.ArtWorkId = artworks.ArtWorkId
											AND customers.CustomerID = reviews.CustomerId
											ORDER BY reviews.ReviewDate DESC";

		    const REMOVE_REVIEW_FOR_ARTIST = "DELETE FROM reviews WHERE ReviewID = ?";


		    //Get connection in construct
		    private function __construct()
		    {

		        $this->pdo = Connection::getInstance()->getConnection();
		    }

		    public static function getInstance()
		    {

		        if (self::$instance === null) {
		            self::$instance = new ReviewsDAO();
		        }

		        return self::$instance;
		    }


		    /**
		     * Function for adding review.
		     * @param Reviews $reviews - Receives review information, products and user's ID as object.
		     * @return string - Returns review's ID.
		     */
		    function addNewReviewForArtwork(Reviews $reviews)
		    {

		        $statement = $this->pdo->prepare(self::ADD_REVIEW_FOR_ARTWORK);
		        $statement->execute(array(
		            $reviews->getArtworkID(),
		            $reviews->getCustomerID(),
		            $reviews->getReviewDate(),
		            $reviews->getRating(),
		            $reviews->getComment()));

		        return $this->pdo->lastInsertId();
		    }


		    /**
		     * Function for getting all reviews for artwork.
		     *
		     * @param $artworkId  - Receives artwork's ID.
		     *
		     * @return array - Returns reviews for artwork.
		     */
		    function getReviewsForArtwork($artworkId)
		    {

		        $statement = $this->pdo->prepare(self::GET_REVIEWS_FOR_ARTWORK);
		        $statement -> execute(array($artworkId));

		        $reviewsReceived = $statement->fetchAll(PDO::FETCH_ASSOC);

		        return $reviewsReceived;
		    }


		    /**
		     * Function for deleting reviews.
		     *
		     * @param $artworkId  - Receives product's ID.
		     */
		    function removeReviewForArtwork($artworkId)
		    {

		        $statement = $this->pdo->prepare(self::REMOVE_REVIEW_FOR_ARTWORK);
		        $statement->execute(array($artworkId));
		    }

	}