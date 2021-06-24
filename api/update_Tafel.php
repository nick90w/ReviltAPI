<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    include_once '../config/database.php';
    include_once '../class/tafel.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $item = new Tafel($db);
    
    $data = json_decode(file_get_contents("php://input"));
    
    $item->tafel_id = $data->tafel_id;
    
	// Tafel 
    $tafel_id = $_GET["tafel_id"];
    $vilt_id = $_GET["vilt_id"];
    $bedrijf_id = $_GET["bedrijf_id"];
	
	// tafel values
    $item->tafel_id = $tafel_id;
    $item->vilt_id = $vilt_id;
    $item->bedrijf_id = $bedrijf_id;


    
    if($item->updateTafel()){
        echo json_encode("Tafel data updated.");
    } else{
        echo json_encode("Data could not be updated");
    }
?>