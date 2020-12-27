<?php

	error_reporting(E_ALL);
	ini_set('display_errors', 'On');

	spl_autoload_register();

	class DBController
	{

		private $host = "localhost";

		private $user = "root";

		private $password = "";

		private $database = "art_test";

		private static $conn;

		/**
		 * DBController constructor.
		 */
		public function __construct(){
			$this -> conn = mysqli_connect($this -> host, $this -> user, $this -> password, $this -> database);
		}

		/**
		 *
		 */
		public static function getConnection(){
			if (empty($this -> conn)){
				new Database();
			}
		}

		/**
		 * @param         $query
		 * @param  array  $params
		 *
		 * @return mixed
		 */
		public function getDBResult($query, $params = []){
			$sql_statement = $this -> conn -> prepare($query);
			if (!empty($params)){
				$this -> bindParams($sql_statement, $params);
			}
			$sql_statement -> execute();
			$result = $sql_statement -> get_result();

			if ($result -> num_rows > 0){
				while ($row = $result -> fetch_assoc()){
					$resultset[] = $row;
				}
			}

			if (!empty($resultset)){
				return $resultset;
			}
		}

		/**
		 * @param         $query
		 * @param  array  $params
		 */
		public function updateDB($query, $params = []){
			$sql_statement = $this -> conn -> prepare($query);
			if (!empty($params)){
				$this -> bindParams($sql_statement, $params);
			}
			$sql_statement -> execute();
		}

		/**
		 * @param $sql_statement
		 * @param $params
		 */
		public function bindParams($sql_statement, $params){
			$param_type = "";
			foreach ($params as $query_param){
				$param_type .= $query_param["param_type"];
			}

			$bind_params[] = &$param_type;
			foreach ($params as $k => $query_param){
				$bind_params[] = &$params[$k]["param_value"];
			}

			/**
			 * Call a callback with an array of parameters
			 */
			call_user_func_array([$sql_statement, 'bind_param'], $bind_params);
		}
	}