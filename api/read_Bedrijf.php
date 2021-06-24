<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    include_once '../config/database.php';
    include_once '../class/bedrijf.php';

    $database = new Database();
    $db = $database->getConnection();

    $item = new Bedrijf($db);

    $stmt = $item->getBedrijfInfo();
    $itemCount = $stmt->rowCount();


    //echo json_encode($itemCount);

    if($itemCount > 0){
        
        $bedrijfArr = array();
        $bedrijfArr["body"] = array();
        $bedrijfArr["itemCount"] = $itemCount;

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $e = array(
            "Bedrijf_id" =>  $Bedrijf_id,
            "Naam_bedrijf" => $Naam_bedrijf,
            "Gebruikersnaam" => $Gebruikersnaam,
            "Password" => $Password
        );

            array_push($bedrijfArr["body"], $e);
        }
        echo json_encode($bedrijfArr);
    }

    else{
        http_response_code(404);
        echo json_encode(
            array("message" => "No record found.")
        );
    }
?>