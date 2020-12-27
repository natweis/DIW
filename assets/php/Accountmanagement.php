<?php

	error_reporting(E_ALL);
	ini_set('display_errors', 'On');

require_once("Dbconnect.php");
require_once("I_account.php");
class Accountmanagement implements Account
{
    //Variablen für die Ausgabe der Konten
    private $all_accounts;
    private $customerid;
    private $firstname;
    private $lastname;
    private $address;
    private $city;
    private $region;
    private $country;
    private $postal;
    private $phone;
    private $email;
    private $state;
    private $datejoined;
    private $datelastmodified;
    

    //Methode zur Abfrage und Ausgabe der Accounts
    public function accounts()
    {  
            $db=new Dbconnect;
            $db->connect();
            //Abfrage aller Nutzer, außer Nutzer mit status gelöscht
            $sql="SELECT * From customers, customerlogon WHERE customers.CustomerID=customerlogon.CustomerID and customerlogon.State!='gelöscht' "; 
            $stmt = $db->prepareStatement($sql);
            $stmt->execute();

            $this->all_accounts=$stmt->fetchall();

            foreach($this->all_accounts as $row)
            {
                $this->customerid=$row["CustomerID"];
                $this->firstname=$row["FirstName"];
                $this->lastname=$row["LastName"];
                $this->address=$row["Address"];
                $this->city=$row["City"];
                $this->region=$row["Region"];
                $this->country=$row["Country"];
                $this->postal=$row["Postal"];
                $this->phone=$row["Phone"];
                $this->email=$row["Email"];
                $this->state=$row["State"];
                $this->datejoined=$row["DateJoined"];
                $this->datelastmodified=$row["DateLastModified"];
				//Ausgabe in eine Tabelle
				echo "<div id='acc'><tr class='text-center'>";
				echo "<div><tr><td class='text-center'> $this->customerid</td>";
                echo "<td>  $this->firstname</td>"; 
                echo "<td>  $this->lastname</td>"; 
                echo "<td>  $this->email</td>"; 
                //Ausgabe der gegebenen Rolle und der noch möglichen alternativen ->zeile 89
				if( $this->state=='User') 
				{
						echo "<td><form id='login-screen'  method='post'>
						<select name='Rolle' required>
						<option selected > $this->state</option>
						<option >Admin</option>
                        <option >gesperrt</option>
                        <option value='gelöscht'>Löschen!</option>
						</select>
						<input type='hidden' name='customerid' value= $this->customerid>
						<button type='submit' name='submitaccmanagement'>ändern</button></form></td>";
				}else{
					if( $this->state=='Admin')
					{
						echo "<td><form id='login-screen'  method='post'>
						<select name='Rolle' required>
						<option selected> $this->state</option>
						<option >User</option>
                        <option >gesperrt</option>
                        <option value='gelöscht'>Löschen!</option>
						</select>
						<input type='hidden' name='customerid' value= $this->customerid>
						<button type='submit' name='submitaccmanagement'>ändern</button></form></td>";
					}else{
						echo "<td><form id='login-screen'  method='post'>
						<select name='Rolle' required>
						<option selected> $this->state</option>
						<option >Admin</option>
                        <option >User</option>
                        <option value='gelöscht'>Löschen!</option>
						</select>
						<input type='hidden' name='customerid' value= $this->customerid>
						<button type='submit' name='submitaccmanagement'>ändern</button></form></td>";
					}
				};
                echo "<td>  $this->datejoined</td>"; 
                echo "<td>  $this->datelastmodified</td>";  
                echo "</tr></div>";
                //Formular zur änderung der Ntzerdaten mit eintragung der aktuellen Daten aus der Datenbank
				echo "<div><tr><th class='text-center' colspan='7'>";
				echo "<details><summary> 'Nutzer Informationen anzeigen / bearbeiten'</summary>";
				echo "<form method='post'>";
				echo "<input type='hidden' name='customerid' value= $this->customerid>";
                echo "<p id='acctext'> Vorname* </p>";
				echo "<input  type='text' name='firstname' value=' $this->firstname' required>";
                echo "<p id='acctext'>Nachname*</p>";
                echo "<input  type='text' name='lastname' value=' $this->lastname' required>";
                echo "<p id='acctext'>Straße, Hausnummer*</p>";
                echo "<input  type='text' name='address' value=' $this->address' required>";
                echo "<p id='acctext'>PLZ*</p>";
                echo "<input  type='text' name='postal' value=' $this->postal' required>";
                echo "<p id='acctext'>Stadt*</p>";
                echo "<input  type='text' name='city' value=' $this->city' required>";
                echo "<p id='acctext'>Region</p>";
                echo "<input  type='text' name='region' value=' $this->region'>";
                echo "<p id='acctext'>Land*</p>";
				echo "<select name='country'  required>
                    <option selected>$this->country</option>
                    <option value='Afghanistan'></option>
                    <option value='Ägypten'>Ägypten</option>
                    <option value='Aland'>Aland</option>
                    <option value='Albanien'>Albanien</option>
                    <option value='Algerien'>Algerien</option>
                    <option value='Amerikanisch-Samoa'>Amerikanisch-Samoa</option>
                    <option value='Amerikanische Jungferninseln'>Amerikanische Jungferninseln</option>
                    <option value='Andorra'>Andorra</option>
                    <option value='Angola'>Angola</option>
                    <option value='Anguilla'>Anguilla</option>
                    <option value='Antarktis'>Antarktis</option>
                    <option value='Antigua und Barbuda'>Antigua und Barbuda</option>
                    <option value='Äquatorialguinea'>Äquatorialguinea</option>
                    <option value='Argentinien'>Argentinien</option>
                    <option value='Armenien'>Armenien</option>
                    <option value='Aruba'>Aruba</option>
                    <option value='Ascension'>Ascension</option>
                    <option value='Aserbaidschan'>Aserbaidschan</option>
                    <option value='Äthiopien'>Äthiopien</option>
                    <option value='Australien'>Australien</option>
                    <option value='Bahamas'>Bahamas</option>
                    <option value='Bahrain'>Bahrain</option>
                    <option value='Bangladesch'>Bangladesch</option>
                    <option value='Barbados'>Barbados</option>
                    <option value='Belgien'>Belgien</option>
                    <option value='Belize'>Belize</option>
                    <option value='Benin'>Benin</option>
                    <option value='Bermuda'>Bermuda</option>
                    <option value='Bhutan'>Bhutan</option>
                    <option value='Bolivien'>Bolivien</option>
                    <option value='Bosnien und Herzegowina'>Bosnien und Herzegowina</option>
                    <option value='Botswana'>Botswana</option>
                    <option value='Bouvetinsel'>Bouvetinsel</option>
                    <option value='Brasilien'>Brasilien</option>
                    <option value='Brunei'>Brunei</option>
                    <option value='Bulgarien'>Bulgarien</option>
                    <option value='Burkina Faso'>Burkina Faso</option>
                    <option value='Burundi'>Burundi</option>
                    <option value='Chile'>Chile</option>
                    <option value='China'>China</option>
                    <option value='Cookinseln'>Cookinseln</option>
                    <option value='Costa Rica'>Costa Rica</option>
                    <option value='Cote dIvoire'>Cote dIvoire</option>
                    <option value='Dänemark'>Dänemark</option>
                    <option value='Deutschland'>Deutschland</option>
                    <option value='Diego Garcia'>Diego Garcia</option>
                    <option value='Dominica'>Dominica</option>
                    <option value='Dominikanische Republik'>Dominikanische Republik</option>
                    <option value='Dschibuti'>Dschibuti</option>
                    <option value='Ecuador'>Ecuador</option>
                    <option value='El Salvador'>El Salvador</option>
                    <option value='Eritrea'>Eritrea</option>
                    <option value='Estland'>Estland</option>
                    <option value='Europäische Union'>Europäische Union</option>
                    <option value='Falklandinseln'>Falklandinseln</option>
                    <option value='Färöer'>Färöer</option>
                    <option value='Fidschi'>Fidschi</option>
                    <option value='Finnland'>Finnland</option>
                    <option value='Frankreich'>Frankreich</option>
                    <option value='Französisch-Guayana'>Französisch-Guayana</option>
                    <option value='Französisch-Polynesien'>Französisch-Polynesien</option>
                    <option value='Gabun'>Gabun</option>
                    <option value='Gambia'>Gambia</option>
                    <option value='Georgien'>Georgien</option>
                    <option value='Ghana'>Ghana</option>
                    <option value='Gibraltar'>Gibraltar</option>
                    <option value='Grenada'>Grenada</option>
                    <option value='Griechenland'>Griechenland</option>
                    <option value='Grönland'>Grönland</option>
                    <option value='Großbritannien'>Großbritannien</option>
                    <option value='Guadeloupe'>Guadeloupe</option>
                    <option value='Guam'>Guam</option>
                    <option value='Guatemala'>Guatemala</option>
                    <option value='Guernsey'>Guernsey</option>
                    <option value='Guinea'>Guinea</option>
                    <option value='Guinea-Bissau'>Guinea-Bissau</option>
                    <option value='Guyana'>Guyana</option>
                    <option value='Haiti'>Haiti</option>
                    <option value='Heard und McDonaldinseln'>Heard und McDonaldinseln</option>
                    <option value='Honduras'>Honduras</option>
                    <option value='Hongkong'>Hongkong</option>
                    <option value='Indien'>Indien</option>
                    <option value='Indonesien'>Indonesien</option>
                    <option value='Irak'>Irak</option>
                    <option value='Iran'>Iran</option>
                    <option value='Irland'>Irland</option>
                    <option value='Island'>Island</option>
                    <option value='Israel'>Israel</option>
                    <option value='Italien'>Italien</option>
                    <option value='Jamaika'>Jamaika</option>
                    <option value='Japan'>Japan</option>
                    <option value='Jemen'>Jemen</option>
                    <option value='Jersey'>Jersey</option>
                    <option value='Jordanien'>Jordanien</option>
                    <option value='Kaimaninseln'>Kaimaninseln</option>
                    <option value='Kambodscha'>Kambodscha</option>
                    <option value='Kamerun'>Kamerun</option>
                    <option value='Kanada'>Kanada</option>
                    <option value='Kanarische Inseln'>Kanarische Inseln</option>
                    <option value='Kap Verde'>Kap Verde</option>
                    <option value='Kasachstan'>Kasachstan</option>
                    <option value='Katar'>Katar</option>
                    <option value='Kenia'>Kenia</option>
                    <option value='Kirgisistan'>Kirgisistan</option>
                    <option value='Kiribati'>Kiribati</option>
                    <option value='Kokosinseln'>Kokosinseln</option>
                    <option value='Kolumbien'>Kolumbien</option>
                    <option value='Komoren'>Komoren</option>
                    <option value='Kongo'>Kongo</option>
                    <option value='Kroatien'>Kroatien</option>
                    <option value='Kuba'>Kuba</option>
                    <option value='Kuwait'>Kuwait</option>
                    <option value='Laos'>Laos</option>
                    <option value='Lesotho'>Lesotho</option>
                    <option value='Lettland'>Lettland</option>
                    <option value='Libanon'>Libanon</option>
                    <option value='Liberia'>Liberia</option>
                    <option value='Libyen'>Libyen</option>
                    <option value='Liechtenstein'>Liechtenstein</option>
                    <option value='Litauen'>Litauen</option>
                    <option value='Luxemburg'>Luxemburg</option>
                    <option value='Macao'>Macao</option>
                    <option value='Madagaskar'>Madagaskar</option>
                    <option value='Malawi'>Malawi</option>
                    <option value='Malaysia'>Malaysia</option>
                    <option value='Malediven'>Malediven</option>
                    <option value='Mali'>Mali</option>
                    <option value='Malta'>Malta</option>
                    <option value='Marokko'>Marokko</option>
                    <option value='Marshallinseln'>Marshallinseln</option>
                    <option value='Martinique'>Martinique</option>
                    <option value='Mauretanien'>Mauretanien</option>
                    <option value='Mauritius'>Mauritius</option>
                    <option value='Mayotte'>Mayotte</option>
                    <option value='Mazedonien'>Mazedonien</option>
                    <option value='Mexiko'>Mexiko</option>
                    <option value='Mikronesien'>Mikronesien</option>
                    <option value='Moldawien'>Moldawien</option>
                    <option value='Monaco'>Monaco</option>
                    <option value='Mongolei'>Mongolei</option>
                    <option value='Montserrat'>Montserrat</option>
                    <option value='Mosambik'>Mosambik</option>
                    <option value='Myanmar'>Myanmar</option>
                    <option value='Namibia'>Namibia</option>
                    <option value='Nauru'>Nauru</option>
                    <option value='Nepal'>Nepal</option>
                    <option value='Neukaledonien'>Neukaledonien</option>
                    <option value='Neuseeland'>Neuseeland</option>
                    <option value='Neutrale Zone'>Neutrale Zone</option>
                    <option value='Nicaragua'>Nicaragua</option>
                    <option value='Niederlande'>Niederlande</option>
                    <option value='Niederländische Antillen'>Niederländische Antillen</option>
                    <option value='Niger'>Niger</option>
                    <option value='Nigeria'>Nigeria</option>
                    <option value='Niue'>Niue</option>
                    <option value='Nordkorea'>Nordkorea</option>
                    <option value='Nördliche Marianen'>Nördliche Marianen</option>
                    <option value='Norfolkinsel'>Norfolkinsel</option>
                    <option value='Norwegen'>Norwegen</option>
                    <option value='Oman'>Oman</option>
                    <option value='Österreich'>Österreich</option>
                    <option value='Pakistan'>Pakistan</option>
                    <option value='Palästina'>Palästina</option>
                    <option value='Palau'>Palau</option>
                    <option value='Panama'>Panama</option>
                    <option value='Papua-Neuguinea'>Papua-Neuguinea</option>
                    <option value='Paraguay'>Paraguay</option>
                    <option value='Peru'>Peru</option>
                    <option value='Philippinen'>Philippinen</option>
                    <option value='Pitcairninseln'>Pitcairninseln</option>
                    <option value='Polen'>Polen</option>
                    <option value='Portugal'>Portugal</option>
                    <option value='Puerto Rico'>Puerto Rico</option>
                    <option value='Réunion'>Réunion</option>
                    <option value='Ruanda'>Ruanda</option>
                    <option value='Rumänien'>Rumänien</option>
                    <option value='Russische Föderation'>Russische Föderation</option>
                    <option value='Salomonen'>Salomonen</option>
                    <option value='Sambia'>Sambia</option>
                    <option value='Samoa'>Samoa</option>
                    <option value='San Marino'>San Marino</option>
                    <option value='São Tomé und Príncipe'>São Tomé und Príncipe</option>
                    <option value='Saudi-Arabien'>Saudi-Arabien</option>
                    <option value='Schweden'>Schweden</option>
                    <option value='Schweiz'>Schweiz</option>
                    <option value='Senegal'>Senegal</option>
                    <option value='Serbien und Montenegro'>Serbien und Montenegro</option>
                    <option value='Seychellen'>Seychellen</option>
                    <option value='Sierra Leone'>Sierra Leone</option>
                    <option value='Simbabwe'>Simbabwe</option>
                    <option value='Singapur'>Singapur</option>
                    <option value='Slowakei'>Slowakei</option>
                    <option value='Slowenien'>Slowenien</option>
                    <option value='Somalia'>Somalia</option>
                    <option value='Spanien'>Spanien</option>
                    <option value='Sri Lanka'>Sri Lanka</option>
                    <option value='St. Helena'>St. Helena</option>
                    <option value='St. Kitts und Nevis'>St. Kitts und Nevis</option>
                    <option value='St. Lucia'>St. Lucia</option>
                    <option value='St. Pierre und Miquelon'>St. Pierre und Miquelon</option>
                    <option value='St. VincentGrenadinen (GB)'>St. VincentGrenadinen (GB)</option>
                    <option value='Südafrika, Republik'>Südafrika, Republik</option>
                    <option value='Sudan'>Sudan</option>
                    <option value='Südkorea'>Südkorea</option>
                    <option value='Suriname'>Suriname</option>
                    <option value='Svalbard und Jan Mayen'>Svalbard und Jan Mayen</option>
                    <option value='Swasiland'>Swasiland</option>
                    <option value='Syrien'>Syrien</option>
                    <option value='Tadschikistan'>Tadschikistan</option>
                    <option value='Taiwan'>Taiwan</option>
                    <option value='Tansania'>Tansania</option>
                    <option value='Thailand'>Thailand</option>
                    <option value='Timor-Leste'>Timor-Leste</option>
                    <option value='Togo'>Togo</option>
                    <option value='Tokelau'>Tokelau</option>
                    <option value='onga'>onga</option>
                    <option value='Trinidad und Tobago'>Trinidad und Tobago</option>
                    <option value='Tristan da Cunha'>Tristan da Cunha</option>
                    <option value='Tschad'>Tschad</option>
                    <option value='Tschechische Republik'>Tschechische Republik</option>
                    <option value='Tunesien'>Tunesien</option>
                    <option value='Türkei'>Türkei</option>
                    <option value='Turkmenistan'>Turkmenistan</option>
                    <option value='Turks- und Caicosinseln'>Turks- und Caicosinseln</option>
                    <option value='Tuvalu'>Tuvalu</option>
                    <option value='Uganda'>Uganda</option>
                    <option value='Ukraine'>Ukraine</option>
                    <option value='Ungarn'>Ungarn</option>
                    <option value='Uruguay'>Uruguay</option>
                    <option value='Usbekistan'>Usbekistan</option>
                    <option value='Vanuatu'>Vanuatu</option>
                    <option value='Vatikanstadt'>Vatikanstadt</option>
                    <option value='Venezuela'>Venezuela</option>
                    <option value='Vereinigte Arabische Emirate'>Vereinigte Arabische Emirate</option>
                    <option value='Vereinigte Staaten von Amerika'>Vereinigte Staaten von Amerika</option>
                    <option value='Vietnam'>Vietnam</option>
                    <option value='Wallis und Futuna'>Wallis und Futuna</option>
                    <option value='Weihnachtsinsel'>Weihnachtsinsel</option>
                    <option value='Weißrussland'>Weißrussland</option>
                    <option value='Westsahara'>Westsahara</option>
                    <option value='Zentralafrikanische Republik'>Zentralafrikanische Republik</option>
                    <option value='Zypern'>Zypern</option>
                    </select>";
                    echo "<p id='acctext'>Telefonnummer*</p>";
                    echo "<input  type='tel' name='phone' value='$this->phone' required>";
                    echo "<p id='acctext'>Email*</p>";
                    echo "<input  type='email' name='email' value=$this->email required>";
                echo "<br/><button  type='submit' name='submitupdate'>Änderung Speichern</button></form>";
                echo "</details>";
                echo "<div><tr><th class='text-center' colspan='7'>";
                //Formular zur änderung des aktuellen Passworts
                        echo "<details><summary> Passwort ändern </summary>";
                        echo "<form method='post'>";
                        echo "<input type='hidden' name='customerid' value= $this->customerid>";
                        echo "<p id='acctext'>Passwort*</p>";
                        echo "<p id='acctext'>muss aus folgendenden Zeichen bestehen:<br/> min.6 max.25 Zeichen<br/>min. 1 Großbuchstabe<br/>min. 1 Kleinbuchstabe<br/>min. 1 Zahl<br/>leerzeichen sind nicht erlaubt</p>";
                        //Vorgabe des Passwort Standarts
                        echo "<input  type='password' name='pw' placeholder='Passwort' pattern='(?=^.{6,25}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$' required>";    
                        echo "<p id='acctext'>Passwort wiederholen*</p>";
                        echo "<input type='password' name='pw2' placeholder='Passwort wiederholen'  required><br/>";
                        echo "<button  type='submit' name='submitchangepassword'>Änderung Speichern</button></form>";
                        echo "</th></tr></div>";
                
				
                	
	}

            $db->close();
    }
    //Methode zur änderung einer Nutzerrolle
    public function changeing()
    {
        if(isset($_POST["submitaccmanagement"]))
        {   
            $db=new Dbconnect;
            $db->connect();
            $sql="SELECT * FROM customerlogon WHERE State='Admin'";
            $stmt = $db->prepareStatement($sql);
            $stmt->execute();
            $row=$stmt->fetch();
            $count=$stmt->rowCount();
                //Prüfung ob der letzte Administrator geändert wird (Verboten)
                if($count==1 && $row["CustomerID"]==$_POST["customerid"])       
                {
                    return "Letzter Administrator darf nicht geändert werden!";
                }else {
                    //Update in der Datenbank ->Rollenänderung
                    $sql="UPDATE customerlogon SET State=:rolle,DateLastModified=now() WHERE CustomerID=:customerid";       
                    $stmt = $db->prepareStatement($sql);
                    $stmt->bindValue(":customerid",$_POST["customerid"]);
                    $stmt->bindValue(":rolle",$_POST["Rolle"]);
                    $stmt->execute();
                    return "Rollen änderung erfolgreich gespeichert";
                }
                
            $db->close();
            
        }
        
    }
    //Methode zur änderung von Bunutzerdaten
    public function userupdate()
    {
        if(isset($_POST["submitupdate"]))
        {   
            
            $db=new Dbconnect;
            $db->connect();
            //Änderung für den Login
            $sql="UPDATE customerlogon SET UserName=:username,DateLastModified=now() WHERE CustomerID=:customerid";         
            $stmt = $db->prepareStatement($sql);
            $stmt->bindValue(":username",$_POST["email"]);
            $stmt->bindValue(":customerid",$_POST["customerid"]);
            $stmt->execute();
            //änderung der Stammdaten
            $sql="UPDATE customers 
            SET FirstName=:firstname, 
            LastName=:lastname,
            Address=:address,
            City=:city,
            Region=:region,
            Country=:country,
            Postal=:postal,
            Phone=:phone,
            Email=:email
            WHERE CustomerID=:customerid";
            $stmt = $db->prepareStatement($sql);
            $stmt->bindValue(":customerid",$_POST["customerid"]);
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
            return "Benutzerdaten erfolgreich geändert";
            $db->close();
        }
        
    }
        //Methode zur änderung des Passwortes
    public function changepassword()
    {
        if(isset($_POST["submitchangepassword"]))
        {
            //PHP seitige Prüfung ob beide Passwörter übereinstimmen -> Unstimmigkeit wird durch Html ausgegeben
            if($_POST["pw"]==$_POST["pw2"]) 
            {   
                $db=new Dbconnect;
                $db->connect();
                $sql="UPDATE customerlogon SET Pass=:pw,DateLastModified=now() WHERE CustomerID=:customerid";
                $stmt = $db->prepareStatement($sql);
                $hash=password_hash($_POST["pw"],PASSWORD_BCRYPT);
                $stmt->bindValue(":pw",$hash);
                $stmt->bindValue(":customerid",$_POST["customerid"]);
                $stmt->execute();
    
                    return "Passwort erfolgreich geändert";
                    $db->close();
            }
        }
    }
}