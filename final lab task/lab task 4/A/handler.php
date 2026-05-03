<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $gender = htmlspecialchars($_POST['gender']);
    echo "<h3>Your Gender is: $gender</h3>";
}
?>