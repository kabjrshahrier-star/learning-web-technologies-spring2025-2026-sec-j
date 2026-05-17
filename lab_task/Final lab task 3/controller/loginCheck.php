<?php
session_start();

if(isset($_REQUEST['submit'])){

    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];

    if($username == "" || $password == ""){
        echo "null username/password!";
    }else{

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
            header('location: ../view/home.php');
        }else{
            echo "invalid user!";
        }
    }

}else{
    echo "please submit form...";
}
?>