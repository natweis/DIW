<?php

	error_reporting(E_ALL);
	ini_set('display_errors', 'On');

	require_once("Dbconnect.php");

class Registration
{
    private $id;
    private $customerid;

    //Methode zur eintragung der Formulardaten eines neuen Nutzers
    public function userregistration()
    {

        if(isset($_POST["submitacc"]))
        {
            
            $db=new Dbconnect;
            $db->connect();
            $sql="SELECT * FROM customerlogon WHERE UserName=:email";
            $stmt = $db->prepareStatement($sql);
            $stmt->bindValue(":email",$_POST["email"]);
            $stmt->execute();
            $count=$stmt->rowCount();
            //Prüfung ob dieser Nutzer bereits existiert
            if($count==0)   
            {
                //PHP seitige Prüfung ob beide Passwörter übereinstimmen -> Unstimmigkeit wird durch Html ausgegeben
                if($_POST["pw"]==$_POST["pw2"]) 
                {   
                    //Eintragung als Nutzer
                    $sql="INSERT INTO customerlogon (UserName, Pass, State, DateJoined, DateLastModified) VALUES (:email, :pw, 'User',now(),now())";    
                    $stmt = $db->prepareStatement($sql);
                    $stmt->bindValue(":email",$_POST["email"]);
                    $hash=password_hash($_POST["pw"],PASSWORD_BCRYPT);
                    $stmt->bindValue(":pw",$hash);
                    $stmt->execute();
                    $sql="SELECT CustomerID FROM customerlogon WHERE UserName=:email";
                    $stmt = $db->prepareStatement($sql);
                    $stmt->bindValue(":email",$_POST["email"]);
                    $stmt->execute();
                    //PHP seitige Lösung für gleicher ID eines Nutzers in customers und customerlogon auch (nicht die einfachere Lösung aber sie funktioniert)
                    while($this->id=$stmt->fetch()){    
                        $this->customerid=$this->id['CustomerID'];
                        }
                    settype($this->customerid,"integer");

                    //Eintragung der Nutzerstammdaten
                    $sql="INSERT INTO customers (CustomerID, FirstName, LastName, Address, City, Region, Country, Postal, Phone, Email, Privacy) 
                    VALUES ($this->customerid, :firstname, :lastname, :address, :city, :region, :country, :postal, :phone, :email, '1')";
                    $stmt = $db->prepareStatement($sql);
                    $stmt->bindValue(":firstname",$_POST["firstname"]);
                    $stmt->bindValue(":lastname",$_POST["lastname"]);
                    $stmt->bindValue(":address",$_POST["address"]);
                    $stmt->bindValue(":city",$_POST["city"]);
                    $stmt->bindValue(":region",$_POST["region"]);
                    $stmt->bindValue(":country",$_POST["country"]);
                    $stmt->bindValue(":postal",$_POST["postal"]);
                    $stmt->bindValue(":phone",$_POST["phone"]);
                    $stmt->bindValue(":email",$_POST["email"]);
                    $stmt->execute();
                    return "Ihr Account wurde angelegt";
                    
                }else{
                    return "Fehler: Die Passwörter stimmen nicht überein";
                }
            }else{
                return "Fehler: Der Username ist bereits vergeben";
            }
            $db->close();
        }
        
    }
}
        