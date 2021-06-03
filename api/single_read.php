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

    $item->vilt_id = isset($_GET['vilt_id']) ? $_GET['vilt_id'] : die();
  
    $item->getSingleVilt();

    if($item->vilt_id != null){
        // create array
        $vilt_arr = array(
            "vilt_id" =>  $item->vilt_id,
            "gewicht_glas" => $item->gewicht_glas,
            "melding_boolean" => $item->melding_boolean,
            "word_afgehandeld" => $item->word_afgehandeld
        );
      
        http_response_code(200);
        echo json_encode($vilt_arr);
    }
      
    else{
        http_response_code(404);
        echo json_encode("Vilt not found.");
    }
?>