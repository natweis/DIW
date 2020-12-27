<?php

	use assets\php\Autoloader;

	//Include Error Handler
	require_once 'utility/errorHandler.php';

	session_start();

	if (isset($_SESSION['UserName']))
	{
		//Autoload to require needed model files
		Autoloader ::register();


	//Validation of inputs

		if (isset($_POST['rating']) && isset($_POST['review']) && isset($_GET['awkid'])
				&& strlen($_POST['review']) >= 3 && strlen($_POST['review']) <= 2500 &&
				$_POST['rating'] >= 1 && $_POST['rating'] <= 5)
		{

			$review = new \model\Reviews();

			$review -> setArtworkID($_GET['awkid']);
			$review -> setCustomerID($_SESSION['UserName']);
			$review -> setRating(htmlentities($_POST['rating']));
			$review -> setComment(htmlentities($_POST['review']));



			try{
				$reviewDao = \model\database\ReviewsDAO ::getInstance();
				$reviewDao -> addNewReviewForArtwork($review);

				header("Location: ../../view/main/single.php?pid=".$_GET['awkid']);
				die();

			} catch (PDOException $e){
				$message = date("Y-m-d H:i:s")." ".$_SERVER['SCRIPT_NAME']." $e\n";
				error_log($message, 3, '../../errors.log');
				header("Location: /../../../../../sorry.html");
				die();
			}
		} else {
			header("Location: /../../../../../sorry.html");
			die();
		}

	}else {
	header("Location: /../../../../../home.php");
	die();
}

