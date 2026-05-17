<?php 
include 'config.php';

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(isset($_SESSION['users'][$username]) &&
       $_SESSION['users'][$username]['password'] == $password){

        $_SESSION['user'] = $username;
        header("location: dashboard.php");
    }
    else{
        echo "Login Failed";
    }
}
?>

<form method="post">
Username: <input type="text" name="username"><br>
Password: <input type="password" name="password"><br>

<input type="submit" name="submit"><br>

<a href="forgot.php">Forgot Password?</a>
</form>