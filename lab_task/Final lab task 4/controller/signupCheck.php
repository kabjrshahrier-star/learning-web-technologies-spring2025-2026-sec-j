<?php
session_start();

header('Content-Type: application/json');

if(isset($_POST['user'])){

    $data = json_decode($_POST['user']);

    $username = $data->username;
    $password = $data->password;

    if($username == "" || $password == ""){
        echo json_encode([
            "status" => "error",
            "message" => "Null username/password!"
        ]);
        exit;
    }

    if(!isset($_SESSION['users'])){
        $_SESSION['users'] = [];
    }

    foreach($_SESSION['users'] as $user){
        if($user['username'] == $username){
            echo json_encode([
                "status" => "error",
                "message" => "Username already exists!"
            ]);
            exit;
        }
    }

    $_SESSION['users'][] = [
        "id" => count($_SESSION['users']) + 1,
        "username" => $username,
        "password" => $password
    ];

    echo json_encode([
        "status" => "success",
        "message" => "Signup successful!",
        "location" => "login.php"
    ]);

}else{
    echo json_encode([
        "status" => "error",
        "message" => "Please submit form..."
    ]);
}
?>