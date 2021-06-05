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

    $item->bedrijf_id = isset($_GET['bedrijf_id']) ? $_GET['bedrijf_id'] : die();
  
    $item->getSingleBedrijf();

    if($item->bedrijf_id != null){
        // create array
        $bedrijf_arr = array(
            "bedrijf_id" =>  $item->bedrijf_id,
            "Naam_bedrijf" => $item->Naam_bedrijf,
            "Gebruikersnaam" => $item->Gebruikersnaam,
            "Password" => $item->Password
        );
      
        http_response_code(200);
        echo json_encode($bedrijf_arr);
    }
      
    else{
        http_response_code(404);
        echo json_encode("Bedrijf not found.");
    }
?>