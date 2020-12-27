function delReview(reviewID) {

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {

        document.getElementById('rev-' + reviewID).innerHTML = "";

    };

    xhttp.open("GET", "../../controller/reviews/removeReviewController.php?rev=" + reviewID, true);
    xhttp.send();
}