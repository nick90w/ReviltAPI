<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once '../config/database.php';
    include_once '../class/bedrijf.php';

    //test link: http://localhost/ReviltAPI/api/create_Bedrijf.php?Naam_bedrijf=haha&GebruikersNaam=haha&Password=haha



    $database = new Database();
    $db = $database->getConnection();

    $item = new Bedrijf($db);

    //$data = json_decode(file_get_contents("php://input"));
    $Naam_bedrijf = $_GET["Naam_bedrijf"];
    $GebruikersNaam = $_GET["GebruikersNaam"];
    $Password = $_GET["Password"];

    $item->Naam_bedrijf = $Naam_bedrijf;
    $item->Gebruikersnaam = $GebruikersNaam;
    $item->Password = $Password;
    
    if($item->createBedrijf()){
        echo 'Bedrijf created successfully.';
    } else{
        echo 'Bedrijf could not be created.';
    }
?>