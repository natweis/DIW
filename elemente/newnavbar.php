<?php

	ini_set('display_errors', 1);
	error_reporting(E_ALL ^ E_NOTICE);

	require_once("assets/php/Login.php");

	session_start();

	$tempnav = new Login;
	if (isset($_GET["logout"])){
		session_destroy();
		header("Location: /home.php");
	};
	//Setzen einer Variable für die Anzeige des Nutzernamens
	//wird nicht zur Validierung von Seiten oder zugängen genutzt
	if (!isset($_SESSION["UserName"])){
		$name = false;
	} else {
		$name = $_SESSION["UserName"];
	};
?>
<div class="container">
	<div class="navbar">
		<nav class="navbar navbar-dark navbar-expand-md fixed-top bg-dark">
			<div class="container-fluid"><a class="navbar-brand text-left" id="logo"
			                                href="index.php"><strong>ARTHOUSE</strong></a><a class="navbar-brand"
			                                                                                 href="#"></a>
				<div class="collapse navbar-collapse" id="navcol-1">
					<ul class="nav navbar-nav flex-grow-1 justify-content-between">
						<li class="nav-item"><a class="nav-link" href="home.php">HOME</a></li>
						<li class="nav-item"><a class="nav-link" href="search.php">SUCHE</a></li>
						<li class="nav-item"><a class="nav-link" href="about.php">ÜBER UNS</a></li>
						<!-- Dropdown-Menue Stoebern-->
						<li class="nav-item dropdown"><a class="dropdown-toggle nav-link text-uppercase"
						                                 data-toggle="dropdown" aria-expanded="false"
						                                 href="#">Stöbern</a>
							<div class="dropdown-menu" id="stoebern-icon">
								<div class="row">
									<div class="col"><i class="fa fa-sort-alpha-asc"></i><a
												href="alphabeticalartistlist.php">Künstler A-Z</a></div>
								</div>
								<div class="row">
									<div class="col"><i class="fa fa-history"></i><a href="neu.php">Neue Kunstwerke</a>
									</div>
								</div>
								<div class="row">
									<div class="col"><i class="fa fa-paint-brush"></i><a href="genres.php">Nach Genre</a>
									</div>
								</div>
								<div class="row">
									<div class="col"><i class="fa fa-paint-brush"></i><a href="subjects.php">Nach
									                                                                         Themen</a>
									</div>
								</div>
							</div>
						</li>
						<li class="nav-item"></li>
						<li class="nav-item"></li>
						<!-- permanentes Suchfeld -->
						<?php
							require_once("assets/php/simplesearch.php"); ?>

						<li class="nav-item">
							<form action="searchresults.php" method="GET">
								<input class="form-control-sm" type="text" id="suchfeld" name="suchfeld"
								       placeholder="Suchbegriff" min="1"/>
								<button type="submit" name="action" value="suche_starten" id="such-icon"><i
											class="fa fa-search"></i></button>
							</form>
						</li>
						<!--<li class="nav-item"></li>-->
						<li class="nav-item"></li>
						<li class="nav-item"></li>
						<li class="nav-item"></li>
						<li class="nav-item dropdown" id="home-menue"><a class="dropdown-toggle nav-link"
						                                                 data-toggle="dropdown" aria-expanded="false"
						                                                 href="#"><i class="icon ion-ios-home"></i></a>
							<div class="dropdown-menu">
								<div class="row">
									<div class="col"><i class="fa fa-key"></i><a id="login-icon" href="login.php">Login
									                                                                              /
									                                                                              Register</a>
									</div>
								</div>
								<div class="row">
									<div class="col"><i class="fa fa-heart" id="favoriten-icon"></i><a
												href="favorites.php">Wunschliste</a></div>
								</div>
								<div class="row">
									<?php
										echo "<div class='col'>";
										//Ausgabe des Menüs angepasst auf den Nutzernamen und Loginstatus
										if ($name === false){
											echo "<i class='fa fa-gears' id='meinaccount-icon'></i><a href='login.php'>Mein Account</a>";
										} else {
											echo "<i class='fa fa-gears' id='meinaccount-icon'></i><a href='myaccount.php'>Mein Account $name</a>";
											echo "<br/>";
											//Prüfung ob der Nutzer Administrator ist
											if ($tempnav -> admincheck() === 'Admin'){
												echo "<i class='fa fa-users' id='usermgmt-icon'></i><a href='/accountmanagement.php'>UserMgmt</a>";
												echo "<br/>";
											}

											echo "<i class='fas fa-sign-out-alt' id='logout-icon'></i><a href='home.php?logout=true'>Abmelden</a>";

										}
									?>
								</div>
							</div>
				</div>
				</li>
				</ul>
			</div>
			<button data-target="#navcol-1" data-toggle="collapse" class="navbar-toggler"><span class="sr-only">Toggle navigation</span><span
						class="navbar-toggler-icon"></span></button>
	</div>
	</nav>
</div>
</div>