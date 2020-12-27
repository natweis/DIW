<?php

	error_reporting(E_ALL);
	ini_set('display_errors', 'On');

require_once("Dbconnect.php");

//class AdvancedSearch
//{
//
//    public function advancedsearch()
//    {
//        if(isset($_POST["submitadvancedsearch"]))
//        {
//            if
//            $db=new Dbconnect;
//            $db->connect();
//            $sql="SELECT * FROM customerlogon WHERE UserName=:user";
//            $stmt = $db->prepareStatement($sql);
//            $stmt->bindValue(":user",$_POST["email"]);
//            $stmt->execute();
//    }
//
//
//}