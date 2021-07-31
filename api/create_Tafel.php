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

    $item->gewicht_glas = $data->gewicht_glas;
    $item->melding_boolean = $data->melding_boolean;
    $item->word_afgehandeld = $data->word_afgehandeld;
    
    if($item->createTafel())
    {
        echo 'Vilt created successfully.';
    } 
    else
    {
        echo 'Vilt could not be created.';
    }
?>