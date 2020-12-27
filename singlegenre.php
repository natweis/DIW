<?php 
	require_once("assets/php/Singlegenre.php");
	$temp = new Singlegenre($_GET['id']);
	if(!$temp->querycheck($_GET['id']))
	{
		header("Location: /sorry.html");
	}
?>
<!DOCTYPE html>
<html lang="de">

<head>
    <title>Arthouse - Einzelansicht Genre</title>
	
	<!-- Import CSS Datein-->
	<?php include 'elemente/css-import.php'; ?>
	<link rel="stylesheet" href="assets/css/genre-styles.css">
	
</head>

<body>

	<!-- Import NAVBAR Datein-->
    <?php include 'elemente/newnavbar.php'; ?>
	
	<!-- CONTENT-BEREICH -->
	<div class="container">
		<div class="row" id="content-genre">
			<h1><?php echo $temp->getGenreName(); ?></h1>
			<br><h4><?php echo $temp->getEra();?></h4>
			<p> <?php $temp->getDesc();?></p>
		</div>
		<div class="card" id="TableSorterCard">
			<div class="row table-topper align-items-center">
				<div class="col-4 text-left" style="margin: 0px;padding: 5px 15px;"><button class="btn btn-primary btn-sm reset" type="button" style="padding: 5px;margin: 2px;">Reset Filters</button><button class="btn btn-warning btn-sm" id="zoom_in" type="button" zoomclick="ChangeZoomLevel(-10);" style="padding: 5px;margin: 2px;"><i class="fa fa-search-plus"></i></button>
					<button	class="btn btn-warning btn-sm" id="zoom_out" type="button" zoomclick="ChangeZoomLevel(-10);" style="padding: 5px;margin: 2px;"><i class="fa fa-search-minus"></i></button>
				</div>
				<div class="col-4 text-right" style="margin: 0px;padding: 5px 10px;"><a href="#" data-toggle="modal" data-target="#tablehelpModal"></a></div>
			</div>
			<div class="row">
				<div class="col-12">
					<div>
						<table class="table table tablesorter" id="ipi-table">
							<thead class="thead-dark">
								<tr>
									<th class="sorter-false">Vorschau</th>
									<th>Künstler</th>
									<th>Bildtitel</th>
								</tr>
							</thead>
							<tbody>
								<?php $temp->getImage();?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>	
	
	
	<!-- Import FOOTER Datein-->
    <?php include 'elemente/footer.php';	?>
	
	<!-- Import SCRIPT Datein-->
    <?php include 'elemente/script-import.php'; ?>
	
</body>
</html>