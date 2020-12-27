<!DOCTYPE html>
<html lang="de">

<head>
    <title>Arthouse - Home</title>
	
	<!-- Import CSS Datein-->
	<?php include 'elemente/css-import.php'; ?>
	<link rel="stylesheet" href="assets/css/home-styles.css">
	<link rel="stylesheet" href="assets/css/homy.css">

</head>

<body>

	<!-- Import NAVBAR Datein-->
    <?php include 'elemente/newnavbar.php'; ?>
	
	<!-- CONTENT-BEREICH -->
	
    <div class="simple-slider">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide" id="slide1"></div>
                <div class="swiper-slide" id="slide2"></div>
                <div class="swiper-slide" id="slide3"></div>
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
        <div style="height: 28px;"></div>
    </div>
    <div class="article-list">
        <div class="container">
            <div class="intro">
                <h2 class="text-center">Was interessiert Sie?</h2>
                <p class="text-center">Schauen Sie sich doch unsere Neuzugänge an oder interessieren Sie sich für einen bestimmten Künstler?&nbsp;</p>
            </div>
            <div class="row articles">
			<!-- NEUZUGÄNGE -->
				<div class="col-sm-6 col-md-6 item">
					<a href="#"><img class="img-fluid" src="assets/img/desk.jpg"></a>
					<h3 class="name">Neuzugänge</h3>
					<p class="description">#* Hier sollen die neusten Kunstwerke angezeigt werden. Die Reihenfolge muss durch das Datum das hinzufügens in die Datenbank bestimmt werden. Das Bild oberhalb sollte das zuletzt hinzugefügte sein. *#</p>
					<a class="action" href="neu.php">
						<i class="fa fa-arrow-circle-right"></i>
					</a>
				</div>
			<!-- TOP Werke -->    
				<div class="col-sm-6 col-md-6 item">
					<a href="#"><img class="img-fluid" src="assets/img/building.jpg"></a>
					<h3 class="name">TOP Künstler / Werke</h3>
					<p class="description">#* Hier muss via PHP Funktion der Künstler mit der durchschnittlich besten Bewertung angezeigt werden. Das Bild oberhalb muss zum Künstler gehören. *#</p>
					<a class="action" href="topartist.php">
						<i class="fa fa-arrow-circle-right"></i>
					</a>
				</div>	
			</div>
		</div>
			
    </div>
	<!-- NEUSTE BEWERTUNG -->
    <div class="row" id="revhead">
		<div class="col-10 offset-1">
			<h3 class="name">Neuste Bewertungen</h3>
			<a class="action" href="feedback.php">
				<i class="fa fa-arrow-circle-right"></i>
			</a>
		</div>
    </div>
	<div class="row" id="rev">
		<?php
			require_once("assets/php/HomeFeatures.php");
			$temp = new Homefeatures();
			$temp->newreviews();
		?>
	</div>
	
	<!-- Import FOOTER Datein-->
    <?php include 'elemente/footer.php';	?>
	
	<!-- Import SCRIPT Datein-->
    <?php include 'elemente/script-import.php'; ?>
	
</body>
</html>