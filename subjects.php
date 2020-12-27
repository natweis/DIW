<?php

	require_once('assets/php/Subjects.php');
	$temp = new Subjects();

	$queryidcheck = $temp -> querycheck($_GET['id']);
	if ($queryidcheck != true){
		header("Location: /sorry.html");
	} ?>

<!DOCTYPE html>
<html lang="de">

<head>
	<title>Arthouse - Alle Themen</title>

	<!-- Import CSS Datein-->
	<?php
		include 'elemente/css-import.php'; ?>
	<link rel="stylesheet" href="assets/css/subjects-styles.css">

</head>

<body>

<!-- Import NAVBAR Datein-->
<?php
	include 'elemente/newnavbar.php'; ?>

<!-- CONTENT-BEREICH -->

<div class="container-fluid">
	<h1> Unsere Themen </h1>
	<div class="row">
		<?php
			$temp -> subjectlist(); ?>
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