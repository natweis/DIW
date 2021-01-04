<?php

	error_reporting(E_ALL);
	ini_set('display_errors', 'On');

	use assets\php\DBController;


	require_once("DBController.php");
	$db_handle = new DBController();
	if (!empty($_GET["action"])){
		switch ($_GET["action"]){
			case "add":
				if (isset($id)){
					$artworksByID = $db_handle -> runQuery("SELECT artworks.Title FROM artworks WHERE $id='".$_GET['id']."'");
					$itemArray    = array($artworksByID[0]['id'] => array('title' => $artworksByID[0]["Title"], 'id' => $artworksByID[0]["ArtWorkID"], 'image' => $artworksByID[0]["ImageFileName"]));

					if (!empty($_SESSION["cart_item"])){
						if (array_key_exists($artworksByID[0]["id"], $_SESSION["cart_item"])){
							foreach ($_SESSION["cart_item"] as $k => $v){
								if ($artworksByID[0]["id"] === $k){
									if (empty($_SESSION["cart_item"][$k]["quantity"])){
										$_SESSION["cart_item"][$k]["quantity"] = 0;
									}
									$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
								}
							}
						} else {
							$id = 0;
							$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
						}
					} else {
						$_SESSION["cart_item"] = $itemArray;
					}
				}
				break;
			case "remove":
				if (!empty($_SESSION["cart_item"])){
					foreach ($_SESSION["cart_item"] as $k => $v){
						if ($_GET["id"] === $k) unset($_SESSION["cart_item"][$k]);
						if (empty($_SESSION["cart_item"])) unset($_SESSION["cart_item"]);
					}
				}
				break;
			case "empty":
				unset($_SESSION["cart_item"]);
				break;
		}
	}
