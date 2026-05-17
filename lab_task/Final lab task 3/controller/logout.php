<?php
session_start();

unset($_SESSION['status']);
unset($_SESSION['username']);

setcookie('status', 'true', time()-10, '/');

header('location: ../view/login.php');
?>