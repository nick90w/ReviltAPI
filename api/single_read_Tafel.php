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

    $item->tafel_id = isset($_GET['tafel_id']) ? $_GET['tafel_id'] : die();
  
    $item->getSingleTafel();

    if($item->tafel_id != null){
        // create array
        $tafel_arr = array(
            "tafel_id" =>  $item->tafel_id,
            "vilt_id" => $item->vilt_id,
            "bedrijf_id" => $item->bedrijf_id
        );
      
        http_response_code(200);
        echo json_encode($tafel_arr);
    }
      
    else{
        http_response_code(404);
        echo json_encode("Tafel not found.");
    }
?>