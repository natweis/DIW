<?php

	namespace assets\php;

	error_reporting(E_ALL);
	ini_set('display_errors', 'On');


	/**
	 * Einfacher Autoloader, da Composer nicht erlaubt.
	 * PSR-0: Autoloading Standard
	 */



	$rootDir = __DIR__.'/classes/';

	$autoload = static function($className) use ($rootDir){
		$fileName = '';
		if ($lastNameSpacePosition = strpos($className, '\\')){
			$namespace = substr($className, 0, $lastNameSpacePosition);
			$className = substr($className, $lastNameSpacePosition + 1);
			$fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace).DIRECTORY_SEPARATOR;
		}
		$fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className);
		if (is_file($rootDir.$fileName.'.php')){
			require_once $rootDir.$fileName.'.php';
		}
	};

	spl_autoload_register($autoload);
