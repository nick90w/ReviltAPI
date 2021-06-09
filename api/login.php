<?php
    session_start();
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

    $item->Gebruikersnaam = isset($_GET['gebruikersnaam']) ? $_GET['gebruikersnaam'] : die();
    $item->Password = isset($_GET['password']) ? $_GET['password'] : die();
  
    $item->loginBedrijf();

    if(!empty($item->bedrijf_id) and !empty($item->Naam_bedrijf)){
        // create array
        $bedrijf_arr = array(
            "bedrijf_id" =>  $item->bedrijf_id,
            "Naam_bedrijf" => $item->Naam_bedrijf
        );
      
        http_response_code(200);
        echo json_encode($bedrijf_arr);
        $_SESSION["bedrijf_id"] = $item->bedrijf_id;
        $_SESSION["Naam_bedrijf"] = $item->Naam_bedrijf;
    }
      
    else{
        http_response_code(404);
        echo json_encode("Bedrijf not found.");
    }
?>