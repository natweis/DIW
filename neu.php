<?php

//	require_once("assets/php/Singleartwork.php");
	require_once("assets/php/Neu.php");
	$temp = new Neu(); ?>

<!DOCTYPE html>
<html lang="de">

<head>
	<title>Arthouse - Neuzugänge</title>

	<!-- Import CSS Datein-->
	<?php
		include 'elemente/css-import.php'; ?>
		<link rel="stylesheet" href="assets/css/neu-styles.css">
		<link rel="stylesheet" href="assets/css/neulist-styles.css">

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
			$temp -> getAllArtworks(); ?>
	</div>
</div>

<ul class="pagination modal-1">
	<li><a href="#" class="prev">&laquo</a></li>
	<li><a href="#" class="active">1</a></li>
	<li><a href="#">2</a></li>
	<li><a href="#">3</a></li>
	<li><a href="#">4</a></li>
	<li><a href="#">5</a></li>
	<li><a href="#">6</a></li>
	<li><a href="#">7</a></li>
	<li><a href="#">8</a></li>
	<li><a href="#">9</a></li>
	<li><a href="#" class="next">&raquo;</a></li>
</ul>
<br>
<!-- Import FOOTER Datein-->
<?php
	include 'elemente/footer.php'; ?>

<!-- Import SCRIPT Datein-->
<?php
	include 'elemente/script-import.php'; ?>

</body>
</html>

