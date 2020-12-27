<?php

	error_reporting(E_ALL);
	ini_set('display_errors', 'On');

require_once("Dbconnect.php");
class Login
{
    private $admins;
    private $admin;

        //Methode zum Einloggen
    public function userlogin()
    {
        if(isset($_POST["submitlogin"]))
        {   
            $db=new Dbconnect;
            $db->connect();
            $sql="SELECT * FROM customerlogon WHERE UserName=:user";
            $stmt = $db->prepareStatement($sql);
            $stmt->bindValue(":user",$_POST["email"]);
            $stmt->execute();
            $row=$stmt->fetch();
            //Prüfung auf Rollenstatus
            if($row["State"]!="gesperrt" && $row["State"]!="gelöscht")      
            {
                $count=$stmt->rowCount();
                if($count==1)
                {
                        //Prüfung auf Korrektheit des Passwortes
                    if(Password_verify($_POST["pw"], $row["Pass"])){  
                        //Bindung des Usernames als Sessionvariable     
                        $_SESSION["UserName"]=$row["UserName"];         
                        return  "Eingeloggt";
                            
                    }else{
                        return  "Prüfen Sie: Email/Passwort ist falsch oder nicht vorhanden.";
                    }
                }else{
                     return  "Prüfen Sie: Email/Passwort ist falsch oder nicht vorhanden.";
                }
            }else{
                return "Ihr Account ist gesperrt! Für weitere Informationen kontaktieren Sie den Support.";
            }
        }//<script>alert("hier text")</script>
    } 
    //Methode zur Prüfung auf Administrationsrechte
    public function admincheck()
    {
        $admin=array();
            $db=new Dbconnect;
            $db->connect();
            $sql="SELECT State FROM customerlogon WHERE UserName=:user";
            $stmt = $db->prepareStatement($sql);
            $stmt->bindValue(":user",$_SESSION["UserName"]);
            $stmt->execute();
            $admins=$stmt->fetch();
            $admin=$admins["State"];
               
            return $admin;
            $db->close();
    }
}