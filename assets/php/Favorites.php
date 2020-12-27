<?php

	error_reporting(E_ALL);
	ini_set('display_errors', 'On');

class Favorites
{
    public function savefavorites()
    {
        if(isset($_GET["submitfavartwork"]))
        {   
            $_SESSION['favoriteartwork'][]=$_GET["submitfavartwork"];
        }
        if(isset($_POST["submitfavartist"]))
        {   
            $_SESSION['favoriteartist'][]=$_POST["favartist"];
        }
    }

    public function returnfavorites()
    {
        
        print_r($_SESSION);
    }
}//$_SESSION['favoriteartist'][]; 