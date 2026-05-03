<?php 
include 'config.php';
?>

<!-- Header -->
<div style="border:1px solid black; padding:10px;">
    <b style="font-size:20px;">X Company</b>

    <span style="float:right;">
        <a href="index.php">Home</a> |
        <a href="login.php">Login</a> |
        <a href="register.php">Registration</a>
    </span>
</div>

<br>

<!-- Registration Box -->
<div style="border:1px solid black; width:400px; margin:auto; padding:20px;">

    <h3 style="text-align:center;">REGISTRATION</h3>

    <form method="post">

        Name: <br>
        <input type="text" name="name" style="width:100%;"><br><br>

        Email: <br>
        <input type="text" name="email" style="width:100%;"><br><br>

        User Name: <br>
        <input type="text" name="username" style="width:100%;"><br><br>

        Password: <br>
        <input type="password" name="password" style="width:100%;"><br><br>

        Confirm Password: <br>
        <input type="password" name="confirm"><br><br>

        <fieldset>
            <legend>Gender</legend>
            <input type="radio" name="gender"> Male
            <input type="radio" name="gender"> Female
            <input type="radio" name="gender"> Other
        </fieldset>

        <br>

        <fieldset>
            <legend>Date of Birth</legend>
            <input type="text" name="dd" size="2"> /
            <input type="text" name="mm" size="2"> /
            <input type="text" name="yyyy" size="4">
            <small>(dd/mm/yyyy)</small>
        </fieldset>

        <br>

        <input type="submit" name="submit" value="Submit">
        <input type="reset" value="Reset">

    </form>
</div>



<?php
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $_SESSION['users'][$username] = [
        'name' => $name,
        'email' => $email,
        'password' => $password
    ];

    echo "<center>Registration Successful</center>";
}
?>