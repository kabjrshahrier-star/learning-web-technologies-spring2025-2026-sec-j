<?php
session_start();

header('Content-Type: application/json');

if(!isset($_SESSION['username'])){
    echo json_encode([
        "status" => "error",
        "message" => "User not logged in!"
    ]);
    exit;
}

if(isset($_POST['product'])){

    $data = json_decode($_POST['product']);

    $id = $data->id;
    $user = $_SESSION['username'];

    if(!isset($_SESSION['products'][$user])){
        echo json_encode([
            "status" => "error",
            "message" => "No product found!"
        ]);
        exit;
    }

    $temp = [];
    $deleted = false;

    foreach($_SESSION['products'][$user] as $p){
        if($p['id'] != $id){
            $temp[] = $p;
        }else{
            $deleted = true;
        }
    }

    $_SESSION['products'][$user] = $temp;

    if($deleted){
        echo json_encode([
            "status" => "success",
            "message" => "Product deleted successfully!"
        ]);
    }else{
        echo json_encode([
            "status" => "error",
            "message" => "Product ID not found!"
        ]);
    }

}else{
    echo json_encode([
        "status" => "error",
        "message" => "Invalid request!"
    ]);
}
?>