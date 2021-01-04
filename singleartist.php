<?php

	require_once("assets/php/Singleartist.php");
	$temp         = new Singleartist($_GET["id"]);
	$queryidcheck = $temp -> querycheck($_GET['id']);
	if ($queryidcheck != true){
		header("Location: /sorry.html");
	}
?>

<!DOCTYPE html>
<html lang="de">

<head>
	<title>Arthouse - Einzelansicht Künstler</title>

	<!-- Import CSS Datein-->
	<?php
		include 'elemente/css-import.php'; ?>
	<link rel="stylesheet" href="assets/css/singleartist-styles.css">

</head>

<body>

<!-- Import NAVBAR Datein-->
<?php
	include 'elemente/newnavbar.php'; ?>

<!-- CONTENT-BEREICH -->

<div class="container-fluid">
	<div>
		<div class="row offset-1">
			<h1><?php
					$temp -> getFullName(); ?></h1>
		</div>
		<div class="row">
			<div class="col-md-4">
				<img src="<?php
					$temp -> getImage(); ?>">
			</div>
			<div class="col-6">
				<div class="row">
					<div class="col">
						<p><?php
								$temp -> getDescription(); ?></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<div class="card">
							<div class="card-header">
								<h5 class="mb-0">Künstlerdetails:</h5>
							</div>
							<div class="card-body"></div>
							<div class="table-responsive table-borderless">
								<table class="table table-bordered">
									<tbody>
									<?php
										$temp -> fillTable(); ?>
									</tbody>
								</table>
								<button class="btn btn-primary" type="button">
													<i class="fa fa-heart"></i>Auf die Wunschliste
												</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container-fluid">
			<h2>Weitere Kunstwerke: </h2>
			<div class="row">
				<?php
					$temp -> thumb(); ?>
			</div>
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