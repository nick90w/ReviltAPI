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
    
    $Bedrijf_id = $_POST["bedrijf_id"];

    $item->Bedrijf_id = $Bedrijf_id;
    
    if($item->deleteBedrijf())
    {
        echo json_encode("Bedrijf deleted.");
    } 
    else
    {
        echo json_encode("Data could not be deleted");
    }
?>