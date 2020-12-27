<?php

	error_reporting(E_ALL);
	ini_set('display_errors', 'On');

	namespace app\helpers;


	class MySessionHandler implements \SessionHandlerInterface {

		private $savePath;

		/**
		 * @inheritDoc
		 */
		public function close(){
			return true;
		}

		/**
		 * @inheritDoc
		 */
		public function destroy($id){
			$file = "$this->savePath/sess_$id";
			if (file_exists($file)){
				unlink($file);
			}

			return true;
		}

		/**
		 * @inheritDoc
		 */
		public function gc($maxlifetime){
			foreach (glob("$this->savePath/sess_*") as $file){
				if (filemtime($file) + $maxlifetime < time() && file_exists($file)){
					unlink($file);
				}
			}

			return true;
		}
	}

		/**
		 * @inheritDoc
		 */
		public function open($savePath, $sessionName){
			$this -> savePath = $savePath;
			if (!is_dir($this -> savePath)){
				mkdir($this -> savePath, 0777);
			}

			return true;
		}

		/**
		 * @inheritDoc
		 */
		public function read($id){
			return (string) @file_get_contents("$this->savePath/sess_$id");
		}

		/**
		 * @inheritDoc
		 */
		public function write($id, $data){
			return file_put_contents("$this->savePath/sess_$id", $data) === false? false: true;
		}
	}

	$handler = new MySessionHandler();
	session_set_save_handler($handler, true);
	session_start();

	// proceed to set and retrieve values by key from $_SESSION