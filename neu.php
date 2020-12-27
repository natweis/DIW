<?php

	require_once("assets/php/Singleartwork.php");
	require_once("assets/php/Neu.php");
	$temp = new Neu();  ?>

<!DOCTYPE html>
<html lang="de">

<head>
	<title>Arthouse - Neuzugänge</title>

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
	<h1> Unsere Neuzugänge </h1>
	<div class="row">
		<?php
			$temp -> artworklist(); ?>
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

