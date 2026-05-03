<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dd = htmlspecialchars($_POST['dd']);
    $mm = htmlspecialchars($_POST['mm']);
    $yyyy = htmlspecialchars($_POST['yyyy']);

    echo "<h3>Your Date of Birth: $dd/$mm/$yyyy</h3>";
}
?>