<?php

	use assets\php\Autoloader;?>

<!DOCTYPE html>
<html lang="de">

<head>
    <title>Arthouse - Über Uns</title>
	
	<!-- Import CSS Datein-->
	<?php include 'elemente/css-import.php'; ?><br>
	<link rel="stylesheet" href="assets/css/test.scs">
	
</head>

<body>

	<!-- Import NAVBAR Datein-->
    <?php include 'elemente/newnavbar.php'; ?>

	<!-- CONTENT-BEREICH -->



 <!-- MODALER REVIEW-DIALOG-->

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalPoll-1">Launch
  modal</button>

<!-- Modal: modalPoll -->
<div class="modal fade center" id="modalPoll-1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <p class="heading lead">Bewertung und Rezension abgeben
        </p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">×</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
        <div class="text-center">
<!--          <i class="far fa-file-alt fa-4x mb-3 animated rotateIn"></i>-->
          <p>
            <strong>Ihre Meinung ist uns wichtig!</strong>
          </p>
        </div>

        <hr>

        <!-- Radio -->
        <p class="text-center">
          <strong>Ihre Bewertung:</strong>
        </p>
<!--        <div class="form-check mb-4">-->
<!--          <input class="form-check-input" name="group1" type="radio" id="radio-179" value="option1" checked>-->
<!--          <label class="form-check-label" for="radio-179">Very good</label>-->
<!--        </div>-->
<!---->
<!--        <div class="form-check mb-4">-->
<!--          <input class="form-check-input" name="group1" type="radio" id="radio-279" value="option2">-->
<!--          <label class="form-check-label" for="radio-279">Good</label>-->
<!--        </div>-->
<!---->
<!--        <div class="form-check mb-4">-->
<!--          <input class="form-check-input" name="group1" type="radio" id="radio-379" value="option3">-->
<!--          <label class="form-check-label" for="radio-379">Mediocre</label>-->
<!--        </div>-->
<!--        <div class="form-check mb-4">-->
<!--          <input class="form-check-input" name="group1" type="radio" id="radio-479" value="option4">-->
<!--          <label class="form-check-label" for="radio-479">Bad</label>-->
<!--        </div>-->
<!--        <div class="form-check mb-4">-->
<!--          <input class="form-check-input" name="group1" type="radio" id="radio-579" value="option5">-->
<!--          <label class="form-check-label" for="radio-579">Very bad</label>-->
<!--        </div>-->
	      <div class="container">
		       <!--Review-->
      <i class="fas fa-star blue-text"> </i>
      <i class="fas fa-star blue-text"> </i>
      <i class="fas fa-star blue-text"> </i>
      <i class="fas fa-star blue-text"> </i>
      <i class="fas fa-star blue-text"> </i>

	      </div>


        <!-- Radio -->

        <p class="text-center">
          <strong>Sie haben die Möglichkeit eine ausführliche Rezension zu verfassen:</strong>
        </p>
        <!--Basic textarea-->
        <div class="md-form">
          <textarea type="text" id="form79textarea" class="md-textarea form-control" rows="3"></textarea>
<!--          <label for="form79textarea">Your message</label>-->
        </div>

      </div>

      <!--Footer-->
      <div class="modal-footer justify-content-center">
        <a type="button" class="btn btn-primary waves-effect waves-light">Senden
          <i class="fa fa-paper-plane ml-1"></i>
        </a>
        <a type="button" class="btn btn-outline-primary waves-effect" data-dismiss="modal">Abbrechen</a>
      </div>
    </div>
  </div>
</div>
<!-- Modal: modalPoll -->

	<!-- Import FOOTER Datein-->
    <?php include 'elemente/footer.php';	?>

	<!-- Import SCRIPT Datein-->
    <?php include 'elemente/script-import.php'; ?>

</body>
</html>



<!-- HTML Markup -->
<!--<p class="comment-respond-rating">-->
<!---->
<!--  <label>-->
<!--    Rating-->
<!--    <span class="required">*</span>-->
<!--  </label>-->
<!---->
<!--  <span class="star-rating-input">-->
<!---->
<!--    <label for="rating-star-1" class="star-rating-input-1">-->
<!--      1-->
<!--    </label>-->
<!--    <input  checked='checked' id="rating-star-1" name="rating" type="radio" value="1" />-->
<!---->
<!--    <label for="rating-star-2" class="star-rating-input-2">-->
<!--      2-->
<!--    </label>-->
<!--    <input  id="rating-star-2" name="rating" type="radio" value="2" />-->
<!---->
<!--    <label for="rating-star-3" class="star-rating-input-3">-->
<!--      3-->
<!--    </label>-->
<!--    <input  id="rating-star-3" name="rating" type="radio" value="3" />-->
<!---->
<!--    <label for="rating-star-4" class="star-rating-input-4">-->
<!--      4-->
<!--    </label>-->
<!--    <input  id="rating-star-4" name="rating" type="radio" value="4" />-->
<!---->
<!--    <label for="rating-star-5" class="star-rating-input-5">-->
<!--      5-->
<!--    </label>-->
<!--    <input  id="rating-star-5" name="rating" type="radio" value="5" />-->
<!---->
<!--  </span>-->
<!--</p>-->


