<?php
require_once("assets/php/Myaccount.php");
session_start();
if(!isset($_SESSION["UserName"])){
	header("Location: /home.php");
	exit;
};
$temp=new Myaccount;
?>
<!DOCTYPE html>
<html lang="de">
<meta charset="utf-8">

<head>
    <title>Arthouse - Über Uns</title>
	
	<!-- Import CSS Datein-->
	<?php include 'elemente/css-import.php'; ?>
	<link rel="stylesheet" href="assets/css/accountmanagement-style.css">
	
</head>

<body>
<div class="accbgr">
	<!-- Import NAVBAR Datein-->
    <?php include 'elemente/newnavbar.php'; ?>
	
	<!-- CONTENT-BEREICH -->
	
		
			<h1> Benutzer Account Verwalten </h1>
			<div class="accreturn"><?php
				echo $temp->userupdate();
				echo $temp->changepassword();
				?></div>
					<div id="table"><table  >
					<tr class="text-center">
						<th>BenutzerID</th>
						<th>Vorname</th>
						<th>Nachname</th>
						<th>Email</th>
						<th>Registrierungsdatum</th>
						<th>Letzte Änderung</th>
					</tr>
					<?php echo $temp->account($name); ?>
					</table></div>
	

			<!-- Import FOOTER Datein-->
			<?php include 'elemente/footer.php';	?>
			
			<!-- Import SCRIPT Datein-->
			<?php include 'elemente/script-import.php';  ?>
		
    </div>
	
</body>
</html>