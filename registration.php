<?php

	require_once("assets/php/Registration.php");
	$temp = new Registration();
?>
<!DOCTYPE html>
<html lang="de">

<head>
	<title>Arthouse - Registrierung</title>

	<!-- Import CSS Datein-->
	<?php
		include 'elemente/css-import.php'; ?>
	<link rel="stylesheet" href="assets/css/reg-styles.css">

</head>

<body style="background: url(assets/img/woman_gallery.jpg) center / cover no-repeat;">

<!-- Import NAVBAR Datein-->
<?php
	include 'elemente/newnavbar.php'; ?>

<!-- CONTENT-BEREICH -->

<div class="register-photo">
	<h2 class="text-center"><strong>Create</strong> an new account.</h2>
	<?php
		echo $temp -> userregistration(); ?>
	<div class="form-container">
		<div class="image-holder"></div>
		<form form method="post">
			<div class="form-group"><p id="acctext"> Vorname* </p></div>
			<div class="form-group"><input class="form-control" type="text" name="firstname" placeholder="Vorname"
			                               required></div>
			<div class="form-group"><p id="acctext">Nachname*</p></div>
			<div class="form-group"><input class="form-control" type="text" name="lastname" placeholder="Nachname"
			                               required></div>
			<div class="form-group"><p id="acctext">Straße, Hausnummer*</p></div>
			<div class="form-group"><input class="form-control" type="text" name="address"
			                               placeholder="Straße, Hausnummer" required></div>
			<div class="form-group"><p id="acctext">PLZ*</p></div>
			<div class="form-group"><input class="form-control" type="text" name="postal" placeholder="PLZ" required>
			</div>
			<div class="form-group"><p id="acctext">Stadt*</p></div>
			<div class="form-group"><input class="form-control" type="text" name="city" placeholder="Stadt" required>
			</div>
			<div class="form-group"><p id="acctext">Region</p></div>
			<div class="form-group"><input class="form-control" type="text" name="region" placeholder="Region"></div>
			<div class="form-group"><p id="acctext">Land*</p></div>
			<div class="form-group"><select name="country" required>
					<option value='Afghanistan'>Afghanistan</option>
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
				</select></div>
			<div class="form-group"><p id="acctext">Telefonnummer*</p></div>
			<div class="form-group"><input class="form-control" type="tel" name="phone" placeholder="Telefonnummer"
			                               required></div>
			<div class="form-group"><p id="acctext">Email*</p></div>
			<div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email" required>
			</div>
			<div class="form-group"><p id="acctext">Passwort*</p></div>
			<div class="form-group"><p id="acctext">muss aus folgenden Zeichen bestehen:<br/> min.6 max.25
			                                        Zeichen<br/>min. 1 Großbuchstabe<br/>min. 1 Kleinbuchstabe<br/>min.
			                                        1 Zahl<br/>Leerzeichen sind nicht erlaubt</p></div>
			<div class="form-group"><input class="form-control" id="password" type="password" name="pw"
			                               placeholder="Passwort"
			                               pattern="(?=^.{6,25}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"
			                               required></div>
			<div class="form-group"><p id="acctext">Passwort wiederholen*</p></div>
			<div class="form-group"><input class="form-control" type="password" name="pw2"
			                               placeholder="Passwort wiederholen" required></div>
			<div class="form-group"><p id="acctext">Mit * markierte Felder müssen ausgefüllt sein.</p></div>
			<div class="form-group"></div>
			<div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox"
			                                                               required><a href='#'>I agree to the license
			                                                                                    terms.</a></label></div>
			<div class="form-group">
				<button class="btn btn-primary btn-block" type="submit" name="submitacc">Sign Up</button>
			</div>
			<a class="already" href="login.php">You already have an account? Login here.</a></form>
	</div>
</div>

<!-- Import FOOTER Datein-->
<?php
	include 'elemente/footer.php'; ?>

<!-- Import SCRIPT Datein-->
<?php
	include 'elemente/script-import.php'; ?>

</body>
</html>