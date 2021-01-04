<?php


	namespace app\helpers;

	use function error_reporting;
	use function ini_set;

	use const E_ALL;

	error_reporting(E_ALL);
	ini_set('display_errors', 'On');

	session_start();

	function isLoggedIn(){
		if (isset($_SESSION['user_id'])){
			return true;
		} else {
			return false;
		}
	}
