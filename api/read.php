<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    include_once '../config/database.php';
    include_once '../class/vilt.php';

    $database = new Database();
    $db = $database->getConnection();

    $items = new Vilt($db);

    $stmt = $items->getViltInfo();
    $itemCount = $stmt->rowCount();


   // echo json_encode($itemCount);

    if($itemCount > 0)
    {
        
        $viltArr = array();
        $viltArr["body"] = array();
        $viltArr["itemCount"] = $itemCount;

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            $e = array(
                "Vilt_id" => $Vilt_id,
                "Gewicht_glas" => $Gewicht_glas,
                "Melding_boolean" => $Melding_boolean,
                "Word_afgehandeld" => $Word_afgehandeld
            );

            array_push($viltArr["body"], $e);
        }
        echo json_encode($viltArr);
    }

    else
    {
        http_response_code(404);
        echo json_encode(
            array("message" => "No record found.")
        );
    }
?>