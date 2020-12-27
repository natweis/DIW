<?php
require_once("sqlverbindung.php");
class Login
{
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
            if($row["State"]!="gesperrt" && $row["State"]!="gelöscht")
            {
                $count=$stmt->rowCount();
                if($count==1)
                {
                        
                    if(Password_verify($_POST["pw"], $row["Pass"])){
                        $_SESSION["UserName"]=$row["UserName"];
                        return  "Eingeloggt";
                            
                    }else{
                        return  "Fehler: Falsches Passwort";
                    }
                }else{
                     return  "Fehler: Email ist falsch oder nicht vorhanden.";
                }
            }else{
                return "Ihr Account ist gesperrt! Für weitere Informationen kontaktieren Sie bitte den Support.";
            }
        }
    } 
    
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
