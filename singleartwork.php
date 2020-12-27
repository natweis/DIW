<?php

	require_once("assets/php/Singleartwork.php");
	$temp         = new Singleartwork($_GET["id"]);

	$queryidcheck = $temp -> querycheck($_GET['id']);
	if ($queryidcheck !== true){
		header("Location: /sorry.html");
	} ?>

<!DOCTYPE html>
<html lang="de">

<head>
	<title>Arthouse - Einzelansicht Kunstwerk</title>

	<!-- Import CSS Datein-->
	<?php
		include 'elemente/css-import.php'; ?>
	<link rel="stylesheet" href="assets/css/singleartwork-styles.css">

</head>

<body>

<!-- Import NAVBAR Datein-->
<?php
	include 'elemente/newnavbar.php'; ?>

<!-- CONTENT-BEREICH -->

<div>
	<div class="row">
		<div class="col-lg-10 offset-1">
			<h1><?php
					echo $temp -> getTitle(); ?></h1>

			<p><?php
					echo $temp -> getArtist(); ?></p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 col-lg-5 offset-1">
			<picture>
				<a href="#picture_modal" data-toggle="modal" data-target="#picture_modal"><img
							class="rounded img-fluid justify-content-start" src="<?php
						$temp -> getImage(); ?>"></a>
			</picture>
		</div>
		<!-- Modal -->
		<div class="modal fade" id="picture_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
		     aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title"><?php
								echo $temp -> getTitle(); ?></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<img class="rounded img-fluid justify-content-start" src="<?php
							$temp -> getBigImage(); ?>">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Schließen</button>
					</div>
				</div>
			</div>
		</div>
		<!-- Modal Ende-->
		<div class="col-md-5 col-lg-5">
			<p>
				<?php
					$temp -> getDescription(); ?>
			</p>
			<button class="btn btn-primary" type="button">
				<i class="fa fa-heart"></i>Auf die Wunschliste
			</button>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-5 offset-1">
			<div class="row">
				<div class="col-9">
					<div class="card">
						<div class="card-header">
							<h5 class="mb-0">Produktdetails:</h5>
						</div>
						<div class="card-body"></div>
						<div class="table-responsive table-borderless">
							<table class="table table-bordered">
								<tbody>
								<?php
									$temp -> fillTable(); ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Testumgebung -->

		<!-- Ende Testumgebung -->
		<div class="col-lg-6">
			<div class="row">
				<div class="col-lg-10">
					<h2>Das sagen unsere Kunden zu diesem Kunstwerk</h2>
					<p> Kundenbewertung ( &#216; ): <?php
							$temp -> get_avg_rating($_GET["id"]); ?> </p>
				</div>
			</div>
			<div class="row">
				<?php
					$temp -> reviews($_GET["id"]);?>

			</div>
			<div class="row">
				<div class="col-lg-10">
					<button class="btn btn-primary" type="button"><i class="fa fa-star"></i>selbst bewerten</button>
					<button class="btn btn-primary" type="button"><i class="fa fa-th-list"></i>weitere Bewertungen
					                                                                           ansehen
					</button>
				</div>
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