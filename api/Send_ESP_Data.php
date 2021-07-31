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

    // Vilt 
    $Vilt_id = $_POST["Vilt_id"];
    $Gewicht_glas = $_POST["Gewicht_glas"];


    $item->Vilt_id = $Vilt_id;
    $item->Gewicht_glas = $Gewicht_glas;

    if($item->SendESPData())
    {
        echo json_encode("Vilt data updated.");
    } 
    else
    {
        echo json_encode("Vilt data could not be updated");
    }
?>