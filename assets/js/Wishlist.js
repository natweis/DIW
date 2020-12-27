function addFavourite(id) {

    //Create XMLHTTP request object (the keystone of AJAX)
    var xhttp = new XMLHttpRequest();

    //What happens when response is received
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {

            document.getElementById('favourite').innerHTML = "";
            document.getElementById('favourite').innerHTML = "<button class='btn btn-danger' onclick='removeFavourite(" + id + ")'><span class='glyphicon glyphicon-heart-empty'></span> Von Wunschliste entfernen</button>";
        }
    };

    //Where to send the request
    xhttp.open("GET", "../../../art/controller/favourites/addFavouritesController.php?id=" + id, true);
    xhttp.send();
}

function removeFavourite(id) {

    //Create XMLHTTP request object (the keystone of AJAX)
    var xhttp = new XMLHttpRequest();

    //What happens when response is received
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {

            document.getElementById('favourite').innerHTML = "";
            document.getElementById('favourite').innerHTML = "<button class='btn btn-primary' onclick='addFavourite(" + id + ")'><span class='glyphicon glyphicon-heart'></span> Zur Wunschliste hinzufügen</button>";
        }
    };

    //Where to send the request
    xhttp.open("GET", "../../../art/controller/favourites/removeFavouritesController.php?product_id_remove=" + id, true);
    xhttp.send();
}

function removeFavouriteList(id) {

    //Create XMLHTTP request object (the keystone of AJAX)
    var xhttp = new XMLHttpRequest();

    //What happens when response is received
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {

            if (this.responseText) {
                document.getElementById('favouritesTitle').innerHTML = "Empty Favourites List";
            }

            document.getElementById('deleteItem' + id).innerHTML = "";
        }
    };

    //Where to send the request
    xhttp.open("GET", "../../../art/controller/favourites/removeFavouritesController.php?product_id_remove=" + id, true);
    xhttp.send();
}