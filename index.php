<?php

	use assets\php\Template;

	Template ::view('index.html');
?>

<!DOCTYPE html>
<html lang="de">

<head>
	<title>Arthouse - Landingpage</title>

	<!-- Import CSS Datein-->
	<?php
		include 'elemente/css-import.php'; ?>

</head>

<body style="background: url(assets/img/woman_gallery.jpg) center / cover no-repeat;">

<!-- Import NAVBAR Datein-->
<?php
	include 'elemente/newnavbar.php'; ?>

<!-- CONTENT-BEREICH -->

<div class="d-flex justify-content-center m-auto" style="height: 580px;">
	<div class="row">
		<div class="col align-self-start" style="margin-top: 100px;">
			<h1 class="display-1 text-uppercase align-self-center"
			    style="color: #f9e526;background: rgba(52,58,64,0.82);opacity: 1;font-size: 30px;font-family: Alegreya, serif;text-align: center;padding-top: 5px;padding-right: 5px;padding-bottom: 5px;padding-left: 5px;margin-bottom: 0px;border-width: 5px;border-style: solid;border-bottom-style: none;border-left-style: solid;">
				welcome to arthouse</h1>
			<h2 class="display-1"
			    style="color: #f9e526;background: rgba(52,58,64,0.82);opacity: 1;font-size: 15px;font-family: Raleway, sans-serif;text-align: center;padding-top: 5px;padding-right: 5px;padding-bottom: 5px;padding-left: 5px;margin-bottom: 0px;border-width: 5px;border-style: none;border-right-style: solid;border-bottom-style: solid;border-left-style: solid;">
				&nbsp;| proudly presented by Gruppe C&nbsp; |</h2>
		</div>
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