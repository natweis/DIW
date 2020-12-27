<?php
require_once("Dbconnect.php");
class VorlageDBVerbindung
{
    public function login()         //Name der Methode/Function 
    {
        $db=new Dbconnect;          //Datenbankverbindung (Objekt)=bleibt unverädert
        $db->connect();             //Datenbaknverbindung (Methode)=bleibt unverädert
        $sql="SELECT * FROM customerlogon WHERE UserName='Peter'";        //Sql Abfrage=hier muss euere abfrage stehen
        $stmt = $db->prepareStatement($sql);                               //Vorbereitung Abfrage =bleibt unverädert
        //$stmt->bindValue(":user",$_POST["email"]);                         //optional Variablen bindung aus einem Textfeld oder einer Vorgabe
        $stmt->execute();                                                   //ausführung



        $db->close();               //Schließen der Verbindung=bleibt unverädert
    }

?>
