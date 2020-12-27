<!DOCTYPE html>
<html lang="de">

<head>
    <title>Arthouse - Suchergebnis</title>
	
	<!-- Import CSS Datein-->
	<?php include 'elemente/css-import.php'; ?>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
	
	<link rel="stylesheet" href="../assets/css/searchresult-styles.css">
	
	
	<!--  -->
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/css/theme.bootstrap_4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
	
</head>

<body>

	<!-- Import NAVBAR Datein-->
    <?php include 'elemente/newnavbar.php'; ?>
	
	<!-- CONTENT-BEREICH -->
	<!--
	<table id="searchresulttable" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Vorschau</th>
                <th>Künstler</th>
                <th>Bildtitel</th>
            </tr>
        </thead>
        <tbody>
			
        </tbody>
        <tfoot>
            <tr>
                <th>Vorschau</th>
                <th>Künstler</th>
                <th>Bildtitel</th>
            </tr>
        </tfoot>
    </table>
	-->
	
	<div class="container">
        <div class="card" id="TableSorterCard">
            <div class="row table-topper align-items-center">
                <div class="col-4 text-left" style="margin: 0px;padding: 5px 15px;"><button class="btn btn-primary btn-sm reset" type="button" style="padding: 5px;margin: 2px;">Reset Filters</button><button class="btn btn-warning btn-sm" id="zoom_in" type="button" zoomclick="ChangeZoomLevel(-10);" style="padding: 5px;margin: 2px;"><i class="fa fa-search-plus"></i></button><button class="btn btn-warning btn-sm" id="zoom_out" type="button" zoomclick="ChangeZoomLevel(-10);" style="padding: 5px;margin: 2px;"><i class="fa fa-search-minus"></i></button></div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div>
                        <table class="table table tablesorter" id="ipi-table">
                            <thead class="thead-dark">
                                <tr>
                                    <th class="filter-false sorter-false">Vorschau</th>
                                    <th>Künstler</th>
                                    <th>Bildtitel</th>
                                    <th class="filter-false">Jahr</th>
                                    <th class="filter-false">Preis</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php search_for($_GET['suchfeld']);?>
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
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
	
	
	<script>
	
	$(document).ready(function() {
		$('#searchresulttable').DataTable( {
			"paging":   true,
			"searching":false,
			"ordering": true,
			"info":     true
		} );
	} );
	</script>
	
	<!-- -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/bs-init.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="../assets/js/-Filterable-Cards-.js"></script>
    <script src="../assets/js/Bootstrap-DataTables.js"></script>
    <script src="../assets/js/Animated-Pretty-Product-List-v12.js"></script>
    <script src="../assets/js/Animated-Type-Heading.js"></script>
    <script src="../assets/js/Data-Table-with-Search-Sort-Filter-and-Zoom-using-TableSorter.js"></script>
    <script src="../assets/js/Dynamic-Table.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/jquery.tablesorter.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/widgets/widget-filter.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/widgets/widget-storage.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/ListeBien.js"></script>
    <script src="../assets/js/Material-Inputs.js"></script>
    <script src="../assets/js/Review-rating-Star-Review-Button.js"></script>
    <script src="../assets/js/Simple-Slider.js"></script>
    <script src="../assets/js/Table-With-Search.js"></script>

	
</body>
</html>