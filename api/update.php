<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    include_once '../config/database.php';
    include_once '../class/vilt.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $item = new Vilt($db);
    
    //$data = json_decode(file_get_contents("php://input"));

    $Gewicht_glas = $_POST["Gewicht_glas"];
    $Melding_boolean =  $_POST["Melding_boolean"];
    $Word_afgehandeld =  $_POST["Word_afgehandeld"];
    $Vilt_id =  $_POST["Vilt_id"];

    $item->Vilt_id = $Vilt_id; 
    $item->Gewicht_glas = $Gewicht_glas;
    $item->Melding_boolean = $Melding_boolean;
    $item->Word_afgehandeld = $Word_afgehandeld;

    
    if($item->updateVilt()){
        echo json_encode("Vilt data updated.");
    } else{
        echo json_encode("Data could not be updated");
    }
?>