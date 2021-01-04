<?php

	namespace assets\php;
	use PDO;

	error_reporting(E_ALL);
	ini_set('display_errors', 'On');

	class Dbconnect
{


		private string $dbhn = 'mysql:host=localhost;dbname=art_test;charset=utf8';
		private string $user = "root";
		private string $passwort = "";
    	private $mysql;

    //Methode zum Herstellen der Datenbankverbindung
    public function connect()
	:void{
        if($this->isConnected())
        {
            throw new \RuntimeException("Database is already connected!");
        }
        try
        {
            $this->mysql=new PDO($this->dbhn,$this->user,$this->passwort);
            $this->mysql=new PDO($this->dbhn,$this->user,$this->passwort);
            $this->mysql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }catch(PDOExeption $ex){
            exit( 'SQL Error:'.$ex->getMessage());
        }
    }

    //Methode zur Prüfung einer Datenbankverbindung
    public function prepareStatement($sql)
    {
        if(!$this->isConnected())
        {
            throw new \RuntimeException("Database isn't connected!");
        }
        return $this->mysql->prepare($sql);
    }

    //Methode zum schließen der Datenbankverbindung
    public function close()
    {
        if(!$this->isConnected())
        {
            return;
        }
        $this->mysql=null;
    }

    //Methode zur Rückgabe des Verbindungsstatus
    public function isConnected()
	:bool{
        return $this->mysql!==null;
    }
}


