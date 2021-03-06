<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once '../config/database.php';
    include_once '../class/bedrijf.php';

    $database = new Database();
    $db = $database->getConnection();

    $item = new Bedrijf($db);

    $Naam_bedrijf = $_POST["Naam_bedrijf"];
    $GebruikersNaam = $_POST["GebruikersNaam"];
    $Password = $_POST["Password"];

    $item->Naam_bedrijf = $Naam_bedrijf;
    $item->Gebruikersnaam = $GebruikersNaam;
    $item->Password = $Password;
    
    if($item->createBedrijf())
    {
        echo 'Bedrijf created successfully.';
    } 
    else
    {
        echo 'Bedrijf could not be created.';
    }
?>