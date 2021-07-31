<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    include_once '../config/database.php';
    include_once '../class/tafel.php';

    $database = new Database();
    $db = $database->getConnection();

    $items = new Tafel($db);

    $stmt = $items->getTafelInfo();
    $itemCount = $stmt->rowCount();

    if($itemCount > 0)
    {
        
        $tafelArr = array();
        $tafelArr["body"] = array();
        $tafelArr["itemCount"] = $itemCount;

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            $e = array(
                "tafel_id" => $tafel_id,
                "vilt_id" => $vilt_id,
                "bedrijf_id" => $bedrijf_id
            );

            array_push($tafelArr["body"], $e);
        }
        echo json_encode($tafelArr);
    }

    else
    {
        http_response_code(404);
        echo json_encode(
            array("message" => "No record found.")
        );
    }
?>