<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars($_POST['email']);
    echo "<h3>Your Email is: $email</h3>";
}
?>