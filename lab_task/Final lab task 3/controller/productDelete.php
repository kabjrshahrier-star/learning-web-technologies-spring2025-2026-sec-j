<?php
session_start();

$user = $_SESSION['username'];
$id = $_GET['id'];

$temp = [];

foreach($_SESSION['products'][$user] as $p){
    if($p['id'] != $id){
        $temp[] = $p;
    }
}

$_SESSION['products'][$user] = $temp;

header('location: ../view/product_list.php');
exit;
?>
