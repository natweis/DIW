<?php
require_once("sqlverbindung.php");

class Registration
{
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
            if($count==0)
            {
                if($_POST["pw"]==$_POST["pw2"])
                {   
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
                    while($id=$stmt->fetch()){
                        $customerid=$id['CustomerID'];
                        }
                    settype($customerid,"integer");
                    $sql="INSERT INTO customers (CustomerID, FirstName, LastName, Address, City, Region, Country, Postal, Phone, Email, Privacy) 
                    VALUES ($customerid, :firstname, :lastname, :address, :city, :region, :country, :postal, :phone, :email, '1')";
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
        }
    }
}

        