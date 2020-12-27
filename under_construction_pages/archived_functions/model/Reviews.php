<?php


	namespace model;


	class Reviews {

	private $artworkID;
    private $customerID;
    private $reviewDate;
    private $rating;
    private $comment;


    public function __construct()
    {
        $this->customerID = $_SESSION['email'];
        $this->reviewDate = date("Y-m-d H:i:s");
    }

		/**
		 * @return mixed
		 */
		public function getArtworkID(){
			return $this -> artworkID;
		}

		/**
		 * @param  mixed  $artworkID
		 */
		public function setArtworkID($artworkID)
		:void{
			$this -> artworkID = $artworkID;
		}

		/**
		 * @return mixed
		 */
		public function getCustomerID(){
			return $this -> customerID;
		}

		/**
		 * @param  mixed  $customerID
		 */
		public function setCustomerID($customerID)
		:void{
			$this -> customerID = $customerID;
		}

		/**
		 * @return false|string
		 */
		public function getReviewDate(){
			return $this -> reviewDate;
		}

		/**
		 * @param  false|string  $reviewDate
		 */
		public function setReviewDate($reviewDate)
		:void{
			$this -> reviewDate = $reviewDate;
		}

		/**
		 * @return mixed
		 */
		public function getRating(){
			return $this -> rating;
		}

		/**
		 * @param  mixed  $rating
		 */
		public function setRating($rating)
		:void{
			$this -> rating = $rating;
		}

		/**
		 * @return mixed
		 */
		public function getComment(){
			return $this -> comment;
		}

		/**
		 * @param  mixed  $comment
		 */
		public function setComment($comment)
		:void{
			$this -> comment = $comment;
		}
	}