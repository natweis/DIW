<?php

	use assets\php\Autoloader;

	//Include Error Handler
	require_once 'utility/errorHandler.php';

	session_start();

	if (isset($_SESSION['UserName']) && ($_SESSION['Admin']))

			{//Autoload to require needed model files
			Autoloader ::register();

	try{
		$reviewDao = \model\database\ReviewsDAO ::getInstance();
		$reviewDao -> removeReviewForArtwork($_GET['rev']);

	} catch (PDOException $e){
		$message = date("Y-m-d H:i:s")." ".$_SERVER['SCRIPT_NAME']." $e\n";
		error_log($message, 3, '../../errors.log');
		header("Location:  /sorry.html");
		die();
	}


	} else {
	header("Location:  /sorry.html");
	die();
}