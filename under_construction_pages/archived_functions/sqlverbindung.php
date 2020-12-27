<?php

class Dbconnect
{
    private $dbhn='mysql:host=localhost;dbname=art_test;charset=utf8';
    private $user="root";
    private $passwort="";
    private $mysql;
    public function connect()
    {  
        if($this->isConnected())
        {
            throw new Exception("Database is already connected!");
        }
        try
        {
            $this->mysql=new PDO($this->dbhn,$this->user,$this->passwort);
            $this->mysql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        }catch(PDOExeption $ex){
            exit( 'SQL Error:'.$ex->getMessage());
        }
    }
    public function prepareStatement($sql)
    {
        if(!$this->isConnected())
        {
            throw new Exception("Database isn't connected!");
        }
        return $this->mysql->prepare($sql);
    }
    public function close()
    {
        if(!$this->isConnected())
        {
            return;
        }
        $this->mysql=null;
    }
    public function isConnected()
    {
        return $this->mysql!=null;
    }
}