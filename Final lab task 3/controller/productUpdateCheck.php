<?php
session_start();

$user = $_SESSION['username'];

if(isset($_REQUEST['submit'])){

    foreach($_SESSION['products'][$user] as $k=>$p){
        if($p['id'] == $_REQUEST['id']){
            $_SESSION['products'][$user][$k]['name'] = $_REQUEST['name'];
            $_SESSION['products'][$user][$k]['price'] = $_REQUEST['price'];
        }
    }

    header('location: ../view/product_list.php');
}
?>