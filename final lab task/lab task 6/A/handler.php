<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $blood = htmlspecialchars($_POST['blood']);
    echo "<h3>Your Blood Group is: $blood</h3>";
}
?>