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

    $item->Vilt_id = isset($_GET['Vilt_id']) ? $_GET['Vilt_id'] : die();
  
    $item->getSingleVilt();

    if($item->Vilt_id != null){
        // create array
        $vilt_arr = array(
            "Vilt_id" =>  $item->Vilt_id,
            "Gewicht_glas" => $item->Gewicht_glas,
            "Melding_boolean" => $item->Melding_boolean,
            "Word_afgehandeld" => $item->Word_afgehandeld
        );
      
        http_response_code(200);
        echo json_encode($vilt_arr);
    }
      
    else{
        http_response_code(404);
        echo json_encode("Vilt not found.");
    }
?>