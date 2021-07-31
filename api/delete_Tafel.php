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
    
    $tafel_id = $_GET["tafel_id"];

    $item->tafel_id = $tafel_id;
    
    if($item->deleteTafel())
    {
        echo json_encode("Tafel deleted.");
    } 
    else
    {
        echo json_encode("Data could not be deleted");
    }
?>