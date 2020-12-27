<?php 
require_once("assets/php/Login.php");
$temp=new Login;
?>
<!DOCTYPE html>
<html lang="de">

<head>
    <title>Arthouse - Login</title>
	
	<!-- Import CSS Datein-->
	<?php include 'elemente/css-import.php'; ?>
	<link rel="stylesheet" href="assets/css/login-styles.css">
	
</head>

<body style="background: url(assets/img/woman_gallery.jpg) center / cover no-repeat;">

	<!-- Import NAVBAR Datein-->
    <?php include 'elemente/newnavbar.php'; ?>
	
	<!-- CONTENT-BEREICH -->
	
    <div class="login-dark" >
        <form id="login-screen"  method="post">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><i class="icon ion-ios-locked-outline"></i></div>
            <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email" require></div>
            <div class="form-group"><input class="form-control" type="password" name="pw" placeholder="Passwort" require></div>
            <?php  echo $temp->userlogin(); ?>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit" name="submitlogin">Log In</button></div>
            <a class="forgot" href="#">Forgot your email or password?</a>
			<a class="forgot" href="registration.php">No Login - create a new account.</a></form>
    </div>
    <?php include 'elemente/footer.php';	?>
	
	<!-- Import FOOTER Datein-->
    
	
	<!-- Import SCRIPT Datein-->
    <?php include 'elemente/script-import.php'; ?>
	
</body>
</html>