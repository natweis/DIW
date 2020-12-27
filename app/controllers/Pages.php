<?php

	error_reporting(E_ALL);
	ini_set('display_errors', 'On');

	use Autoloader;

	class Pages extends Controller {
		public function __construct(){
			//$this->userModel = $this->model('User');
		}

		public function index(){
			$data = ['title' => 'Home page'];

			$this -> view('index', $data);
		}

		public function about(){
			$this -> view('about');
		}
	}