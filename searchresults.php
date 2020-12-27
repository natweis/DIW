<!DOCTYPE html>
<html lang="de">

<head>
    <title>Arthouse - Suchergebnis</title>
	
	<!-- Import CSS Datein-->
	<?php include 'elemente/css-import2.php'; ?>
	<link rel="stylesheet" href="../assets/css/searchresult-styles.css">

</head>

<body>

	<!-- Import NAVBAR Datein-->
    <?php include 'elemente/newnavbar.php'; ?>
	
	<!-- CONTENT -->
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
								<!--- Tabellenkopf teilweise mit Sortierfunktion und Suchfeld -->
                                    <th class="filter-false sorter-false">Vorschau</th>
                                    <th>Künstler</th>
                                    <th>Bildtitel</th>
                                    <th class="filter-false">Jahr</th>
                                    <th class="filter-false">UVP (€)</th>
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
    <?php include 'elemente/script-import2.php'; ?>
		
</body>
</html>