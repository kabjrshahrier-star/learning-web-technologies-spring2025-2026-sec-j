<?php 
include 'config.php';

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $found = false;

    foreach($_SESSION['users'] as $username => $data){
        if($data['email'] == $email){
            echo "Your Password is: " . $data['password'] . "<br>";
            $found = true;
        }
    }

    if(!$found){
        echo "Email not found!";
    }
}
?>

<form method="post">
Enter Email: <input type="text" name="email"><br>

<input type="submit" name="submit">
</form>