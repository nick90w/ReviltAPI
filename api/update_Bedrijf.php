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

    // Bedrijf 
    $Bedrijf_id = $_POST["bedrijf_id"];
    $Naam_bedrijf = $_POST["Naam_bedrijf"];
    $Gebruikersnaam = $_POST["GebruikersNaam"];
    $Password = $_POST["Password"];

    $item->Bedrijf_id = $Bedrijf_id;
    $item->Naam_bedrijf = $Naam_bedrijf;
    $item->Gebruikersnaam = $Gebruikersnaam;
    $item->Password = $Password;
    
    if($item->updateBedrijf())
    {
        echo json_encode("Bedrijf data updated.");
    } 
    else
    {
        echo json_encode("Bedrijf data could not be updated");
    }
?>