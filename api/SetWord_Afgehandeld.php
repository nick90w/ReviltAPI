<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    include_once '../config/database.php';
    include_once '../class/vilt.php';
    
    // test link http://localhost/ReviltAPI/api/update_Bedrijf.php?Vilt_id=1&Word_afgehandeld=0


    $database = new Database();
    $db = $database->getConnection();
    
    $item = new Vilt($db);
    
   // $data = json_decode(file_get_contents("php://input"));
    
   // $item->Vilt_id = $data->Vilt_id;
    
    // Vilt 
    $Vilt_id = $_GET["Vilt_id"];
    $Word_afgehandeld = $_GET["Word_afgehandeld"];


    $item->Vilt_id = $Vilt_id;
    $item->Word_afgehandeld = $Word_afgehandeld;
    /*
    $item->Naam_bedrijf = $data->Naam_bedrijf;
    $item->Gebruikersnaam = $data->Gebruikersnaam;
    $item->Password = $data->Password; */

    
    if($item->SetWord_afgehandeld()){
        echo json_encode("Vilt data updated.");
    } else{
        echo json_encode("Vilt data could not be updated");
    }
?>