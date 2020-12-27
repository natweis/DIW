<?php

	require_once('assets/php/Singleartwork.php');
	$temp = new Singleartwork(); ?>

<!DOCTYPE html>
<html lang="de">

<head>
	<title>Arthouse - Alle Themen</title>

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
<div class="reviews"></div>
<script>
    const reviews_page_id = 1;
    fetch("reviews.php?page_id=" + reviews_page_id).then(response => response.text()).then(data => {
        document.querySelector(".reviews").innerHTML = data;
        document.querySelector(".reviews .write_review_btn").onclick = event => {
            event.preventDefault();
            document.querySelector(".reviews .write_review").style.display = 'block';
            document.querySelector(".reviews .write_review input[name='name']").focus();
        };
        document.querySelector(".reviews .write_review form").onsubmit = event => {
            event.preventDefault();
            fetch("reviews.php?page_id=" + reviews_page_id, {
                method: 'POST',
                body: new FormData(document.querySelector(".reviews .write_review form"))
            }).then(response => response.text()).then(data => {
                document.querySelector(".reviews .write_review").innerHTML = data;
            });
        };
    });
</script>

<!-- /.container -->

<!-- Import FOOTER Datein-->
<?php
	include 'elemente/footer.php'; ?>

<!-- Import SCRIPT Datein-->
<?php
	include 'elemente/script-import.php'; ?>

</body>
</html>
