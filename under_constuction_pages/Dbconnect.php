<?php


	namespace assets\php;

	use Database;
			use \PDO;



	class Dbconnect {

		//Make Singleton
		    private static $instance;
		    private $pdo;

		//Make connection between server and database
		    private function __construct() {

		            $this->pdo = new PDO('mysql:host=' . Database::DB_IP . ':' . Database::DB_PORT . ';dbname=' .
		                                 Database::DB_NAME, Database::DB_USER, Database::DB_PASS);

		            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		            $this->pdo->exec("USE " . Database::DB_NAME);
		    }

		    public static function getInstance() {
		        if (self::$instance === null) {
		            self::$instance = new Dbconnect();
		        }
		        return self::$instance;
		    }

		    public function getDbconnect() {
		        return $this->pdo;
		    }

	}