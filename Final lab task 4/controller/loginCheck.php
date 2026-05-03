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

    $valid = false;

    if(isset($_SESSION['users'])){
        foreach($_SESSION['users'] as $user){
            if($username == $user['username'] && $password == $user['password']){

                $_SESSION['status'] = true;
                $_SESSION['username'] = $username;

                setcookie('status', 'true', time()+3000, '/');

                $valid = true;
                break;
            }
        }
    }

    if($valid){
        echo json_encode([
            "status" => "success",
            "message" => "Login successful",
            "location" => "../view/home.php"
        ]);
    }else{
        echo json_encode([
            "status" => "error",
            "message" => "Invalid user!"
        ]);
    }

}else{
    echo json_encode([
        "status" => "error",
        "message" => "Please submit form..."
    ]);
}
?>