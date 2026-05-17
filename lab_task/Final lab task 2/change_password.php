<?php 
include 'config.php';

if(!isset($_SESSION['user'])){
    header("location: login.php");
}

$user = $_SESSION['user'];

if(isset($_POST['change'])){
    $current = $_POST['current_pass'];
    $new = $_POST['new_pass'];

    if($_SESSION['users'][$user]['password'] == $current){
        $_SESSION['users'][$user]['password'] = $new;
        echo "Password Changed Successfully!";
    } else {
        echo "Current Password Wrong!";
    }
}
?>

<h3>Change Password</h3>

<form method="post">

Current Password: <br>
<input type="password" name="current_pass"><br><br>

New Password: <br>
<input type="password" name="new_pass"><br><br>

<input type="submit" name="change">

</form>