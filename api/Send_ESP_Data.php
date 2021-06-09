<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    include_once '../config/database.php';
    include_once '../class/vilt.php';
    
    // test link http://localhost/ReviltAPI/api/update_Bedrijf.php?vilt_id=1&word_afgehandeld=0


    $database = new Database();
    $db = $database->getConnection();
    
    $item = new Vilt($db);
    
   // $data = json_decode(file_get_contents("php://input"));
    
   // $item->vilt_id = $data->vilt_id;
    
    // Vilt 
    $vilt_id = $_POST["vilt_id"];
    $gewicht_glas = $_POST["gewicht_glas"];


    $item->vilt_id = $vilt_id;
    $item->gewicht_glas = $gewicht_glas;
    /*
    $item->Naam_bedrijf = $data->Naam_bedrijf;
    $item->Gebruikersnaam = $data->Gebruikersnaam;
    $item->Password = $data->Password; */

    
    if($item->SendESPData()){
        echo json_encode("Vilt data updated.");
    } else{
        echo json_encode("Vilt data could not be updated");
    }
?>