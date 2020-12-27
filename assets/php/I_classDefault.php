<?php

	error_reporting(E_ALL);
	ini_set('display_errors', 'On');

	interface iClassDefault
	{
		// Erstinitialisierung der Instanzvariablen
		public function __construct($parameter);
		// Methode prüft ob Bild vorhanden ist und gibt Original-Bildpfad (true) oder Default-Bildpfad (false) zurück
		public function getImage();
		// prüft ob der GET Parameter konsistent ist
		public function querycheck($param);		
	}
?>