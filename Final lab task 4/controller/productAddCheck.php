<?php
session_start();

if(isset($_REQUEST['submit'])){

    $user = $_SESSION['username'];

    if(!isset($_SESSION['products'][$user])){
        $_SESSION['products'][$user] = [];
    }

    $_SESSION['products'][$user][] = [
        'id'=>count($_SESSION['products'][$user])+1,
        'name'=>$_REQUEST['name'],
        'price'=>$_REQUEST['price']
    ];

    header('location: ../view/product_list.php');
}
?>