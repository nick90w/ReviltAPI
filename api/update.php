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

    $gewicht_glas = $_POST["gewicht_glas"];
    $melding_boolean =  $_POST["melding_boolean"];
    $word_afgehandeld =  $_POST["word_afgehandeld"];
    $vilt_id =  $_POST["vilt_id"];

    $item->vilt_id = $vilt_id; 
    $item->gewicht_glas = $gewicht_glas;
    $item->melding_boolean = $melding_boolean;
    $item->word_afgehandeld = $word_afgehandeld;

    
    if($item->updateVilt()){
        echo json_encode("Vilt data updated.");
    } else{
        echo json_encode("Data could not be updated");
    }
?>