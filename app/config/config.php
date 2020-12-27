<?php

	error_reporting(E_ALL);
	ini_set('display_errors', 'On');

    //Database params
    define('DB_HOST', 'localhost'); //Add your db host
    define('DB_USER', 'root'); // Add your DB root
    define('DB_PASS', ''); //Add your DB pass
    define('DB_NAME', 'art_test'); //Add your DB Name

    //APPlicationROOT
    define('APPROOT', dirname(__FILE__, 2));

    //URLROOT (Dynamic links)
    define('URLROOT', 'http://localhost/art_test');

    //Sitename
    define('SITENAME', 'Login & Register script');
