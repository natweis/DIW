<?php

// Start Session
	if (session_status() == PHP_SESSION_NONE){
		session_start();
	}

// Check if user have session (if user is logged)
	if (isset($_SESSION['UserName'])){
		//Redirect to Main
		header('Location: index.php');
		die();
	}