<?php
session_start();

if(isset($_REQUEST['submit'])){

    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];

    if($username == "" || $password == ""){
        echo "null username/password!";
    }else{

        if(!isset($_SESSION['users'])){
            $_SESSION['users'] = [];
        }

        $_SESSION['users'][] = [
            'id'=>count($_SESSION['users'])+1,
            'username'=>$username,
            'password'=>$password
        ];

        header('location: ../view/login.php');
    }

}else{
    echo "please submit form...";
}
?>