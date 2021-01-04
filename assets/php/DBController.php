<?php


	namespace assets\php;


	use function call_user_func_array;
	use function mysqli_connect;
	use function mysqli_fetch_assoc;
	use function mysqli_num_rows;
	use function mysqli_query;

	class DBController {

		private $host = "localhost";

		private $user = "root";

		private $password = "";

		private $database = "art_test";

		private $conn;

		public function __construct(){
			$this -> conn = mysqli_connect($this -> host, $this -> user, $this -> password, $this -> database);
		}

		public function getConnection(){
			if (empty($this -> conn)){
				new Database();
			}
		}

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

		public function updateDB($query, $params = []){
			$sql_statement = $this -> conn -> prepare($query);
			if (!empty($params)){
				$this -> bindParams($sql_statement, $params);
			}
			$sql_statement -> execute();
		}

		public function bindParams($sql_statement, $params){
			$param_type = "";
			foreach ($params as $query_param){
				$param_type .= $query_param["param_type"];
			}

			$bind_params[] = &$param_type;
			foreach ($params as $k => $query_param){
				$bind_params[] = &$params[$k]["param_value"];
			}

			call_user_func_array([$sql_statement, 'bind_param'], $bind_params);
		}

		public function runQuery($query){
			$result = mysqli_query($this -> conn, $query);
			while ($row = mysqli_fetch_assoc($result)){
				$resultset[] = $row;
			}
			if (!empty($resultset)) return $resultset;
		}

		public function numRows($query){
			$result   = mysqli_query($this -> conn, $query);
			$rowcount = mysqli_num_rows($result);

			return $rowcount;
		}

	}