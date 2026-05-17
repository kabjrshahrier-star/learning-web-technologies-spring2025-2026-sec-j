<?php 
include 'config.php';

$user = $_SESSION['user'];

if(isset($_POST['update'])){
    $_SESSION['users'][$user]['name'] = $_POST['name'];
    $_SESSION['users'][$user]['email'] = $_POST['email'];
    echo "Updated!";
}
?>

<form method="post">
Name: <input type="text" name="name"><br>
Email: <input type="text" name="email"><br>

<input type="submit" name="update">
</form>