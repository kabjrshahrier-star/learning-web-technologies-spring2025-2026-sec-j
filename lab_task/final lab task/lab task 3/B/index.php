<!DOCTYPE html>
<html>
<head>
    <title>DOB Form B</title>
</head>
<body>

<form method="POST">
    <fieldset>
        <legend>DATE OF BIRTH</legend>

        <input type="text" name="dd" placeholder="dd" required> /
        <input type="text" name="mm" placeholder="mm" required> /
        <input type="text" name="yyyy" placeholder="yyyy" required>

        <br><br>
        <input type="submit" value="Submit">
    </fieldset>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dd = htmlspecialchars($_POST['dd']);
    $mm = htmlspecialchars($_POST['mm']);
    $yyyy = htmlspecialchars($_POST['yyyy']);

    echo "<p>Your Date of Birth: $dd/$mm/$yyyy</p>";
}
?>

</body>
</html>