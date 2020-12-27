<?php
	require_once('assets/php/Genres.php');
	$temp = new Genres(); ?>

<!DOCTYPE html>
<html lang="de">

<head>
	<title>Arthouse - Alle Genres</title>

	<!-- Import CSS Datein-->
	<?php
		include 'elemente/css-import.php'; ?>
	<link rel="stylesheet" href="assets/css/genrelist-styles.css">

</head>

<body>

<!-- Import NAVBAR Datein-->
<?php
	include 'elemente/newnavbar.php'; ?>

<!-- CONTENT-BEREICH -->

<div class="container-fluid">
	<h1> Unsere Genres </h1>
	<div class="row">
		<?php
			$temp -> genrelist(); ?>
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