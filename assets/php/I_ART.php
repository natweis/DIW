<?php

	error_reporting(E_ALL);
	ini_set('display_errors', 'On');

	interface iART
	{
		public function getDescription();
		public function fillTable();
	}
?>